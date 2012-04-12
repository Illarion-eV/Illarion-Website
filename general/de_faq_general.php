<?php
include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
create_header( "Illarion - General FAQ",
"This FAQ contains general questions and answers relevant to the game of Illarion.",
"FAQ, Questions, General" );
include_header();
?>
/*
<h2>
	<a class="float_left" href='/general/us_faq_development.php'>Development FAQ</a>
	<a class="float_right" href='/general/us_faq_roleplaying.php'>Roleplaying FAQ</a>
	<a class="clr" style="display:block;"></a>
</h2>
*/
<h1>General FAQ</h1>

<h2>Getting Started</h2>

<ul>
   <li><a class="hidden" href="#">What are the system requirements for Illarion?</a></li>
   <li><a class="hidden" href="#">How do I download the game?</a></li>
   <li><a class="hidden" href="#">Why does downloading take so long?</a></li>
	<li><a class="hidden" href="#">Why isn't the game starting?</a></li>
	<li><a class="hidden" href="#">How do I log into the game</a></li>
</ul>

<h2>First Steps Into Illarion</h2>

<ul>
	<li><a class="hidden" href="#">I just started playing and don't know what i want to do!</a></li>
   <li><a class="hidden" href="#">How can I attack and kill somebody?</a></li>
   <li><a class="hidden" href="#">How do I pick up items?</a></li>
   <li><a class="hidden" href="#">How do I use or equip items?</a></li>
   <li><a class="hidden" href="#">I equipped an item so why doesn't it show on my character?</a></li>
</ul>

<h2>Game Concepts</h2>

<ul>
   <li><a class="hidden" href="#">What is an RPG?</a></li>
   <li><a class="hidden" href="#">What are CMs and GMs</a></li>
   <li><a class="hidden" href="#">Why do some of the players talk funny?</a></li>
   <li><a class="hidden" href="#">How do I find out an items stats?</a></li>
   <li><a class="hidden" href="#">Where can I see my exact skill levels and attributes?</a></li>
	<li><a class="hidden" href="#">How do I send global chat messages?</a></li>
</ul>

	<h2>Contributing to Illarion</h2>

<ul>
   <li><a class="hidden" href="#">How can i contribute to Illarion?</a></li>
</ul>

<?php insert_go_to_top_link(); ?>


<h2>Getting Started</h2>


<ul>
	<li class="question"><a name="">What are the system requirements for Illarion?</a></li>
	<li class="answer">
	 Operating system: Windows XP/Vista/7, Linux, MacOS
    Graphics card: 16MB memory, driver with openGL support
    CPU: 500 MHz and better
    A Java 1.5 runtime environment or higher (preferably 1.6 as 1.7 is not officially supported yet)

    Windows Vista does not support the free graphics standard openGL by default. Therefore Illarion will not run with the graphics drivers included with Vista. With a better graphics driver from your graphics card manufacturer including openGL support, everything should work.</li>
	
	<li class="question"><a name="">Where can I download the game?</a></li>
	<li class="answer">On the <a href="http://illarion.org/illarion/us_java_download.php">Download page of the website</a>. It will then download and install Illarion. You will be prompted to choose a directory to store your character relevant data. It would be advised to store them in a folder you can easily find afterwards.</li>
	
	<li class="question"><a name="">Why does downloading take so long?</a></li>
	<li class="answer">The client is 35MB. With a slow connection, this might take a while to download. From time to time, the installation stalls for a while but please be patient, the download will continue automatically. Use the time and read the forums and other FAQs</li>
	
	<li class="question"><a name="">Why isn't the game starting?</a></li>
	<li class="answer">If the game is installed and launched correctly but fails to start please check the <a href="http://illarion.org/community/forums/viewforum.php?f=3&sid=242eca57695d6d0ac04e9160ef8cf46b" >Support Forums</a> for any known issues</li>
	
	<li class="question"><a name="">How do I log into the game?</a></li>
	<li class="answer">Once you have created your character <a href="http://illarion.org/community/account/us_charlist.php" >Here</a> you need to log onto the client with the relevant characters name that you want to play (Names are case sensitive) and your account password</li>
</ul>

<?php insert_go_to_top_link(); ?>


<h2>First Steps Into Illarion</h2>

<ul>
	<li class="question"><a name="">I just started playing and don't know what i want to do!</a></li>
	<li class="answer">You're free to do whatever you like. You could become a proud Knight, a dedicated Priest, an industrious Crafter, a prudent Druid or a mysterious Mage.</li>
	
	<li class="question"><a name="">How can I attack and kill somebody?</a></li>
	<li class="answer">You can either right click on a character and choose "Attack", or you can hold down CTRL and left click the character. Please respect that it is only allowed to attack other characters when there is a valid roleplay reason to do so. You should also give your target the chance to interact before and during a fight. Emotes that show your character drawing his or her weapon, or moving in an intimidating fashion to another character are appreciated, if not expected.</li>
	
	<li class="question"><a name="">How do I pick up items?</a></li>
	<li class="answer">Right click on an item and choose "Pick up". Alternatively you may move the item by "Dragging and Dropping" it to a free place in your inventory. This process is similar to the way icons are moved on Windows/Linux/MacOS-desktops. Your inventory is composed of your character's clothing (which is the spaces on top of the image of a man), the belt (which is the six spaces under your character's clothing/armour) and a bag. The bag must be worn and can be opened to be able to use it. If you want to open the bag of your character, right click on the bag and choose "Open" or click on it with the middle mouse button, if your mouse has one.</li>
	
	<li class="question"><a name="">How do I use or equip items?</a></li>
	<li class="answer">To equip an item, move the item you want to equip to a free slot in your inventory (the 'man' at the right of the screen). If you hold your mouse over a slot it shows you what you can put here. The slot has to be free to put something new in it. To do this, move the previous item somewhere else (e.g in the bag of your character). This works for weapons, armour or anything else you wear. If you want to use an item (e.g. eating an apple), right click and choose "Use". Alternatively you can hold SHIFT and click the item and release.</li>
	
	<li class="question"><a name="">I equipped an item so why doesn't it show on my character?</a></li>
	<li class="answer">Paperdolling isn't yet featured in Illarion (implemented into the VBU). To know what someone else looks like, you can click on the character to get a short description and what items he has equipped. Right-clicking will show you an option to view him carefully. This sends a message to the player, so don't do it frequently, but allows you to view most of the items he's wearing.</li>
</ul>

<?php insert_go_to_top_link(); ?>


<h2>Game Concepts</h2>

<ul>
	<li class="question"><a name="">What is an RPG and what makes Illarion special?</a></li>
	<li class="answer">Role playing games (RPG) are a popular game genre. Players take on the role of a fantasy character and are able to do many things that may be impossible in Real Life. Illarion takes the concept of Roleplaying further than other games, players are expected to immerse themselves completely into the life of their character. Whilst playing Illarion you cease to be John/Jane Smith from New York and instead take on the role of a fictional character by feeling, saying, and thinking what he or she would. Illarion is set in a medieval world with no electricity, cars, televisions or power tools. Whilst playing you are expected to refrain from mentioning anything Out Of Character (OOC). If this concept does not interest you, then Illarion is probably not the game for you.</li>
	
	<li class="question"><a name="">What are CMs and GMs</a></li>
	<li class="answer">A CM is a Community Manager. Their role is to assist new players and help resolve issues or conflicts between players. They should be the first people to turn to in the event of a non-technical issue. A GM is a GameMaster. The GMs uphold the rules of Illarion and may punish players for breaking the rules or exploiting bugs.</li>

	<li class="question"><a name="">Why do some of the players talk funny?</a></li>
	<li class="answer">First of all, Illarion is played by players from all around the world. So it's no wonder that they don't speak the same language. English and German are the most common languages and it is a matter of courtesy to switch language to a language commonly understood when encountering other players. Special dialects could be applied as well. Most players try to make their characters sound medieval without using Old English as many people would struggle to understand. Abbreviations and chat slang are also against the rules. Take your time using capital letters and punctuation marks too. Bad Example: "ok hi wanna buy sword lol!!!111" Good Example: "Greetings, noble sir. May I draw your attention on this well crafted blade, a blade I'd like to offer to you for a reasonable price?"</li>
		
	<li class="question"><a name="">How do I find out an items stats?</a></li>
	<li class="answer">You don't. We try to make Illarion as "realistic" as possible. In medieval times, you simply would not hear a weapon smith say "This sword has an attack value of 20". Instead people tried out several swords and then decided which one suited them best. Weapons do have specific values, but those are decided by many variables, (i.e. the skill of the smith) so we could not give you a numerical value anyway.</li>
	
	<li class="question"><a name="">Where can I see my exact skill levels and attributes?</a></li>
	<li class="answer">A person cannot be reduced to a numerical value. Just imagine, you sit on a bench somewhere and overhear a conversation. A person says "I increased my running skill to level 40 yesterday, and leveled up to level 43." I am sure you would laugh pretty hard at that person. Well, the same holds in Illarion. You can see rough values in the form of a bar graph in the skill list (and you can always compare yourself roughly to other people). It would be simpler to have a precise skill system, but this game was created in the spirit of role playing. If you disagree with this, Illarion might not be the game for you.</li>
	
	<li class="question"><a name="">How do I send global chat messages?</a></li>
	<li class="answer">You can't. How would you do that in medieval times anyway? There were no P.A. systems, radios, or cell phones. Such things were impossible. We might grant powerful mages a special ability to communicate by telepathy, but nothing is planned yet. If you need to spread a message, you can always hire another player as a messenger or use the <a href="http://illarion.org/community/forums/index.php" >Forums</a> to leave messages on the town walls.</li>
</ul>

<?php insert_go_to_top_link(); ?>


<h2>Contributing to Illarion</h2>

<ul>
	<li class="question"><a name="">How can i contribute to Illarion?</a></li>
	<li class="answer">There are many ways in which you can contribute to Illarion. You could provide financial support, assist with the development of the game or help promote the game on external sites.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>