<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'The Free Online Roleplaying Game' );
	Page::setDescription( 'Illarion is a free online roleplaying game within a middle age fantasy setting with focus on real roleplay.' );
	Page::setKeywords( array( 'Startpage', 'News' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_us', 'onlineplayer' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
	
	$xmlC = new XmlC( 'UTF-8' );
	$xml_file = file_get_contents( Page::getRootPath().'/illarion/screenshots_start.xml' );
	$xmlC->Set_XML_data( $xml_file );
	
?>

<h1>Concept</h1>

<h3>The World Illarion</h3>
<p class="hyphenate">A mature high fantasy setting where elves meet orcs is placed in a persistent, open world with tangible lore. Sixteen gods are worshipped by the citizens of three factions.</p>

<h3>Your Adventure</h3>
<p class="hyphenate">The decisions you take will impact and shape the world around you. Your actions will determine the events that one day fill the pages of Illarion's history books. Immerse yourself and let your character become what you want.</p>

<h3>No limits</h3>
<p class="hyphenate">Your character won't be locked inside a fixed class design like most MMORPGs do. You'll be able to sculpt your own character and its destiny is limited only by your choices, imagination, and game rules. The game features a skill-based levelling system, allowing players to compel their own unique gaming experience.</p>

<h3>Free and open source</h3>
<p class="hyphenate">Illarion is free to play without any cost. The game is run by a non-profit organisation and is maintained by a staff of highly motivated volunteers without financial reimbursement. The client, server and game code is open source and released under the licences GPLv3 and AGPLv3.</p>

<h3>Immersive mechanics</h3>
<p class="hyphenate">The game mechanics employed keep the balance between complexity, innovation and motivation of players. Illarion shows a classic, slow-paced gameplay with isometric retro graphics while still using modern technologies.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>