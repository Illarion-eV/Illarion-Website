<?php
	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add((Page::isGerman()?'Zugriff verweigert':'Access denieded'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );


	if (!$charid)
	{
		Messages::add((Page::isGerman()?'Charakter ID wurde nicht richtig übergeben':'Character ID was not transfered correctly'), 'error');
		includeWrapper::includeOnce( Page::getRootPath().'/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	$newdata = array();
	$newdata['ply_strength'] 		= (int) $_POST['strength'];
	$newdata['ply_dexterity']   	= (int) $_POST['dexterity'];
	$newdata['ply_constitution']  	= (int) $_POST['constitution'];
	$newdata['ply_agility'] 		= (int) $_POST['agility'];
	$newdata['ply_intelligence']	= (int) $_POST['intelligence'];
	$newdata['ply_perception']		= (int) $_POST['perception'];
	$newdata['ply_willpower']		= (int) $_POST['willpower'];
	$newdata['ply_essence']			= (int) $_POST['essence'];


	$pgSQL =& Database::getPostgreSQL();

	$error = 0;

	// Check: Ist wert größer als 250 oder kleiner als 0
	foreach ($newdata as $data)
	{
		if ( ($data > 250) || ($data < 0))
		{
			Messages::add((Page::isGerman()?'Attribute müssen zwischen 1 und 250 liegen':'Attributs has to be between 1 and 250'), 'error');
			$error = 1;
		}
	}

	if ($error == 0)
	{
		// write log message
		$query = "SELECT ply_strength, ply_dexterity, ply_constitution, ply_agility, ply_intelligence, ply_perception, ply_willpower, ply_essence "
				.PHP_EOL."FROM ".$server.".player "
				.PHP_EOL."WHERE ply_playerid = ".$pgSQL->Quote( $charid );
		$pgSQL->setQuery( $query );
		$old_attrib = $pgSQL->loadAssocRow();
		$msg ="";
		foreach ($newdata as $key => $data)
		{				
			if ($data != $old_attrib[$key])
			{
				$msg .= "[".substr($key,4).":".$old_attrib[$key]." to ".$data."]";
			}
		}

		// get accid
		$query = 'SELECT chr_accid'
          .PHP_EOL.'FROM '.$server.'.chars'
          .PHP_EOL.'WHERE chr_playerid = '.$pgSQL->Quote( $charid )
          ;
          $pgSQL->setQuery( $query );

          $accid = $pgSQL->loadResult();

		if (strlen($msg) > 0)
		{
			$msg = "Change Attributes: ".$msg;

			$query = "UPDATE ".$server.".player "
						.PHP_EOL."SET "
						.PHP_EOL."ply_strength = ".$pgSQL->Quote( $newdata['ply_strength'] ).", "
						.PHP_EOL."ply_dexterity = ".$pgSQL->Quote( $newdata['ply_dexterity'] ).", "
						.PHP_EOL."ply_constitution = ".$pgSQL->Quote( $newdata['ply_constitution'] ).", "
						.PHP_EOL."ply_agility = ".$pgSQL->Quote( $newdata['ply_agility'] ).", "
						.PHP_EOL."ply_intelligence = ".$pgSQL->Quote( $newdata['ply_intelligence'] ).", "
						.PHP_EOL."ply_perception = ".$pgSQL->Quote( $newdata['ply_perception'] ).", "
						.PHP_EOL."ply_willpower = ".$pgSQL->Quote( $newdata['ply_willpower'] ).", "
						.PHP_EOL."ply_essence = ".$pgSQL->Quote( $newdata['ply_essence'] )." "
					.PHP_EOL."WHERE "
						.PHP_EOL."ply_playerid = ".$pgSQL->Quote( $charid );

			$pgSQL->setQuery( $query );
			$pgSQL->query();
			writeCharLog($accid, $charid, IllaUser::$ID, $msg, CHAR_LOG_TYPE_CHANGE_ATTRIB, $server);

			Messages::add((Page::isGerman()?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
		}
	}



?>
