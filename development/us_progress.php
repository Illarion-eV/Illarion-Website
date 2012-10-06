<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Development Progress' );
	Page::setDescription( 'This page shows the development progress of Illarion.' );

	Page::addCSS( 'onlineplayer' );

	Page::Init();
?>

<h1>Development Progress (VBU)</h1>

<p>
    Legend:
    <span style="font-weight:bold; color:#000000">Planned</span>,
    <span style="font-weight:bold; color:#8B0000">Work-In-Progress</span>,
    <span style="font-weight:bold; color:#285917">Testing</span>,
    <span style="font-weight:bold; color:#152B85">Complete</span>
</p>

<h2>Server</h2>

<ul>
    <li><span style="font-weight:bold; color:#152B85">Lua Binding</span></li>
    <li><span style="font-weight:bold; color:#152B85">Learning System</span></li>
    <li><span style="font-weight:bold; color:#152B85">Database Binding</span></li>
    <li><span style="font-weight:bold; color:#152B85">Client Protocol</span></li>
</ul>

<h2>Client</h2>

<ul>
    <li style="font-weight:bold; color:#152B85">Resource Management</li>
    <li style="font-weight:bold; color:#152B85">Server Protocol</li>
    <li style="font-weight:bold; color:#152B85">Sound And Music Handling</li>
    <li style="font-weight:bold; color:#152B85">Pathfinding</li>
    <li style="font-weight:bold; color:#285917">Session Management</li>
    <li style="font-weight:bold; color:#285917">Slick Graphic Engine Binding</li>
    <li style="font-weight:bold; color:#285917">Scene Graph Management</li>
    <li style="font-weight:bold; color:#8B0000">NiftyGUI Binding</li>
    <li style="font-weight:bold; color:#8B0000">User Input Management (mouse, keyboard)</li>
</ul>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Crafting</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Fighting</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Alchemy</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5791">Jupiter</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Gathering</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Factions</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5398">Ardian</a></li>
</ul>

<h3>Map</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Cities</span></li>
    <li><span style="font-weight:bold; color:#152B85">Dungeons</span></li>
    <li><span style="font-weight:bold; color:#152B85">Wilderness</span></li>
    <li><span style="font-weight:bold; color:#152B85">Tutorial</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Monsters</span></li>
    <li><span style="font-weight:bold; color:#285917">Guards</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Traders</span></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Treasure Maps</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Magic Gems</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Books</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=10083">Skamato</a></li>
    <li><span style="font-weight:bold; color:#8B0000">Quests</span></li>
    <li><span style="font-weight:bold; color:#152B85">Tutorial</span></li>
</ul>

<h2>Graphics</h2>

<h3>Characters</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Avatars</span></li>
    <li><span style="font-weight:bold; color:#285917">Paperdolling</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Monsters</span></li>
</ul>

<h3>Static</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Scenery</span></li>
    <li><span style="font-weight:bold; color:#152B85">Decoration</span></li>
    <li><span style="font-weight:bold; color:#152B85">Items</span></li>
    <li><span style="font-weight:bold; color:#152B85">Tiles</span></li>
</ul>

<h2>Homepage</h2>

<ul>
    <li><span style="font-weight:bold; color:#152B85">Character Generation</span></li>
    <li><span style="font-weight:bold; color:#8B0000">GM Tool</span></li>
</ul>