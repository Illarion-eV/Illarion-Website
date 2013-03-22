<?php
	function getCharData( $charid, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT "
					.PHP_EOL."chars.chr_accid,"
					.PHP_EOL."chars.chr_playerid,"
					.PHP_EOL."chars.chr_status,"
					.PHP_EOL."chars.chr_statustime,"
					.PHP_EOL."chars.chr_lastsavetime,"
					.PHP_EOL."chars.chr_lastip,"
					.PHP_EOL."chars.chr_name,"
					.PHP_EOL."chars.chr_race,"
					.PHP_EOL."chars.chr_sex,"
					.PHP_EOL."account.acc_name,"
					.PHP_EOL."account.acc_email,"
					.PHP_EOL."player.ply_hitpoints,"
					.PHP_EOL."player.ply_mana,"
					.PHP_EOL."player.ply_posx,"
					.PHP_EOL."player.ply_posy,"
					.PHP_EOL."player.ply_posz "
					.PHP_EOL."FROM ".$server.".chars, ".$server.".player, accounts.account "
					.PHP_EOL."WHERE chr_playerid = ".$pgSQL->Quote( $charid)." "
					.PHP_EOL."AND acc_id = chr_accid "
					.PHP_EOL."AND ply_playerid = chr_playerid";
		$pgSQL->setQuery( $query );
		$char_data = $pgSQL->loadAssocRow();

		if (!$char_data || !count($char_data))
		{
			return false;
		}

		$query = "SELECT count(onlineplayer.on_playerid) as hits FROM ".$server.".onlineplayer WHERE on_playerid=".$pgSQL->Quote( $charid);
		$pgSQL->setQuery( $query );
		$char_data['online'] = $pgSQL->loadResult();

		return $char_data;
	}

	function getCharName($charid, $server)
	{
		$pgSQL =& Database::getPostgreSQL();

        $query = "SELECT chr_name FROM ".$server.".chars WHERE chr_playerid = ".$pgSQL->Quote( $charid);
        $pgSQL->setQuery( $query );
        $char_name = $pgSQL->loadResult();

		return $char_name;
	}

    function getCharSkills( $charid, $server, $type )
    {
		$type = (int)$type;
		$char_skills = array();
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT psk_skill_id, "
				.PHP_EOL."psk_value "
				.PHP_EOL."FROM ".$server.".playerskills, ".$server.".skills "
				.PHP_EOL."WHERE psk_playerid = ".$pgSQL->Quote( $charid)." "
				.PHP_EOL."AND skl_group_id = ".$pgSQL->Quote( $type)
				.PHP_EOL."AND skl_skill_id = psk_skill_id";


		$pgSQL->setQuery( $query );
        $char_data = $pgSQL->loadAssocList();

		$query = "SELECT skl_skill_id FROM ".$server.".skills WHERE skl_group_id = ".$pgSQL->Quote( $type);
        $pgSQL->setQuery( $query );
        $skill_ids = $pgSQL->loadResultArray();

        $skill_data=array();
        foreach($char_data as $skill)
        {
            $skill_data[$skill['psk_skill_id']] = $skill['psk_value'];
        }

        foreach($skill_ids as $id)
        {
            $char_skills[$id] = (isset($skill_data[$id]) ? $skill_data[$id] : 0);
        }

        return $char_skills;
    }

	function getSkillList( $server, $type )
	{
		$type = (int)$type;

        $pgSQL =& Database::getPostgreSQL();

        $query = "SELECT * "
                .PHP_EOL."FROM ".$server.".skills "
                .PHP_EOL."WHERE skl_group_id = ".$pgSQL->Quote( $type)
			;
        $pgSQL->setQuery( $query );
        $skill_list = $pgSQL->loadAssocList();

		$skill_data=array();
        foreach($skill_list as $skill)
        {
            $skill_data[$skill['skl_skill_id']] = array('skl_name'=>$skill['skl_name'],'skl_name_german'=>$skill['skl_name_german'],'skl_name_english'=>$skill['skl_name_english']);
        }

		return $skill_data;
	}

    function getSkillGroupList( $server )
    {
        $pgSQL =& Database::getPostgreSQL();

        $query = "SELECT * "
                .PHP_EOL."FROM ".$server.".skillgroups "
            ;
        $pgSQL->setQuery( $query );
        $group_list = $pgSQL->loadAssocList();

        $group_data=array();
        foreach($group_list as $group)
        {
            $group_data[$group['skg_group_id']] = array('skg_name_german'=>$group['skg_name_german'],'skg_name_english'=>$group['skg_name_english']);
        }

        return $group_data;

    }


	function getCharRunesAndType($charid,$server)
	{

		$pgSQL =& Database::getPostgreSQL();
		$query = "SELECT "
				.PHP_EOL."ply_magictype,"
				.PHP_EOL."ply_magicflagsmage,"
				.PHP_EOL."ply_magicflagspriest,"
				.PHP_EOL."ply_magicflagsbard,"
				.PHP_EOL."ply_magicflagsdruid "
				.PHP_EOL."FROM ".$server.".player "
				.PHP_EOL."WHERE ply_playerid = ".$pgSQL->Quote( $charid);
		$pgSQL->setQuery( $query );
        $char_data = $pgSQL->loadAssocRow();

		$type = $char_data['ply_magictype'];


		switch ($type)
		{
			case CAST_TYPE_MAGE:
			{
				$rune_flag = $char_data['ply_magicflagsmage'];
				$rune_list = getMageRuneArray();
				break;
			}
			case CAST_TYPE_PRIEST:
			{
                $rune_flag = $char_data['ply_magicflagspriest'];
				$rune_list = getPriestRuneArray();
                break;
			}
			case CAST_TYPE_BARD:
			{
                $rune_flag = $char_data['ply_magicflagsbard'];
				$rune_list = getBardRuneArray();
                break;
			}
			case CAST_TYPE_DRUID:
			{
                $rune_flag = $char_data['ply_magicflagsdruid'];
				$rune_list = getDruidRuneArray();
                break;
			}
			default:
			{
				$rune_flag = false;
			}
		}

		foreach ($rune_list as $key => $rune)
        {
	        $runes[$key] = isRuneActive($rune_flag,$key);
       	}


		return array($type, $runes, $rune_list);
	}


/**
/* return: true oder false
**/
	function isRuneActive($flag, $rune)
	{
		return !(((int)$flag & (1<<$rune)) == 0); 
	}

	function getRuneStringFromArray($array)
	{
		$result = 0;

		for ($i = 0; i < 32; $i++) 
		{ 
			$result += ($array[$i] ? (1<<$i) : 0); 
		}

		return $result;
	}

	function writeCharLog($accid, $charid, $gmid, $msg, $type, $server )
	{
		$pgSQL =& Database::getPostgreSQL();

            $query = "INSERT INTO ".$server.".char_log "
                    .PHP_EOL."(cl_acc_id, "
                    .PHP_EOL."cl_char_id, "
                    .PHP_EOL."cl_gm_id, "
                    .PHP_EOL."cl_time, "
                    .PHP_EOL."cl_message, "
                    .PHP_EOL."cl_type)"
                    .PHP_EOL."VALUES (".$pgSQL->Quote( $accid )
                    .PHP_EOL.", ".$pgSQL->Quote( $charid )
                    .PHP_EOL.", ".$pgSQL->Quote( $gmid )
                    .PHP_EOL.", ".CURRENT_TIMESTAMP
                    .PHP_EOL.", ".$pgSQL->Quote( $msg )
                    .PHP_EOL.", ".$type.")";
            $pgSQL->setQuery( $query );
            $pgSQL->query();

		return;
	}
	

	function getCharAttrib( $charid, $server )
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


	function getCharStatusData($charid, $server)
	{
		$pgSQL =& Database::getPostgreSQL();

		$query = "SELECT "
			.PHP_EOL."chars.chr_name,"
			.PHP_EOL."chars.chr_status,"
			.PHP_EOL."chars.chr_statustime,"
			.PHP_EOL."chars.chr_statusgm,"
			.PHP_EOL."chars.chr_statusreason "
			.PHP_EOL."FROM ".$server.".chars "
			.PHP_EOL."WHERE chr_playerid = ".$pgSQL->Quote( $charid)
			;

		$pgSQL->setQuery( $query );
        $status_data = $pgSQL->loadAssocRow();

		return $status_data;
	}


    function getLogs( $charid, $server )
    {

        $pgSQL =& Database::getPostgreSQL( );

        $query = "SELECT account.acc_name, "
                    .PHP_EOL."char_log.cl_id, "
                    .PHP_EOL."char_log.cl_time, "
                    .PHP_EOL."char_log.cl_message, "
                    .PHP_EOL."char_log.cl_type "
                .PHP_EOL."FROM ".$server.".char_log "
                .PHP_EOL."INNER JOIN accounts.account ON char_log.cl_gm_id = account.acc_id "
                .PHP_EOL."WHERE char_log.cl_char_id = ".$pgSQL->Quote( $charid)
                .PHP_EOL."ORDER BY char_log.cl_time DESC";

        $pgSQL->setQuery( $query );
        $loglist = $pgSQL->loadAssocList();

        return $loglist;
    }

	function convertDBTime($daytime)
    {
        $timepart = explode(".", $daytime);

        return $timepart[0];
    }

    function getLogTypeString($id) {
        switch ($id) {
            case 0: return (Page::isGerman() ? 'Status' : 'Status');
                break;
            case 1: return (Page::isGerman() ? 'Info' : 'info');
                break;
            case 2: return (Page::isGerman() ? 'Verwarnung' : 'Admonishment');
                break;
			case 4: return (Page::isGerman() ? 'Attribut' : 'Attribut');
                break;
			case 5: return (Page::isGerman() ? 'Skill' : 'Skill');
                break;
            default: return (Page::isGerman() ? 'unknown': 'unknown');
        }
    }

	function getCharSettings($charid, $server='illarionserver')
	{
        $settings = array();

        if (! isCharExists($charid))
    	{
    	    exit('Charakter nicht gefunden');
    	}

	    $pgSQL =& Database::getPostgreSQL();

	    $query = 'SELECT settings'
	    .PHP_EOL.' FROM homepage.character_details'
	    .PHP_EOL.' WHERE char_id = '.$pgSQL->Quote( $charid );
	    $pgSQL->setQuery( $query );
	    $result = $pgSQL->loadResult();

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
		$pgSQL =& Database::getPostgreSQL();
	    $query = 'SELECT picture'
	    .PHP_EOL.' FROM homepage.character_details'
	    .PHP_EOL.' WHERE char_id = '.$pgSQL->Quote( $charid )
	    ;
	    $pgSQL->setQuery( $query );
	    $picture = $pgSQL->loadResult();
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

        calculateLimits( $limits );
	    $limit_text = generateLimitTexts( $limits );

        $slider_infos['limits'] = $limits;
        $slider_infos['dob'] = $dob;
        $slider_infos['limit_text'] = $limit_text;

        return $slider_infos;
	}

	function isCharExists($charid)
	{
		$pgSQL =& Database::getPostgreSQL();

	    $query = 'SELECT COUNT(*)'
	    .PHP_EOL.' FROM illarionserver.chars'
	    .PHP_EOL.' WHERE chr_playerid = '.$pgSQL->Quote( $charid )
	    ;
	    $pgSQL->setQuery( $query );

	    if ($pgSQL->loadResult())
	    {
	        return true;
	    }

        return false;
	}

	function getCharBodyData( $charid, $server )
	{
		$char_data=array();
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


