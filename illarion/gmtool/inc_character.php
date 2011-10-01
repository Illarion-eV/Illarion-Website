<?php
	function getCharData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT * FROM `".$server."`.`chars` WHERE `chr_playerid` = ".$charid;
		echo "<div>";
		echo $query;
		echo "</div>";
		$char_data = array("charname" => "test", "id" => 666, 1 => "moep", 2 => "blala");

		return $char_data;
	}

?>