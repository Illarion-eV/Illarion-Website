<?php

function getCharSettings($charid, $server='illarionserver')
{
	$settings = array();

	if (! isCharExists($charid))
    {
        exit('Charakter nicht gefunden');
    }
    
	$homepage =& Database::getPostgreSQL( 'homepage' );
    $query = 'SELECT settings'
    .PHP_EOL.' FROM character_details'
    .PHP_EOL.' WHERE char_id = '.$homepage->Quote( $charid );
    $homepage->setQuery( $query );
    $result = $homepage->loadResult();

    $settings['show_profil']   = ( (int)($result&1) > 0 );
    $settings['show_story']    = ( (int)($result&4) > 0 );
    $settings['show_birthday'] = ( (int)($result&8) > 0 );

	return $settings;
}

function getPicture($charid)
{
	if (! isCharExists($charid))
	{
        exit('Charakter nicht gefunden');
    }
    $homepage =& Database::getPostgreSQL( 'homepage' );
    $query = 'SELECT picture'
    .PHP_EOL.' FROM character_details'
    .PHP_EOL.' WHERE char_id = '.$homepage->Quote( $charid )
    ;
    $homepage->setQuery( $query );
    $picture = $homepage->loadResult();
	if (!$picture)
    {
        $picture = false;
    }

	return $picture;
}

function getPictureData($charid)
{
	$picture = "";

	if (! isCharExists($charid))
    {
        exit('Charakter nicht gefunden');
    }

    $pgSQL =& Database::getPostgreSQL( );

    $query = 'SELECT chars.chr_race, chars.chr_sex, character_details.picture'
     .PHP_EOL.' FROM illarionserver.chars, homepage.character_details'
     .PHP_EOL.' WHERE chars.chr_playerid = '.$pgSQL->Quote( $charid )
	 .PHP_EOL.' AND chars.chr_playerid = character_details.char_id'
    ;
    $pgSQL->setQuery( $query );
    $pic_data = $pgSQL->loadAssocRow();

	$filename_hardware = Page::getMediaRootPath().'/characterpictures/preview/'.$pic_data['picture'];
	if ( is_file( $filename_hardware ) )
    {
    	$picture = array( 'file'=>Page::getMediaURL().'/characterpictures/preview/'.$pic_data['picture'] );
   		list( $width, $height ) = getimagesize( $filename_hardware );
    	$picture['width'] = $width;
    	$picture['height'] = $height;
    }
    else
    {
    	$picture = IllarionData::getRacePicture( $pic_data['chr_race'], $pic_data['chr_sex'], true );
   	}
	if ( $picture['height'] > 200 )
	{
		$picture['width'] = floor( ( 200 / $picture['height'] ) * $picture['width'] );
		$picture['height'] = 200;
	}
	if ( $picture['width'] > 240 )
	{
		$picture['height'] = floor( ( 240 / $picture['width'] ) * $picture['height'] );
		$picture['width'] = 240;
	}

	return $picture;
}

function getCharSilderInfos($charid, $server)
{
	$slider_infos = array();
	$pgSQL =& Database::getPostgreSQL();

    $query = 'SELECT chars.chr_race, player.ply_weight, player.ply_body_height, player.ply_age, player.ply_dob'
    .PHP_EOL.' FROM '.$server.'.chars, '.$server.'.player'
    .PHP_EOL.' WHERE chars.chr_playerid = '.$pgSQL->Quote( $charid )
	.PHP_EOL.' AND player.ply_playerid = chars.chr_playerid' 
    ;

    $pgSQL->setQuery( $query );
    $char_data = $pgSQL->loadAssocRow();

	$query = 'SELECT *'
    .PHP_EOL.' FROM accounts.raceattr'
    .PHP_EOL.' WHERE id IN ( -1, '.$pgSQL->Quote( $char_data['chr_race'] ).' )'
    .PHP_EOL.' ORDER BY id DESC'
    ;
    $pgSQL->setQuery( $query, 0, 1 );
    $limits = $pgSQL->loadAssocRow();

    $limits['curr_weight'] = $char_data['ply_weight'];
    $limits['curr_bodyheight'] = $char_data['ply_body_height'];
    $limits['curr_age'] = $char_data['ply_age'];

	$dob_date=IllaDateTime::IllaDatestampToDate($char_data['ply_dob']);
    $dob= array( 'day' => $dob_date['day'], 'month' => $dob_date['month'] );
    
	calculateLimits( &$limits );
    $limit_text = generateLimitTexts( $limits );	
	
	$slider_infos['limits'] = $limits;
	$slider_infos['dob'] = $dob;
	$slider_infos['limit_text'] = $limit_text;

	return $slider_infos;
}

function isCharExists($charid)
{
	$illarionserver =& Database::getPostgreSQL( 'illarionserver' );

    $query = 'SELECT COUNT(*)'
    .PHP_EOL.' FROM chars'
    .PHP_EOL.' WHERE chr_playerid = '.$illarionserver->Quote( $charid )
    ;
    $illarionserver->setQuery( $query );

    if ($illarionserver->loadResult())
    {
        return true;
    }

	return false;
}

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
		$char_data['ply_body_height'] = round($char_data['ply_body_height']*0.0254,2) .' m';
	}
	else
	{
		$char_data['ply_body_height'] = floor($char_data['ply_body_height']/12).' ft '.($char_data['ply_body_height']%12).' inch';
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
