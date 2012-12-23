<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( ' A free online roleplaying game' );
	Page::setDescription( 'Illarion is a free online roleplaying game within a middle age fantasy setting with focus on real roleplay.' );
	Page::setKeywords( array( 'Startpage', 'News' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Welcome to the world of Illarion!</h1>

<p style="font-weight:bold">Illarion is currently updated to a new version.
Please look at the news to keep track on the status of this update.</p>

<?php Page::cap('I'); ?>
<p>llarion is a free, online roleplaying game with a high fantasy setting. The 
game is maintained and developed by a group of volunteers who are dedicated to 
providing the community with a true roleplaying experience. Within our world, a 
character is more than just an avatar; they are real people, living out their 
lives. As an Illarion player, it is your role to breathe that life into your 
character.</p>

<p>The decisions that you make while playing Illarion will actually impact and 
shape the world around you. Your actions will determine the events that will one 
day fill the pages of Illarion's history books. All of the characters that you 
shall encounter during your time here are just like yours: living, breathing 
inhabitants of this mysterious world. Each character has their own past, goals, 
flaws, strengths and personality. You will come across countless unique and 
interesting individuals: soldiers, merchants, elves and lizardmen. What role 
will you play? Your character is limited only by the bounds of your 
imagination.</p>

<p>Perhaps you will infiltrate the lowly ranks of a thieves guild, worming your 
way up through the organisation, only to bring it crumbling down around you from 
within. Perhaps you will be a devout priest, driven to convert new followers to 
one of the many gods in Illarion's diverse pantheon. Or perhaps you will become 
a feared warrior, fighting for glory, honour or just filthy lucre.</p>

<p>Illarion is currently nearing the release of the so-called "Very Big Update" 
(VBU). This update will completely overhaul the current game engine, greatly 
expanding the map, while adding countless new features, reworking many of the 
existing systems, and fixing numerous long-term bugs and issues. In order to 
bring you the VBU before the end of this year, the majority of development 
resources have been diverted away from the current build of Illarion. While 
necessary bugfixes will be implemented, it is possible that you will still 
encounter issues while playing. If so, we encourage you to join us in the 
official Illarion chat, where live assistance is generally available.</p>

<p class="center">
	<a href="<?php echo Page::getURL(); ?>/general/map_of_illarion.jpg" style="margin-right:20px;">
		<img src="<?php echo Page::getCurrentURL(); ?>/general/t_map_of_illarion.jpg" width="120" height="85" alt="Map of Illarion" />
	</a>
	<a href="<?php echo Page::getURL(); ?>/general/map_of_gobaith.jpg" style="margin-left:20px;">
		<img src="<?php echo Page::getCurrentURL(); ?>/general/t_map_of_gobaith.jpg" width="120" height="85" alt="Map of Gobaith" />
	</a>
	<br />
	<span style="margin-right:20px;">Map of Illarion</span>
	<span style="margin-left:20px;">Map of Gobaith</span>
</p>

<?php Page::insert_go_to_top_link(); ?>

<h1>News</h1>

<?php News::show( News::load_from_db( 'DESC', 3, 0 ), 'html' ); ?>
