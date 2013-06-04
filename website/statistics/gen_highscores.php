<?php
    include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	$query = 'SELECT COUNT(*)'
	.PHP_EOL.'  FROM "homepage"."statistics"'
	.PHP_EOL.' WHERE date_trunc(\'month\', "stat_date") = date_trunc(\'month\', TIMESTAMP '.$pgSQL->Quote( TODAY_TIME ).');';
	
	$pgSQL->setQuery( $query );
	if ($pgSQL->loadResult())
	{
		echo 'No need to update highscores.';
	}
	else
	{
		includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_highscores.php' );
		set_monthly_offset();
	}
?>
