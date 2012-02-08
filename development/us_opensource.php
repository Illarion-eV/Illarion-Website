<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Open Source Development', 'Overview'));
	Page::setDescription('This page contains references to Illarion\'s source code.');
	Page::setKeywords( array( 'Open Source', 'Source', 'Git', 'GitHub' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Opensource Developent</h1>

<?php Page::cap('I'); ?>

<p>llarion is developed as Open Source Software. The sources of the Java software
and the server are released under <a href="http://www.gnu.org/licenses/gpl.html">GPLv3</a> and are thus free for public usage. This page
offers a list where you can find the current development repositories of Illarion.</p>

<?php Page::insert_go_to_top_link(); ?>
<h1>Java Development</h1>

<p>Illarion's user applications are written in Java. These applications are those pieces of software which
may be installed on the user's computer. Client, easyNPC Editor, easyQuest Editor and Map Editor
are developed with Java.</p>

<ul>
	<li><a href="https://github.com/mkaring/Illarion-Java">Nitrams development branch</a> (main repository)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h1>Server Development</h1>

<p>Server development is all about creating the C++ server which runs on the
actual hardware. All clients connect to the server program, which essentially controls the game.</p>

<ul>
	<li><a href="https://github.com/vilarion/Illarion-Server">Vilarions development branch</a> (main repository)</li>
</ul>
