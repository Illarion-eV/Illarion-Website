<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	checkAndUpdateChar();

	function checkAndUpdateChar()
	{
		if (!IllaUser::loggedIn())
		{
			Messages::add((Page::isGerman()?'Nicht eingeloggt.':'Not logged in.'),'error');
			return;
		}

		$server = ( isset( $_GET['server'] ) && (int)$_GET['server'] == 1 ? 'testserver' : 'illarionserver' );
		$charid = ( isset( $_GET['charid'] ) && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

		$pgSQL =&Database::getPostgreSQL();

		$query = 'SELECT chr_race, chr_sex'
		.PHP_EOL.' FROM '.$server.'.chars'
		.PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
		.PHP_EOL.' AND chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		list( $race, $sex ) = $pgSQL->loadRow();

		if ($race === null || $race === false)
		{
			Messages::add((Page::isGerman()?'Der Charakter wurde nicht gefunden.':'The character was not found.'),'error');
			return;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM '.$server.'.player'
		.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if (!$pgSQL->loadResult())
		{
			Messages::add((Page::isGerman()?'Daten nicht gesetzt (erst Schritt 2 ausführen).':'Data not set (pass step 2 first).'),'error');
			return;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM '.$server.'.playerskills'
		.PHP_EOL.' WHERE psk_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() > 0)
		{
			Messages::add((Page::isGerman()?'Dieses Paket wurde schon gewählt.':'This package was already chosen.'),'error');
			return;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM '.$server.'.playerlteffects'
		.PHP_EOL.' WHERE plte_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() > 0)
		{
			Messages::add((Page::isGerman()?'Dieses Paket wurde schon gewählt.':'This package was already chosen'),'error');
			return;
		}

		$location = ( isset($_POST['location']) && is_numeric($_POST['location']) ? (int)$_POST['location'] : 0 );
		if (!$location)
		{
			Messages::add((Page::isGerman()?'Keine Startposition ausgewählt.':'No starting position was selected.'),'error');
			return;
		}

		$package = ( isset($_POST['sel_pack']) &&  is_numeric($_POST['sel_pack']) ? (int)$_POST['sel_pack'] : 0 );
		if (!$package)
		{
			Messages::add((Page::isGerman()?'Kein Startpaket ausgewählt.':'No starting package was selected.'),'error');
			return;
		}

		if ($server == 'testserver')
		{
			$newbieOnly = false;
		}
		else
		{
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.' FROM '.$server.'.chars'
			.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
			.PHP_EOL.' AND chr_status NOT IN (3,5,7,8)'
			;
			$pgSQL->setQuery( $query );
			$char_count = $pgSQL->loadResult();
			if (!$char_count)
			{
				$newbieOnly = true;
			}
			else
			{
				$query = 'SELECT COUNT(*)'
				.PHP_EOL.' FROM '.$server.'.chars'
				.PHP_EOL.' INNER JOIN '.$server.'.questprogress ON qpg_userid = chr_playerid'
				.PHP_EOL.' WHERE chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
				.PHP_EOL.' AND qpg_questid = 2'
				.PHP_EOL.' AND qpg_progress > 0'
				.PHP_EOL.' AND chr_status NOT IN (3,5,7,8)'
				;
				$pgSQL->setQuery( $query );
				if ($char_count>$pgSQL->loadResult())
				{
					$newbieOnly = false;
				}
				else
				{
					$newbieOnly = true;
				}
			}
		}


		$query = 'SELECT spl_pos_x, spl_pos_y, spl_pos_z, spl_face_to, spl_newbie'
		.PHP_EOL.' FROM accounts.startplace'
		.( $newbieOnly ? PHP_EOL.' WHERE spl_newbie = 1 AND spl_id = '.$pgSQL->Quote($location) : PHP_EOL.' WHERE spl_id = '.$pgSQL->Quote($location))
		;
		$pgSQL->setQuery($query);
		$position = $pgSQL->loadAssocRow();
		
		if (!count($position))
		{
			Messages::add((Page::isGerman()?'Startposition nicht gefunden.':'Starting position was not found.'),'error');
			return;
		}
		$pgSQL->Begin();

		$query = 'UPDATE '.$server.'.player'
		.PHP_EOL.' SET ply_posx = '.$pgSQL->Quote( $position['spl_pos_x'] )
		. ', ply_posy = '.$pgSQL->Quote( $position['spl_pos_y'] )
		. ', ply_posz = '.$pgSQL->Quote( $position['spl_pos_z'] )
		. ', ply_faceto = '.$pgSQL->Quote( $position['spl_face_to'] )
		.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		if ($position['spl_newbie'])
		{
			$query = 'INSERT INTO '.$server.'.playerlteffects (plte_playerid, plte_effectid, plte_nextcalled, plte_lastcalled, plte_numbercalled, plte_position)'
			.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 13, 100, 0, 0, 1 )'
			;
			$pgSQL->setQuery( $query );
			$pgSQL->query();
		}

		$query = 'SELECT spa_name_file'
		.PHP_EOL.' FROM accounts.startpack'
		.PHP_EOL.' WHERE spa_id = '.$pgSQL->Quote($package);
		$pgSQL->setQuery($query);
		$filename = Page::getRootPath().'/community/account/startpacks/'.$pgSQL->loadResult();

		if (!is_file($filename))
		{
			Messages::add((Page::isGerman()?'Startpaket nicht gefunden.':'Starting package was not found.'),'error');
			return;
		}


		$xmlC = new XmlC( 'UTF-8' );
	   $xmlC->Set_XML_data( file_get_contents( $filename ) );

		foreach($xmlC->obj_data->pack[0]->skills[0]->group as $group )
		{
			if ($group->skill)
			{
				foreach($group->skill as $skill)
				{
					if ($position['spl_newbie'])
					{
						$query = 'INSERT INTO '.$server.'.playerlteffectvalues (pev_playerid, pev_effectid, pev_name, pev_value)'
						.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 13, '.$pgSQL->Quote( $skill->name ).', '.$pgSQL->Quote( $skill->value ).')'
						;
						$pgSQL->setQuery( $query );
						$pgSQL->query();
					}
					else
					{
						$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
						.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', '.$pgSQL->Quote( $skill->name ).', '.$pgSQL->Quote( $group->value ).', '.$pgSQL->Quote( $skill->value ).')'
						;
						$pgSQL->setQuery( $query );
						$pgSQL->query();
					}
				}
			}
		}

		$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
		.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'common language\', 1, 100)'
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		switch( $race )
		{
			case 0:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'human language\', 1, 100)'
				;
			break;
			case 1:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'dwarf language\', 1, 100)'
				;
			break;
			case 2:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'halfling language\', 1, 100)'
				;
			break;
			case 3:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'elf language\', 1, 100)'
				;
			break;
			case 4:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'orc language\', 1, 100)'
				;
			break;
			case 5:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'lizard language\', 1, 100)'
				;
			break;
			case 6:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'gnome language\', 1, 100)'
				;
			break;
			case 7:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'fairy language\', 1, 100)'
				;
			break;
			case 8:
				$query = 'INSERT INTO '.$server.'.playerskills (psk_playerid, psk_name, psk_type, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', \'goblin language\', 1, 100)'
				;
			break;
		}
		$pgSQL->setQuery( $query );
		$pgSQL->query();

	   foreach($xmlC->obj_data->pack[0]->items[0]->item as $item )
		{
			if ($position['spl_newbie'])
			{
				$query = 'INSERT INTO '.$server.'.playerlteffectvalues (pev_playerid, pev_effectid, pev_name, pev_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 13, '.$pgSQL->Quote( 'itemid_'.$item->linenumber ).', '.$pgSQL->Quote( $item->id ).')'
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
				$query = 'INSERT INTO '.$server.'.playerlteffectvalues (pev_playerid, pev_effectid, pev_name, pev_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 13, '.$pgSQL->Quote( 'itemdata_'.$item->linenumber ).', '.$pgSQL->Quote( $item->data ).')'
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
				$query = 'INSERT INTO '.$server.'.playerlteffectvalues (pev_playerid, pev_effectid, pev_name, pev_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 13, '.$pgSQL->Quote( 'itemnumber_'.$item->linenumber ).', '.$pgSQL->Quote( $item->number ).')'
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
				$query = 'INSERT INTO '.$server.'.playerlteffectvalues (pev_playerid, pev_effectid, pev_name, pev_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 13, '.$pgSQL->Quote( 'itemquality_'.$item->linenumber ).', '.$pgSQL->Quote( $item->qual ).')'
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
				$query = 'INSERT INTO '.$server.'.playeritems (pit_itemid, pit_playerid, pit_linenumber, pit_in_container, pit_depot, pit_wear, pit_number, pit_quality, pit_data)'
				.PHP_EOL.' VALUES ( 0,'.$pgSQL->Quote( $charid ).', '.$pgSQL->Quote( $item->linenumber ).', 0, 0, 0, 0, 0, 0)'
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
			}
			else
			{
				$query = 'INSERT INTO '.$server.'.playeritems (pit_itemid, pit_playerid, pit_linenumber, pit_in_container, pit_depot, pit_wear, pit_number, pit_quality, pit_data)'
				.PHP_EOL.' VALUES ( '.$pgSQL->Quote( $item->id ).', '.$pgSQL->Quote( $charid ).', '.$pgSQL->Quote( $item->linenumber ).', 0, 0, 5, '.$pgSQL->Quote( $item->number ).', '.$pgSQL->Quote( $item->qual ).', '.$pgSQL->Quote( $item->data ).')'
				;
				$pgSQL->setQuery( $query );
				$pgSQL->query();
			}
			
			if ($server == 'testserver')
			{
			    $query = 'INSERT INTO '.$server.'.playeritem_datavalues (idv_playerid, idv_linenumber, idv_key, idv_value)'
			    .PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', '.$pgSQL->Quote( $item->linenumber ).', 0, '.$pgSQL->Quote( $item->data ).')'
			    ;
			    $pgSQL->setQuery( $query );
				$pgSQL->query();
			}
		}

		$query = 'SELECT story_needed'
        .PHP_EOL.' FROM accounts.raceattr'
        .PHP_EOL.' WHERE id IN (-1,'.$pgSQL->Quote( $race ).')'
        .PHP_EOL.' ORDER BY id DESC'
        ;
        $pgSQL->setQuery( $query );
        if ($pgSQL->loadResult() == 't')
        {
            $query = 'UPDATE '.$server.'.chars'
            .PHP_EOL.' SET chr_status = 4'
            .PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
            ;
            $pgSQL->setQuery( $query );
            $pgSQL->query();
        }
        else
        {
            $query = 'UPDATE '.$server.'.chars'
            .PHP_EOL.' SET chr_status = 0'
            .PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
            ;
            $pgSQL->setQuery( $query );
            $pgSQL->query();
        }


		$pgSQL->Commit();
	}
?>
