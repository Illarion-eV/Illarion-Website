<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Spielregeln' );
	Page::setDescription( 'Auf dieser Seite gibt es Links zu allen Regeln die '
		. 'in Illarion gelten.' );
	Page::setKeywords( array( 'Regeln', 'Vorschriften' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/de_rules.php');
	Page::setNextPage(Page::getURL() . '/illarion/de_rules_1.php');
	Page::setLastPage(Page::getURL() . '/illarion/de_rules_3.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Regeln</h1>

<?php Page::cap('A'); ?>
<p>uf dieser Seite finden sich alle Regeln und Verfahrensweisen, die in Illarion
gelten. Diese sollten die meisten Situationen in Illarion abdecken und im
Zweifelsfalle gibt es die Gamemaster, die sich um Streitfälle kümmern können.
</p>

<p>Der wichtigste Grundsatz für das Spiel ist allerdings:</p>

<p><b>Wir spielen miteinander, nicht gegeneinander.</b></p>

<p>Das empfohlene Mindestalter für Illarion liegt bei 16 Jahren. Diese Grenze
begründet sich auf der Notwendigkeit, die im Spiel gebotenen Themen und Inhalte
mit der notwendigen sozialen Reife zu reflektieren.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Regelwerke</h2>

<p><a href="<?php echo Page::getURL(); ?>/illarion/de_rules_1.php">
	<b>Verhaltenskodex</b>
</a><br />Der Verhaltenskodex ist eine Aufstellung von Richtlinien, die
beschreiben, welches Spielklima in Illarion erzeugt werden soll. Diese sind
wichtig für jeden Spieler, der Illarion spielen möchte. Wer Illarion nach diesen
Grundsätzen spielt, kann eigentlich nichts falsch machen.</p>

<?php Page::insert_go_to_top_link(); ?>

<p><a href="<?php echo Page::getURL(); ?>/illarion/de_rules_2.php">
	<b>Allgemeine Spielregeln</b>
</a><br />Die allgemeinen Spielregeln sind eine Aufstellung aller Spielregeln,
die für jeden, der Illarion spielen möchte, relevant sind.</p>

<?php Page::insert_go_to_top_link(); ?>

<p><a href="<?php echo Page::getURL(); ?>/illarion/de_rules_3.php">
	<b>Gildenregeln</b>
</a><br />Die Gildenregeln sind für alle wichtig, die eine Gilde gründen und
leiten wollen.</p>

<?php Page::NavBarBottom(); ?>