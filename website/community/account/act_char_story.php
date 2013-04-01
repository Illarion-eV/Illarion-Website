<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add((Page::isGerman() ? 'Fehler beim Übertragen der Charakter ID.' : 'Error while transfering the character ID.'), 'error' );
		includeWrapper::includeOnce( Page::getRootPath().'/community/account/'.Page::getLanguage().'_charlist.php' );
		exit();
	}

	if ($server=='devserver')
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

	$db_hp =& Database::getPostgreSQL( 'homepage' );

	$query = "UPDATE character_details"
	. "\n SET story_de = ".$db_hp->Quote( $story_de )
	. ", story_us = ".$db_hp->Quote( $story_us )
	. "\n WHERE char_id =".$db_hp->Quote( $charid )
	;
	$db_hp->setQuery( $query );
	$db_hp->query();

	Messages::add( (Page::isGerman() ? 'Die Geschichte wurde erfolgreich gespeichert.' : 'The story was successfully saved.'), 'info' );
?>
