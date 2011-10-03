<?php
function getCharData( $charid, $server )
{
	$pgSQL =& Database::getPostgreSQL();

	$query = "SELECT "
			.PHP_EOL."player.ply_body_height,"
			.PHP_EOL."player.ply_weight,"
			.PHP_EOL."player.ply_dob,"
			.PHP_EOL."chr.name"
			.PHP_EOL."FROM ".$server.".player, ".$server.".chars "
			.PHP_EOL."WHERE ply_playerid = ".$pgSQL->Quote( $charid)." "
			.PHP_EOL."AND chr_playerid =".$pgSQL->Quote( $charid);
	$pgSQL->setQuery( $query );
	$char_data = $pgSQL->loadAssocRow();

	if (!$char_data || !count($char_data))
	{
		return false;
	}


	return $char_data;
}