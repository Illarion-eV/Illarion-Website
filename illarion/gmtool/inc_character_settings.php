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

	$char_data['ply_dob'] = IllaDateTime::IllaDatestampToDate( $char_data['ply_dob'] );
	$current_time = IllaDateTime::IllaTimestampToTime( 'array' );

	$char_data[ 'ply_dob' ][ 'age' ] = ( $current_time['year'] - $char_data[ 'ply_dob' ][ 'year' ] );
	if ( $char_data[ 'ply_dob' ][ 'month' ] > $current_time['month'] || ( $char_data[ 'ply_dob' ][ 'month' ] == $current_time['month'] && $char_data[ 'ply_dob' ][ 'day' ] > $current_time['day'] ) )
	{
		$char_data[ 'ply_dob' ][ 'age' ]--;
	}

	if (IllaUser::usesMeter())
	{
		$char_data['ply_body_height'] = round($char_data['ply_body_height']*0.0254,2) .'m';
	}
	else
	{
		$char_data['ply_body_height'] = floor($char_data['ply_body_height']/12).'ft '.($char_data['ply_body_height']%12).'inch';
	}

	if (IllaUser::usesGram())
	{
		$char_data['ply_weight'] = ($char_data['ply_weight']/100) .' kg';
	}
	else
	{
		$char_data['ply_weight'] = (round($char_data['ply_weight']*0.02204623,2))." lb";
	}


	return $char_data;
}