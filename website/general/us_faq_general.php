<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'FAQ' );
Page::setDescription( 'Frequently asked questions and answers relevant to the game of Illarion.' );
Page::setKeywords( array( 'FAQ, Questions, General' ) );
Page::Init();
?>

<h1>General FAQ</h1>

	<h2>Getting Started</h2>

<ul>
    <li><a class="hidden" href="#gs1">What exactly is Illarion for a game?</a></li>
	<li><a class="hidden" href="#gs2">How much do I have to pay for Illarion? Is there a monthly fee or an item shop?</a></li>
	<li><a class="hidden" href="#gs3">What are the system requirements for Illarion?</a></li>
	<li><a class="hidden" href="#gs4">What do I need to play?</a></li>
	<li><a class="hidden" href="#gs5">Where can I download the game?</a></li>
	<li><a class="hidden" href="#gs6">How do I log into the game?</a></li>
    <li><a class="hidden" href="#gs7">From what races and classes can I chose?</a></li>
	<li><a class="hidden" href="#gs8">What attributes should I pick?</a></li>
	<li><a class="hidden" href="#gs9">I have a technical problem. Where can I get support?</a></li>
</ul>

	<h2>First Steps Into Illarion</h2>

<ul>
	<li><a class="hidden" href="#fs1">I just started playing and don't know what to do!</a></li>
	<li><a class="hidden" href="#fs2">How can I attack and kill somebody?</a></li>
	<li><a class="hidden" href="#fs3">How do I pick up items?</a></li>
	<li><a class="hidden" href="#fs4">How do I use or equip items?</a></li>
	<li><a class="hidden" href="#fs5">How does crafting work in this game? How do I repair items?</a></li>
	<li><a class="hidden" href="#fs6">What about magic? How can I cast spells?</a></li>
	<li><a class="hidden" href="#fs7">What faction should I chose?</a></li>
	<li><a class="hidden" href="#fs8">Does the game have storage facilities?</a></li>
	<li><a class="hidden" href="#fs9">I died! How do I resurrect? Is there a death penalty?</a></li>
</ul>

	<h2>Game Concepts</h2>

<ul>
	<li><a class="hidden" href="#gc1">What is an RPG and what makes Illarion special?</a></li>
	<li><a class="hidden" href="#gc2">What are CMs and GMs?</a></li>
	<li><a class="hidden" href="#gc3">Why do some of the players talk funny?</a></li>
	<li><a class="hidden" href="#gc4">How do I find out an item's stats?</a></li>
	<li><a class="hidden" href="#gc5">Where can I see my skill levels?</a></li>
	<li><a class="hidden" href="#gc6">How do I send global chat messages?</a></li>
	<li><a class="hidden" href="#gc7">The game took taxes from me! What is this all about?</a></li>
	<li><a class="hidden" href="#gc8">How can I find out my rank with my faction?</a></li>
	<li><a class="hidden" href="#gc9">I've been reading about the special skill system of Illarion and Mental Capacity. What's that?</a></li>	
</ul>

	<h2>Contributing to Illarion</h2>

<ul>
	<li><a class="hidden" href="#co1">I read Illarion is Open Source. What does that mean?</a></li>
	<li><a class="hidden" href="#co2">I found a bug or have a feature request. How do I report it?</a></li>
	<li><a class="hidden" href="#co3">Can players write books, NPCs or even quests?</a></li>
	<li><a class="hidden" href="#co4">How can I contribute to Illarion? What skills are needed?</a></li>
	<li><a class="hidden" href="#co5">What features are planned for the future?</a></li>
</ul>

<?php insert_go_to_top_link(); ?>
<br />

	<h2>Getting Started</h2>

<ul>
	<li class="question"><a id="gs1"></a><strong>What exactly is Illarion for a game?</strong></li>

		<p>Illarion is a free indie online roleplaying game that focuses on true roleplaying. All of the characters that you will encounter during your time here are living, breathing inhabitants of this mysterious world. Each character has their own past, goals, flaws, strengths and personality. Roleplaying is not optional but the very core of this game. It is independently developed by volunteers who share the passion to provide a truly free roleplaying game for players from all around the world. Illarion is not about grinding for levels or gold coins but about immersion, friendship and epic tales, to be written by the deeds of the characters of the game.</p>
		
	<li class="question"><a id="gs2"></a><strong>How much do I have to pay for Illarion? Is there a monthly fee or an item shop?</strong></li>
		
		<p>Illarion is completely free. You have the guarantee that you will never have to pay a cent for this game. There are no premium items nor an item shop. Illarion is run a non profit organisation called <a href="<?php echo Page::getURL(); ?>/community/us_society.php">Illarion e.V.</a>. If you want, you can support the work of the society by a voluntary <a href="<?php echo Page::getURL(); ?>/community/us_society.php">donation</a> or by becoming a supporting member.</p>
		
	<li class="question"><a id="gs3"></a><strong>What are the system requirements for Illarion?</strong></li>

	    <p>Illarion is a cross platform game that runs on Windows, Linux and MacOS. You can review the system requirements on the <a href="<?php echo Page::getURL(); ?>/illarion/us_java_download.php">download page of the website</a>. You will need a computer with a graphics adapter that supports Shaders 2.0 and OpenGL. Some operation systems like Windows Vista do not support the free graphics standard OpenGL by default. Make sure that you have the latest drivers installed for your graphics adapter.</p>

	<li class="question"><a id="gs4"></a><strong>What do I need to play?</strong></li>
		
		<p>To play Illarion, you must first <a href="<?php echo Page::getURL(); ?>/community/account/us_register.php">register an account</a> and create a character. Once these are complete, <a href="<?php echo Page::getURL(); ?>/illarion/us_java_download.php">download</a> the game client. You are then ready to immerse yourself in the world of Illarion!</p>
					
	<li class="question"><a id="gs5"></a><strong>Where can I download the game?</strong></li>
		
		<p>Illarion can be downloaded for many operation systems on the <a href="<?php echo Page::getURL(); ?>/illarion/us_java_download.php">download page</a>. During the setup, you will be prompted to choose a directory to store your character relevant data. It would be advised to store them in a folder you can easily find afterwards.</p>
		
	<li class="question"><a id="gs6"></a><strong>How do I log into the game?</strong></li>
	
		<p>The setup installs the Illarion launcher that shows the latest news and ingame events. Click on "Play!" to start the game. You have to enter your account name (NOT your character's name) along with your password. Chose one of your characters, you may create up to five characters.</p>
		
	<li class="question"><a id="gs7"></a><strong>From what races and classes can I chose?</strong></li>
	
		<p>Illarion features six playable <a href="<?php echo Page::getURL(); ?>/illarion/races/us_races.php">races</a>: Humans, halflings, dwarves, elves, orcs and lizardmen. You may pick any of them, all come with their traits.</p>
		
		<p>There are no classes in Illarion. You may perform any profession you like and are not limited to one; you can become a true master of a single craft or jack of all trades. Except for magic, you can combine as many skills as you like, only your imagination limits what your characters may become.
		
	<li class="question"><a id="gs8"></a><strong>What attributes should I pick?</strong></li>
	
		<p>We have prepared typical attribute sets for common playing styles in the account system. As there are no strict classes, you are not bond to them. Each attribute has its use, just hover over the attribute names to get a description. In the end, just pick the attributes that represent your character best. You have the option to change your attributes in the game for a few gold coins.</p>
		
	<li class="question"><a id="gs9"></a><strong>I have a technical problem. Where can I get support?</strong></li>
		
		<p>There is a dedicated <a href="<?php echo Page::getURL(); ?>/community/forums/index.php">support forum</a> for Illarion. Create a free account and post your questions or just greetings to the other players. Also, you can join the Illarion <a href="<?php echo Page::getURL(); ?>/community/us_chat.php">chat</a> to get in contact with the gamemasters, developers and other players.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>

<br />

	<h2>First Steps Into Illarion</h2>

<ul>
	<li class="question"><a id="fs1"></a><strong>I just started playing and don't know what to do!</strong></li>
		
		<p>There is a tutorial that will guide you through your first minutes of the game. Afterwards you're free to do whatever you like. You could become a proud Knight, a dedicated Priest, an industrious Crafter, a prudent Alchemist or a simple peasant.</p>

	<li class="question"><a id="fs2"></a><strong>How can I attack and kill somebody?</strong></li>
	
		<p>You can right click on any other character or monster to attack. While Illarion is fully player versuc player (PvP), please respect that it is only allowed to attack other characters when there is a valid role play reason to do so. You should also give your target the chance to interact before and during a fight. Emotes that show your character drawing his or her weapon, or moving in an intimidating fashion to another character are appreciated.</p>
		

	<li class="question"><a id="fs3"></a><strong>How do I pick up items?</strong></li>
		
		<p>Press 'P' to pick up all items in range. You may also move the item by "Dragging and Dropping" it to a free place in your inventory. The inventory can be opened by pressing 'I'. This process is similar to the way icons are moved on Windows/Linux/MacOS-desktops. Your inventory is composed of your character's clothing, the belt which is the six spaces under your character's clothing/armour and a bag. The bag must be worn and can be opened to be able to use it. If you want to open the bag of your character, perform a double click or press 'B'.</p>

		
	<li class="question"><a id="fs4"></a><strong>How do I use or equip items?</strong></li>
	
		<p>To equip an item, press 'I' to open the inventory and move the item you want to equip to a free slot in your inventory. If you hold your mouse over a slot it shows you what you can put here. The slot has to be free to put something new in it. To do this, move the previous item somewhere else (e.g in the bag of your character). This works for weapons, armour or anything else you wear. If you want to use an item (e.g. eating an apple), perform a double click.</p>

	<li class="question"><a id="fs5"></a><strong>How does crafting work in this game? How do I repair items?</strong></li>
		
		<p>Crafting generally consists of three steps: Gathering of raw materials such as ores, producing intermediate items such as ingots and crafting final items that can be used such as swords. For each step, you need dedicated tools and locations, e.g. you will need to use a pick axe in a mine to mine ores and a hammer and anvil to forge a sword out of iron ingots. Almost every item in this game can be crafted by players and crafting can be a lot of fun, taking into account the vast variety of crafts, resources and products.</p>
		
		<p>Repairing items is done by dedicated NPCs, though. You can find one in each major city. They charge a fee for their services, but repairing is usually more cheap than buying a new item from an NPC.</p>

	<li class="question"><a id="fs6"></a><strong>What about magic? How can I cast spells?</strong></li>
		
		<p>As of now, alchemy is available to players. By brewing powerful potions, you can strengthen yourself and your comrades. To become an alchemist, you need to find a magical place in the wilderness. Later, we will add arcane magic and divine magic to the game.</p>
		
	<li class="question"><a id="fs7"></a><strong>What faction should I chose?</strong></li>
		
		<p>The land Illarion is divided between three factions: <a href="<?php echo Page::getURL(); ?>/illarion/us_factions.php#2">Wealthy Galmair</a>, <a href="<?php echo Page::getURL(); ?>/illarion/us_factions.php#1">noble Cadomyr</a> and <a href="<?php echo Page::getURL(); ?>/illarion/us_factions.php#3">wise Runewick</a>. Just pick the faction that fits the motives of your character best. You can revise your decisions later in the game or even become an outlaw.</p>
		
	<li class="question"><a id="fs8"></a><strong>Does the game have storage facilities?</strong></li>
		
		<p>Yes. The game uses a "depot" system. These are yellow storage boxes scattered around key areas of towns. To use them, move next to them and "open" them with a double click. You can then drag and drop any items you wish to store into the depot. Note that you can access the depot system of one town only in that town.</p>
		
	<li class="question"><a id="fs9"></a><strong>I died! How do I resurrect? Is there a death penalty?</strong></li>
		
		<p>A dead character is automatically revived at the city of their chosen faction after one minute. No skills or items are lost but the equipment takes damage. However, a recently revived character suffers from 'resurrection sickness'. This severely weakens them, making it difficult to immediately return to combat. Resurrection sickness is temporary, and will be cured by refraining from combat until a character is healthy again.</p>
		
</ul>

<?php insert_go_to_top_link(); ?>
<br />

	<h2>Game Concepts</h2>

<ul>
	<li class="question"><a id="gc1"></a><strong>What is an RPG and what makes Illarion special?</strong></li>
	
		<p>Role playing games (RPG) are a popular game genre. Players take on the role of a fantasy character and are able to do many things that may be impossible in Real Life. Illarion takes the concept of Role playing further than other games. Players are expected to immerse themselves completely into the life of their character. Whilst playing Illarion you cease to be John/Jane Smith from New York and instead take on the role of a fictional character by feeling, saying, and thinking what he or she would. Illarion is set in a mediaeval world with no electricity, cars, televisions or power tools. Whilst playing you are expected to stay in your chosen role and keep Out Of Character (OOC) talk to a bare minimum.</p>
		

	<li class="question"><a id="gc2"></a><strong>What are CMs and GMs?</strong></li>
	
		<p>A CM is a <a href="<?php echo Page::getURL(); ?>/community/us_contact.php#2">Community Manager</a>. Their role is to assist new players and help resolve issues or conflicts between players. They should be the first people to turn to in the event of a non-technical issue. A GM is a <a href="<?php echo Page::getURL(); ?>/community/us_contact.php#3">Gamemaster</a>. The GMs provide dynamic content (quests, events, etc) as well as upholding the rules of Illarion.</p>
		

	<li class="question"><a id="gc3"></a><strong>Why do some of the players talk funny?</strong></li>
		
		<p>Illarion is played by players from all around the world. So it's no wonder that they don't speak the same language. English and German are the most common languages and it is a matter of courtesy to switch language to a language commonly understood when encountering other players. Special dialects could be applied as well. Most players try to make their characters sound mediaeval without using Old English as many people would struggle to understand. Abbreviations and chat slang are frowned upon. Take your time using capital letters and punctuation marks too. Good Example: "Greetings, noble sir. May I draw your attention on this well crafted blade, a blade I'd like to offer to you for a reasonable price?"</p>
		

	<li class="question"><a id="gc4"></a><strong>How do I find out an item's stats?</strong></li>

		<p>Hovering your mouse over the item will provide details on an item name, its level and skill requirement, value, weight, quality and durability. As Illarion is not a game about numbers but about immersion and stories told, detailled technical stats are not shown. For weapons and armours, you can derive the use directly from the shown level.</p>	

	<li class="question"><a id="gc5"></a><strong>Where can I see my skill levels?</strong></li>

		<p>Press 'C' to review your character's skills. The bars for each skill represent how far you are away from the next level up. Skills range from 1-100, from a novice to a true grandmaster.</p>	

	<li class="question"><a id="gc6"></a><strong>How do I send global chat messages?</strong></li>
	
		 <p>In order not to distract players from the actual game, the <a href="<?php echo Page::getURL(); ?>/community/us_chat.php">global chat</a> can be found on the website. We might grant powerful mages a special ability to communicate by telepathy in the game. If you need to spread a message, you can always hire another player as a messenger or use the <a href="<?php echo Page::getURL(); ?>/community/forums/index.php">Forums</a> to leave messages on the town walls.</p>
		
	<li class="question"><a id="gc7"></a><strong>The game took taxes from me! What is this all about?</strong></li>
	
		<p>Every citizen from one of the three major factions is charged taxes. These are 1% of a character's total currency, collected once an ingame month. These are used to pay for town services such as protection, infrastructure upkeep, etc. In addition, generous faction leaders have also been known to reward loyal tax-payers with magical gemstones.</p>	
		
	<li class="question"><a id="gc8"></a><strong>How can I find out my rank with my faction?</strong></li>
	
		<p>In each city, there is a notary NPC who can tell you your rank. The higher your rank, the more well known you are to your faction leader and also, the more advanced your are in his or her favour.</p>	
		
	<li class="question"><a id="gc9"></a><strong>I've been reading about the special skill system of Illarion and Mental Capacity. What's that?</strong></li>
	
		<p>Illarion's skill system is based on "learning by doing", there are no skills points you have to allocate. As your character practices certain actions, they begin to improve. For example, over time your character may develop from an apprentice smith to a master, allowing them to create a larger variety of items at a higher quality. A character may also develop combat skills, improving their ability to weild more advanced weapons or wear exotic armour. </p>	
		
		<p>The Mental Capacity refers to a character's ability to focus while improving. The more actions you do over time, the less you learn from each action. This way, it is on you how much time you want to invest on training your skills, the result after a given time will be the same. A character can reverse a 'high' degree of mental fatigue by performing tasks which are not skill-dependant such as talking to other characters and exploring. We have designed the skill system in this way to give players the opportunity to roleplay or train as much as they want without one style of playing being favoured by the game.</p>
		
</ul>
<?php insert_go_to_top_link(); ?>
<br />

	<h2>Contributing to Illarion</h2>

<ul>
	
	<li class="question"><a id="co1"></a><strong>I read Illarion is Open Source. What does that mean?</strong></li>
	
		<p>Illarion is a free game, not just in terms of cost, but also in terms of free code. The sources of the Java software (client and development tools) are released
		under <a href="https://www.gnu.org/licenses/gpl-3.0">GPLv3</a>. The sources of server, scripts and maps are released under <a href="https://www.gnu.org/licenses/agpl-3.0">AGPLv3</a>.
		These sources are thus <a href="<?php echo Page::getURL(); ?>/development/us_opensource.php">available for public review</a> and usage.</p>
		
	<li class="question"><a id="co2"></a><strong>I found a bug or have a feature request. How do I report it?</strong></li>
		
		<p>The best way to report a bug or request features for the game or website is to use the <a href="<?php echo Page::getURL(); ?>/mantis/index.php">Mantis Bugtracker</a> which is the Bug Reporting system used by the developers. You can also post bugs and feature requests in the <a href="<?php echo Page::getURL(); ?>/community/forums/index.php">Forums</a> but there is a chance they may not be seen by the developers.</p>

	<li class="question"><a id="co3"></a><strong>Can players write books, NPCs or even quests?</strong></li>
	
		<p>Yes. Illarion appreciates all player made content and gives the players the opportunity to shape the world. <a href="<?php echo Page::getURL(); ?>/community/us_contact.php#4">Contact a developer</a> and read the <a href="https://lua.illarion.org">development tutorial</a> for starters.</p>
		
	<li class="question"><a id="co4"></a><strong>How can I contribute to Illarion? What skills are needed?</strong></li>
	
		<p>There are many ways in which you can contribute to Illarion. You could support the <a href="<?php echo Page::getURL(); ?>/community/us_society.php">Illarion e.V. society</a>, assist with the <a href="https://lua.illarion.org">development of the game</a> or help to <a href="<?php echo Page::getURL(); ?>/community/forums/viewforum.php?f=77">promote the game</a> on external sites. Also tell your friends about Illarion!</p>
		
		<p>If you have advanced skills in Java, C++, LUA, PHP or creating 3D graphics, you might want to contact one of the <a href="<?php echo Page::getURL(); ?>/community/us_contact.php#4">lead developers</a> to get involved in the development of Illarion. Please note that Illarion is a non profit project and hence, no compensation can be paid for your work.
		
	<li class="question"><a id="co5"></a><strong>What features are planned for the future?</strong></li>
	
		<p>Illarion's development follows six clearly specified <a href="<?php echo Page::getURL(); ?>/development/us_progress.php">milestones</a>. Those milestones stand for a state of the game that does not require any future reworking on existing features. Crafting and fighting shall be reworked and more types of magic will be added to the game. Also, we'll add unique features to the game no other game can offer to enhance the immersion and uniqueness of the world Illarion.</p>
	
</ul>

<?php insert_go_to_top_link(); ?>
<br />
<?php include_footer(); ?>
