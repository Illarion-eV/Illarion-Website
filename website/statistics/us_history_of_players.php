<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Statistics' );
	Page::setDescription( 'This page shows some statistics about the community of Illarion.' );
	Page::setKeywords( array( 'online', 'player', 'statistics' ) );

	Page::addCSS( 'statistics' );

	Page::setXHTML();
	Page::Init();

	$pgSQL =& Database::getPostgreSQL();

	$query = 'SELECT stat_date,stat_active_accounts, stat_active_chars, stat_german'
	.PHP_EOL.' FROM homepage.statistics'
	.PHP_EOL.' ORDER BY stat_date DESC'
	;
	$pgSQL->setQuery( $query, 0, 1 );
	$statistics = $pgSQL->loadAssocRow();
?>

<h1>Statistics</h1>

<h2>Informations about the community</h2>

<p>This statistics show the current state of the community.</p>

<dl class="statistics">
	<dt>Amount of active players</dt>
	<dd><?php echo $statistics['stat_active_accounts']; ?></dd>

	<dt>Share of german-speaking players</dt>
	<dd><?php echo $statistics['stat_german']; ?> (<?php echo round( $statistics['stat_german'] / $statistics['stat_active_accounts'] * 100, 2 ) ?>%)</dd>

	<dt>Share of english-speaking players</dt>
	<dd><?php echo $statistics['stat_active_accounts']-$statistics['stat_german']; ?> (<?php echo round( ($statistics['stat_active_accounts']-$statistics['stat_german']) / $statistics['stat_active_accounts'] * 100, 2 ) ?>%)</dd>

	<dt>Active characters</dt>
	<dd><?php echo $statistics['stat_active_chars']; ?></dd>

	<dt>Active characters per player</dt>
	<dd><?php echo round($statistics['stat_active_chars']/$statistics['stat_active_accounts'], 2); ?></dd>
</dl>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/us_actplayers.png" width="537" height="315" alt="Diagram" />
</div>

<h2>History of Players</h2>

<p>At the following diagrams you will find how many players were online last time.
The last update of these diagrams:
<b><?php echo strftime( '%d. %B %Y %H:%I%p', filemtime(Page::getMediaRootPath().'/statistics/onlineplayers.rrd') ) ?></b></p>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/us_online_2h.png" width="537" height="315" alt="Statistics of the last 2 hours" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/us_online_1d.png" width="537" height="315" alt="Statistics of the last 24 hours" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/us_online_1w.png" width="537" height="315" alt="Statistics of the last week" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/us_online_1m.png" width="537" height="315" alt="Statistics of the last month" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/us_online_1y.png" width="537" height="315" alt="Statistics of the last year" />
</div>

<?php Page::insert_go_to_top_link(); ?>
