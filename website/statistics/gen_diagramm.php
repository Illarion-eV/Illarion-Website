<?php
	define( 'TTF_DIR', '/usr/share/fonts/truetype/ttf-dejavu/' );

	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/database.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/libs/jpgraph/jpgraph.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/libs/jpgraph/jpgraph_log.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/shared/libs/jpgraph/jpgraph_line.php';

	$pgSQL =& Database::getPostgreSQL();
	$query = 'SELECT *'
	.PHP_EOL.' FROM homepage.statistics'
	.PHP_EOL.' WHERE stat_german > 0'
	.PHP_EOL.' ORDER BY stat_date ASC'
	;
	$pgSQL->setQuery( $query );
	$statistic_data = $pgSQL->loadAssocList( );

	$height = 315;
	$width = 537;

	$create_langs = array( 'de', 'us' );

	echo '<h1>Generate Diagramms</h1>';

	foreach( $create_langs as $lang )
	{
		if( $lang == 'de' )
		{
			setlocale(LC_TIME, 'de_DE.UTF-8');
		}
		else
		{
			setlocale(LC_TIME, 'en_US.UTF-8');
		}

		$date = array();
		$active = array();
		$german = array();
		$entries = 0;
		foreach($statistic_data as $data)
		{
			$date_comp = explode('-',$data['stat_date']);
			$date[] = strftime('%d. %b %y', mktime(0,0,0,$date_comp[1],$date_comp[2],$date_comp[0]));
			$active[] = $data['stat_active_accounts'];
			$german[] = $data['stat_german'];
			++$entries;
		}

		$graph = new Graph($width,$height,'auto');
		$graph->SetScale('textint');
		$graph->SetMargin(40,10,30,115);
		$graph->SetMarginColor( '#9F8A5B' );
		$graph->SetColor( '#9F8A5B' );
		$graph->SetFrame(true, '#9F8A5B', 1);

		$graph->ygrid->Show(true,false);
		$graph->xgrid->Show(false,false);

		$graph->ygrid->SetColor('black');
		$graph->ygrid->SetLineStyle('dashed');
		$graph->ygrid->SetWeight(1);
		$graph->ygrid->SetFill(false);
		$graph->yaxis->SetFont(FF_DV_SANSSERIF,FS_NORMAL,10);

		$graph->SetGridDepth( DEPTH_FRONT );

		$graph->xaxis->SetTickLabels($date);
		$graph->xaxis->SetTextTickInterval(ceil($entries/(($width-55)/13)));
		$graph->xaxis->SetLabelAngle(90);
		$graph->xaxis->SetFont(FF_DV_SANSSERIF,FS_NORMAL,10);

		$lineplot1=new LinePlot($active);
		$lineplot2=new LinePlot($german);

		$graph->Add($lineplot1);
		$graph->Add($lineplot2);

		$lineplot1->SetColor('#707070');
		$lineplot2->SetColor('#4c4d47');

		$lineplot1->SetFillColor( '#DBD9CC', true );
		$lineplot2->SetFillColor( '#4c5747', true );

		if ($lang == 'de')
		{
			$graph->title->Set('Verlauf der Anzahl der Spieler von Illarion');
			$graph->subtitle->Set($date[0].' bis '.$date[$entries-1]);
			$lineplot1->SetLegend('Englische Accounts');
			$lineplot2->SetLegend('Deutsche Accounts');
		}
		else
		{
			$graph->title->Set('History of the count of players of Illarion');
			$graph->subtitle->Set($date[0].' to '.$date[$entries-1]);
			$lineplot1->SetLegend('English Accounts');
			$lineplot2->SetLegend('German Accounts');
		}

		$graph->title->SetFont(FF_DV_SANSSERIF,FS_BOLD,14);
		$graph->subtitle->SetFont(FF_DV_SANSSERIF,FS_NORMAL,8);

		$graph->legend->SetAbsPos($width/2,$height-5,'center','bottom');
		$graph->legend->SetLayout(LEGEND_HOR);
		$graph->legend->SetFillColor( '#29150C' );
		$graph->legend->SetColor( '#DBD9CC' );
		$graph->legend->SetShadow( false );
		$graph->legend->SetFont(FF_DV_SANSSERIF,FS_NORMAL,10);

		$graph->Stroke( $_SERVER['DOCUMENT_ROOT'] . '/media/statistics/'.$lang.'_actplayers.png' );

		echo '<p>'.$lang.' created</p>';

		unset($graph);
	}
?>
