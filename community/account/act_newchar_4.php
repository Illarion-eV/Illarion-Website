<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	function checkAndUpdateChar()
	{
		if (!IllaUser::loggedIn())
		{
			Messages::add((Page::isGerman()?'Nicht eingeloggt.':'Not logged in.'),'error');
			return;
		}

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
			Messages::add((Page::isGerman()?'Der Charakter wurde nicht gefunden.':'The character was not found.'),'error');
			return;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM player'
		.PHP_EOL.' WHERE ply_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if (!$pgSQL->loadResult())
		{
			Messages::add((Page::isGerman()?'Daten nicht gesetzt (erst Schritt 2 ausführen).':'Data not set (pass step 2 first).'),'error');
			return;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM playerskills'
		.PHP_EOL.' WHERE psk_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() > 0)
		{
			Messages::add((Page::isGerman()?'Dieses Paket wurde schon gewählt.':'This package was already chosen.'),'error');
			return;
		}

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM playerlteffects'
		.PHP_EOL.' WHERE plte_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if ($pgSQL->loadResult() > 0)
		{
			Messages::add((Page::isGerman()?'Dieses Paket wurde schon gewählt.':'This package was already chosen'),'error');
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
			.PHP_EOL.' FROM chars'
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
				.PHP_EOL.' FROM chars'
				.PHP_EOL.' INNER JOIN questprogress ON qpg_userid = chr_playerid'
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

		$db =& Database::getPostgreSQL( 'accounts' );
		
		$pgSQL->Begin();

		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM "'.$server'"."startpacks"'
		.PHP_EOL.' WHERE "stp_id" = '.$db->Quote( $package );
		$db->setQuery( $query );
		if ($db->loadResult() == 0)
		{
			Messages::add((Page::isGerman()?'Startpaket nicht gefunden.':'Starting package was not found.'),'error');
			return;
		}
		
		$query = 'INSERT INTO "'.$server'"."playerskills" ("psk_playerid", "psk_skill_id", "psk_value")'
		.PHP_EOL.' SELECT '.$pgSQL->Quote( $charid ).', "spk_skill_id", "spk_value"'
		.PHP_EOL.'   FROM "'.$server'"."startpack_skills"'
		.PHP_EOL.'   WHERE "spk_id" = '.$db->Quote( $package );
		$db->setQuery( $query );
		$db->query();

		$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
		.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 0, 100)'
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();

		switch( $race )
		{
			case 0:
				$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 1, 100)'
				;
			break;
			case 1:
				$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 2, 100)'
				;
			break;
			case 2:
				$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 4, 100)'
				;
			break;
			case 3:
				$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 3, 100)'
				;
			break;
			case 4:
				$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 5, 100)'
				;
			break;
			case 5:
				$query = 'INSERT INTO playerskills (psk_playerid, psk_skill_id, psk_value)'
				.PHP_EOL.' VALUES ('.$pgSQL->Quote( $charid ).', 6, 100)'
				;
			break;
		}
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		
		$query = 'INSERT INTO "'.$server'"."playeritems" ("pit_itemid", "pit_playerid", "pit_linenumber", "pit_wear", "pit_number", "pit_quality")'
		.PHP_EOL.'  SELECT "spi_item_id", '.$pgSQL->Quote( $charid ).', "spi_linenumber", "com_agingspeed", "spi_number", "spi_quality"'
		.PHP_EOL.'    FROM "'.$server'"."startpack_items"'
		.PHP_EOL.'    INNER JOIN "'.$server'"."common" ON "spi_item_id" = "com_itemid"'
		.PHP_EOL.'    WHERE "spi_id" = '.$db->Quote( $package );
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		
		$query = 'UPDATE "'.$server'"."chars"'
		.PHP_EOL.' SET "chr_status" = 0'
		.PHP_EOL.' WHERE "chr_playerid" = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$pgSQL->query();
		
		$pgSQL->Commit();
	}

	checkAndUpdateChar();
?>
