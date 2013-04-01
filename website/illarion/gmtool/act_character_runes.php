<?php
	if (!IllaUser::auth('gmtool_chars'))
	{
		Messages::add((IllaUser::$lang=='de'?'Zugriff verweigert':'Access denieded'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	$server = ( isset( $_GET['server'] ) && $_GET['server'] == '1' ? 'devserver' : 'illarionserver');
	$charid = ( isset( $_GET['charid'] )  && is_numeric($_GET['charid']) ? (int)$_GET['charid'] : false );


	if (!$charid)
	{
		Messages::add((IllaUser::$lang=='de'?'Charakter ID wurde nicht richtig übergeben':'Character ID was not transfered correctly'), 'error');
		include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
		exit();
	}

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	
	$pgSQL =& Database::getPostgreSQL();

	Messages::add((IllaUser::$lang=='de'?'Änderungen wurden gespeichert':'Changes got saved'), 'info');


?>
