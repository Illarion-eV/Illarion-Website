<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Development Progress' );
	Page::setDescription( 'This page shows the development progress of Illarion.' );

	Page::addCSS( 'dev_progress' );

	Page::Init();
?>

<h1>Development Progress (VBU)</h1>

<p>
    Legend:
    <span class="planned">Planned</span>,
    <span class="inProgress">Work-In-Progress</span>,
    <span class="testing">Testing</span>,
    <span class="done">Complete</span>
</p>

<h2>Server</h2>

<ul>
    <li><span class="done">Lua Binding</span></li>
    <li><span class="done">Learning System</span></li>
    <li><span class="done">Database Binding</span></li>
    <li><span class="done">Client Protocol</span></li>
</ul>

<h2>Client</h2>

<ul>
    <li class="done">Resource Management</li>
    <li class="done">Server Protocol</li>
    <li class="done">Sound And Music Handling</li>
    <li class="done">Pathfinding</li>
    <li class="done">Slick Graphic Engine Binding</li>
    <li class="done">NiftyGUI Binding</li>
    <li class="done">User Input Management (mouse, keyboard)</li>
    <li class="done">Scene Graph Management</li>
    <li class="inProgress">Session Management</li>
</ul>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span class="done">Crafting</span></li>
    <li><span class="done">Fighting</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span class="testing">Alchemy</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5791">Jupiter</a></li>
    <li><span class="done">Gathering</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span class="done">Factions</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=5398">Ardian</a></li>
</ul>

<h3>Map</h3>
<ul>
    <li><span class="done">Cities</span></li>
    <li><span class="done">Dungeons</span></li>
    <li><span class="done">Wilderness</span></li>
    <li><span class="done">Tutorial</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span class="done">Monsters</span></li>
    <li><span class="done">Guards</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
    <li><span class="inProgress">Traders</span></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span class="done">Treasure Maps</span></li>
    <li><span class="done">Magic Gems</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=1226">martin</a></li>
    <li><span class="done">Books</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=10083">Skamato</a></li>
    <li><span class="inProgress">Quests</span></li>
    <li><span class="done">Tutorial</span></li>
</ul>

<h2>Graphics</h2>

<h3>Characters</h3>
<ul>
    <li><span class="done">Avatars</span></li>
    <li><span class="done">Paperdolling</span></li>
    <li><span class="done">Monsters</span></li>
</ul>

<h3>Static</h3>
<ul>
    <li><span class="done">Scenery</span></li>
    <li><span class="done">Decoration</span></li>
    <li><span class="done">Items</span></li>
    <li><span class="done">Tiles</span></li>
</ul>

<h2>Homepage</h2>

<ul>
    <li><span class="done">Character Generation</span></li>
    <li><span class="inProgress">GM Tool</span></li>
</ul>