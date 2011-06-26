<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Öffentliche Entwicklung', 'Übersicht'));
	Page::setDescription('Diese Seite enthält eine Auflistung der Orte an denen der öffentliche Quelltext von Illarion eingesehen werden kann.');
	Page::setKeywords( array( 'Opensource', 'Quellcode', 'Git', 'GitHub' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Opensource Entwicklung</h1>

<?php Page::cap('I'); ?>

<p>llarion wird als quelloffenes Projekt entwickelt. Die Quellen der Java-Software
sowie des Servers sind unter GPLv3 veröffentlicht und jedem frei zugänglich. Diese
Seite bietet einen Überblick über die Speicherorte der Quelltexte unserer
Hauptentwickler.</p>

<?php Page::insert_go_to_top_link(); ?>
<h1>Java Entwicklung</h1>

<p>Die Java-Entwicklung befasst sich mit der Entwicklung der Software die auf den
Rechnern der Benutzer läuft. Dabei handelt es sich um den Illarion Client, den
easyNPC Editor und den Mapeditor.</p>

<ul>
	<li><a href="https://github.com/mkaring/Illarion-Java">Nitrams Entwicklungsstrang</a> (Hauptspeicher)
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h1>Server Entwicklung</h1>

<p>Die Server Entwicklung befasst sich mit der Entwicklung des C++ Servers der auf
dem Server von Illarion läuft und auf dem das eigentliche Spiel abläuft.</p>

<ul>
	<li><a href="https://github.com/vilarion/Illarion-Server">Vilarions Entwicklungsstrang</a> (Hauptspeicher)
</ul>