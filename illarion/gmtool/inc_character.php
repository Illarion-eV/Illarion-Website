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
					.PHP_EOL."chars.chr_prefix,"
					.PHP_EOL."chars.chr_suffix,"
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
	
		$query = "SELECT skill_id,"
               // .PHP_EOL."psk_name,"
                .PHP_EOL."psk_value"
                .PHP_EOL."FROM ".$server.".playerskills, ".$server.".skills "
                .PHP_EOL."WHERE psk_playerid = ".$pgSQL->Quote( $charid)." "
				.PHP_EOL."AND psk_type = ".$pgSQL->Quote( $type)
				.PHP_EOL."AND skill_key_name = psk_name";

        $pgSQL->setQuery( $query );
        $char_data = $pgSQL->loadAssocList();
    
		$query = "SELECT skill_id FROM ".$server.".skills WHERE skill_type = ".$pgSQL->Quote( $type);
		$pgSQL->setQuery( $query );
        $skill_ids = $pgSQL->loadResultArray();		
   
		$skill_data=array();
        foreach($char_data as $skill)
        {
            $skill_data[$skill['skill_id']] = $skill['psk_value'];
        }
		
		foreach($skill_ids as $id)
		{
			$skills[$id] = (isset($skill_data[$id]) ? $skill_data[$id] : 0);
		}

        return $skills;
    }

	function getSkillList( $server, $type )
	{
		$type = (int)$type;

        $pgSQL =& Database::getPostgreSQL();

        $query = "SELECT * "
                .PHP_EOL."FROM ".$server.".skills "
                .PHP_EOL."WHERE skill_type = ".$pgSQL->Quote( $type)
			;
        $pgSQL->setQuery( $query );
        $skill_list = $pgSQL->loadAssocList();

		$skill_data=array();
        foreach($skill_list as $skill)
        {
            $skill_data[$skill['skill_id']] = array('skill_key_name'=>$skill['skill_key_name'],'skill_name_de'=>$skill['skill_name_de'],'skill_name_us'=>$skill['skill_name_us']);
        }

		return $skill_data;
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

?>
