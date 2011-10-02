<?php
	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add(($language=='de'?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$charid = ( is_numeric($_GET['id']) ? (int)$_GET['id'] : 0 );

	if (!$charid)
	{
		Messages::add(($language=='de'?'Charakter ID wurde nicht richtig übergeben':'Character ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$newdata[new_name] 	= ( strlen($_POST['name']) > 0 ? (string)$_POST['name'] : null );
	$newdata[prefix]   	= ( strlen($_POST['prefix']) > 0 ? (string)$_POST['prefix'] : false );
	$newdata[suffix]  	= ( strlen($_POST['suffix']) > 0 ? (string)$_POST['suffix'] : false );
	$newdata[race] 		= (array_key_exists ($_POST['race'], getRaceArray()) ? (int)$_POST['race'] : false  );
	$newdata[gender]	= ( $_POST['sex'] == 0 || $_POST['sex'] == 1 ? $_POST['sex'] : false );
	$newdata[hitpoints]	= ( $_POST['hitpoints'] < 10000 && $_POST['hitpoints'] >= 0 ? (int)$_POST['hitpoints'] : false );
	$newdata[mana]		= ( $_POST['mana'] < 10000 && $_POST['mana'] >= 0 ? (int)$_POST['mana'] : false );
	$newdata[posx]		= (is_int($_POST['posx']) ? (int)$_POST['posx'] : false);
	$newdata[posy]		= (is_int($_POST['posy']) ? (int)$_POST['posy'] : false);
	$newdata[posz]		= (is_int($_POST['posz']) ? (int)$_POST['posz'] : false);

	echo "<pre>";
	print_r($newdata);
	echo "</pre>";
/*
	$pgSQL =& Database::getPostgreSQL();

	$query = "UPDATE account"
	. "\n SET acc_lang = ".$pgSQL->Quote( $new_lang )
	. ", acc_passwd = ".$pgSQL->Quote( $new_passwd )
	. "\n WHERE acc_id = ".$pgSQL->Quote( $accid )
	;
	$pgSQL->setQuery( $query );

	if ($pgSQL->query())
	{
		Messages::add(($language=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');
	}
	else
	{
		Messages::add(($language=='de'?'Fehler beim speichern der Daten':'Error while saving data'), 'error');
	}
*/
?>