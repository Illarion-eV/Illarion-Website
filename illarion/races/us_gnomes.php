<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Background - Client',
	'Races Illarions',
	'Background, Races, History', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'us_lizards.php','us_story.php','us_faeries.php' ); ?>

<h1>Gnomes</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/us_humans.php">Humans</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_elfes.php">Elfes</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_halflings.php">Halflings</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_dwarfs.php">Dwarfs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_orcs.php">Orcs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_lizards.php">Lizards</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/us_gnomes.php">Gnomes</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_faeries.php">Faeries</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_goblins.php">Goblins</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/gnome_m.png" alt="male gnome"/></td><td> </td><td><img src="<?php echo $url; ?>/shared/pics/races/gnome_f.png" alt="female gnome"/></td></tr></table>
<?php cap(G); ?>
<p>nomes are somewhat related to dwarves. Although much thinner, a bit smaller and weaker than halflings, they are
intelligent, agile and very good at crafting mechanical things. Usually they do not make good thieves due to their philosophical views.
Their noses are somewhat big, and they have a liking for long names. It is common that male
gnomes have three to four first names.</p>

<p>Gnomish clothes have usually more practical than decorative use. Gnomes love to dwell under the surface, in fact they prefer
living in a kind of mine, although not as big and deep as dwarven ones. Gnomish homes tend to have their walls
painted with bright clay.</p>

<?php cap(G); ?>
<p>nomes have a liking for strange mechanical contraptions. Their caves and mines are often equipped with complicated devices composed
of wooden gears, frames and ropes just for the sake of getting water out of a well, and they are known to produce the most
effective, but also most complicated and sometimes quite self destructive siege engines in whole world.</p>

<p>Gnomes don't generally live in the mountains like dwarves do, and unlike dwarves, they even have a liking for magical things. Some
gnomes are very talented illusonists. Although it is common that magic – except for illusions – is not liked to be seen as
entertainment, gnomish illusionists are welcomed on every big official celebration. In fact, gnomes are the only non–human
race who can travel through Albar without having to suffer from too many prejudices or even discriminations, mainly only because
the albarian nobles would not like to see their well–paid party attraction unable to perform their tasks.</p>

<p>Gnomes often pray to Irmorom like dwarves do, but they usually are not very religious. Most gnomes are convinced that
everything can be done without the help of mythical creatures and by the use of the own intelligence, but there have even been
some who became priests or priestesses of the younger gods. Male and female gnomes are equal in society.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
