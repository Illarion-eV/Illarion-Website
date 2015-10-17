<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Völker',
	'Diese Seite enthält einige Worte zu den Völkern Illarions.',
	'Völker, Rassen, Land', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'de_lizards.php','de_races.php','de_humans.php' ); ?>

<h1>Die Völker der Welt Illarion</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/de_humans.php">Menschen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_elves.php">Elfen</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_halflings.php">Halblinge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_dwarves.php">Zwerge</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_orcs.php">Orks</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/de_lizards.php">Echsenmenschen</a></li>
		<li class="end" />
	</ul>
</div>

<?php cap(M); ?>

<i><p>y dear nephew,</p>

<p>You are reading these lines, so it is very likely that my life has come to an end. I have been feeling a little ill lately, and people of my age tend to know when their time has come, thus I write you this letter. I have not gathered many riches, and only the odd keepsake and a few coins will come to you after the burial costs have been covered. I want to tell you, however, of this place I have come to love and call home these past seventeen years.</p>

<p><a href="http://illarion.org/illarion/us_world.php" class="eyecatcher">Illarion</a> is located beyond a dozen horizons across the Great Ocean, so you will indeed need to be prepared to sail by ship to reach this fascinating land. Don't worry about the cost of the trip, you will find a ticket in the small package which should have come with my letter, along with a few silver coins. Alas there may not be too many coins, but perhaps enough for you to start a new life over here as I heard your latest business venture did not turn out too well.</p>

<p>You will find <a href="http://illarion.org/illarion/us_world.php" class="eyecatcher">Illarion</a> vastly different to the lands of Albar, Salkamar and Gynk that you are familiar with. Three realms, <a href="http://illarion.org/illarion/us_factions.php#1" class="eyecatcher">Cadomyr</a>, <a href="http://illarion.org/illarion/us_factions.php#2" class="eyecatcher">Galmair</a> and <a href="http://illarion.org/illarion/us_factions.php#3" class="eyecatcher">Runewick</a> dominate the land but not only <a href="us_humans.php" class="eyecatcher">humans</a> like you and I live here. Stubborn <a href="us_dwarves.php" class="eyecatcher">dwarves</a> mine the Nameless Mountains and wise <a href="us_elves.php" class="eyecatcher">elves</a> inhabit the dense forests. In the southeast you will find a small and homely <a href="us_halflings.php" class="eyecatcher">halfling</a> settlement called Yewdale, whilst wild <a href="us_orcs.php" class="eyecatcher">orcs</a> roam the Kantabi Desert. Even some strange <a href="us_lizards.php" class="eyecatcher">lizards</a> folk who seem to hiss prayers all the time frequent these shores.</p>

<p>Know that this place can also be terribly dangerous at times though. I myself saw the huge fist of a golem at far closer proximity than one would ever wish for, and I must tell you it was a sight one never forgets. Also beware when searching ancient ruins for interesting artefacts, I have disturbed the occasional dried-up mummy. Do not expect these undead beings to stay asleep when you rummage around their coffins.</p>

<p>So, you can use the ticket, travel to <a href="http://illarion.org/illarion/us_world.php" class="eyecatcher">Illarion</a>, seek adventure, and start a new life, or just leave it be - the choice, dear nephew, is entirely yours.</p>

<p>In any case I wish you well my boy.</p>
<p>Your old uncle Todd</p></i>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
