<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	if (!is_numeric($_GET['charid']))
	{
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( 'illarionserver' );

	$query = "SELECT COUNT(*)"
	. "\n FROM chars"
	. "\n WHERE chr_accid = ".$pgSQL->Quote( IllaUser::$ID )
	. "\n AND chr_playerid = ".$pgSQL->Quote( $_GET['charid'] )
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

	$mySQL =& Database::getMySQL();

	$query = "UPDATE `homepage_character_details`"
	. "\n SET `settings` = ".$mySQL->Quote( $value )
	. "\n WHERE `char_id` = ".$mySQL->Quote( $_GET['charid'] );
	$mySQL->setQuery( $query );
	$mySQL->query();

	Messages::add( (Page::isGerman() ? 'Die Einstellungen wurden gespeichert.' : 'All settings were saved.'), 'info' );
?>