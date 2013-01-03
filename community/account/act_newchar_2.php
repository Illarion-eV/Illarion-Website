<?php
	includeWrapper::includeOnce( Page::getRootPath().'/community/account/def_charcreate.php' );

	checkAndUpdateChar();

	function checkAndUpdateChar()
	{
		if (!IllaUser::loggedIn())
		{
			Messages::add((Page::isGerman()?'Nicht eingeloggt':'Not logged in'),'error');
			return;
		}
/*
		echo "Hautfarbe: ".$_POST['skincolor']."<br/>";
		echo "Haarfarbe: ".$_POST['haircolor']."<br/>";
		echo "Haare: ".$_POST['hairvalue']."<br/>";
		echo "Bart: ".$_POST['beardvalue']."<br/>";
*/
		$server = ( isset( $_GET['server'] ) && (int)$_GET['server'] == 1 ? 'testserver' : 'illarionserver' );
		$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );
		$pgSQL =& Database::getPostgreSQL( $server );

		$query = 'SELECT chr_race, chr_sex'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
		.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		list( $race, $sex ) = $pgSQL->loadRow();

		if ($race === null || $race === false)
		{
			Messages::add((Page::isGerman()?'Charakter nicht gefunden':'The character was not found'),'error');
			return;
		}

    	$query = 'SELECT *'
    	.PHP_EOL.' FROM "'.$server.'"."raceattr"'
    	.PHP_EOL.' WHERE "id" IN ( -1, '.$pgSQL->Quote($race).' )'
    	.PHP_EOL.' ORDER BY "id" DESC'
    	;
		$pgSQL->setQuery( $query, 0, 1 );
		$limits = $pgSQL->loadAssocRow();

		$new_bodyheight = (float)$_POST['bodyheight'];
		$new_weight = (float)$_POST['weight'];

		if (IllaUser::usesMeter())
		{
			$new_bodyheight = round($new_bodyheight*100/2.54);
		}
		if (IllaUser::usesPound())
		{
			$new_weight = round( $new_weight*100/2.204623 );
		}
		else
		{
			$new_weight *= 100;
		}

		if ( $new_weight < $limits['minweight'] || $new_weight > $limits['maxweight'] )
		{
			Messages::add((Page::isGerman()?'Gewicht überschreitet die vorgegebenen Grenzen':'Weight out of range'),'error');
			return;
		}
		if ( $new_bodyheight < $limits['minbodyheight'] || $new_bodyheight > $limits['maxbodyheight'] )
		{
			Messages::add((Page::isGerman()?'Körpergröße überschreitet die vorgegebenen Grenzen':'Height out of range'),'error');
			return;
		}

		$age = (int)$_POST['age'];
		$day = (int)$_POST['day'];
		$month = (int)$_POST['month'];

		if ( $age < $limits['minage'] || $age > $limits['maxage'] )
		{
			Messages::add((Page::isGerman()?'Alter überschreitet die vorgegebenen Grenzen':'Age out of range'),'error');
			return;
		}

		$current_data = IllaDateTime::IllaTimestampToTime( 'array' );

		$illa_day_stamp = ( ( $current_data['year'] - $age ) - ( -10000 ) );
		if ( ( ( $month - 1 ) * 24 + $day ) > ( ( $current_data['month'] - 1 ) * 24 + $current_data['day'] ) )
		{
			$illa_day_stamp -= 1;
		}
		$illa_day_stamp = ( $illa_day_stamp * 365 ) + ( ( $month - 1 ) * 24 ) + $day;

		// ID von Haare und Bart extrahieren
		$hair_id = substr($_POST['hairvalue'], 6);
		$beard_id = substr($_POST['beardvalue'], 7);

		// Skincode in RGB umwandeln
		$hex_red = substr($_POST['skincolor'], 1, 2);
		$hex_green = substr($_POST['skincolor'], 3, 2);
		$hex_blue = substr($_POST['skincolor'], 5, 2);
		$skin_red = hexdec($hex_red);
		$skin_green = hexdec($hex_green);
		$skin_blue = hexdec($hex_blue);

		// Haircode in RGB umwandeln
		$hex_red = substr($_POST['haircolor'], 1, 2);
		$hex_green = substr($_POST['haircolor'], 3, 2);
		$hex_blue = substr($_POST['haircolor'], 5, 2);
		$hair_red = hexdec($hex_red);
		$hair_green = hexdec($hex_green);
		$hair_blue = hexdec($hex_blue);

		$appearance = 1;
		switch ( $race )
		{
			case RACE_HUMAN: if ($sex == 0) { $appearance =1;  } else { $appearance =16; } break;
			case RACE_DWARF: if ($sex == 0) { $appearance =12; } else { $appearance =17; } break;
			case RACE_HALFLING: if ($sex == 0) { $appearance =24; } else { $appearance =25; } break;
			case RACE_ELF: if ($sex == 0) { $appearance =20; } else { $appearance =19; } break;
			case RACE_ORC: if ($sex == 0) { $appearance =13; } else { $appearance =18; } break;
			case RACE_LIZARD: $appearance =7; break;
		}
/*
		echo "ID: ".$charid."<br/>";
		echo "AGE: ".$age."<br/>";
		echo "WEIGTH: ".$new_weight."<br/>";
		echo "HEIGHT: ".$new_bodyheight."<br/>";
		echo "HAIR: ".$hair_id."<br/>";
		echo "BEARD: ".$beard_id."<br/>";
		echo "HAIR RED: ".$hair_red."<br/>";
		echo "HAIR GREEN: ".$hair_green."<br/>";
		echo "HAIR BLUE: ".$hair_blue."<br/>";
		echo "SKIN RED: ".$skin_red."<br/>";
		echo "SKIN GREEN: ".$skin_green."<br/>";
		echo "SKIN BLUE: ".$skin_blue."<br/>";
		echo "APP: ".$appearance."-".$race."<br/>";
		echo "ILLA DAY STAMP: ".$illa_day_stamp."<br/>";
*/


		$query = 'INSERT INTO player (
   					ply_playerid,
   					ply_age,
   					ply_weight,
   					ply_body_height,
					ply_hair,
					ply_beard,
   					ply_hairred,
   					ply_hairgreen,
   					ply_hairblue,
   					ply_skinred,
   					ply_skingreen,
   					ply_skinblue,
   					ply_appearance,
   					ply_dob,
   					ply_hitpoints,
   					ply_mana,
   					ply_foodlevel,
   					ply_lifestate)
					VALUES (
   					'.$pgSQL->Quote( $charid ).',
   					'.$pgSQL->Quote( $age ).',
   					'.$pgSQL->Quote( $new_weight ).',
   					'.$pgSQL->Quote( $new_bodyheight ).',
   					'.$pgSQL->Quote( $hair_id ).',
   					'.$pgSQL->Quote( $beard_id ).',
   					'.$pgSQL->Quote( $hair_red ).',
   					'.$pgSQL->Quote( $hair_green ).',
				    '.$pgSQL->Quote( $hair_blue ).',
				    '.$pgSQL->Quote( $skin_red ).',
				    '.$pgSQL->Quote( $skin_green ).',
				    '.$pgSQL->Quote( $skin_blue ).',
				    '.$pgSQL->Quote( $appearance ).',
				    '.$pgSQL->Quote( $illa_day_stamp ).',
				    10000,
				    0,
				    50000,
				    1)'
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();

	}
?>