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
sowie die des Servers sind unter der <a href="http://www.gnu.org/licenses/gpl.html">GPLv3</a> veröffentlicht und jedem frei zugänglich. Diese
Seite bietet einen Überblick über die Speicherorte der Quelltexte unserer
Hauptentwickler.</p>

<?php Page::insert_go_to_top_link(); ?>
<h1>Java-Entwicklung</h1>

<p>Die Java-Entwicklung befasst sich mit der Entwicklung der Software, die auf den
Rechnern der Benutzer läuft. Dabei handelt es sich um den Illarion-Client, den
easyNPC-Editor, den easyQuest-Editor und den Map-Editor.</p>

<ul>
	<li><a href="https://github.com/mkaring/Illarion-Java">Nitrams Entwicklungsstrang</a> (Hauptspeicher)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h1>Server-Entwicklung</h1>

<p>Die Server-Entwicklung befasst sich mit der Entwicklung der C++-Serversoftware,
welche auf der eigentlichen Hardware läuft. Alle Clients verbinden sich mit dem Server, welcher im Wesentlichen das Spiel steuert.</p>

<ul>
	<li><a href="https://github.com/vilarion/Illarion-Server">Vilarions Entwicklungsstrang</a> (Hauptspeicher)</li>
</ul>
