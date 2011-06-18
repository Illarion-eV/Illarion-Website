<?php
	function getAccountData( $accid )
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `username`, `state`'
		.PHP_EOL.'FROM `homepage_user`'
		.PHP_EOL.'WHERE `id` = '.$mySQL->Quote( $accid )
		;
		$mySQL->setQuery( $query );
		$account_data = $mySQL->loadRow();

		return $account_data;
	}
?>