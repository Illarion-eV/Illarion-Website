<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'The Free Online Roleplaying Game' );
	Page::setDescription( 'Illarion is a free online roleplaying game within a middle age fantasy setting with focus on real roleplay.' );
	Page::setKeywords( array( 'Startpage', 'News' ) );
	Page::addCSS( array( 'lightwindow', 'lightwindow_us' ) );
	Page::addJavaScript( array( 'prototype', 'effects', 'lightwindow' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Welcome to Illarion!</h1>

<?php Page::cap('T'); ?>
<p class="hyphenate">
he world is in turmoil. The Second Coming of the Elder Gods has shaken the
realms to their core. Refugees flock to the bastions of the land Illarion
that were spared from the hardships of the past. Six gems of power were
given to the Lords of these bastions for safekeeping; but jealousy,
betrayal and envy are the ever present scourges in the constant struggle
for power. Noble <a href="/illarion/us_factions.php#1">Cadomyr</a>, wealthy 
<a href="/illarion/us_factions.php#2">Galmair</a> or wise 
<a href="/illarion/us_factions.php#3">Runewick</a> - whose side will you join?</p>

<div style="width:auto;margin:0 auto;text-align:center;float:right;padding:9px 0px 0px 12px">
	<a style="margin:auto;" href="<?php echo Page::getURL(); ?>/general/us_map_of_illarion.jpg" title="Map of Illarion" rel="Map of Illarion" class="lightwindow" onclick="return false;">
		<img src="<?php echo Page::getURL(); ?>/general/us_thumb_map_of_illarion.jpg" width="121" height="100" alt="Map of Illarion. Click here to see it in full size." />
	</a>
</div>

<p class="hyphenate">
Illarion is a free open source MMORPG that focuses on true role playing.
All of the characters that you will encounter during your time here are
living, breathing inhabitants of this mysterious world. Each character has
their own past, goals, flaws, strengths and personality. Experience
glorious adventures as a noble knight or live the life of a hardworking
craftsman, acquisitive merchant, or charismatic priest of the gods.</p>

<p class="hyphenate">
Illarion combines a high fantasy setting with a persistent game world. The
decisions that you make while playing Illarion will actually impact and
shape the world around you. Your actions will determine the events that will
one day fill the pages of Illarion's history books. You won't be able to
resist the magic of this world.</p>

<p>Illarion - What role will you play?</p>

<?php Page::insert_go_to_top_link(); ?>

<h1>News</h1>

<?php
$newsRenderer = new \News\Renderer\HTMLRenderer(IllaUser::auth('news'));
$newsDb = new \News\NewsDatabase();
echo $newsRenderer->renderList($newsDb->getNewsList(3), 'en')
?>
