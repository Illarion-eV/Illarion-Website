<?php
	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add((IllaUser::$lang=='de'?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );


	if (!$charid)
	{
		Messages::add((IllaUser::$lang=='de'?'Charakter ID wurde nicht richtig übergeben':'Character ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}


	$newdata = array();
	$newdata['strength'] 		= (int) $_POST['strength'];
	$newdata['dexterity']   	= (int) $_POST['dexterity'];
	$newdata['constitution']  	= (int) $_POST['constitution'];
	$newdata['agility'] 		= (int) $_POST['agility'];
	$newdata['intelligence']	= (int) $_POST['intelligence'];
	$newdata['perception']		= (int) $_POST['perception'];
	$newdata['willpower']		= (int) $_POST['willpower'];
	$newdata['essence']			= (int) $_POST['essence'];


	$pgSQL =& Database::getPostgreSQL();

	$error = 0;

	// Check: Ist wert größer als 250 oder kleiner als 0
	foreach ($newdata as $data)
	{
		if ( ($data > 250) || ($data < 0))
		{
			Messages::add((IllaUser::$lang=='de'?'Attribute müssen zwischen 1 und 250 liegen':'Attributs has to be between 1 and 250'), 'error');
			$error = 1;
		}
	}

	if ($error == 0)
	{
		$query = "UPDATE ".$server.".player "
					.PHP_EOL."SET "
					.PHP_EOL."ply_strength = ".$pgSQL->Quote( $newdata['strength'] ).", "
					.PHP_EOL."ply_dexterity = ".$pgSQL->Quote( $newdata['dexterity'] ).", "
					.PHP_EOL."ply_constitution = ".$pgSQL->Quote( $newdata['constitution'] ).", "
					.PHP_EOL."ply_agility = ".$pgSQL->Quote( $newdata['agility'] ).", "
					.PHP_EOL."ply_intelligence = ".$pgSQL->Quote( $newdata['intelligence'] ).", "
					.PHP_EOL."ply_perception = ".$pgSQL->Quote( $newdata['perception'] ).", "
					.PHP_EOL."ply_willpower = ".$pgSQL->Quote( $newdata['willpower'] ).", "
					.PHP_EOL."ply_essence = ".$pgSQL->Quote( $newdata['essence'] )." "
				.PHP_EOL."WHERE "
					.PHP_EOL."ply_playerid = ".$pgSQL->Quote( $charid );

		$pgSQL->setQuery( $query );

		if ($pgSQL->query())
		{
			Messages::add((IllaUser::$lang=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
		}
		else
		{
			Messages::add((IllaUser::$lang=='de'?'Fehler beim speichern der Daten':'Error while saving data'), 'error');
		}
	}



?>