<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Verhaltenskodex' );
	Page::setDescription( 'Auf dieser Seite ist der Grundlegende Verhaltenskodex'
		. ' niedergeschrieben.' );
	Page::setKeywords( array( 'Verhaltenskodex', 'Spielweise' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/de_rules.php');
	Page::setPrevPage(Page::getURL() . '/illarion/de_rules.php');
	Page::setNextPage(Page::getURL() . '/illarion/de_rules_2.php');
	Page::setLastPage(Page::getURL() . '/illarion/de_rules_2.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Verhaltenskodex</h1>

<?php Page::cap('R'); ?>
<p>egeln sind wichtig, um eine gute Rollenspielumgebung zu schaffen. Aber keine
Regeln können beschreiben, wie sich die Spieler untereinander verhalten. Dieser
Verhaltenskodex soll aufzeigen, welches Spielklima und welche Spielkultur in
Illarion erwünscht sind. Denn ebenso wichtig wie ein ausgefeilter Regelkatalog
ist es, dass die Spieler rücksichtsvoll, respektvoll und mit Nachsicht
miteinander umgehen.</p>

<?php Page::insert_go_to_top_link(); ?>

<?php Page::cap('I'); ?>
<p>llarion ist ein echtes Rollenspiel. Dein Charakter ist nicht dein Abbild und
sein Erfolg oder Misserfolg ist nicht deiner. Unterscheide stets zwischen dir
und deinem Charakter und lass ihn Schwächen haben und auch mal Fehler machen.
Auch Spieler machen mitunter Fehler. Sei tolerant gegenüber den Fehlern anderer.
Niemand ist perfekt, auch du nicht. Wenn das Verhalten eines anderen Spielers
für dich unerträglich ist, wende dich an einen Gamemaster und lasse den Spieler
in Ruhe. Du solltest nie davon ausgehen, dass irgendjemand dir den Spaß an
Illarion verderben will und genauso solltest du niemandem den Spaß verderben
wollen. Überlege dir also stets, ob was immer du im Spiel tust, auch anderen
Spielern Spaß bereitet oder nur dir alleine.</p>

<?php Page::insert_go_to_top_link(); ?>

<?php Page::cap('I'); ?>
<p>llarion lebt vom kooperativen Zusammenspiel, auch wenn Charaktere Feinde
sein mögen, so sollen die Spieler doch gemeinsam die Geschichte der Welt
Illarion weiterschreiben. Ein Gegeneinander hilft niemanden; dies gilt auch für
das Team von Illarion. Es besteht aus Freiwilligen, die in ihrer Freizeit für
dich ein kostenloses Spiel betreuen und dabei genauso wenig perfekt sind wie
du. Gegenseitiger Respekt ist genauso wichtig wie gesittete Kommunikation – ein
hilfreiches Wort bewirkt manchmal mehr als tausend Beschwerden. Das Team leistet
einen Teil, um das Spiel zu formen, aber den weit größeren Teil leisten die
Spieler. Die Geschichten und Abenteuer im Spiel, aber auch der Umgangston
außerhalb im Forum und Chat, werden von Spielern wie dir geprägt. Bitte hilf
aktiv dabei mit, dass Illarion seine respektvolle, rücksichtsvolle und
angenehme Atmosphäre beibehält, die Rollenspieler aus aller Welt schätzen.</p>

<?php Page::NavBarBottom(); ?>