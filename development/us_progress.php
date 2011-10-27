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
    <span style="color:#FF4500">Planned</span>,
    <span style="color:#D2691E">Work-In-Progress</span>,
    <span style="color:#FFA500">Testing</span>,
    <span style="color:green">Complete</span>
</p>

<h2>Content</h2>

<h3>Systems</h3>
<ul>
    <li><span style="color:#FFA500">Crafting</span></li>
    <li><span style="color:#FF4500">Gathering</span>: pharse</li>
    <li><span style="color:#D2691E">Fighting</span>: martin</li>
    <li><span style="color:#FFA500">Arcane Magic</span></li>
    <li><span style="color:#D2691E">Druids</span>: Jupiter</li>
    <li><span style="color:#FF4500">Factions</span>: Ardian</li>
</ul>

<h3>NPCs</h3>
<ul>
    <li><span style="color:#FF4500">Traders</span></li>
    <li><span style="color:#FFA500">Monsters</span></li>
    <li><span style="color:#FFA500">Guards</span>: pharse</li>
    <li><span style="color:#FFA500">Mules</span></li>
</ul>

<h3>Other</h3>
<ul>
    <li><span style="color:#FF4500">Tutorial</span></li>
    <li><span style="color:#D2691E">Magic Gems</span>: martin</li>
    <li><span style="color:#D2691E">Books</span>: Skamato</li>
    <li><span style="color:#D2691E">Quests</span></li>
</ul>
