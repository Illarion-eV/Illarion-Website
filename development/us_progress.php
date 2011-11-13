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
    <span style="font-weight:bold; color:#FFA500">Testing</span>,
    <span style="font-weight:bold; color:green">Complete</span>
</p>

<h2>Server</h2>

<ul>
    <li><span style="font-weight:bold; color:green">Lua Binding</span></li>
    <li><span style="font-weight:bold; color:green">Learning System</span></li>
    <li><span style="font-weight:bold; color:green">Database Binding</span></li>
    <li><span style="font-weight:bold; color:green">Client Protocol</span></li>
</ul>

<h2>Client</h2>

<ul>
    <li style="font-weight:bold; color:green">Resource management</li>
    <li style="font-weight:bold; color:green">Server Protocol</li>
    <li style="font-weight:bold; color:green">Sound- und Music handling</li>
    <li style="font-weight:bold; color:green">Pathfinding</li>
    <li style="font-weight:bold; color:#FFA500">Session managment</li>
    <li style="font-weight:bold; color:#FF4500">Slick-Graphicengine binding</li>
    <li style="font-weight:bold; color:#FF4500">NiftyGUI binding</li>
    <li style="font-weight:bold; color:#FF4500">User input management (mouse, keyboard)</li>
    <li style="font-weight:bold; color:#FF4500">Szene graph management</li>
</ul>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span style="font-weight:bold; color:#FFA500">Crafting</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Fighting</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Druids</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5791">Jupiter</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Gathering</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Factions</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5398">Ardian</a></li>
</ul>

<h3>Map</h3>
<ul>
    <li><span style="font-weight:bold; color:green">Cities</span></li>
    <li><span style="font-weight:bold; color:green">Dungeons</span></li>
    <li><span style="font-weight:bold; color:green">Wilderness</span></li>
    <li><span style="font-weight:bold; color:green">Tutorial</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="font-weight:bold; color:#FFA500">Monsters</span></li>
    <li><span style="font-weight:bold; color:#FFA500">Guards</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span style="font-weight:bold; color:#FFA500">Mules</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Traders</span></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span style="font-weight:bold; color:green">Treasure Maps</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Magic Gems</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Books</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=10083">Skamato</a></li>
    <li><span style="font-weight:bold; color:#FF4500">Quests</span></li>
    <li><span style="font-weight:bold; color:#8B0000">Tutorial</span></li>
</ul>

<h2>Graphics</h2>

<h3>Characters</h3>
<ul>
    <li><span style="font-weight:bold; color:#FFA500">Avatars</span></li>
    <li><span style="font-weight:bold; color:#FFA500">Paperdolling</span></li>
    <li><span style="font-weight:bold; color:#FF4500">Monsters</span></li>
</ul>

<h3>Static</h3>
<ul>
    <li><span style="font-weight:bold; color:green">Scenery</span></li>
    <li><span style="font-weight:bold; color:green">Decoration</span></li>
    <li><span style="font-weight:bold; color:green">Items</span></li>
    <li><span style="font-weight:bold; color:green">Tiles</span></li>
</ul>

<h2>Homepage</h2>

<ul>
    <li><span style="font-weight:bold; color:green">Character Generation</span></li>
    <li><span style="font-weight:bold; color:#FF4500">GM Tool</span></li>
</ul>
