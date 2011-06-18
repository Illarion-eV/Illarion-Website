<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

	Page::setTitle( 'Common Rules of the Game' );
	Page::setDescription( 'On this page you find the general rules of Illarion' );
	Page::setKeywords( array( 'general rules', 'rules' ) );

	Page::setFirstPage(Page::getURL() . '/illarion/us_rules.php');
	Page::setPrevPage(Page::getURL() . '/illarion/us_rules_1.php');
	Page::setNextPage(Page::getURL() . '/illarion/us_rules_3.php');
	Page::setLastPage(Page::getURL() . '/illarion/us_rules_3.php');

	Page::setXHTML();
	Page::Init();
?>

<?php Page::NavBarTop(); ?>

<h1>Common Rules of the Game</h1>

<p>The common rules are rules which are relevant for every player.</p>

<h2>Content</h2>

<ul class="content_summery">
    <li><a href="#account">Account</a></li>
    <li><a href="#names">Names</a></li>
    <li><a href="#world">Game world</a></li>
    <li><a href="#realism">Realism</a></li>
    <li><a href="#charmixing">Mixing characters</a></li>
    <li><a href="#ooc">OOC</a></li>
    <li><a href="#language">Language</a></li>
    <li><a href="#emotes">Emotes</a></li>
    <li><a href="#pkilling">Player killing</a></li>
    <li><a href="#harm">Violence</a></li>
    <li><a href="#behaivor">Behaviour</a></li>
    <li><a href="#rulebreak">Rule violations</a></li>
    <li><a href="#bugs">Bugs</a></li>
    <li><a href="#attribs">Attributes</a></li>
    <li><a href="#gms">Gamemaster</a></li>
    <li><a href="#boards">Board</a></li>
    <li><a href="#macros">Additional programs</a></li>
    <li><a href="#copyright">Copyright</a></li>
</ul>

<div class="clr"></div>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="account"></a></div>
<h2>Account</h2>

<p>Every player is allowed only one account. Accounts and characters are not
borrowed, exchanged or sold. The owner of an account is responsible for all
actions of his characters, even if an unauthorised person got access to it.</p>

<p>If two players want to log in using the same internet connection, they have
to inform the Illarion staff about this.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="names"></a></div>
<h2>Names</h2>

<p>Names of characters have to fit a medieval fantasy world and the race of the
character. In addition, the following types of names are not allowed:</p>

<ul>
  <li>Absurd and offensive names (Kismai Ass, Adolf Hitlersson)</li>
  <li>Names of history or present-day life (Barack Obama, Julius Caesar)</li>
  <li>Names of mythology, religion etc. (Buddha, Jesus Christus, Osiris)</li>
  <li>Well known names from literature, TV, movies etc. (Gandalf, Legolas, Harry
  Potter, Mononoke)</li>
  <li>Names containing a title (Sir Yaran, King Kuno). You can add titles ingame
  seperatly</li>
</ul>

<p>In addition the following guidelines apply:</p>

<ul>
    <li>A name has to contain at least a first name and can also have a surname,
    which is recommended</li>
    <li>The name has to be pronouncable, so it should contain vowels</li>
    <li>Lizardmen can have unpronounceable names but they should sound like
    being lizard language (decision of the gamemasters)</li>
    <li>Name affixes like "el", "al" etc (ie el'Chitarim al Kazar) can start
    with a lower case letter</li>
</ul>

<p>For names of clans and royal names holds. First come, first serve. If a
player wants to create a character with the same surname, an approbation of the
player who used the name first is necessary.</p>


<?php Page::insert_go_to_top_link(); ?>

<div><a id="world"></a></div>
<h2>The game world</h2>

<p>The races allowed to play are limited to the races offered to choose during
the character creation in the account system. It's not allowed to roleplay any
mixed-race characters. The only exception is half elves (elf/human) which
properties (language, attributes) are limited to one of the parent races.</p>

<p>A gamemaster's permission is needed for all magical and divine interventions
that cannot be realised by the engine. This especially holds true for magical
and divine rituals which grant an effect, as well as for all forms of artifact
magic as long as it does not get its effects from the engine.</p>

<p>The application for a ritual should contain a description of the ritual, the
preparation, execution, effects and dangers. Those points need to be in relation
to each other for the ritual to be accepted. A ritual with short preparation
and dangers will not result in big effects.</p>

<p>The execution of rituals with an effect has to be supervised by a gamemaster,
in whose judgement the success of the ritual lays and what effects occur in
detail.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="realism"></a></div>
<h2>Realism</h2>

<p>Regardless from the limits and possibilities of the engine one has to adapt
the behaviour of a character to the game world. Swords remain deathly weapons,
ogres are still scary monsters and farming hard labour, even if the engine
allows a player to master such challenges. It is not allowed in the sense of the
game logic to ignore NPCs in your own roleplay. No criminal would rob another
character right in front of a town guard, even if the guard is only a NPC.</p>

<p>Actions of a character must not be adapted to the technical environment of
the engine to maximise success. Characters have to react on external influences
and must not be kept idle in the game. To evade unwanted situations that could
have bad consquences for a character by logging out of the game is
forbidden.</p>

<p>When a character is knocked down or 'killed' (s)he will suffer from injuries
which should be played out. In case of a knockout there are light injuries, in
the case of death severe ones. The wounds should be played out until the health
points are fully restored.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="charmixing"></a></div>
<h2>Mixing characters</h2>

<p>In general it is not allowed that two characters of one player support each
other. Therefore it is forbidden to exchange items between characters, also not
by using middlemen, and that they share knowledge. One's characters also can't
know each other and cannot be related. It is not allowed at any time to log in
with two characters at the same time.</p>

<p>Two characters of the same player are not allowed to be member of the same
guild. Two characters of a player must not be members of groups that handicap
or affect each other directly. This is needed to avoid conflicts of interest.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="ooc"></a></div>
<h2>Out of character (OOC)</h2>

<p>Out of character is everything that is not backed up by actions or thoughts
of a character ingame. Decisions or actions in game should never be motivated by
OOC influence, e.g. because of dislike for the other player. To call for help
via means not present in the game (e.g. messengers) is strictly forbidden. It is
also not allowed to use knowledge which the player has but the character
doesn't. A player has to prove that the character has gained said knowledge.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="language"></a></div>
<h2>Language of characters</h2>

<p>The language should fit the character and the game world and should follow
the rules of spelling and grammar as well as possible. Modern expressions as
well as abbreviations or "Leet-speak" (e.g. "u g0t pwn3d") should not by 
used.</p>

<p>Writing or invoking senseless or disturbing messages and the continuous use
of capital letters to stress statements (e.g. "IT IS MY TURN NOW!") is not
allowed.</p>

<p>Conversations are to be done from the point of view of the character.
Conversations that have nothing to do with the communication between the
characters (OOC) are to kept to a bare minimum and have to be masked by double
brackets (( )) in whisper mode.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="emotes"></a></div>
<h2>Emotes</h2>

<p>Action of characters (e.g. fighting, crafting) have to be initiated and
accompanied by emotes. Emotes describe only perceivable actions and states.
Emotes do not contain opinions, thoughts or feelings of characters.</p>

<p>So called power-emotes that force a behaviour or an effect on other
characters and leave no room for reaction are forbidden.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="pkilling"></a></div>
<h2>Player killing</h2>

<p>The purposeful attacking of a character without clearly traceable and
reasonable roleplaying reason is forbidden. Immediate killing of a character
right after resurrection ("reskilling") is not allowed.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="harm"></a></div>
<h2>Portrayal of Violence and X-rated Actions</h2>

<p>Content and portrayals of actions which are brutal, perverse, sexual or
glorify violence are strictly forbidden. Also all contents that hurt the ideals
and moralities of involved players and random listeners are not allowed.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="behaivor"></a></div>
<h2>Behaviour</h2>

<p>Harassment, threats or insults, including racist or sexist statements will
not be tolerated. This hold for all platforms of Illarion: The game, the board
and the chat, including private messages.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="rulebreak"></a></div>
<h2>Reaction to rule violations</h2>

<p>It is not allowed to react to a rule violation of another player with another
rule violation (e.g. OOC-messages). These breaches will be dealt with,
regardless of the situation. It is unwanted that players blame each other for
rule violations. If a rule violation occurs, the Illarion staff should be
informed to process the case.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="bugs"></a></div>
<h2>Bug exploits</h2>

<p>The wilful use of game errors (bugs) is, regardless of reason, forbidden. If
an error is found in-game, it has to be reported to the Illarion staff;
preferably by an entry in the bugtracker. If items or effects are lost due to a
bug or server crash, there is no replacement or refund.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="attribs"></a></div>
<h2>Change of Attributes</h2>

<p>Players have the opportunity to change the attributes of a character once if
wished. To do so the changes need to be specified to a gamemaster. In general
only changes of maximal 4 attributes, each in a range of 2 points are made. 
The total count of attributes may not change.
It is also not allowed to change an attribute to a value smaller than 5 or bigger than 16.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="gms"></a></div>
<h2>Gamemaster</h2>

<p>Gamemasters help players, host events and keep the peace in the game. Lying
to a gamemaster or keeping back informations about rule violations or bugs is
forbidden. The names of player characters of a gamemaster or another staff
member must not be published without approbation to guarantee his privacy.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="boards"></a></div>
<h2>Board</h2>

<p>On the Illarion forums, the rules apply analogously. Creating senseless or
off-topic posts is not allowed.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="macros"></a></div>
<h2>Additional programs</h2>

<p>The usage of programs which influence the behaviour of the game and thus
offer an advantage to the player are not allowed.</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="copyright"></a></div>
<h2>Copyright</h2>

<p>All content of Illarion, all texts which are created for Illarion, all
scripts, pictures, sound effects, music and source code which exists in the
client, the homepage or the server is property of the Illarion society and is
therefore protected by copyright if not indicated otherwise. It is not allowed
to use this content without the consent of the Illarion society.</p>

<?php Page::NavBarBottom(); ?>
