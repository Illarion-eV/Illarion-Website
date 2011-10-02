<?php
	function getCharData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT "
					.PHP_EOL."chars.chr_accid,"
					.PHP_EOL."chars.chr_playerid,"
					.PHP_EOL."chars.chr_status,"
					.PHP_EOL."chars.chr_lastsavetime,"
					.PHP_EOL."chars.chr_lastip,"
					.PHP_EOL."chars.chr_name,"
					.PHP_EOL."chars.chr_prefix,"
					.PHP_EOL."chars.chr_suffix,"
					.PHP_EOL."chars.chr_race,"
					.PHP_EOL."chars.chr_sex,"
					.PHP_EOL."account.acc_name,"
					.PHP_EOL."account.acc_email,"
					.PHP_EOL."player.ply_hitpoints,"
					.PHP_EOL."player.ply_mana,"
					.PHP_EOL."player.ply_posx,"
					.PHP_EOL."player.ply_posy,"
					.PHP_EOL."player.ply_posz "
					.PHP_EOL."FROM ".$server.".chars, ".$server.".player, accounts.account "
					.PHP_EOL."WHERE chr_playerid = ".$pgSQL->Quote( $charid)." "
					.PHP_EOL."AND acc_id = chr_accid "
					.PHP_EOL."AND ply_playerid = chr_playerid";
		$pgSQL->setQuery( $query );
		$char_data = $pgSQL->loadAssocRow();

		if (!$char_data || !count($char_data))
		{
			return false;
		}

		$query = "SELECT count(onlineplayer.on_playerid) as hits FROM ".$server.".onlineplayer WHERE on_playerid=".$pgSQL->Quote( $charid);
		$pgSQL->setQuery( $query );
		$char_data['online'] = $pgSQL->loadResult();

		return $char_data;
	}

?>