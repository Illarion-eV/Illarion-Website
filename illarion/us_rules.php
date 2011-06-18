<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Rules' );
	Page::setDescription( 'On this page you find links to all rule sets of this '
		. 'game.' );
	Page::setKeywords( array( 'rules', 'regulations' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/us_rules.php');
	Page::setNextPage(Page::getURL() . '/illarion/us_rules_1.php');
	Page::setLastPage(Page::getURL() . '/illarion/us_rules_3.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Rules</h1>

<?php Page::cap('O'); ?>
<p>n this page you can find all the rules and procedures that apply to Illarion.
They should cover most situations in Illarion. In case of doubts, contact a
Gamemaster. They know the rules by heart, and can help you when conflicts or
questions arise.</p>

<p>The most important principle in Illarion though is:</p>

<p><b>We play with, not against each other.</b></p>

<p>The recommended minimum age for players of Illarion is 16 years. This limit
has been set, because players need to be able to deal with the themes and
content within the game with a certain maturity.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Rules</h2>

<p><a href="<?php echo Page::getURL(); ?>/illarion/us_rules_1.php">
	<b>Code of Conduct</b>
</a><br />The code of conduct is a set of guidelines which describe what kind of
game climate we seek in Illarion. They are important for every player who wants
to play Illarion. People who play Illarion and follow these principles can
hardly do anything wrong.</p>

<?php Page::insert_go_to_top_link(); ?>

<p><a href="<?php echo Page::getURL(); ?>/illarion/us_rules_2.php">
	<b>Common Rules of the Game</b>
</a><br />The common rules are a set of rules that are relevant for anyone
wanting to play Illarion.</p>

<?php Page::insert_go_to_top_link(); ?>

<p><a href="<?php echo Page::getURL(); ?>/illarion/us_rules_3.php">
	<b>Guild Rules</b>
</a><br />The guild rules are important for anyone who wants to found or lead a
guild.</p>

<?php Page::NavBarBottom(); ?>