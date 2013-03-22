<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!is_numeric($_GET['charid']))
	{
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$query = "SELECT COUNT(*)"
	. "\n FROM chars"
	. "\n WHERE chr_playerid = ".$pgSQL->Quote( $_GET['charid'] )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		exit();
	}

	$value = 0;
	$value += ( $_POST['show_profil']   == 1 ? 1 : 0 );
	$value += ( $_POST['show_online']   == 1 ? 0 : 2 );
	$value += ( $_POST['show_story']    == 1 ? 4 : 0 );
	$value += ( $_POST['show_birthday'] == 1 ? 8 : 0 );

	$db_hp =& Database::getPostgreSQL( 'homepage' );

	$query = "UPDATE character_details"
	. "\n SET settings = ".$db_hp->Quote( $value )
	. "\n WHERE char_id = ".$db_hp->Quote( $_GET['charid'] );
	$db_hp->setQuery( $query );
	$db_hp->query();

	Messages::add( (Page::isGerman() ? 'Die Einstellungen wurden gespeichert.' : 'All settings were saved.'), 'info' );
?>
