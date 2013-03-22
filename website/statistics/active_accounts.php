<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/database.php" );
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/statistics/jpgraph/jpgraph.php");
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/statistics/jpgraph/jpgraph_log.php");
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/statistics/jpgraph/jpgraph_line.php");

	$height = ( is_numeric($_GET['height']) ? (int)$_GET['height'] : 600 );
	$width = ( is_numeric($_GET['width']) ? (int)$_GET['width'] : 800 );

	if( ereg( 'de', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
	{
		$lang = 'de';
		setlocale(LC_TIME, 'de_DE');
	}
	else
	{
		$lang = 'us';
		setlocale(LC_TIME, 'en_US');
	}

	$start = ( isset($_GET['start']) ? $_GET['start'] : false );
	$end   = ( isset($_GET['end']) ? $_GET['end'] : date('Y-m-d') );

	$pgSQL = =& Database::getPostgreSQL();
	$query = 'SELECT *'
		.PHP_EOL.' FROM homepage.statistics'
		.PHP_EOL.' WHERE stat_date <= '.$pgSQL->Quote($end)
		.PHP_EOL. ( $start ? '\n AND stat_date >= '.$pgSQL->Quote( $start ) : '' )
		.PHP_EOL.' ORDER BY stat_date ASC'
	;
	$pgSQL->setQuery($query);
	$statistic_data = $pgSQL->loadAssocList( 'stat_date' );

	$date = array();
	$active = array();
	$new = array();
	$entries = 0;
	foreach($statistic_data as $data)
	{
		$date_comp = explode('-',$data['stat_date']);
		if ($lang == 'de')
		{
			$date[] = date('d. M Y', mktime(0,0,0,$date_comp[1],$date_comp[2],$date_comp[0]));
		}
		else
		{
			$date[] = date('dS M Y', mktime(0,0,0,$date_comp[1],$date_comp[2],$date_comp[0]));
		}
		$active[] = $data['stat_active_accounts'];
		$new[] = $data['stat_new_accounts'];
		$entries++;
	}

	$graph = new Graph($width,$height,'auto');
	$graph->SetScale("textint");
	$graph->SetMargin(50,5,20,120);

	$graph->ygrid->Show(true,false);
	$graph->xgrid->Show(false,false);

	$graph->ygrid->SetColor('lightblue');
	$graph->ygrid->SetFill(true,'#EFEFEF@0.6','#BBCCFF@0.6');
	$graph->ygrid->SetLineStyle('dashed');
	$graph->ygrid->SetWeight(1);


	$graph->xaxis->SetTickLabels($date);
	$graph->xaxis->SetTextTickInterval(ceil($entries/(($width-55)/13)));
	$graph->xaxis->SetLabelAngle(90);

	$lineplot1=new LinePlot($active);
	$lineplot2=new LinePlot($new);

	$graph->Add($lineplot1);
	$graph->Add($lineplot2);

	$lineplot1->SetColor("blue");
	$lineplot2->SetColor("red");

	if ($lang == 'de')
	{
		$graph->title->Set("Verlauf der Anzahl der Spieler von Illarion");
		$graph->subtitle->Set($date[0].' bis '.$date[$entries-1]);
		$lineplot1->SetLegend("Aktive Accounts");
		$lineplot2->SetLegend("Neue Accounts");
	}
	else
	{
		$graph->title->Set("History of the count of players of Illarion");
		$graph->subtitle->Set($date[0].' to '.$date[$entries-1]);
		$lineplot1->SetLegend("Active Accounts");
		$lineplot2->SetLegend("New Accounts");
	}

	$graph->title->SetFont(FF_FONT1,FS_BOLD,14);
	$graph->subtitle->SetFont(FF_FONT1,FS_NORMAL,8);
	$graph->subtitle->SetColor("darkred");

	$graph->legend->SetAbsPos($width/2,$height-5,'center','bottom');
	$graph->legend->SetLayout(LEGEND_HOR);

	$graph->Stroke();
?>
