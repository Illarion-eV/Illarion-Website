<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add((Page::isGerman() ? 'Fehler beim Übertragen der Charakter ID' : 'Error while transfering character ID'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/'.Page::getLanguage().'_charlist.php' );
		exit();
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = "SELECT COUNT(*)"
	. "\n FROM chars"
	. "\n WHERE chr_accid = ".$pgSQL->Quote( IllaUser::$ID )
	. "\n AND chr_playerid = ".$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );

	if (!$pgSQL->loadResult())
	{
		Messages::add((Page::isGerman() ? 'Der Charakter wurde nicht gefunden.' : 'Character was not found.'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/'.Page::getLanguage().'_charlist.php' );
		exit();
	}

	$short_de = ( strlen($_POST['short_de'])>3 ? substr($_POST['short_de'],0,255) : '' );
	$short_us = ( strlen($_POST['short_us'])>3 ? substr($_POST['short_us'],0,255) : '' );

	if ($server == 'illarionserver')
	{
		$long_de = $_POST['long_de'];
		$long_us = $_POST['long_us'];

		$mySQL =& Database::getMySQL();

		$query = "UPDATE `homepage_character_details`"
		. "\n SET `description_de` = ".$mySQL->Quote( $long_de )
		. ", `description_us` = ".$mySQL->Quote( $long_us )
		. "\n WHERE `char_id` =".$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );
		$mySQL->query();
	}

	$query = "UPDATE chars"
	. "\n SET chr_shortdesc_de = ".$pgSQL->Quote( $short_de )
	. ", chr_shortdesc_us = ".$pgSQL->Quote( $short_us )
	. "\n WHERE chr_playerid =".$pgSQL->Quote( $charid )
	;
	$pgSQL->setQuery( $query );
	$pgSQL->query();

	Messages::add( (Page::isGerman() ? 'Deine Beschreibungen wurden erfolgreich gespeichert.' : 'Your descriptions were successfully saved.'), 'info' );
?>