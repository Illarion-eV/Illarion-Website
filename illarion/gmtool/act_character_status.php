<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );

	if (!IllaUser::auth('gmtool_chars'))
	{
		
		Messages::add( (Page::isGerman() ?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( is_numeric($_GET['charid']) ? (int)$_GET['charid'] : 0 );

	if (!$charid)
	{
		Messages::add( (Page::isGerman() ?'Account ID wurde nicht richtig übergeben':'Account ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$new_status = ( is_numeric($_POST['status']) ? (int)$_POST['status'] : null );
	$new_reason   = ( strlen($_POST['reason']) > 0 ? (string)$_POST['reason'] : '' );

	$error = 0;
	if (strlen($new_reason) <= 10)
	{
		Messages::add( (Page::isGerman() ? 'Die Begründung muss mindestens 10 Zeichen lang sein.' : 'The reason must be have at least 10 characters.'), 'error' );
		$error = 1;
	}

	if ( !is_null( $new_status ) && $error == 0 )
	{
		$pgSQL =& Database::getPostgreSQL( );
		
		$query = 'SELECT chr_status, chr_accid'
    	  .PHP_EOL.'FROM '.$server.'.chars'
    	  .PHP_EOL.'WHERE chr_playerid = '.$pgSQL->Quote( $charid )
    	  ;
    	  $pgSQL->setQuery( $query );
		
    	  list($char_state, $accid) = $pgSQL->loadRow();

		if ( ($char_state != $new_status) || (in_array($new_status, array(CHAR_STATUS_TEMP_BANNED, CHAR_STATUS_TEMP_JAILED)))  )
      	{
			$msg =  "Charakterstate changed from ".getCharacterStatusName( $char_state )." to ".getCharacterStatusName( $new_status ).". Reason: ".$new_reason;
			if (in_array($new_status, array(CHAR_STATUS_TEMP_BANNED, CHAR_STATUS_TEMP_JAILED)))
			{
				$state_time = mktime($_POST['time_rl_hour_'.$new_status], 0, 0, $_POST['time_rl_month_'.$new_status], $_POST['time_rl_day_'.$new_status], $_POST['time_rl_year_'.$new_status]);
				$msg .= "New time: ".$_POST['time_rl_day_'.$new_status].".".$_POST['time_rl_month_'.$new_status].".".$_POST['time_rl_year_'.$new_status].", ".$_POST['time_rl_hour_'.$new_status]."h";
			}
			else
			{
				$state_time = time();
			}

			$query = "UPDATE ".$server.".chars"
			.PHP_EOL."SET chr_status = ".$pgSQL->Quote( $new_status )
			.PHP_EOL.", chr_statustime = ".$pgSQL->Quote( $state_time )
			.PHP_EOL.", chr_statusgm = ".$pgSQL->Quote( IllaUser::$ID )
			.PHP_EOL.", chr_statusreason = ".$pgSQL->Quote( $msg )
			.PHP_EOL."WHERE chr_playerid = ".$pgSQL->Quote( $charid )
			;
			$pgSQL->setQuery( $query );
			$pgSQL->query();

			writeCharLog($accid, $charid, IllaUser::$ID, $msg, CHAR_LOG_TYPE_STATUS, $server);
			
			Messages::add( (Page::isGerman() ?'Status wurde geändert':'State got changed'), 'info');
		}

	}

