<?php
	function getGmPages($filter, $pageNum, $perPage)
	{
		$pgSQL =& Database::getPostgreSQL( );

        $offset = $pageNum * $perPage;

// . "\n LEFT JOIN chars AS chars_player ON gmpager.pager_user = chars_player.chr_playerid"

		$query = "SELECT gmpager.pager_id,"
						.PHP_EOL." gmpager.pager_user,"
						.PHP_EOL." gmpager.pager_text,"
						.PHP_EOL." gmpager.pager_time,"
						.PHP_EOL." gmpager.pager_note,"
						.PHP_EOL." chars.chr_name,"
						.PHP_EOL." account.acc_name,"
						.PHP_EOL." gm.acc_name AS gm_name"
						.PHP_EOL." FROM illarionserver.gmpager"
						.PHP_EOL." LEFT JOIN illarionserver.chars ON gmpager.pager_user = chars.chr_playerid"
						.PHP_EOL." LEFT JOIN accounts.account ON chars.chr_accid = account.acc_id"
						.PHP_EOL." LEFT JOIN accounts.account AS gm ON gmpager.pager_gm = gm.acc_id"
						.PHP_EOL." WHERE gmpager.pager_status = ".$pgSQL->Quote($filter)
						.PHP_EOL." ORDER BY illarionserver.gmpager.pager_time DESC"
						.PHP_EOL." LIMIT " . (int)$perPage
                        .PHP_EOL." OFFSET " . (int)$offset . ";";
//		echo $query;
      	$pgSQL->setQuery( $query );
		
		return $pgSQL->loadAssocList();
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

			if (!isset( $return['pages_in_work'] ))
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

	function saveGmPage($pageId, $note, $status)
	{
		if (!IllaUser::auth('gmtool_pages')) {
			Messages::add((Page::isGerman() ? 'Zugriff verweigert' : 'Access denied'), 'error');
			return false;
		}

		$pgSQL =& Database::getPostgreSQL();
		$query = 'UPDATE illarionserver.gmpager'
			.PHP_EOL.'SET pager_note = '.$pgSQL->Quote($note).","
			.PHP_EOL.'pager_gm = '.IllaUser::$ID
			.(!is_null($status) ? ",".PHP_EOL.'pager_status = '.$pgSQL->Quote($status) : '')
			.PHP_EOL.'WHERE pager_id = '.$pgSQL->Quote($pageId).";";

		$pgSQL->setQuery($query);

		try {
			$pgSQL->query();
			Messages::add((Page::isGerman() ? 'Notiz wurde gespeichert' : 'Note has been saved'), 'info');
			return true;
		} catch (Exception $e) {
			Messages::add((Page::isGerman() ? 'Fehler beim Speichern der Notiz' : 'Error saving the note'), 'error');
			return false;
		}
	}
?>
