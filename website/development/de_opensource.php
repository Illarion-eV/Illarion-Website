<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Open-Source-Entwicklung', 'Übersicht'));
	Page::setDescription('Diese Seite enthält eine Auflistung der Orte an denen der öffentliche Quelltext von Illarion eingesehen werden kann.');
	Page::setKeywords( array( 'Opensource', 'Quellcode', 'Git', 'GitHub' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Open-Source-Entwicklung</h1>

<?php Page::cap('I'); ?>

<p>llarion wird als quelloffenes Projekt entwickelt. Die Quellen der Java-Software
sind unter der <a href="http://www.gnu.org/licenses/gpl.html">GPLv3</a>
veröffentlicht während die Quellen des Servers, der Karten und der Spielinhalte
unter der <a href="http://www.gnu.org/licenses/agpl.html">AGPLv3</a>
veröffentlicht sind. Alle Quellen sind jedem frei zugänglich. Diese
Seite bietet einen Überblick über die Speicherorte der Quelltexte.</p>

<h2>Entwicklung der Spielinhalte</h2>

<p>Als Spielinhalte werden alle Quests, NPCs, Monster und z.B. das Kampfsystem
oder das Verhalten von Gegenständen bezeichnet. Spielinhalte sind zumeist in Lua&nbsp;5.1
(und einer <a href="https://raw.github.com/Illarion-eV/Illarion-Server/testserver/doc/luadoc.pdf">
Illarion-spezifischen Erweiterung</a>) geschrieben mit der Ausnahme von fast allen NPCs,
welche in unserer eigenen Sprache easyNPC verfasst wurden. Der Editor für easyNPC
ist über das Startprogramm erreichbar.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Content">Offizieller Entwicklungsstrang</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h2>Kartenentwicklung</h2>

<p>Die Karten der Spielwelt bilden die Landschaft in der sich alle Charaktere
bewegen. Sie beschreiben die Bodenplatten, Gegenstände welche z.B. Gebäude oder Berge
bilden, sowie die Hintergrundmusik des jeweiligen Gebiets. Der Karteneditor ist über
das Startprogramm erreichbar.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Map">Offizieller Entwicklungsstrang</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h2>Java-Entwicklung</h2>

<p>Die Java-Entwicklung befasst sich mit der Entwicklung der Software, die auf den
Rechnern der Benutzer läuft. Dabei handelt es sich um den Illarion-Client, den
easyNPC-Editor, den easyQuest-Editor und den Map-Editor.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Java">Offizieller Entwicklungsstrang</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h2>Server-Entwicklung</h2>

<p>Die Server-Entwicklung befasst sich mit der Entwicklung der C++-Serversoftware,
welche auf der eigentlichen Hardware läuft. Alle Clients verbinden sich mit dem Server, welcher im Wesentlichen das Spiel steuert.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Server">Offizieller Entwicklungsstrang</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
