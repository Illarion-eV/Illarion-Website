<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Background - Client',
	'Races Illarions',
	'Background, Races, History', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'us_gnomes.php','us_story.php','us_goblins.php' ); ?>

<h1>Fairies</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/us_humans.php">Humans</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_elfes.php">Elfes</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_halflings.php">Halflings</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_dwarfs.php">Dwarfs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_orcs.php">Orcs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_lizards.php">Lizards</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_gnomes.php">Gnomes</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/us_faeries.php">Faeries</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_goblins.php">Goblins</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/fairy.png" alt="fairy"/></td></tr></table>
<?php cap(T); ?>
<p>he existance of fairies has been realised for a long time, but they have always hidden very well. Only sometimes spotted, they are known
to play usually harmless tricks and jokes on people. Because of their very small size and their ability to fly they can hide
very well in bushes and leaves.</p>

<p>Female fairies have multi–coloured wings, similar to butterflies' while the wings of males are often grassy or transparent. The use
of their astonishingly stable wings though looks more like that of a dragonfly, so they are able to stand still in the air even
against strong or quickly changing wind. Almost no creature can run as fast as a fairie can fly. The drawback on this is definitely
their minimal strength. Since they are very small and seem somewhat fragile too, they make very poor fighters in close combat.
Like Lizards, they can regrow every cut–off or maimed bodypart – especially the wings, which would regrow within less than two
weeks if cut off.</p>

<?php cap(A); ?>
<p> habit of a count in Albar has once been known to hunt and chain fairies, then cutting and selling their wings, but since fairies
are very rare in human lands, very few fairies were caught. He was killed after he suddenly combusted, whislt walking in public with
a powerful protective amulet around his neck, which burst into flames; after that, all his fairies were quickly released. It is said
that his daughter, who had befriended these creatures, became the only female albarian countess who was able to claim her father's
land as her own property.</p>

<?php cap(F); ?>
<p>airies seem to inhabit natural places, mainly deep woods. It is said that they like to dwell near elven settlements, both races
seem to get along with each other. In fact, both races seem to have been allies for a long time. Even though
fairies usually do not get too old – in the eyes of an elf, about four centuries doesn't seem to be a very long time – both
races seem to understand, respect and like each another quite well.</p>

<p>Fairies do not know the heritage of noble titles. Unlike elves however, they call their actual rulers kings and queens,
they are always a couple – unmarried fairies never become rulers. The „nobles“ forming the court did not inherit their titles, and
were granted the honor of such a title from their royal couple after having earned it. Different from
humans, such nobles do not own any land since fairies are convinced that land cannot be owned. Because of this, they often
think of humans as very stupid beings.</p>

<?php cap(L); ?>
<p>ike elves, the fairies have generally a good understanding of nature and life, usually they respect every living being.
Their religion is usually that of the elves, although some are known to follow the ideals of younger gods too, especially Adron.
Like elves, they hate unnatural things like smelly undead or mean things like dangerous demons. They are naturally talented
spellcasters. Even though they often seem to get bored and loose concentration if they have to study for too long, their natural
talent and curiosity are high.</p>

<p>Commonly, fairies like to have fun and are very curious, but also careful and easily scared. They are known to never forget if
someone treated them well or badly, and to always repay what they owe to their debtors. Farmers who live near forests which are
inhabited by fairies, may find a golden coin or two in times of need when they or their ancestors were friendly to a fairie,
but it is also rumored that a farmer who once tried to betray a fairie, had some problems with the growth of enormous
thistles and stinging nettles on his fields from then on.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
