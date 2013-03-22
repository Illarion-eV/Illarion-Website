<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	$server = ( $_GET['server'] == 1 ? 'testserver' : 'illarionserver' );
	$charname = preg_replace('/%([0-9a-f]{2})/ie', 'chr(hexdec($1))', (string)$_GET['charname']);
	$lang = ( $_GET['lang'] == 'de' ? 'de' : 'us' );
	$cnt = ( is_numeric($_GET['cnt']) ? (int)$_GET['cnt'] : 0 );
	echo $cnt,'|';
	$db_hp =& Database::getPostgreSQL( 'homepage' );

	$query = "SELECT name"
	. "\n FROM badname"
	;
	$db_hp->setQuery( $query );
	$bad_names = $db_hp->loadResultArray();

	foreach ($bad_names as $bad_name)
	{
		if ( preg_match( '/\b'.$bad_name.'\b/i', $charname, $hit ) )
		{
			if ($lang == 'de')
			{
				echo '"',$hit[0],'" darf in Namen des Charakters nicht enthalten sein';
			}
			else
			{
				echo '"',$hit[0],'" is not allowed in the name';
			}
			exit();
		}
	}

	$pgSQL =& Database::getPostgreSQL( $server );

	$query = "SELECT COUNT(*)"
	. "\n FROM chars"
	. "\n WHERE chr_name = ".$pgSQL->Quote( $charname )
	;
	$pgSQL->setQuery( $query );
	if ($pgSQL->loadResult())
	{
		echo ($lang == 'de' ? 'Charaktername wurde bereits vergeben' : 'Charactername already taken' );
		exit();
	}

	echo 'OK';
?>
