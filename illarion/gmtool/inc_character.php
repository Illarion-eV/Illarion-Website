<?php
	function getCharData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT * FROM ".$server.".chars, ".$server.".player, accounts.account WHERE chr_playerid = ".$pgSQL->Quote( $charid)." AND acc_id = chr_accid AND ply_playerid = chr_playerid";
		$pgSQL->setQuery( $query );
		$char_data = $pgSQL->loadAssocRow();

		if (!$char_data || !count($char_data))
		{
			return false;
		}

		return $char_data;
	}

?>