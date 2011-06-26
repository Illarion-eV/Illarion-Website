<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Public Development', 'Overview'));
	Page::setDescription('This page contains a list where the public developed parts of Illarion can be viewed.');
	Page::setKeywords( array( 'Opensource', 'Source', 'Git', 'GitHub' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Opensource Developent</h1>

<?php Page::cap('I'); ?>

<p>llarion is developed as open source project. The sources of the Java-Software
and of Server are released as GPLv3 and by this free to be used by anyone. This page
offers a list where to find the current development repositories of Illarion.</p>

<?php Page::insert_go_to_top_link(); ?>
<h1>Java Development</h1>

<p>Using Java the software for the users is developed. This means all software that
is installed on the users computers. The Client, the easyNPC Editor and the MapEditor
are developed with Java.</p>

<ul>
	<li><a href="https://github.com/mkaring/Illarion-Java">Nitrams development branch</a> (main repository)
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h1>Server Development</h1>

<p>The server development is all around creating the C++ server that runs on the
Server of Illarion and takes care for the flow of the actual game.</p>

<ul>
	<li><a href="https://github.com/vilarion/Illarion-Server">Vilarions development branch</a> (main repository)
</ul>