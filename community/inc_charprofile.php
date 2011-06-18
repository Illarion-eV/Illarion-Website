<?php
	function ageIdentifier( $age, $race )
	{
		$very_young = ( Page::isGerman() ? 'sehr jung'          : 'very young');
		$young =      ( Page::isGerman() ? 'jung'               : 'young');
		$grown_up =   ( Page::isGerman() ? 'erwachsen'          : 'grown up');
		$in_midlife = ( Page::isGerman() ? 'im mittleren Alter' : 'in midlife');
		$elderly =    ( Page::isGerman() ? 'etwas älter'        : 'elderly');
		$old =        ( Page::isGerman() ? 'alt'                : 'old');
		$very_old =   ( Page::isGerman() ? 'sehr alt'           : 'very old');
		$timeless =   ( Page::isGerman() ? 'zeitlos'            : 'timeless');

		if ($race == 0)
		{
			if ($age < 18) { return $very_young; }
			elseif ($age < 25) { return $young; }
			elseif ($age < 35) { return $grown_up; }
			elseif ($age < 45) { return $in_midlife; }
			elseif ($age < 55) { return $elderly; }
			elseif ($age < 70) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 1)
		{
			if ($age <  50) { return $very_young; }
			elseif ($age <  80) { return $young; }
			elseif ($age < 125) { return $grown_up; }
			elseif ($age < 175) { return $in_midlife; }
			elseif ($age < 220) { return $elderly; }
			elseif ($age < 260) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 2)
		{
			if ($age <  25) { return $very_young; }
			elseif ($age <  40) { return $young; }
			elseif ($age <  60) { return $grown_up; }
			elseif ($age <  80) { return $in_midlife; }
			elseif ($age < 100) { return $elderly; }
			elseif ($age < 115) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 3)
		{
			if ($age < 180) { return $young; }
			else { return $timeless; }
		}
		elseif ($race == 4)
		{
			if ($age <  20) { return $very_young; }
			elseif ($age <  30) { return $young; }
			elseif ($age <  45) { return $grown_up; }
			elseif ($age <  65) { return $in_midlife; }
			elseif ($age <  85) { return $elderly; }
			elseif ($age < 105) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 5)
		{
			if ($age <  60) { return $very_young; }
			elseif ($age < 130) { return $young; }
			elseif ($age < 250) { return $grown_up; }
			elseif ($age < 375) { return $in_midlife; }
			elseif ($age < 500) { return $elderly; }
			elseif ($age < 600) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 6)
		{
			if ($age <  50) { return $very_young; }
			elseif ($age <  80) { return $young; }
			elseif ($age < 125) { return $grown_up; }
			elseif ($age < 175) { return $in_midlife; }
			elseif ($age < 220) { return $elderly; }
			elseif ($age < 260) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 7)
		{
			if ($age <  40) { return $very_young; }
			elseif ($age <  80) { return $young; }
			elseif ($age < 150) { return $grown_up; }
			elseif ($age < 220) { return $in_midlife; }
			elseif ($age < 280) { return $elderly; }
			elseif ($age < 340) { return $old; }
			else { return $very_old; }
		}
		elseif ($race == 8)
		{
			if ($age <  23) { return $very_young; }
			elseif ($age <  28) { return $young; }
			elseif ($age <  38) { return $grown_up; }
			elseif ($age <  47) { return $in_midlife; }
			elseif ($age <  56) { return $elderly; }
			elseif ($age <  63) { return $old; }
			else { return $very_old; }
		}
		else
		{
			return $timeless;
		}

	}

	function prepareTexts( &$german, &$english )
	{
		$show_error = false;
		if ( Page::isGerman() )
		{
			$temp =& $german;
		}
		else
		{
			$temp =& $english;
		}
		$length = strlen( ( isset( $temp ) && is_string( $temp ) ? $temp : '' ) );
		if ( $length < 10 )
		{
			if ( Page::isGerman() )
			{
				$temp =& $english;
			}
			else
			{
				$temp =& $german;
			}
			$length = strlen( ( isset( $temp ) && is_string( $temp ) ? $temp : '' ) );
			$show_error = true;
			if ( $length < 10 )
			{
				return false;
			}
		}

		$temp = preg_replace( '/([^\s]{50})[^\s]*/', '\1', $temp );
		$temp = htmlspecialchars( $temp );
		$temp = preg_replace( '/\s*(\n\r|\r\n|\n|\r){2}(\n\r|\r\n|\n|\r)+\s*/', '</p><p>', $temp );
		$temp = preg_replace( '/\s*[\n\r|\r\n|\n|\r]+\s*/', '<br />', $temp );
		if ($length > 700)
		{
			$capital = Page::cap( substr( $temp, 0, 1 ), true );
			if ( strlen( $capital ) > 1 )
			{
				$temp = substr( $temp, 1 );
			}
			else
			{
				$capital = '';
			}
		}
		else
		{
			$capital = '';
		}

		if ($show_error)
		{
			$error = '<p style="font-style:italic;">'.( Page::isGerman() ? 'Keine deutsche Fassung vorhanden' : 'No english version avaiable' ).'</p>';
		}
		else
		{
			$error = '';
		}
		$temp = $error.$capital.'<p>'.$temp.'</p>';
		return $temp;
	}

	function prepareBirthday( &$dob )
	{
		$dob = IllaDateTime::IllaDatestampToDate( $dob );
		$current_time = IllaDateTime::IllaTimestampToTime( 'array' );

		$dob['age'] = ( $current_time['year'] - $dob['year'] );
		if ( $dob['month'] > $current_time['month'] || ( $dob['month'] == $current_time['month'] && $dob['day'] > $current_time['day'] ) )
		{
			$dob['age']--;
		}
	}

	function getOnlineState( $charid )
	{
		$pgSQL =& Database::getPostgreSQL( 'illarionserver' );
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM onlineplayer'
		.PHP_EOL.' WHERE on_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		if ((int)$pgSQL->loadResult())
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function preparePicture( $charid, $picture, $race, $sex, $width, $height )
	{
		if ( is_string( $picture ) && is_file( $filename_hardware = Page::getMediaRootPath().'/characterpictures/preview/'.$picture ) )
		{
			$picture = array( 'preview'=>Page::getMediaURL().'/characterpictures/preview/'.$picture,
							  'file'=>Page::getMediaURL().'/characterpictures/'.$picture );
			if (is_null($width) || is_null($height))
			{
				list( $picture['width'], $picture['height'] ) = getimagesize( $filename_hardware );

				$db =& Database::getMySQL();
				$query = 'UPDATE `homepage_character_details`'
				.PHP_EOL.' SET `picture_height` = '.$db->Quote( $picture['height'] )
				. ', `picture_width` = '.$db->Quote( $picture['width'] )
				.PHP_EOL.' WHERE `char_id` = '.$db->Quote( $charid )
				;
				$db->setQuery( $query );
				$db->query();
			}
			else
			{
				$picture['width'] = $width;
				$picture['height'] = $height;
			}

			return $picture;
		}
		else
		{
			$return = IllarionData::getRacePicture( $race, $sex, true );
			$return['preview'] = $return['file'];
			unset( $return['file'] );
			return $return;
		}
	}

	function loadPostgreProfile( $charid )
	{
	   $pgSQL =& Database::getPostgreSQL( 'illarionserver' );
		$query = 'SELECT chars.chr_accid, chars.chr_playerid, chars.chr_prefix, chars.chr_suffix, chars.chr_sex, chars.chr_name, chars.chr_race, ply_dob'
		.PHP_EOL.' FROM chars'
		.PHP_EOL.' INNER JOIN player ON ply_playerid = chr_playerid'
		.PHP_EOL.' WHERE (( SELECT count(gms.gm_charid) AS count FROM gms WHERE gms.gm_charid = chars.chr_playerid AND NOT (gms.gm_rights_server & 131072) > 0)) = 0'
		.PHP_EOL.' AND chars.chr_playerid = '.$pgSQL->Quote( $charid )
		;
		$pgSQL->setQuery( $query );
		$profil = $pgSQL->loadAssocRow();
		if ( is_null($profil) || !count($profil))
		{
			return false;
		}
		else
		{
			return $profil;
		}
	}

	function loadMySQLProfile( $charid )
	{
		$mySQL =& Database::getMySQL();
		$query = 'SELECT `description_de`, `description_us`, `story_de`, `story_us`, `picture`, `picture_width`, `picture_height`, `votes_count`, `votes_result`, `settings`'
		.PHP_EOL.' FROM `homepage_character_details`'
		.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );
		$profil = $mySQL->loadAssocRow();

		if ( is_null( $profil ) || !count($profil))
		{
			return false;
		}
		else
		{
			return $profil;
		}
	}

	function parseSettings( $settings )
	{
		$temp = array(
			'show_profil'       =>( (int)($settings&1) > 0 ),
			'show_online'       =>( (int)($settings&2) == 0 ),
			'show_story'        =>( (int)($settings&4) > 0 ),
			'show_birthday'     =>( (int)($settings&8) > 0 ),
			'overwrite_online'  =>false,
			'overwrite_story'   =>false,
			'overwrite_birthday'=>false,
		);
		if (IllaUser::auth('hidden_chars'))
		{
			$temp['overwrite_online'] = !$temp['show_online'];
			$temp['overwrite_story'] = !$temp['show_story'];
			$temp['overwrite_birthday'] = !$temp['show_birthday'];
			$temp['show_online'] = true;
			$temp['show_story'] = true;
			$temp['show_birthday'] = true;
		}
		return $temp;
	}

	function showRatingPictures( $rating )
	{
		if ($rating == 0)
		{
			return;
		}
		echo '<div class="icon">';
		$picture_data = IllarionData::getItemPicture( 225, true );
		echo '<img src="';
		if ($rating == 10)
		{
			echo $picture_data['file'];
			$rating--;
		}
		else
		{
			echo Page::getImageURL(),'/blank.gif';
		}
		echo '" height="',$picture_data['height'],'" width="',$picture_data['width'],'" alt="10/10" style="margin:auto;" />';
		echo '<br />';

		for( $i=1; $i<=$rating; ++$i )
		{
			$id = 0;
			if ($i < 4)
			{
				$id = 235;
			}
			elseif ($i < 7)
			{
				$id = 280;
			}
			elseif ($i < 10)
			{
				$id = 282;
			}
			$picture_data = IllarionData::getItemPicture($id, true);
			echo '<img src="',$picture_data['file'],'" height="',$picture_data['height'],'" width="',$picture_data['width'],'" alt="',$i,'/10" />';
		}
		echo '</div>';
	}

	function getOwnRating( $charid )
	{
		$mySQL =& Database::getMySQL();
		$query = 'SELECT `vote`'
		.PHP_EOL.' FROM `homepage_character_votes`'
		.PHP_EOL.' WHERE `user_id` = '.$mySQL->Quote( IllaUser::$ID )
		.PHP_EOL.' AND `char_id` = '.$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );

		if ( is_null( $result = $mySQL->loadResult() ) )
		{
			return false;
		}
		return (int)$result;
	}

	function handleVote( $charid )
	{
		if ( !isset( $_POST['rate'] ) )
		{
			return false;
		}
		$vote = explode('/',$_POST['rate']);
		$vote = (int)($vote[0]);
		if ($vote > 10 || $vote < 0)
		{
			Messages::add( ( Page::isGerman() ? 'Ungültige Bewertung. Die Bewertung die abgegeben wurde liegt außerhalb der Richtlinien.' : 'Invalid voting. The voting is beyond the given limits.' ), 'error' );
			return false;
		}
		$mySQL =& Database::getMySQL();
		$query = 'SELECT COUNT(*)'
		.PHP_EOL.' FROM `homepage_character_votes`'
		.PHP_EOL.' WHERE `user_id` = '.$mySQL->Quote( IllaUser::$ID )
		.PHP_EOL.' AND `char_id` = '.$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );
		if ($mySQL->loadResult())
		{
			$query = 'UPDATE `homepage_character_votes`'
			.PHP_EOL.' SET `vote` = '.$mySQL->Quote( $vote )
			.PHP_EOL.' WHERE `user_id` = '.$mySQL->Quote( IllaUser::$ID )
			.PHP_EOL.' AND `char_id` = '.$mySQL->Quote( $charid )
			;
		}
		else
		{
			$query = 'INSERT INTO `homepage_character_votes`(`user_id`,`char_id`,`vote`)'
			.PHP_EOL.' VALUES ('.$mySQL->Quote( IllaUser::$ID ).','.$mySQL->Quote( $charid ).','.$mySQL->Quote( $vote ).')'
			;
		}
		$mySQL->setQuery( $query );
		$mySQL->query();

		$query = 'SELECT SUM(`vote`), COUNT(*)'
		.PHP_EOL.' FROM `homepage_character_votes`'
		.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );

		list($rating, $count) = $mySQL->loadRow();
		$rating = round($rating/$count);

		$query = 'UPDATE `homepage_character_details`'
		.PHP_EOL.' SET `votes_count` = '.$mySQL->Quote( $count )
		.        ' , `votes_result` = '.$mySQL->Quote( $rating )
		.PHP_EOL.' WHERE `char_id` = '.$mySQL->Quote( $charid )
		;
		$mySQL->setQuery( $query );
		$mySQL->query();

		Messages::add(( Page::isGerman() ? 'Profil wurde bewertet.' : 'Profile got rated.' ), 'info' );
		return true;
	}
?>