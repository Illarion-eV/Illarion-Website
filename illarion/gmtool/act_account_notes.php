<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );

	if (!IllaUser::auth('gmtool_accounts'))
	{
		Messages::add((Page::isGerman()?'Zugriff verweigert':'Access denieded'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$accid = ( is_numeric($_GET['accid']) ? (int)$_GET['accid'] : 0 );

	if (!$accid)
	{
		Messages::add((Page::isGerman()?'Account ID wurde nicht richtig übergeben':'Account ID was not transfered correctly'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$message    = ( strlen($_POST['entry']) > 0 ? (string)$_POST['entry'] : '' );
	$type 		= $_POST['id'];

	if ( strlen($message) > 0)
	{
		$pgSQL =& Database::getPostgreSQL( 'accounts' );
		
			$query = 'INSERT INTO account_log (al_user_id, al_gm_id, al_time, al_message, al_type)'
			.PHP_EOL.'VALUES ('.$pgSQL->Quote( $accid ).', '.$pgSQL->Quote( IllaUser::$ID ).', CURRENT_TIMESTAMP, '.$pgSQL->Quote( $message ).', '.$pgSQL->Quote( $type ).')';

			$pgSQL->setQuery( $query );
			$pgSQL->query();

			Messages::add((Page::isGerman()?'Nachricht wurde gespeichert':'Message got saved'), 'info');
	}


?>
