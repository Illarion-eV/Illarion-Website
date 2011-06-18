<?php
	function getAccountData( $accid )
	{
		$mySQL =& Database::getMySQL();
		$pgSQL =& Database::getPostgreSQL( 'accounts' );

		$query = 'SELECT `id`,`username`,`name`,`passwd`,`email`,`lastseen`,`lastip`,`charlimit`,`weight`,`length`,`time_offset`,`dst`'
		.PHP_EOL.'FROM `homepage_user`'
		.PHP_EOL.'WHERE `id` = '.$mySQL->Quote( $accid )
		;
		$mySQL->setQuery( $query );
		$account_data = $mySQL->loadAssocRow();

		if (!$account_data || !count($account_data))
		{
			return false;
		}

		$query = 'SELECT acc_lang'
		.PHP_EOL.'FROM account'
		.PHP_EOL.'WHERE acc_id = '.$pgSQL->Quote( $accid )
		;
		$pgSQL->setQuery( $query );
		$account_data['lang'] = $pgSQL->loadResult();

		$account_data['time_offset']/=100;
		return $account_data;
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
?>