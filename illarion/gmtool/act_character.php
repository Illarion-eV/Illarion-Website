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
	$newdata['prefix']   	= ( strlen($_POST['prefix']) > 0 ? (string)$_POST['prefix'] : false );
	$newdata['suffix']  	= ( strlen($_POST['suffix']) > 0 ? (string)$_POST['suffix'] : false );
	$newdata['race'] 		= (array_key_exists ($_POST['race'], getRaceArray()) ? (int)$_POST['race'] : false  );
	$newdata['gender']		= ( $_POST['sex'] == 0 || $_POST['sex'] == 1 ? $_POST['sex'] : false );
	$newdata['hitpoints']	= ( $_POST['hitpoints'] <= 10000 && $_POST['hitpoints'] >= 0 ? (int)$_POST['hitpoints'] : false );
	$newdata['mana']		= ( $_POST['mana'] <= 10000 && $_POST['mana'] >= 0 ? (int)$_POST['mana'] : false );
	$newdata['posx']		= (strlen($_POST['posx']) > 0   ? (int)$_POST['posx'] : false);
	$newdata['posy']		= (strlen($_POST['posy']) > 0 ? (int)$_POST['posy'] : false);
	$newdata['posz']		= (strlen($_POST['posz']) > 0 ? (int)$_POST['posz'] : false);

	echo "<pre>";
	print_r($newdata);
	echo "</pre>";



	$pgSQL =& Database::getPostgreSQL();

	$query = "UPDATE ".$server.".chars "
				.PHP_EOL."INNER JOIN ".$server.".player ON ply_playerid = chr_playerid "
					.PHP_EOL."SET "
					.PHP_EOL."chr_name = ".$pgSQL->Quote( $newdata['name'] ).", "
					.PHP_EOL."chr_prefix = ".$pgSQL->Quote( $newdata['prefix'] ).", "
					.PHP_EOL."chr_suffix = ".$pgSQL->Quote( $newdata['suffix'] ).", "
					.PHP_EOL."chr_race = ".$pgSQL->Quote( $newdata['race'] ).", "
					.PHP_EOL."chr_sex = ".$pgSQL->Quote( $newdata['sex'] ).", "
					.PHP_EOL."ply_hitpoints = ".$pgSQL->Quote( $newdata['hitpoints'] )." "
				.PHP_EOL."WHERE "
					.PHP_EOL."chr_playerid = ".$pgSQL->Quote( $charid )." "

	echo $query;
	$pgSQL->setQuery( $query );

	if ($pgSQL->query())
	{
		Messages::add((IllaUser::$lang=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
	}
	else
	{
		Messages::add((IllaUser::$lang=='de'?'Fehler beim speichern der Daten':'Error while saving data'), 'error');
	}

?>