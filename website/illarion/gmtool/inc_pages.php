<?php
	function getGmPages($filter)
	{
		$pages = array();
		$pgSQL =& Database::getPostgreSQL( );

// . "\n LEFT JOIN chars AS chars_player ON gmpager.pager_user = chars_player.chr_playerid"

		$query = "SELECT gmpager.oid,"
						.PHP_EOL." gmpager.pager_user,"
						.PHP_EOL." gmpager.pager_text,"
						.PHP_EOL." gmpager.pager_time,"
						.PHP_EOL." gmpager.pager_note,"
						.PHP_EOL." chars.chr_name,"
						.PHP_EOL." account.acc_name,"
						.PHP_EOL." gm.chr_name AS gm_name"
						.PHP_EOL." FROM illarionserver.gmpager"
						.PHP_EOL." LEFT JOIN illarionserver.chars ON gmpager.pager_user = chars.chr_playerid"
						.PHP_EOL." LEFT JOIN accounts.account ON chars.chr_accid = account.acc_id"
						.PHP_EOL." LEFT JOIN illarionserver.chars AS gm ON gmpager.pager_gm = gm.chr_playerid"
						.PHP_EOL." WHERE gmpager.pager_status = ".$pgSQL->Quote($filter)
						.PHP_EOL." ORDER BY illarionserver.gmpager.pager_time DESC"
						.PHP_EOL." LIMIT 30;";
		echo $query;
      	$pgSQL->setQuery( $query );
		
      	$pages = $pgSQL->loadAssocList();
	
		return $pages;
	}

	function countGmPages()
	{
		$return = array();

		if (IllaUser::auth('gmtool_namecheck'))
		{
			$pgSQL =& Database::getPostgreSQL( 'illarionserver' );
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.'FROM chars'
			.PHP_EOL.'WHERE chr_status = 4'
			;
			$pgSQL->setQuery( $query );
			$return['name_checks'] = $pgSQL->loadResult();
		}

		if (IllaUser::auth('gmtool_pages'))
		{
			$pgSQL =& Database::getPostgreSQL( 'illarionserver' );
			$query = 'SELECT COUNT(*) as "amount", pager_status'
			.PHP_EOL.' FROM gmpager'
			.PHP_EOL.' GROUP BY pager_status'
			;
			$pgSQL->setQuery( $query );
			$pages = $pgSQL->loadAssocList();

			foreach ($pages as $page)
			{
				switch($page['pager_status'])
				{
					case PAGE_STATUS_NEW: $return['pages_new'] = $page['amount']; break;
					case PAGE_STATUS_IN_WORK: $return['pages_in_work'] = $page['amount']; break;
					case PAGE_STATUS_DONE: $return['pages_done'] = $page['amount']; break;
					case PAGE_STATUS_ARCHIVE: $return['pages_archiv'] = $page['amount']; break;
					default: break;
				} // switch
			}

			if (!isset( $return['pages_new'] ))
			{
				$return['pages_new'] = 0;
			}

			if (!isset( $return['pages_inwork'] ))
			{
				$return['pages_in_work'] = 0;
			}

			if (!isset( $return['pages_done'] ))
			{
				$return['pages_done'] = 0;
			}

			if (!isset( $return['pages_archiv'] ))
			{
				$return['pages_archiv'] = 0;
			}
		}

		return $return;
	}
?>
