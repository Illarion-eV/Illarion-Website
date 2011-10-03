<?php
	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add((IllaUser::$lang=='de'?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'testserver' : 'illarionserver');
	$charid = ( isset( $_GET['id'] )  && is_numeric($_GET['id']) ? (int)$_GET['id'] : false );


	if (!$charid)
	{
		Messages::add((IllaUser::$lang=='de'?'Charakter ID wurde nicht richtig übergeben':'Character ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}



	$newdata['name'] 		= ( strlen($_POST['name']) > 0 ? (string)$_POST['name'] : null );
	$newdata['prefix']   	= (string)$_POST['prefix'];
	$newdata['suffix']  	= (string)$_POST['suffix'];
	$newdata['race'] 		= (array_key_exists ($_POST['race'], getRaceArray()) ? (int)$_POST['race'] : false  );
	$newdata['gender']		= ( (int)$_POST['sex'] == 0 || (int)$_POST['sex'] == 1 ? (int)$_POST['sex'] : false );
	$newdata['hitpoints']	= ( $_POST['hitpoints'] <= 10000 && $_POST['hitpoints'] >= 0 ? (int)$_POST['hitpoints'] : false );
	$newdata['mana']		= ( $_POST['mana'] <= 10000 && $_POST['mana'] >= 0 ? (int)$_POST['mana'] : false );
	$newdata['posx']		= (strlen($_POST['posx']) > 0   ? (int)$_POST['posx'] : false);
	$newdata['posy']		= (strlen($_POST['posy']) > 0 ? (int)$_POST['posy'] : false);
	$newdata['posz']		= (strlen($_POST['posz']) > 0 ? (int)$_POST['posz'] : false);

	$pgSQL =& Database::getPostgreSQL();

	$error = 0;

	// Namenscheck : Gibt es den Namen schon?
	$query = "SELECT count(*) FROM ".$server.".chars WHERE chr_name = ".$pgSQL->Quote( $newdata['name'] );
	$pgSQL->setQuery( $query );

	if ($pgSQL->loadResult() != 0)
	{
		Messages::add((IllaUser::$lang=='de'?'Der Charactername ist bereits vergeben':'Character is already in use'), 'error');
		$error = 1;
	}

	if ($error == 0)
	{
		$query = "UPDATE ".$server.".chars "
						.PHP_EOL."SET "
						.PHP_EOL."chr_name = ".$pgSQL->Quote( $newdata['name'] ).", "
						.PHP_EOL."chr_prefix = ".$pgSQL->Quote( $newdata['prefix'] ).", "
						.PHP_EOL."chr_suffix = ".$pgSQL->Quote( $newdata['suffix'] ).", "
						.PHP_EOL."chr_race = ".$pgSQL->Quote( $newdata['race'] ).", "
						.PHP_EOL."chr_sex = ".$pgSQL->Quote( $newdata['gender'] )." "
					.PHP_EOL."WHERE "
						.PHP_EOL."chr_playerid = ".$pgSQL->Quote( $charid );

		$pgSQL->setQuery( $query );
		$up_1 = $pgSQL->query();

		$query = "UPDATE ".$server.".player "
					.PHP_EOL."SET "
					.PHP_EOL."ply_hitpoints = ".$pgSQL->Quote( $newdata['hitpoints'] ).", "
					.PHP_EOL."ply_mana = ".$pgSQL->Quote( $newdata['mana'] ).", "
					.PHP_EOL."ply_posx = ".$pgSQL->Quote( $newdata['posx'] ).", "
					.PHP_EOL."ply_posy = ".$pgSQL->Quote( $newdata['posy'] ).", "
					.PHP_EOL."ply_posz = ".$pgSQL->Quote( $newdata['posz'] )." "
				.PHP_EOL."WHERE "
					.PHP_EOL."ply_playerid = ".$pgSQL->Quote( $charid );

		$pgSQL->setQuery( $query );
		$up_2 = $pgSQL->query();

		if (($up_1)&&($up_2))
		{
			Messages::add((IllaUser::$lang=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
		}
		else
		{
			Messages::add((IllaUser::$lang=='de'?'Fehler beim speichern der Daten':'Error while saving data'), 'error');
		}
	}



?>