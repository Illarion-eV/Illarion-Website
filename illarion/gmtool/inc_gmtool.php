<?php
	function getPendingWork()
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
					case 0: $return['pages_new'] = $page['amount']; break;
					case 1: $return['pages_inwork'] = $page['amount']; break;
					case 2: $return['pages_done'] = $page['amount']; break;
					case 3: $return['pages_archiv'] = $page['amount']; break;
					default: break;
				} // switch
			}

			if (!isset( $return['pages_new'] ))
			{
				$return['pages_new'] = 0;
			}

			if (!isset( $return['pages_inwork'] ))
			{
				$return['pages_inwork'] = 0;
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

		if (IllaUser::auth('gmtool_raceapplys'))
		{
			$mySQL =& Database::getMySQL();
			$query = 'SELECT COUNT(*)'
			.PHP_EOL.'FROM `homepage_raceapplies`'
			.PHP_EOL.'WHERE `status` = 0'
			;
			$mySQL->setQuery( $query );
			$return['apply_checks'] = $mySQL->loadResult();
		}

		return $return;
	}
?>