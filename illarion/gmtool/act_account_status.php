<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add(($language=='de'?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );

	if (!$accid)
	{
		Messages::add(($language=='de'?'Account ID wurde nicht richtig übergeben':'Account ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$new_status   = ( is_numeric($_POST['status']) ? (int)$_POST['status'] : null );
	$new_reason   = ( strlen($_POST['reason']) > 0 ? (string)$_POST['reason'] : '' );

	if ( !is_null( $new_status ) )
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `state`'
		.PHP_EOL.'FROM `homepage_user`'
		.PHP_EOL.'WHERE `id` = '.$mySQL->Quote( $accid )
		;
		$mySQL->setQuery( $query );
		$account_state = $mySQL->loadResult();

		if ( $account_state != $new_status )
		{
			$query = 'UPDATE `homepage_user`'
			.PHP_EOL.'SET `state` = '.$mySQL->Quote( $new_status )
			.PHP_EOL.'WHERE `id` = '.$mySQL->Quote( $accid )
			;
			$mySQL->setQuery( $query );
			$mySQL->query();

			$pgSQL =& Database::getPostgreSQL( 'accounts' );
			$query = 'UPDATE account'
			.PHP_EOL.'SET acc_state = '.$pgSQL->Quote( $new_status )
			.PHP_EOL.'WHERE acc_id = '.$pgSQL->Quote( $accid )
			;
			$pgSQL->setQuery( $query );
			$pgSQL->query();

			$tempLang = $language;
			$language = 'us';
			$query = 'INSERT INTO `homepage_user_log` (`user_id`,`gm_id`,`message`,`type`)'
			.PHP_EOL.'VALUES ('.$mySQL->Quote( $accid ).', '.$mySQL->Quote( IllaUser::$ID ).', '.$mySQL->Quote( 'Accountstate changed from '.getAccountStatusName( $account_state ).' to '.getAccountStatusName( $new_status ).( strlen($new_reason) ? PHP_EOL.'Reason: '.$new_reason : '' ) ).',0)'
			;
			$language = $tempLang;
			$mySQL->setQuery( $query );
			$mySQL->query();

			Messages::add(($language=='de'?'Status wurde geändert':'State got changed'), 'info');
		}
	}
?>