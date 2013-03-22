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

	$pgSQL =& Database::getPostgreSQL( );

	$query = "SELECT COUNT(*)"
	. "\n FROM ".$server.".chars"
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

	$error = false;
	// check short_desc_de
	if (strlen($_POST['short_de']) > 0)
	{
		if (strlen($_POST['short_de']) < 3 )
		{	
			$msg_de="Die Kurzbeschreibung muss mindestens 4 Zeichen lang sein.";
			$msg_us="Short description must be at least 4 characters."; 
			$error = true;
		}
		elseif (strlen($_POST['short_de']) >= 255)
		{
			$msg_de="Die Kurzbeschreibung darf höchstens 255 Zeichen lang sein.";
			$msg_us="Short description should be maximal 255 characters.";
			$error = true;
		}
	}
	// check short_desc_us
    if (strlen($_POST['short_us']) > 0)
    {
        if (strlen($_POST['short_us']) < 3 )
        {
			$msg_de="Die Kurzbeschreibung muss mindestens 4 Zeichen lang sein.";
            $msg_us="Short description must be at least 4 characters.";
            $error = true;
        }
        elseif (strlen($_POST['short_us']) >= 255)
        {
			$msg_de="Die Kurzbeschreibung darf höchstens 255 Zeichen lang sein.";
            $msg_us="Short description should be maximal 255 characters.";
            $error = true;
        }
    }
	

	if ($error)
	{
		Messages::add( (Page::isGerman() ? $msg_de : $msg_us), 'error' );
	}
	else
	{
		echo "INSERT DE: ".$short_de.", US: ".$short_us."<br/>";

		if ($server == 'illarionserver')
		{
			$long_de = $_POST['long_de'];
			$long_us = $_POST['long_us'];
			$short_de = $_POST['short_de'];
            $short_us = $_POST['short_us'];

			$query = "UPDATE homepage.character_details"
			. "\n SET description_de = ".$pgSQL->Quote( $long_de )
			. ", description_us = ".$pgSQL->Quote( $long_us )
			. "\n WHERE char_id =".$pgSQL->Quote( $charid )
			;
			$pgSQL->setQuery( $query );
			$pgSQL->query();
		}

		$query = "UPDATE ".$server.".chars"
		. "\n SET chr_shortdesc_de = ".$pgSQL->Quote( $short_de )
		. ", chr_shortdesc_us = ".$pgSQL->Quote( $short_us )
		. "\n WHERE chr_playerid =".$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		Messages::add( (Page::isGerman() ? 'Deine Beschreibungen wurden erfolgreich gespeichert.' : 'Your descriptions were successfully saved.'), 'info' );
	}
?>
