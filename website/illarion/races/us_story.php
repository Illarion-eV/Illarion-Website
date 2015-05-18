<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Races',
	'This page will provide you with a short resume of the races of Illarion.',
	'races, people, land', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'us_lizards.php','us_story.php','us_humans.php' ); ?>

<h1>Races of the world</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/us_humans.php">Humans</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_elves.php">Elves</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_halflings.php">Halflings</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_dwarves.php">Dwarves</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_orcs.php">Orcs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_lizards.php">Lizards</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center">
<tr>
<td><img src="<?php echo $url; ?>/shared/pics/races/human_m.png" alt="male human"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/human_f.png" alt="female human"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/elf_m.png" alt="male elf"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/elf_f.png" alt="female elf"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/halfling_m.png" alt="male halfling"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/halfling_f.png" alt="female halfling"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/dwarf_m.png" alt="male dwarf"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/dwarf_f.png" alt="female dwarf"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/orc_m.png" alt="male orc"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/orc_f.png" alt="female orc"/></td>
<td> </td>
<td><img src="<?php echo $url; ?>/shared/pics/races/lizard.png" alt="lizard"/></td>
</tr>
</table>

<?php cap(A); ?>

<p>n eagle is escalating higher and higher into the sky above Illarion. In search of prey, it
scans the vast lands. It sees the Nameless Mountains, seemingly touching the firmament with their
jagged peaks and snowcapped summits, guarding the wealthy merchant town of <a href="http://illarion.org/illarion/us_factions.php#2" class="eyecatcher">Galmair</a>. With its sharp eyes it recognizes the hidden entrances to
the great Hammefall mines of the <a href="us_dwarves.php" class="eyecatcher">dwarves</a>, who dug deep into the heart of the mountain ranges to rob the
cold stone of its most precious treasures.</p>

<p>The howling of the wolf packs is accompanying the eagle who is gliding down the flanks of the
Nameless Mountains into the Sentry Forest. Here and there a group of Eldan Oaks rises above
the continuous cover of tree tops and in the thick netting of branches the <a href="us_elves.php" class="eyecatcher">elven</a> dwellings are
hard to recognize, as their existence seldom leaves marks in the untouched nature.</p>

<p>Further on the eagle flies and on its way the mountains are replaced by a gentle rolling
hilly landscape of Yewdale, only intermittent by the Anthil Brook, slowly streaming towards the sea. In this
fertile area to the feet of the towers of the mysterious city of <a href="http://illarion.org/illarion/us_factions.php#3" class="eyecatcher">Runewick</a>, the cottages of the <a href="us_halflings.php" class="eyecatcher">halflings</a> can be found, whose dwellings are surrounded by well maintained gardens and fields.</p>

<?php cap(E); ?>

<p>re long the eagle reaches the endless wastelands and inhospitable Kantabi desert. Few and far
between a column of smoke rises into the sky, testifying the dwellings and campgrounds of the
<a href="us_orcs.php" class="eyecatcher">orcs</a>. Their battle cries echo far across the plains and everyone hearing their shouts is well
advised to enter their realm with great care.</p>

<p>Finally the eagle reaches the windswept coast and comes across the big city of the proud
<a href="us_humans.php" class="eyecatcher">humans</a> of <a href="http://illarion.org/illarion/us_factions.php#1" class="eyecatcher">Cadomyr</a>, on which walls and battlements the flags flap in the wind. Between the towers and roofs it recognizes the buzz of activity filling the market place and the sunbeams are reflected by
the armour of the knights riding on horse back and trying to find their way through the crowd.</p>

<p>Starting from the harbour the eagle follows the huge merchant ships setting out on their
perilous trips across the sea. Above the rolling waves it recognizes the dim outline of the
great praying halls, which were built by the Lizardmen deep below the surface. They live in an
element which is alien to the eagle and while it circles in the sky the <a href="us_lizards.php" class="eyecatcher">lizardmen</a> are gliding
gently through the sea and only their glistening scales can sometimes be seen through the
water.</p>

<?php cap(T); ?>

<p>he world of Illarion is filled with unexplainable wonders and mysterious places, unutterable
horrors and dangerous locations. Out of the dark past demons and monsters arise, longing for the
lives of the mortals. Therefore it is not astonishing that in this magical world in which
everyone's destiny is fading, the races seek refuge and comfort with the <a href="http://illarion.org/illarion/goetter/us_bck_10.php" class="eyecatcher">Gods</a>. Sixteen deities
determine the life in Illarion and exert influence on everything that proves to be beneficial to
them. In consequence, wars have been started and reconciled, whole families seized power and were
overthrown. May it be that there are a few madmen who renounce their existence and defy their
will, but there is no god, who is unaware of the existence of each living being, no matter how
insignificant. It would be unwise to ignore such facts.</p>

<p>For the eagle this world is truly alien. Nevertheless it continues to circle above Illarion.
But from far up in the sky, it enjoys the broad view of all places and with its sharp eyes it can
see everything happening on this world.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
