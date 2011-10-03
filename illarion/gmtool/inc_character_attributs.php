<?php
function getCharData( $charid, $server )
{
	$pgSQL =& Database::getPostgreSQL();

	$query = "SELECT "
			.PHP_EOL."player.ply_strength,"
			.PHP_EOL."player.ply_dexterity,"
			.PHP_EOL."player.ply_constitution,"
			.PHP_EOL."player.ply_agility,"
			.PHP_EOL."player.ply_intelligence,"
			.PHP_EOL."player.ply_perception,"
			.PHP_EOL."player.ply_willpower,"
			.PHP_EOL."player.ply_essence,"
			.PHP_EOL."chars.chr_name"
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