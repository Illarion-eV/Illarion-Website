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
	<li><a class="hidden" href="#gs5">How do I download the game?</a></li>
	<li><a class="hidden" href="#gs6">How do I log into the game?</a></li>
    <li><a class="hidden" href="#gs7">From what races and classes can I chose?</a></li>
	<li><a class="hidden" href="#gs8">What attributes should I chose?</a></li>
	<li><a class="hidden" href="#gs9">I have a technical problem. Where can I get support?</a></li>

</ul>

	<h2>First Steps Into Illarion</h2>

<ul>
	<li><a class="hidden" href="#fs1">I just started playing and don't know what to do!</a></li>
	<li><a class="hidden" href="#fs2">How can I attack and kill somebody?</a></li>
	<li><a class="hidden" href="#fs3">How do I pick up items?</a></li>
	<li><a class="hidden" href="#fs4">How do I use or equip items?</a></li>
	<li><a class="hidden" href="#fs5">How does crafting work in this game?</a></li>
	<li><a class="hidden" href="#fs6">What about magic? How can I cast spells?</a></li>
	<li><a class="hidden" href="#fs7">What faction should I chose?</a></li>
	<li><a class="hidden" href="#fs8">Does the game have storage facilities?</a></li>
	<li><a class="hidden" href="#fs9">I died! How do I resurrect? Is there a death penalty?</a></li>
</ul>

	<h2>Game Concepts</h2>

<ul>
	<li><a class="hidden" href="#gc1">What is an RPG?</a></li>
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
	<li><a class="hidden" href="#co5">What features are planned?</a></li>
</ul>

<?php insert_go_to_top_link(); ?>
<br />


	<h2>Getting Started</h2>


<ul>
	<li class="question"><a id="gs1"><strong>What are the system requirements for Illarion?</strong></a></li>
		<strong>Operating system:</strong> <br />
		Windows 98/ME/2000/XP/Vista/7 <br />
		Linux Kernel 2.4.20 or newer <br />
		MacOS X 10.4 Tiger/10.5 Leopard/10.6 Snow Leopard <br />
		Solaris 8/9/10 (only 32 bit)<br /> 
		<strong>Graphics card:</strong> <br />16MB memory, driver with OpenGL support<br />
		<strong>CPU:</strong> <br />500 MHz and better<br /><br />
		A Java 1.5 runtime environment or higher (preferably 1.6 as 1.7 is not officially supported yet)<br /><br />

		Windows Vista does not support the free graphics standard OpenGL by default. Therefore Illarion will not run with the graphics drivers included with Vista. With a better graphics driver from your graphics card manufacturer including OpenGL support, everything should work.<br /><br />

	<li class="question"><a id="gs2"><strong>Where can I download the game?</strong></a></li>
		On the <a href="http://illarion.org/illarion/us_java_download.php">Download page of the website</a>. It will then download and install Illarion. You will be prompted to choose a directory to store your character relevant data. It would be advised to store them in a folder you can easily find afterwards.
	<br /><br />
	<li class="question"><a id="gs3"><strong>Why does downloading take so long?</strong></a></li>
		The client is 35MB. With a slow connection, this might take a while to download. From time to time, the installation stalls for a while but please be patient, the download will continue automatically. Use the time and read the forums and other FAQs
	<br /><br />
	<li class="question"><a id="gs4"><strong>Why isn't the game starting?</strong></a></li>
		If the game is installed and launched correctly but fails to start please check the <a href="http://illarion.org/community/forums/viewforum.php?f=3" >Support Forums</a> for any known issues. Also make sure you launch the .jnlp file with Java Webstart.
	<br /><br />
	<li class="question"><a id="gs5"><strong>How do I log into the game?</strong></a></li>
	Once you have <a href="http://illarion.org/community/account/us_charlist.php" >created your character</a> you need to log onto the client with the relevant character's name that you want to play (names are case sensitive) and your account password
</ul>

<?php insert_go_to_top_link(); ?>
<br />

	<h2>First Steps Into Illarion</h2>

<ul>
	<li class="question"><a id="fs6"><strong>I just started playing and don't know what i want to do!</strong></a></li>
		There is a tutorial that will guide you through your first minutes of the game, Afterwards you're free to do whatever you like. You could become a proud Knight, a dedicated Priest, an industrious Crafter, a prudent Druid or a mysterious Mage.
	<br /><br />
	<li class="question"><a id="fs7"><strong>How can I attack?</strong></a></li>
		You can either right click on a character or monster and choose "Attack", or you can hold down CTRL and left click the character or monster. Please respect that it is only allowed to attack other characters when there is a valid role play reason to do so. You should also give your target the chance to interact before and during a fight. Emotes that show your character drawing his or her weapon, or moving in an intimidating fashion to another character are appreciated.
	<br /><br />
	<li class="question"><a id="fs8"><strong>How do I pick up items?</strong></a></li>
		Right click on an item and choose "Pick up". Alternatively you may move the item by "Dragging and Dropping" it to a free place in your inventory. This process is similar to the way icons are moved on Windows/Linux/MacOS-desktops. Your inventory is composed of your character's clothing (which is the spaces on top of the image of a man), the belt (which is the six spaces under your character's clothing/armour) and a bag. The bag must be worn and can be opened to be able to use it. If you want to open the bag of your character, right click on the bag and choose "Open" or click on it with the middle mouse button, if your mouse has one.
	<br /><br />
	<li class="question"><a id="fs9"><strong>How do I use or equip items?</strong></a></li>
	To equip an item, move the item you want to equip to a free slot in your inventory (the 'man' at the right of the screen). If you hold your mouse over a slot it shows you what you can put here. The slot has to be free to put something new in it. To do this, move the previous item somewhere else (e.g in the bag of your character). This works for weapons, armour or anything else you wear. If you want to use an item (e.g. eating an apple), right click and choose "Use". Alternatively you can hold SHIFT and click the item and release.
	<br /><br />
	<li class="question"><a id="fs10"><strong>I equipped an item so why doesn't it show on my character?</strong></a></li>
		Paperdolling isn't yet featured in Illarion, it will be implemented into the next major update. To know what someone else looks like, you can click on the character to get a short description and what items he has equipped. Right-clicking will show you an option to view him carefully. This sends a message to the player, so don't do it frequently, but allows you to view most of the items they are wearing.
	<br /><br />
	<li class="question"><a id="fs11"><strong>Does the game have storage facilities?</strong></a></li>
		Yes. The game uses a "depot" system. These are yellow storage boxes scattered around key areas such as towns. To use them, move next to them and "open" them as you would a bag, you can then drag and drop any items you wish to store into the depot.
</ul>

<?php insert_go_to_top_link(); ?>
<br />

		<h2>Game Concepts</h2>

<ul>
	<li class="question"><a id="gc12"><strong>What is an RPG and what makes Illarion special?</strong></a></li>
		Role playing games (RPG) are a popular game genre. Players take on the role of a fantasy character and are able to do many things that may be impossible in Real Life. Illarion takes the concept of Role playing further than other games, players are expected to immerse themselves completely into the life of their character. Whilst playing Illarion you cease to be John/Jane Smith from New York and instead take on the role of a fictional character by feeling, saying, and thinking what he or she would. Illarion is set in a medieval world with no electricity, cars, televisions or power tools. Whilst playing you are expected to refrain from mentioning anything Out Of Character (OOC).
	<br /><br />
	<li class="question"><a id="gc13"><strong>What are CMs and GMs?</strong></a></li>
		A CM is a Community Manager. Their role is to assist new players and help resolve issues or conflicts between players. They should be the first people to turn to in the event of a non-technical issue. A GM is a Game Master. The GMs provide dynamic content (quests, events, etc) as well as upholding the rules of Illarion.
	<br /><br />
	<li class="question"><a id="gc14"><strong>Why do some of the players talk funny?</strong></a></li>
		First of all, Illarion is played by players from all around the world. So it's no wonder that they don't speak the same language. English and German are the most common languages and it is a matter of courtesy to switch language to a language commonly understood when encountering other players. Special dialects could be applied as well. Most players try to make their characters sound medieval without using Old English as many people would struggle to understand. Abbreviations and chat slang are also against the rules. Take your time using capital letters and punctuation marks too.<BR> Bad Example: "ok hi wanna buy sword lol!!!111"<BR> Good Example: "Greetings, noble sir. May I draw your attention on this well crafted blade, a blade I'd like to offer to you for a reasonable price?"
	<br /><br />
	<li class="question"><a id="gc15"><strong>How do I find out an item's stats?</strong></a></li>
		You don't. We try to make Illarion as "realistic" as possible. In medieval times, you simply would not hear a weapon smith say "This sword has an attack value of 20". Instead people tried out several swords and then decided which one suited them best. Weapons do have specific values, but those are decided by many variables (e.g. The skill of the smith), so we could not give you a numerical value anyway.
	<br /><br />
	<li class="question"><a id="gc16"><strong>Where can I see my exact skill levels and attributes?</strong></a></li>
		A person cannot be reduced to a numerical value. Just imagine, you sit on a bench somewhere and overhear a conversation. A person says "I increased my running skill to level 40 yesterday, and levelled up to level 43." I am sure you would laugh pretty hard at that person. Well, the same holds in Illarion. You can see rough values in the form of a bar graph in the skill list (and you can always compare yourself roughly to other people). It would be simpler to have a precise skill system, but this game was created in the spirit of role playing.
	<br /><br />
	<li class="question"><a id="gc17"><strong>How do I send global chat messages?</strong></a></li>
		You can't. How would you do that in medieval times anyway? There were no P.A. systems, radios, or cell phones. Such things were impossible. We might grant powerful mages a special ability to communicate by telepathy, but nothing is planned yet. If you need to spread a message, you can always hire another player as a messenger or use the <a href="http://illarion.org/community/forums/index.php" >Forums</a> to leave messages on the town walls.
	<br /><br />
	<li class="question"><a id="gc18"><strong>What is "Power Gaming" and is it allowed?</strong></a></li>
		Power Gaming (PGing) is a term used to describe a characters actions in the game that don't necessarily follow a realistic pattern of behaviour. An example of this would be to hide your character away from other players so that you can focus on a single task (such as crafting or training a particular combat skill) in order to master it faster than you would do otherwise.<br />
		Power Gaming is NOT against the rules but it IS heavily frowned upon
	<br /><br />
	<li class="question"><a id="gc19"><strong>What is "Power Emoting" and is it allowed?</strong></a></li>
		Power Emoting is a term used to describe players emotes that leave no choice for other players' reactions. <br />
		An example of this would be *Player A strikes Player B on the chest heavily, forcing them to fall to the ground*. <br />
		Power Emoting IS against the rules of the game.
</ul>
<?php insert_go_to_top_link(); ?>
<br />

	<h2>Contributing to Illarion</h2>

<ul>
	<li class="question"><a id="co20"><strong>I found a bug or have a request. How do I report it?</strong></a></li>
		The best way to report a bug or request features for the game or website is to use <a href="http://illarion.org/mantis/index.php" >Mantis</a> which is the Bug Reporting system used by the developers. Do not post bugs and feature requests in the forum as there is a chance they may not be seen.
	<br /><br />
	<li class="question"><a id="co21"><strong>How can I contribute to Illarion?</strong></a></li>
		There are many ways in which you can contribute to Illarion. You could provide financial support, assist with the development of the game or help promote the game on external sites.
</ul>

<?php insert_go_to_top_link(); ?>
<br />
<?php include_footer(); ?>
