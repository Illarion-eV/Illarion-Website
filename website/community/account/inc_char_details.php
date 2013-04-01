<?php
	function loadCharacterData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL( $server );

		$query = 'SELECT c.chr_playerid, c.chr_name, c.chr_status, c.chr_race, c.chr_sex, p.ply_body_height, p.ply_weight, p.ply_agility, p.ply_constitution, p.ply_essence, p.ply_perception, p.ply_intelligence, p.ply_willpower, p.ply_strength, p.ply_dexterity, p.ply_dob'
		.PHP_EOL.' FROM chars AS c'
		.PHP_EOL.' INNER JOIN player AS p ON p.ply_playerid = c.chr_playerid'
		.PHP_EOL.' WHERE c.chr_playerid = '.$pgSQL->Quote( $charid )
		.PHP_EOL.' AND c.chr_accid = '.$pgSQL->Quote( IllaUser::$ID )
		;
		$pgSQL->setQuery( $query );
		$chardata = $pgSQL->loadAssocRow();

		if (!count($chardata))
		{
			return false;
		}

		$db_hp =& Database::getPostgreSQL( 'homepage' );

		if ($server == 'devserver')
		{
			$chardata['picture'] = '';
		}
		else
		{
			$query = 'SELECT picture'
			.PHP_EOL.' FROM character_details'
			.PHP_EOL.' WHERE char_id = '.$db_hp->Quote( $charid )
			;
			$db_hp->setQuery( $query );
			$char_details = $db_hp->loadAssocRow();
			if (!count($char_details))
			{
				$query = 'INSERT INTO character_details ( char_id )'
				.PHP_EOL.' VALUES ( '.$db_hp->Quote( $charid ).' )'
				;
				$db_hp->setQuery( $query );
				$db_hp->query();

				$query = 'SELECT picture'
				.PHP_EOL.' FROM character_details'
				.PHP_EOL.'WHERE char_id = '.$db_hp->Quote( $charid );
				$db_hp->setQuery( $query );
				$char_details = $db_hp->loadAssocRow();
			}
			$chardata['picture'] = $char_details['picture'];
			unset($char_details);
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

		$filename_hardware = Page::getMediaRootPath().'/characterpictures/preview/'.$chardata['picture'];
		if ( is_file( $filename_hardware ) )
		{
			$picture = array( 'file'=>Page::getMediaURL().'/characterpictures/preview/'.$chardata['picture'] );
			list( $width, $height ) = getimagesize( $filename_hardware );
			$picture['width'] = $width;
			$picture['height'] = $height;
		}
		else
		{
			$picture = IllarionData::getRacePicture( $chardata['chr_race'], $chardata['chr_sex'], true );
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
		$chardata['picture'] = $picture;

		$chardata['ident'] = "?charid=".$chardata['chr_playerid'].($_GET['server'] == '1' ? '&amp;server=1' : '');
		return $chardata;
	}
