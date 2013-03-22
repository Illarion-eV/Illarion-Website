<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
	create_header( 'Illarion - Background - Client',
	'Races Illarions',
	'Background, Races, History', '', 'menu', '', true );
	include_header();
?>

<?php navBarTop( 'us_faeries.php','us_story.php','' ); ?>

<h1>Goblins</h1>

<div class="menu">
	<ul class="menu_top">
		<li><a href="<?php echo $url; ?>/illarion/races/us_humans.php">Humans</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_elfes.php">Elfes</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_halflings.php">Halflings</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_dwarfs.php">Dwarfs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_orcs.php">Orcs</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_lizards.php">Lizards</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_gnomes.php">Gnomes</a></li>
		<li><a href="<?php echo $url; ?>/illarion/races/us_faeries.php">Faeries</a></li>
		<li class="selected"><a href="<?php echo $url; ?>/illarion/races/us_goblins.php">Goblins</a></li>
		<li class="end" />
	</ul>
</div>

<table class="center"><tr><td><img src="<?php echo $url; ?>/shared/pics/races/goblin_m.png" alt="male goblin"/></td><td> </td><td><img src="<?php echo $url; ?>/shared/pics/races/goblin_f.png" alt="female goblin"/></td></tr></table>
<?php cap(T); ?>
<p>he race of the goblin race seems to be somewhat related to orcs, although Goblins seem faster, a bit more agile and a tad smarter.
They have big eyes, ears and mouths, and their whole body is covered with short fur while their faces have a somewhat leathery,
greenish or brownish skin. Their voices are commonly squeaky, and some are known to cry annoyingly loud if anything frightening or
mean happens.</p>

<p>Goblins are small, not very strong and have average intellegence. They usually live in a sort of loose family clan and their
type of leadership varies. Goblins are not evil, and really dislike all „boring” types of religions, but they have a bad sense
for fashion and an almost orcish respect for hygiene. They tend to eat things which no other creature would ever touch
and they can have a liking for pokey things like simple spears and rusty short swords.</p>

<?php cap(S); ?>
<p>ometimes, goblins are caught and enslaved by orcish tribes, therefore they usually tend to be quite afraid of orcs. In fact,
goblins can be afraid of most things except Halflings, which they really adore for their cooking skills. Their acute
sense of smell and taste as well as their dexterious fingers can make them talented Alchemists, craftsmen or thiefs, if they can
concentrate long enough to learn something. They do not make talented spellcasters or mages usually, but a few are known to have
mastered magic, although this seems quite rare. Actually, a high lor–angurian arch mage is a goblin, and said to be very wise –
but how he ever reached that position is a saga in itself.</p>

<?php cap(G); ?>
<p>oblins have no towns or likewise, but live in small settlements which can be commonly found everywhere. Sometimes such
settlements can become dangerous and develop bandit–like habits, which is a reason why goblins are generally disliked.</p>

<p>In Albar, Goblins are famous for their pit–fights against other animals. More intelligent
ones can sometimes be found as slaves or, because of their acute smell, as a kind of hunting dog.</p>

<p>Some more civilized goblins even live in Gynkese or sometimes Salkamaerian towns amongst humans. These civilised ones often
work as astonishingly well–mannered and gentle Servants, messengers, gifted merchants or even as respected Alchemists.</p>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>
