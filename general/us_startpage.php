<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( ' A free online roleplaying game' );
	Page::setDescription( 'Illarion is a free online roleplaying game within a middle age fantasy setting with focus on real roleplay.' );
	Page::setKeywords( array( 'Startpage', 'News' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Welcome to the world of Illarion!</h1>

<?php Page::cap('I'); ?>
<p>llarion is a free, graphical fantasy game that focuses on true roleplaying. Come and
join the world of Illarion. You'll fully immerse yourself in this world, as though your
character is a real being. All of the characters around you will behave as real people
in this independent, mysterious world. They'll tell you about magicians, ghosts and
fairies in some of the most undeliverable stories and rumors. Pick a race you would like
to play: human, dwarf, halfling, elf? Maybe an orc? Or even a lizardman?</p>

<p>Please don't expect experience points or other numbers inside the game which reveal
your skills. Just follow the role you want to play, in time you will see whether you
become a great warrior, fighting against the various evils of Illarion, or the most
respected master smith of the town. Perhaps even the most popular barkeeper because
practice makes perfect. Druids and magicians will cast mysterious spells with herbs and
runes. In addition to all of this, each race speaks its own language but all are able
to speak the common language of Illarion to make themselves understood.</p>

<p>We are offering our own server, a Java client (which can be used with Linux or
Windows) and the guarantee that you will never, ever, pay anything for this game. To
ensure this we founded a registered society and it became contractual in the statute.
Illarion has been online since February 2000 and is always being developed by
programmers and volunteers to satisfy the wishes of the player community.</p>

<p>Even you can't resist the magic of this world!</p>

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
