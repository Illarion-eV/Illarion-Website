<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Races',
	'This page will provide you with a short resume of the races of Illarion.',
	'races, people, land', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'us_lizards.php','us_races.php','us_humans.php' ); ?>

<h1>Races of the world Illarion</h1>

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

<?php cap(G); ?>

<i><p>reetings, my nephew.
You are reading these lines, so it is very likely that my life has come to an end. I have been a little ill lately, and people of my age tend to feel it when their time has come, thus I am writing this letter. I have not gathered many riches, and only a few things and some copper coins will remain after the burial costs have been covered. But I like to tell you about the place I came to like, and where I lived over the last seventeen years.</p>

<p>Illarion is a land unlike every other I have come across in all my wanderings. Unlike those cities in Albar or Salkamar which you might have seen, and not only <a href="us_humans.php" class="eyecatcher">humans</a> like me and you do live here. You will also find stubborn <a href="us_dwarves.php" class="eyecatcher">dwarves</a>, <a href="us_elves.php" class="eyecatcher">elves</a>, cozy <a href="us_halflings.php" class="eyecatcher">halflings</a> and sometimes wild <a href="us_orcs.php" class="eyecatcher">orcs</a> - and even these strange <a href="us_lizards.php" class="eyecatcher">lizard</a> folk people who seem to hiss prayers all over the time.</p> 

<p>Illarion is located beyond dozens of horizons, so you will indeed have to travel by ship to reach this interesting land. Don't worry about the costs of the trip, you will find a ticket in the small package which should have come with my letter, along with a few copper coins. Those may not be many, but perhaps enough for you to start a new life over here - as far as I heard, your business did not turn out to go far too well anyhow.</p>

<p>So you will find a small <a href="us_halflings.php" class="eyecatcher">halfling</a> settlement called Yewdale in the west of this land, a few <a href="us_orcs.php" class="eyecatcher">orcs</a> in the scorching Kantabi desert, a <a href="us_orcs.php" class="eyecatcher">dwarven</a> mine is in the mountains just a few miles away from here, and there is even a <a href="us_elves.php" class="eyecatcher">elven</a> outpost in a dark forest nearby. Where to find the <a href="us_lizards.php" class="eyecatcher">lizards</a> I do not know, but I'd start my search at the shore.</p>

<p>Know that this place might be dangerous sometimes. I myself saw the huge club of an ogre from a far lesser distance than I ever wanted, and I must tell you it was a sight one hardly ever forgets. And when searching those old ruins for interesting artifacts, I disturbed the one or other dried-up mummy. Do not expect these undead things to stay asleep when you approach their coffins. So, you can use the ticket, travel to Illarion, start a new life, or just leave it be - the choice, dear nephew, is up to you.</p>

<p>Yours sincerly,</br>
Your old uncle Todd</i></p>
	
<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
