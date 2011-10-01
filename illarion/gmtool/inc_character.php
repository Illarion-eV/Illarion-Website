<?php
	function getCharData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT * FROM ".$server.".chars WHERE chr_playerid = ".$pgSQL->Quote( $charid);
		$pgSQL->setQuery( $query );
		$char_data = $pgSQL->loadAssocRow();

		if (!$char_data || !count($char_data))
		{
			return false;
		}

		return $char_data;
	}

?>