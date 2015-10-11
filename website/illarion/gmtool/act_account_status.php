<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add((Page::isGerman()?'Zugriff verweigert':'Access denied'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );

	if (!$accid)
	{
		Messages::add((Page::isGerman()?'Account ID wurde nicht richtig übergeben':'Account ID was not transferred correctly'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$new_status = ( is_numeric($_POST['status']) ? (int)$_POST['status'] : null );
	$new_reason   = ( strlen($_POST['reason']) > 0 ? (string)$_POST['reason'] : '' );

    $error = 0;
    if (strlen($new_reason) <= 10)
    {
        Messages::add( (Page::isGerman() ? 'Die Begründung muss mindestens 10 Zeichen lang sein.' : 'The reason must be have at least 10 characters.'), 'error' );
        $error = 1;
    }

    if ( !is_null( $new_status ) && $error == 0 )
    {
		$pgSQL =& Database::getPostgreSQL( 'accounts' );
		
		$query = 'SELECT acc_state'
    	  .PHP_EOL.'FROM account'
    	  .PHP_EOL.'WHERE acc_id = '.$pgSQL->Quote( $accid )
    	  ;
    	  $pgSQL->setQuery( $query );
    	  $account_state = $pgSQL->loadResult();

		if ( $account_state != $new_status )
      	{
			$query = 'UPDATE account'
			.PHP_EOL.'SET acc_state = '.$pgSQL->Quote( $new_status )
			.PHP_EOL.'WHERE acc_id = '.$pgSQL->Quote( $accid )
			;
			$pgSQL->setQuery( $query );
			$pgSQL->query();

			$query = 'INSERT INTO account_log (al_user_id, al_gm_id, al_time, al_message, al_type)'
			.PHP_EOL.'VALUES ('.$pgSQL->Quote( $accid ).', '.$pgSQL->Quote( IllaUser::$ID ).', CURRENT_TIMESTAMP, '.$pgSQL->Quote( 'Accountstate changed from '.getAccountStatusName( $account_state ).' to '.getAccountStatusName( $new_status ).( strlen($new_reason) ? PHP_EOL.'Reason: '.$new_reason : '' ) ).',0)'
			;

			$pgSQL->setQuery( $query );
			$pgSQL->query();

			Messages::add((Page::isGerman()?'Status wurde geändert':'State got changed'), 'info');
		}
	}


?>
