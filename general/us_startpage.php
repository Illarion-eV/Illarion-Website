<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'The Free Online Roleplaying Game' );
	Page::setDescription( 'Illarion is a free online roleplaying game within a middle age fantasy setting with focus on real roleplay.' );
	Page::setKeywords( array( 'Startpage', 'News' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Welcome to Illarion!</h1>

<p style="font-weight:bold">Illarion is currently being updated to a new version.
Please have a look at the news to keep track of the status of this update.</p>

<?php Page::cap('T'); ?>
<p>he world is in turmoil. The Second Coming of the Elder Gods has shaken the
    realms to their core. Refugees flock to the bastions of the land Illarion
    that were spared from the hardships of the past. Six gems of power were
    given to the Lords of these bastions for safekeeping; but jealousy,
    betrayal and envy are the ever present scourges in the constant struggle
    for power.</p>

<p>Illarion is a free online roleplaying game that focuses on true role playing.
    All of the characters that you will encounter during your time here are
    living, breathing inhabitants of this mysterious world. Each character has
    their own past, goals, flaws, strengths and personality. Experience
    glorious adventures as a noble knight or live the life of a hardworking
    craftsman, acquisitive merchant, or charismatic priest of the gods.</p>

<p>Illarion combines a high fantasy setting with a persistent game world. The
    decisions that you make while playing Illarion will actually impact and
    shape the world around you. Your actions will determine the events that will
    one day fill the pages of Illarion's history books. You won't be able to
    resist the magic of this world.</p>

<p>Illarion - What role will you play?</p>

<?php Page::insert_go_to_top_link(); ?>

<h1>News</h1>

<?php News::show( News::load_from_db( 'DESC', 3, 0 ), 'html' ); ?>
