<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add((Page::isGerman() ? 'Fehler beim Übertragen der Charakter ID.' : 'Error while transfering the character ID.'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/'.Page::getLanguage().'_charlist.php' );
		exit();
	}

	if ($server=='testserver')
	{
		Messages::add((Page::isGerman() ? 'Nur für Spielserver-Charaktere.' : 'Only for gameserver characters.'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/'.Page::getLanguage().'_char_details.php' );
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
		Messages::add((Page::isGerman() ? 'Dieser Charakter wurde nicht gefunden.' : 'This character wasn\'t found.'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/'.Page::getLanguage().'_charlist.php' );
		exit();
	}

	$story_de = $_POST['story_de'];
	$story_us = $_POST['story_us'];

	$mySQL =& Database::getMySQL();

	$query = "UPDATE `homepage_character_details`"
	. "\n SET `story_de` = ".$mySQL->Quote( $story_de )
	. ", `story_us` = ".$mySQL->Quote( $story_us )
	. "\n WHERE `char_id` =".$mySQL->Quote( $charid )
	;
	$mySQL->setQuery( $query );
	$mySQL->query();

	Messages::add( (Page::isGerman() ? 'Die Geschichte wurde erfolgreich gespeichert.' : 'The story was successfully saved.'), 'info' );
?>