<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Statistiken' );
	Page::setDescription( 'Diese Seite enthält einige Statistiken über die Spieler von Illarion.' );
	Page::setKeywords( array( 'Online', 'Spieler', 'Statistik' ) );

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

<h1>Statistiken</h1>

<h2>Daten zur Spielerschaft</h2>

<p>Diese Statistiken zeigen den Aktuellen Stand und die Zusammensetzung der
Spielerschaft von Illarion. Diese Werte werden einmal pro Tag aktualisiert.</p>

<dl class="statistics">
	<dt>Anzahl der aktiven Spieler</dt>
	<dd><?php echo $statistics['stat_active_accounts']; ?></dd>

	<dt>Anteil der deutsch sprechenden Spieler</dt>
	<dd><?php echo $statistics['stat_german']; ?> (<?php echo round( $statistics['stat_german'] / $statistics['stat_active_accounts'] * 100, 2 ) ?>%)</dd>

	<dt>Anteil der englisch sprechenden Spieler</dt>
	<dd><?php echo $statistics['stat_active_accounts']-$statistics['stat_german']; ?> (<?php echo round( ($statistics['stat_active_accounts']-$statistics['stat_german']) / $statistics['stat_active_accounts'] * 100, 2 ) ?>%)</dd>

	<dt>Aktive Charaktere</dt>
	<dd><?php echo $statistics['stat_active_chars']; ?></dd>

	<dt>Aktive Charakter pro Spieler</dt>
	<dd><?php echo round($statistics['stat_active_chars']/$statistics['stat_active_accounts'], 2); ?></dd>
</dl>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/de_actplayers.png" width="537" height="315" alt="Diagramm" />
</div>

<h2>Spielerverlauf</h2>

<p>Die folgenden Diagramme zeigen Dir, wieviele Spieler zu einer bestimmten Zeit online waren.
Die letzte Aktualisierung dieser Diagramme war:
<b> <?php echo strftime( '%d. %B %Y - %H:%M:%S', filemtime(Page::getMediaRootPath().'/statistics/onlineplayers.rrd') ) ?></b></p>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/de_online_2h.png" width="537" height="315" alt="Statistiken den letzten 2 Stunden" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/de_online_1d.png" width="537" height="315" alt="Statistiken den letzten 24 Stunden" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/de_online_1w.png" width="537" height="315" alt="Statistiken der letzten Woche" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/de_online_1m.png" width="537" height="315" alt="Statistiken des letzten Monats" />
</div>

<?php Page::insert_go_to_top_link(); ?>

<div class="center">
	<img src="<?php echo Page::getMediaURL(); ?>/statistics/de_online_1y.png" width="537" height="315" alt="Statistiken des letzten Jahres" />
</div>

<?php Page::insert_go_to_top_link(); ?>
