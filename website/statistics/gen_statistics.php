<?php
	// wget --output-document="/home/nitram/public_html/last_hp_stats.html" -q "http://illarion.org/statistics/gen_statistics.php"

	set_time_limit( 0 );

	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/database.php';
	
	if (isset($_GET['month']) && isset($_GET['day']) && isset($_GET['year'])) {
		$time = mktime(0,0,0,$_GET['month'],$_GET['day'],$_GET['year'] );
	} else {
		$time = time();
	}

	// Generate needed time informations
	define( 'TODAY_TIME', date('Y-m-d', $time) );
	define( 'TODAY_TIMESTAMP', mktime(0,0,0,date('m', $time),date('d', $time),date('Y', $time) ) );

	// Establish database connection
	$pgSQL    =& Database::getPostgreSQL();
	

	// Ensure that this is only done once per day
	$query = 'SELECT COUNT(*)'
		.PHP_EOL.'  FROM homepage.statistics'
		.PHP_EOL.' WHERE stat_date = '.$pgSQL->Quote( TODAY_TIME );
	$pgSQL->setQuery( $query );
	if ($pgSQL->loadResult())
	{
		echo 'No need to generate any data.';
		exit();
	}

	define( 'SEND_MAILS', 1 );

	include $_SERVER['DOCUMENT_ROOT'] . '/statistics/gen_actaccounts.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/statistics/gen_email.php';
	include $_SERVER['DOCUMENT_ROOT'] . '/statistics/gen_diagramm.php';
?>
