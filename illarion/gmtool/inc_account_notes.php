<?php
	function getAccountName( $accid )
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `username`'
		.PHP_EOL.'FROM `homepage_user`'
		.PHP_EOL.'WHERE `id` = '.$mySQL->Quote( $accid )
		;
		$mySQL->setQuery( $query );
		return $mySQL->loadResult();
	}

	function getNotes( $accid )
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `homepage_user`.`username`, `homepage_user`.`name`, `homepage_user_log`.`id`, UNIX_TIMESTAMP(`homepage_user_log`.`time`) AS `unixtime`, `homepage_user_log`.`message`, `homepage_user_log`.`type`'
		.PHP_EOL.'FROM `homepage_user_log`'
		.PHP_EOL.'INNER JOIN `homepage_user` ON `homepage_user_log`.`gm_id` = `homepage_user`.`id`'
		.PHP_EOL.'WHERE `homepage_user_log`.`user_id` = '.$mySQL->Quote( $accid )
		.PHP_EOL.'ORDER BY `homepage_user_log`.`time` DESC'
		;
		$mySQL->setQuery( $query );
		$notes_warnings = $mySQL->loadAssocList();

		$notes = array();
		$warnings = array();

		foreach($notes_warnings as $informations)
		{
			$informations['unixtime'] = timestamp_with_offset($informations['unixtime']);
			if (!strlen($informations['name']))
			{
				$informations['name'] = $informations['username'];
			}
			$informations['message'] = nl2br( $informations['message'] );
			if ($informations['type'] == 0 || $informations['type'] == 1)
			{
				$notes[] = $informations;
			}
			else
			{
				$warnings[] = $informations;
			}
		}
		return array( $notes, $warnings );
	}
?>