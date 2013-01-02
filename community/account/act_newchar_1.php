<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';


	checkAndCreateChar();

	function checkAndCreateChar()
	{
		if (!IllaUser::loggedIn())
		{
			Messages::add((Page::isGerman()?'Nicht eingeloggt':'Not logged in'),'error');
			return;
		}

		$server = ( (int)$_POST['server'] == 1 ? 'testserver' : 'illarionserver' );
		if ( $server == 'testserver' && !IllaUser::auth('testserver') )
		{
			Messages::add((Page::isGerman()?'Du darfst keine Charaktere auf dem Testserver anlegen.':'You are not allowed to create testserver characters.'),'error');
			return;
		}
		if ( $server == 'illarionserver' && IllaUser::$charlimit > 0 )
		{
			$pgSQL =& Database::getPostgreSQL( $server );
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM chars'
			.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
			;
			$pgSQL->setQuery( $query );
			$charcount = $pgSQL->loadResult();

			if ($charcount >= IllaUser::$charlimit)
			{
				Messages::add((Page::isGerman()?'Du darfst keine Charaktere mehr anlegen, da Du die Obergrenze bereits erreichst hast.':'You are not allowed to create more characters, because you\'ve already reached the upper limit.'),'error');
				return;
			}
		}

		$name = ( isset($_POST['charname']) ? $_POST['charname'] : false );
		$name = stripslashes($name);
		$name = trim($name);

		$decoded_name = utf8_decode( $name );

		if (!$name)
		{
			Messages::add((Page::isGerman()?'Bitte gib einen Namen für Deinen Charakter ein.':'Please enter a name for your character.'),'error');
			return;
		}
		elseif (strlen($decoded_name)<4)
		{
			Messages::add((Page::isGerman()?'Der Name ist zu kurz.':'The name is too short.'),'error');
			return;
		}
		elseif (strlen($decoded_name)>50)
		{
			Messages::add((Page::isGerman()?'Der Name ist zu lang.':'The name is too long.'),'error');
			return;
		}
		elseif (!preg_match(utf8_decode('/^[A-Z]/'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Der Name muss mit einem Großbuchstaben beginnen.':'The name has to start with a capital letter.'),'error');
			return;
		}
		elseif (!preg_match(utf8_decode('/^[A-Za-z \'äöüÄÖÜßáàÁÀéèÉÈíìÍÌóòÒÓúùÚÙ]+$/'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Der Name enthält ungültige Zeichen.':'The name contains invalid characters.'),'error');
			return;
		}
		elseif (preg_match(utf8_decode('/ [a-zäöüßáàéèíìóòúù]+$/'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Der letzte Teil des Namens muss mit einem Großbuchstaben beginnen.':'The last part of the name has to start with a capital letter.'),'error');
			return;
		}
		elseif (!preg_match(utf8_decode('/[aeiouäöüáàéèíìóòúù]/i'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Keine Vokale gefunden.':'No vowels found.'),'error');
			return;
		}
		elseif (preg_match(utf8_decode('/^.. /'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Der Vorname muss mindestens drei Buchstaben haben.':'First name needs at least three characters.'),'error');
			return;
		}
		elseif (preg_match(utf8_decode('/ .$/'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Der letzte Teil des Namens braucht mindestens zwei Buchstaben.':'Last part of the name needs at least two characters.'),'error');
			return;
		}
		elseif (preg_match(utf8_decode('/[a-zäöüßéèíìóòúùA-ZÄÖÜÁÀÉÈÍÌÒÓÚÙ][A-ZÄÖÜÁÀÉÈÍÌÒÓÚÙ]/'),$decoded_name))
		{
			Messages::add((Page::isGerman()?'Es darf kein Großbuchstabe nach einem anderen Buchstaben stehen (Binnenmajuskeln sind nicht erlaubt).':'A capital letter must not be written after another letter (CamelCases are not allowed).'),'error');
			return;
		}
		elseif (substr_count($decoded_name,'  '))
		{
			Messages::add((Page::isGerman()?'Zwei Leerzeichen nacheinander sind im Namen nicht erlaubt.':'Two whitespaces are not allowed one after another.'),'error');
			return;
		}

		$db_hp =& Database::getPostgreSQL( 'homepage' );

		$query = 'SELECT name'
		.PHP_EOL.' FROM badname'
		;
		$db_hp->setQuery( $query );
		$bad_names = $db_hp->loadResultArray();

		foreach ($bad_names as $bad_name)
		{
			if ( preg_match( utf8_decode('/\b'.$bad_name.'\b/i'), $decoded_name, $hit ) )
			{
				Messages::add((Page::isGerman()?'"'.$hit.'" darf in Namen des Charakters nicht enthalten sein.':'"'.$hit.'" is not allowed in the name.'),'error');
				return;
			}
		}

		$pgSQL =& Database::getPostgreSQL( $server );

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_name = '.$pgSQL->Quote( $name )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult())
		{
			Messages::add((Page::isGerman()?'Dieser Charaktername wurde bereits vergeben.':'This character name was already taken.'),'error');
			return;
		}

		$sex = ( is_numeric($_POST['sex']) ? (int)$_POST['sex'] : false );
		if ($sex === false || $sex < 0 || $sex > 1)
		{
			Messages::add((Page::isGerman()?'Ungültiges Geschlecht gewählt.':'Invalid gender was chosen.'),'error');
			return;
		}

		$race = ( is_numeric($_POST['race']) ? (int)$_POST['race'] : false );
		if ($race === false || array_search($race,IllaUser::$allowed_races) === false)
		{
			Messages::add((Page::isGerman()?'Ungültige Rasse gewählt.':'Invalid race was chosen.'),'error');
			return;
		}

		$query = 'INSERT INTO chars (chr_accid,chr_playerid,chr_status,chr_race,chr_sex,chr_name)'
		.PHP_EOL.' VALUES('.$pgSQL->Quote( IllaUser::$ID ).', generate_charid(), 3, '.$pgSQL->Quote( $race ).', '.$pgSQL->Quote( $sex ).', '.$pgSQL->Quote( $name ).')'
		;

		$pgSQL->setQuery( $query );
		$pgSQL->query();

		$query = 'SELECT chr_playerid'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_name = '.$pgSQL->Quote( $name )
		;
		$pgSQL->setQuery( $query );
		$charid = $pgSQL->loadResult();

		// aktion mitloggen
		$msg = "[NEW CHAR]Name: ".$name." - ID: ".$charid;
		$db =& Database::getPostgreSQL( );
		$query = 'INSERT INTO accounts.account_log (al_user_id, al_gm_id,  al_time, al_message, al_type)'
				.PHP_EOL.' VALUES ('.$db->Quote( IllaUser::$ID ).','.$db->Quote( IllaUser::$ID ).', CURRENT_TIMESTAMP, '.$db->Quote($msg).',0)';

            $db->setQuery( $query );
            $db->query();	

		if (!$charid)
		{
			Messages::add((Page::isGerman()?'Unbekannter Fehler beim Erstellen.':'Unknown error while creating.'),'error');
			return;
		}

		Page::redirect( Page::getURL().'/community/account/'.Page::getLanguage().'_newchar.php?charid='.$charid.'&server='.($server=='testserver'?'1':'0') );
	}
