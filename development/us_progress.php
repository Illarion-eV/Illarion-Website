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
    <span style="font-weight:bold; color:#8B0000">Planned</span>,
    <span style="font-weight:bold; color:#FF4500">Work-In-Progress</span>,
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
    <li style="font-weight:bold; color:#152B85">Resource management</li>
    <li style="font-weight:bold; color:#152B85">Server Protocol</li>
    <li style="font-weight:bold; color:#152B85">Sound- und Music handling</li>
    <li style="font-weight:bold; color:#152B85">Pathfinding</li>
    <li style="font-weight:bold; color:#285917">Session management</li>
    <li style="font-weight:bold; color:#285917">Slick-Graphicengine binding</li>
    <li style="font-weight:bold; color:#285917">Szene graph management</li>
    <li style="font-weight:bold; color:#FF4500">NiftyGUI binding</li>
    <li style="font-weight:bold; color:#FF4500">User input management (mouse, keyboard)</li>
</ul>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Crafting</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Fighting</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Alchemy</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5791">Jupiter</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Gathering</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Factions</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5398">Ardian</a></li>
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
    <li><span style="font-weight:bold; color:#285917">Mules</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Traders</span></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span style="font-weight:bold; color:#152B85">Treasure Maps</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Magic Gems</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Books</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=10083">Skamato</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Quests</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Tutorial</span></li>
</ul>

<h2>Graphics</h2>

<h3>Characters</h3>
<ul>
    <li><span style="font-weight:bold; color:#285917">Avatars</span></li>
    <li><span style="font-weight:bold; color:#285917">Paperdolling</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Monsters</span></li>
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
    <li><span style="font-weight:bold; color:#FF4500">GM Tool</span></li>
</ul>
