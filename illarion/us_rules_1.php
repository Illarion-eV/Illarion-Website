<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Code of Conduct' );
	Page::setDescription( 'On this page the code of conduct is written down.' );
	Page::setKeywords( array( 'Code of conduct', 'playing style' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/us_rules.php');
	Page::setPrevPage(Page::getURL() . '/illarion/us_rules.php');
	Page::setNextPage(Page::getURL() . '/illarion/us_rules_2.php');
	Page::setLastPage(Page::getURL() . '/illarion/us_rules_2.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Code of Conduct</h1>

<?php Page::cap('R'); ?>
<p>ules are important to create a good roleplay atmosphere. But no rules can
describe how players should behave with each other. This code of conduct shows
what kind of game climate and game culture we would like to create in Illarion.
Because it is important to have a set of guidelines which shows players how to
be respectful, considerate and to be lenient with one another.</p>

<?php Page::insert_go_to_top_link(); ?>

<?php Page::cap('I'); ?>
<p>Illarion is a true roleplaying game. Your character is not your avatar in
another world and his gain and loss is not yours. Separate yourself from your
character and let him have flaws and commit mistakes. Players commit mistakes
once in a while, too. Be lenient towards the mistakes of other players, nobody
is perfect, not even you. If you cannot stand the behaviour of another player,
leave him alone and contact a gamemaster. Have faith in the fact that no one
wants to harm your fun on purpose, likewise, you must not want to spoil anyone's
fun. Consider whether everything you do in game is also fun for other players or
just for you alone.</p>

<?php Page::insert_go_to_top_link(); ?>

<?php Page::cap('I'); ?>
<p>llarion is based on cooperative playing, even if characters may be foes, the
players shall continue the tale of Illarion hand in hand. To battle each other
is in vain, this holds for the Illarion staff, too. It consists of volunteers
that manage a free game in their spare time, without being perfect, just like
you. Respect and common courtesy are as important as good communication; 
helpful word has commonly more effect than a thousand complaints. The staff
does its share to shape the world of Illarion, but the major share is done by
the players. The tales and adventures in the game as well as the way of
communication on the boards and in the chat are influenced by players just like
you. Please contribute actively to maintain an atmosphere of respect and
considerateness that attracts roleplayers from all around the world.</p>

<?php Page::NavBarBottom(); ?>