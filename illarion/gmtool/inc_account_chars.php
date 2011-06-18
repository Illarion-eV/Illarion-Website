<?php
	function getAccountName( $accid )
	{
		$mySQL =& Database::getMySQL();

		$query = 'SELECT `username`'
		.PHP_EOL.'FROM `homepage_user`'
		.PHP_EOL.'WHERE `id` = '.$mySQL->Quote( $accid )
		;
		$mySQL->setQuery( $query );
		$account_name = $mySQL->loadResult();

		return $account_name;
	}

	function getChars( $accid )
	{
		global $language;

		$illaSQL =& Database::getPostgreSQL( 'illarionserver' );
		$testSQL =& Database::getPostgreSQL( 'testserver' );

		$query = 'SELECT chr_playerid, chr_name, chr_status, chr_race, chr_sex, '.$illaSQL->Quote($language=='de'?'Spielserver':'Gameserver').' AS chr_server'
		.PHP_EOL.'FROM chars'
		.PHP_EOL.'WHERE chr_accid = '.$illaSQL->Quote( $accid )
		;

		$illaSQL->setQuery( $query );
		$charlist = $illaSQL->loadAssocList();

		$query = 'SELECT chr_playerid, chr_name, chr_status, chr_race, chr_sex, \'Testserver\' AS chr_server'
		.PHP_EOL.'FROM chars'
		.PHP_EOL.'WHERE chr_accid = '.$testSQL->Quote( $accid )
		;
		$testSQL->setQuery( $query );
		return array_merge( $charlist, $testSQL->loadAssocList() );
	}
?>