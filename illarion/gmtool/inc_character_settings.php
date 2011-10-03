<?php
function getCharData( $charid, $server )
{
	$pgSQL =& Database::getPostgreSQL();

	$query = "SELECT "
			.PHP_EOL."player.ply_body_height,"
			.PHP_EOL."player.ply_weight,"
			.PHP_EOL."player.ply_dob,"
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

	$chardata['ply_dob'] = IllaDateTime::IllaDatestampToDate( $chardata['ply_dob'] );
	$current_time = IllaDateTime::IllaTimestampToTime( 'array' );

	$chardata[ 'ply_dob' ][ 'age' ] = ( $current_time['year'] - $chardata[ 'ply_dob' ][ 'year' ] );
	if ( $chardata[ 'ply_dob' ][ 'month' ] > $current_time['month'] || ( $chardata[ 'ply_dob' ][ 'month' ] == $current_time['month'] && $chardata[ 'ply_dob' ][ 'day' ] > $current_time['day'] ) )
	{
		$chardata[ 'ply_dob' ][ 'age' ]--;
	}

	if (IllaUser::usesMeter())
	{
		$chardata['ply_body_height'] = round($chardata['ply_body_height']*0.0254,2) .'m';
	}
	else
	{
		$chardata['ply_body_height'] = floor($chardata['ply_body_height']/12).'ft '.($chardata['ply_body_height']%12).'inch';
	}

	if (IllaUser::usesGram())
	{
		$chardata['ply_weight'] = ($chardata['ply_weight']/100) .' kg';
	}
	else
	{
		$chardata['ply_weight'] = (round($chardata['ply_weight']*0.02204623,2))." lb";
	}


	return $char_data;
}