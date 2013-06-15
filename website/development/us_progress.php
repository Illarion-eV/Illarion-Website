<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Development Progress' );
	Page::setDescription( 'This page shows the development progress of Illarion.' );

	Page::addCSS( 'dev_progress' );

	Page::Init();
?>

<h1>Development Progress</h1>

<p>
    Legend:
    <span class="planned">Planned</span>,
    <span class="inProgress">Work-In-Progress</span>,
    <span class="testing">Testing</span>,
    <span class="done">Complete</span>
</p>

<h2>Server</h2>
<ul>
    <li><span class="inProgress">Removal of Luabind</span></li>
    <li><span class="inProgress">Test Suite</span></li>
    <li><span class="inProgress">Efficient data structures for character search</span></li>
    <li><span class="planned">Notification about available quests</span></li>
    <li><span class="planned">New login procedure</span></li>
    <li><span class="planned">Character creation</span></li>
    <li><span class="planned">Provide Debian package (.deb)</span></li>
</ul>

<h2>Client</h2>
<ul>
    <li><span class="inProgress">Session management</span></li>
    <li><span class="planned">Display of available quests</span></li>
    <li><span class="planned">New login procedure</span></li>
    <li><span class="planned">Character creation</span></li>
</ul>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span class="inProgress">Balancing crafting</span></li>
    <li><span class="planned">Magic</span></li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span class="inProgress">Dynamic guards</span>: <a href="http://illarion.org/community/forums/memberlist.php?mode=viewprofile&u=7216">pharse</a></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span class="inProgress">Quests</span></li>
    <li><span class="inProgress">Quest logs</span></li>
</ul>

<h2>Homepage</h2>
<ul>
    <li><span class="inProgress">GM Tool</span></li>
    <li><span class="inProgress">Migration to CMS Drupal</span></li>
</ul>
