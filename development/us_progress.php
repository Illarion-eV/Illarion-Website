<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Development Progress' );
	Page::setDescription( 'This page shows the development progress of Illarion.' );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Development Progress (VBU)</h1>

<p>
    Legend:
    <span style="color:maroon">Planned</span>,
    <span style="color:purple">Work-In-Progress</span>,
    <span style="color:navy">Testing</span>,
    <span style="color:green">Complete</span>
</p>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span style="color:navy">Crafting</span></li>
    <li><span style="color:maroon">Gathering</span>: pharse</li>
    <li><span style="color:purple">Fighting</span>: martin</li>
    <li><span style="color:navy">Arcane Magic</span></li>
    <li><span style="color:purple">Druids</span>: Jupiter</li>
    <li><span style="color:maroon">Factions</span>: Ardian</li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="color:maroon">Traders</span></li>
    <li><span style="color:navy">Monsters</span></li>
    <li><span style="color:navy">Guards</span>: pharse</li>
    <li><span style="color:navy">Mules</span></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span style="color:maroon">Tutorial</span></li>
    <li><span style="color:purple">Magic Gems</span>: martin</li>
    <li><span style="color:purple">Books</span>: Skamato</li>
    <li><span style="color:purple">Quests</span></li>
</ul>
