<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Mitarbeiten' );
	Page::setDescription( 'Diese Seite enthält Informationen über die Mitarbeit an Illarion.' );
	Page::setKeywords( array( 'Mitarbeit', 'Unterstützen', 'mit machen' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Mitarbeiten an Illarion</h1>

<?php Page::cap('I'); ?>
<p>llarion ist als kostenloses Projekt immer auf Leute angewiesen die an
Illarion mitarbeiten und es stetig weiterentwickeln. Um jeder Illusion von
Anfang an die Grundlage zu nehmen: Die Arbeit an Illarion ist zu jeder Zeit
freiwillig und wird nicht bezahlt. Alles was man aus der Mitarbeit an Illarion
gewinnen kann ist Erfahrung in den Bereichen die man bearbeitet und die
Möglichkeit seine eigenen Fähigkeiten zu verbessern. Wer sich aber für die
Mitarbeit bei einem Onlinerollenspiel begeistern kann, der wird in Illarion
einen Platz finden wo er seinen Schaffensdrang ausleben kann und die Spieler von
Illarion mit vielen schönen Fehlern, die ja eigentlich gar nicht hätten
passieren können, erfreuen kann.</p>

<h2>Allgemeine Vorraussetzungen</h2>

<p>Generell ist es nötig das jeder Entwickler einigermaßen mit der englischen
Sprache umgehen kann. Die Dokumentationen für die Entwicklung an Illarion sind
alle in Englisch verfasst und die Notwendigkeit das jedes Teammitglied mit allen
anderen Kommunizieren kann, setzt Englisch als notwendige Vorraussetzung für die
Mitarbeit an Illarion vorraus.</p>

<p>Darüber hinaus ist es nicht zu unterschätzen wieviel Zeit nötig ist um an
Illarion effektiv mitzuarbeiten. Wenn man im Schnitt pro Woche nicht zumindest
10 Stunden Zeit findet für Illarion, hat es kaum einen Sinn dem Entwicklerteam
beitreten zu wollen.</p>

<p>Der letzte Punkt ist die Fähigkeit sich selbst zu motivieren. Entwickler die
alles hinwerfen nur weil irgendetwas nicht auf anhieb oder nicht in der
angestrebten Zeit funktioniert. Am Ende muss man aus jedem Fehlschlag lernen und
einfach weitermachen.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Entwicklungsbereiche</h2>

<h3>NPC Entwicklung</h3>

<p>Die Entwicklung einfachster NPCs ist bei Illarion durch die einfache NPC
Sprache unterstützt. Vorraussetzung für die Arbeit mit dieser Sprache gibt es
praktisch nicht. Diese Sprache wurde speziell entworfen um mit möglichst
geringem Aufwand und ohne Programmierkenntnisse Gesprächs- und Quest-NPCs zu
schreiben.</p>

<ul>
	<li>Forumlink mit weiterführenden Informationen:<a href="<?php echo Page::getURL(); ?>/community/forums/viewtopic.php?t=25012">LINK</a></li>
	<li>Übersicht über die Funktionen: <a href="<?php echo Page::getURL(); ?>/development/de_scripts_comm.php">LINK</a></li>
</ul>

<p><b>Ansprechpartner:</b></p>

<ul>
	<li>Ardian (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=5398">Forum</a>)</li>
	<li>martin (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=1226">Forum</a>)</li>
	<li>Nitram (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=2931">Forum</a>)</li>
	<li>pharse (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=7216">Forum</a>)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Scripte</h3>

<p>Die Scripte in Illarion sind mit der Scriptsprache LUA geschrieben. Scripte
Steuern die meisten Sachen im Spiel. Die Aktionen die durch Gegenstände
ausgelöst werden, komplexere NPCs, Zaubersprüche, Triggerfelder,
Langzeiteffekte werden alle durch Scripte gesteuert. Für den Arbeit an Scripten
ist ein Grundlegendes Verständnis für allgemeine Programmierung und prozedurale
Programmierung erforderlich.</p>

<ul>
	<li>Allgemeines LUA-Tutorial: <a href="https://lua-users.org/wiki/TutorialDirectory">LINK</a></li>
	<li>Dokumentation zu den Illarion spezifischen LUA-Befehlen: <a href="<?php echo Page::getURL(); ?>/~martin/scripting/luadocu.pdf">LINK</a></li>
</ul>

<p><b>Ansprechpartner:</b></p>

<ul>
	<li>Ardian (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=5398">Forum</a>)</li>
	<li>martin (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=1226">Forum</a>)</li>
	<li>Nitram (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=2931">Forum</a>)</li>
	<li>pharse (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=7216">Forum</a>)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Server</h3>

<p>Der Server von Illarion ist in C++ geschrieben und läuft unter Debian Linux.
Er verwaltet die angemeldeten Spieler, kümmert sich um die Zeitlichen Abläufe
in der Spielwelt, ruft die Scripte auf, steuert die Monster KI und vieles mehr.
Für die Arbeit am Server sind gute Kenntnisse der Programmiersprache C++ und
nach Möglichkeit Erfahrung mit der Boost Library erforderlich. Grundlagen im
Umgang mit Netzwerken, Objekt orientierter Programmierung und Datenbanken sind
von Vorteil.</p>

<p><b>Ansprechpartner:</b></p>

<ul>
	<li>vilarion (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=3915">Forum</a>)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Client</h3>

<p>Der Client ist die Anzeige für die Daten die der Server schickt und die
Möglichkeit für die Spieler den eigenen Charakter zu steuern. Er ist vollständig
in Java geschrieben und realisiert die Darstellung der Spielwelt mit OpenGL über
die LWJGL Bibliothek. Für die Arbeit am Client sind Kenntnisse der
Programmiersprache Java nötig. Grundlegende Kenntniss im Umgang mit OpenGL ist
außerdem von Vorteil.</p>

<p><b>Ansprechpartner:</b></p>

<ul>
	<li>Nitram (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=2931">Forum</a>)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Homepage</h3>

<p>Die Homepage von Illarion ist in PHP geschrieben und ist auf xHTML1.1 valide
Seiten optimiert. Daher sind Kenntnisse in allgemeiner Webprogrammierung und PHP
nötig. Grundlegende Kenntniss im Umgang mit xHTML, CSS, JavaScript und SQL sind
sehr von Vorteil. Die Datenbanken hinter der Homepage sind eine MySQL und eine
PostgreSQL Datenbank.</p>

<p><b>Ansprechpartner:</b></p>

<ul>
	<li>Kadiya (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=8470">Forum</a>)</li>
	<li>Nitram (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=2931">Forum</a>)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Grafiken</h3>

<p>Die Grafiken die im Client von Illarion liegen, basieren alle auf 3D-Modellen
die mit bestimmten Konfigurationen gerendert wurden. Es ist daher nötig, wenn
man bei der Grafikentwicklung von Illarion mitwirken will das man gute
Kenntnisse im Umgang mit einer entsprechenden 3D-Modellierungssoftware hat und
entsprechende Kenntnisse mit anderen Grafikprogrammen für die Erstellung von
Texturen und für die Nachbearbeitung.</p>

<p><b>Ansprechpartner:</b></p>

<ul>
	<li>martin (<a href="<?php echo Page::getURL(); ?>/community/forums/profile.php?mode=viewprofile&amp;u=1226">Forum</a>)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Musik</h3>

<p>Die Hintergrundmusik und Soundentwicklung stagniert zur Zeit. Es gibt keinen
Entwickler der sich damit befasst. Die Standards die im Client im Augenblick
gelten sind Soundeffekte im OGG Format und Hintergrundmusik im MIDI Format.</p>

<?php Page::insert_go_to_top_link(); ?>