<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Open Source Development', 'Overview'));
	Page::setDescription('This page contains references to Illarion\'s source code.');
	Page::setKeywords( array( 'Open Source', 'Source', 'Git', 'GitHub' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Opensource Development</h1>

<?php Page::cap('I'); ?>

<p>llarion is developed as Open Source Software. The sources of the Java software
are released under <a href="http://www.gnu.org/licenses/gpl.html">GPLv3</a>
while sources of server, maps and game content are released under
<a href="http://www.gnu.org/licenses/agpl.html">AGPLv3</a>.
All sources are free for public usage. This page offers a list of the
development repositories of Illarion.</p>

<?php Page::insert_go_to_top_link(); ?>
<h2>Game Content Development</h2>

<p>Game content are all quests, NPCs, monsters and e.g. the fighting system
or the bevaviour of items. Most of our content is written in Lua&nbsp;5.1 (plus an
<a href="https://raw.github.com/Illarion-eV/Illarion-Server/testserver/doc/luadoc.pdf">Illarion-specific extension</a>) with
the exception of almost all NPCs, which were created with our own language easyNPC.
The editor for easyNPC is available via the game's loader.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Content">Official development branch</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h2>Map Development</h2>

<p>Game world maps form the landscape in which all characters move around.
They describe tiles, items which form e.g. buildings and mountains, as well as
background music for each area. The map editor is available via the game's loader.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Map">Official development branch</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h2>Java Development</h2>

<p>Illarion's user applications are written in Java. These applications are those pieces of software which
may be installed on the user's computer. Client, easyNPC Editor, easyQuest Editor and Map Editor
are developed with Java.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Java">Official development branch</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<h2>Server Development</h2>

<p>Server development is all about creating the C++ server which runs on the
actual hardware. All clients connect to the server program, which essentially controls the game.</p>

<ul>
	<li><a href="https://github.com/Illarion-eV/Illarion-Server">Official development branch</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>