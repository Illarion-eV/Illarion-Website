<?php
	function getAccountData( $accid )
	{
		$account_data= array();
		$pgSQL =& Database::getPostgreSQL( 'accounts' );
	
		$query = 'SELECT acc_id, acc_login, acc_name, acc_passwd, acc_email, acc_lastseen, acc_lastip, acc_maxchars, acc_weight, acc_length, acc_timeoffset, acc_dst, acc_lang '
		.PHP_EOL.'FROM account '
		.PHP_EOL.'WHERE acc_id = '.$pgSQL->Quote( $accid )
		;

		$pgSQL->setQuery( $query );

		$account_data = $pgSQL->loadAssocRow();

		if (!$account_data || !count($account_data))
        {
            return false;
        }
		$account_data['acc_timeoffset']/=100;

		return $account_data;
	}

    function getAccountLoginAndState( $accid )
    {
        $account =& Database::getPostgreSQL( 'accounts' );

        $query = 'SELECT acc_login, acc_state'
        .PHP_EOL.'FROM account'
        .PHP_EOL.'WHERE acc_id = '.$account->Quote( $accid )
        ;
        $account->setQuery( $query );
        $account_data = $account->loadRow();

        return $account_data;
    }

	function getAccountLogin( $accid )
    {
        $account =& Database::getPostgreSQL( 'accounts' );

		$query = 'SELECT acc_login'
        .PHP_EOL.'FROM account'
        .PHP_EOL.'WHERE acc_id = '.$account->Quote( $accid )
        ;
        $account->setQuery( $query );
        $account_login = $account->loadResult();

        return $account_login;
    }

    function getAccountName( $accid )
    {
        $account =& Database::getPostgreSQL( 'accounts' );

        $query = 'SELECT acc_name'
        .PHP_EOL.'FROM account'
        .PHP_EOL.'WHERE acc_id = '.$account->Quote( $accid )
        ;
        $account->setQuery( $query );
        $account_name = $account->loadResult();

        return $account_name;
    }

    function getLogs( $accid )
    {
        $pgSQL =& Database::getPostgreSQL( 'accounts' );

        $query = "SELECT account.acc_login, "
					.PHP_EOL."account.acc_name, "
					.PHP_EOL."account_log.al_id, "
					.PHP_EOL."account_log.al_time, "
					.PHP_EOL."account_log.al_message, "
					.PHP_EOL."account_log.al_type "
				.PHP_EOL."FROM account_log "
				.PHP_EOL."INNER JOIN account ON account_log.al_gm_id = account.acc_id "
				.PHP_EOL."WHERE account_log.al_user_id = ".$pgSQL->Quote( $accid)
				.PHP_EOL."ORDER BY account_log.al_time DESC";

		$pgSQL->setQuery( $query );
        $loglist = $pgSQL->loadAssocList();

		return $loglist;
    }

    function getChars( $accid )
    {
        global $language;

        $illaSQL =& Database::getPostgreSQL( 'illarionserver' );
        $testSQL =& Database::getPostgreSQL( 'devserver' );

        $query = 'SELECT chr_playerid, chr_name, chr_status, chr_race, chr_sex, '.$illaSQL->Quote($language=='de'?'Spielserver':'Gameserver').' AS chr_server'
        .PHP_EOL.'FROM chars'
        .PHP_EOL.'WHERE chr_accid = '.$illaSQL->Quote( $accid )
        ;

        $illaSQL->setQuery( $query );
        $charlist = $illaSQL->loadAssocList();

        $query = 'SELECT chr_playerid, chr_name, chr_status, chr_race, chr_sex, \'Devserver\' AS chr_server'
        .PHP_EOL.'FROM chars'
        .PHP_EOL.'WHERE chr_accid = '.$testSQL->Quote( $accid )
        ;
        $testSQL->setQuery( $query );
        return array_merge( $charlist, $testSQL->loadAssocList() );
    }

    function getRightArray()
	{
		$rights = array();

		$pgSQL =& Database::getPostgreSQL( );

		$query = "SELECT * FROM accounts.rights";
		$pgSQL->setQuery( $query );

		$rights = $pgSQL->loadAssocList();
		
		foreach ($rights as $right)
		{
			$xrights[$right['r_id']] = $right;	
		}

		return $xrights;
	}
    function getGroupArray()
	{
        $groups = array();
		
        $pgSQL =& Database::getPostgreSQL( );

        $query = "SELECT * FROM accounts.groups ORDER BY g_id DESC";
        $pgSQL->setQuery( $query );

        $groups = $pgSQL->loadAssocList();

		foreach ($groups as $group)
        {
            $xgroups[$group['g_id']] = $group;
        }

        return $xgroups;
    }

	function getAccGroups($accid)
	{
		$acc_groups = array();

		$pgSQL =& Database::getPostgreSQL( );

        $query = "SELECT * FROM accounts.account_groups WHERE ag_acc_id = ".$pgSQL->Quote($accid);
        $pgSQL->setQuery( $query );

        $acc_groups = $pgSQL->loadAssocList();
		
		foreach ($acc_groups as $acc_group)
        {
            $xacc_groups[$acc_group['ag_group_id']] = $acc_group['ag_group_id'];
        }

		return $xacc_groups;
	}

	function getRightStringList($string)
	{
		$newstring = "";
		$rights = getRightArray();

		$expl = explode(",", $string);
		
		foreach($expl as $r_id)
		{	
			$lang = (Page::isGerman() ? "de" : "us");
			$newstring .= "<span class='bold' title='".$rights[$r_id]['r_desc_'.$lang]."'>".$rights[$r_id]['r_name_'.$lang]."</span><br/>";
		}

		return $newstring;		
	}

    function getLogTypeString($id) {
        switch ($id) {
            case 0: return (Page::isGerman() ? 'Status' : 'Status');
                break;
            case 1: return (Page::isGerman() ? 'Info' : 'info');
                break;
			case 2: return (Page::isGerman() ? 'Verwarnung' : 'Admonishment');
                break;
            default: return (Page::isGerman() ? '': 'unknown');
        }
    }

	function decode_ip($int_ip)
	{
		while( strlen( $int_ip ) < 8 )
		{
			$int_ip = $int_ip . '0';
		}
		$hexipbang = explode('.', chunk_split($int_ip, 2, '.'));
		return hexdec($hexipbang[0]). '.' . hexdec($hexipbang[1]) . '.' . hexdec($hexipbang[2]) . '.' . hexdec($hexipbang[3]);
	}

	function convertDBTime($daytime)
	{
		$timepart = explode(".", $daytime);

		return $timepart[0];
	}
?>
