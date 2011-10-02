<?php
	function getCharData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT * FROM ".$server.".chars, account.account WHERE chr_playerid = ".$pgSQL->Quote( $charid)." AND acc_id = chr_accid";
		$pgSQL->setQuery( $query );
		$char_data = $pgSQL->loadAssocRow();

		if (!$char_data || !count($char_data))
		{
			return false;
		}

		return $char_data;
	}

?>