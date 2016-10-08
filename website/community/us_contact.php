<?php
   /*
* Contact Page of Illarion
*
* @author Martin Karing <nitram@illarion.org>
* @copyright 2006, Illarion e.V.
* @version 1.0 ENGLISH
*
*/
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
include 'inc.contact.php';

Page::setTitle( 'Contact' );
Page::setDescription( 'Here you find all informations needed to get in contact with the Illarion staff.' );
Page::setKeywords( array( 'Contact', 'E-Mail', 'email', 'Email' ) );
Page::setXHTML();
Page::Init();

function MainForm() {
?>

<h1>Contact to Illarion</h1>

<h2>Content</h2>
<ul>
	<li><a class="hidden" href="#1">General Information</a></li>
	<li><a class="hidden" href="#2">Community Managers</a></li>
	<li><a class="hidden" href="#3">Gamemasters</a></li>
	<li><a class="hidden" href="#4">Lead Developers</a></li>
	<li><a class="hidden" href="#5">Committee Illarion e.V.</a>
	<li><a class="hidden" href="#6">Website Credits</a></li></li>
</ul>

<h2><a name="1"></a>General Information</h2>

<?php echo Page::cap('Q'); ?>
<p>uestions and issues may arise when you play Illarion, so we have created a list of
relevant email addresses to which you can send your inquiries, reports,
wishes and such. As there are quite a few people working on Illarion, we have
divided the addresses into different categories, so that each mail is sent to
the appropriate people.</p>

<ul>
	<li><a href="?contact=1">Account requests</a> - Questions with regards to Account issues.</li>

	<li><a href="?contact=2">Webmaster contact</a> - Questions with regards to Website issues.</li>

	<li><a href="?contact=3">Reporting players</a> - To report a player breaking the rules.</li>

	<li><a href="?contact=4">Reporting Gamemasters</a> - If you feel there is an issue relating to a Gamemaster (GM)</li>

	<li><a href="?contact=5">RPG requests Cadomyr</a> - If you need Gamemaster support
	for a quest in Cadomyr you can ask for it here.</li>

	<li><a href="?contact=6">RPG requests Galmair</a> - If you need Gamemaster support
	for a quest in Galmair you can ask for it here.</li>
	
	<li><a href="?contact=7">RPG requests Runewick</a> - If you need Gamemaster support
	for a quest in Runewick you can ask for it here.</li>

	<li><a href="../mantis/">Bug reports</a> - Mistakes and errors you encounter
	within the game, can be reported here.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="2"></a>Community Managers</h2>

<?php echo Page::cap('S'); ?>
<p>ome players are known as "Community Managers" (CM).
These players duties include assisting new players and also helping resolve issues and conflicts between players.
They should be the first people to turn to for a non-technical issue that may arise. </p>

<ul>
<li><a href="?contact=30">Achae Eanstray</a> - English speaking Community Manager (US)</li>
<li><a href="?contact=32">Djironnyma</a> - German speaking Community Manager (EU)</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="3"></a>Gamemasters</h2>

<?php echo Page::cap('G'); ?>
<p>amemasters help players, host events and keep the peace in the game.
Gamemasters also run the ingame factions of Cadomyr, Galmair and Runewick.
Thus, all requests that affect the game world should be directed to them.</p>

<ul>
    <li><a href="?contact=45">Silverwing</a> - German speaking GM</li>
    <li><a href="?contact=34">Slightly</a> - English speaking GM</li>
    <li><a href="?contact=42">Teflon</a> - German speaking GM</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>


<h2><a name="4"></a>Lead Developers</h2>

<?php echo Page::cap('T'); ?>
<p>hese are the lead developers of Illarion and their responsibilities. 
The developers implement new features, run the game server and care for the homepage. 
Contact them especially if you want to join the development team of Illarion.</p>

<ul>
    <li><a href="?contact=25">Vilarion</a> - Server, Server Administrator</li>
	<li><a href="?contact=23">Nitram</a> - Client, Homepage</li>
	<li><a href="?contact=11">Estralis Seborian</a> - Game Content</li>
	<li><a href="?contact=22">Martin</a> - Graphics</li>
	<li><a href="?contact=40">Evie</a> - Maps</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="5"></a>Committee Illarion e.V.</h2>

<ul>
	<li><a href="?contact=25">Vilarion</a> - chairman</li>
	<li><a href="?contact=23">Nitram</a> - treasurer</li>
	<li><a href="?contact=21">Lennier</a> - secretary</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="6"></a>Website Credits</h2>
 
<h3>Illarion e.V.</h3> 

<p>
E-Mail: <a href="mailto:comittee@illarion.org">committee@illarion.org</a><br />
Webmaster: <a href="mailto:webmaster@illarion.org">Illarion e.V.</a><br />
Register court: Amtsgericht Kempten<br /> 
Register No.: VR 30767 <br /><br />
The website and its content is licensed under AGPLv3.<br /><br />
This page is valid <a href="http://validator.w3.org/check?uri=referer" rel="external">XHTML 1.1</a> and <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="external">CSS 2</a>.
</p>

<?php Page::insert_go_to_top_link(); ?>
<?php
   }

	$contact = (isset($_GET['contact']) && is_numeric($_GET['contact']) ? (int) $_GET['contact'] : 0);
   switch($contact) {
      case 1: // Account requests
         define(_CONTACT_NAME,"Account requests",false);
         define(_CONTACT_MAIL,"accounts@illarion.org",false);
         define(_CONTACT_DETAILS,"All questions concerning your account ".
         "will be answered here. Don't forget to mention your account ".
         "name in the e-mail or we might not be able to help you.<br />".
         "You need to send this e-mail from the e-mail address you used to ".
         "register your account",false);
      break;
      case 2: //Webmaster contact
         define(_CONTACT_NAME,"Webmaster contact",false);
         define(_CONTACT_MAIL,"webmaster@illarion.org",false);
         define(_CONTACT_DETAILS,"All questions to the webmaster of ".
         "Illarion and questions concerning the homepage will be answered ".
         "here.",false);
      break;
      case 3: //Reporting players
         define(_CONTACT_NAME,"Reporting players",false);
         define(_CONTACT_MAIL,"violations@illarion.org",false);
         define(_CONTACT_DETAILS,"Here you can report players, who have offended you".
         " and broke the rules.<br />Please add ".
         "the time and the date of the event, so we can ".
         "reconstruct your report with the server logs.",false);
      break;
      case 4: //Reporting GMs
         define(_CONTACT_NAME,"Reporting Gamemasters",false);
         define(_CONTACT_MAIL,"gm_complaint@illarion.org",false);
         define(_CONTACT_DETAILS,"In the situation that a Gamemaster abused".
         " his or her powers to support or punish a player in an improper".
         " way you can report them here. Those reports are handled by an".
         " impartial party.",false);
      break;
      case 5: //Cadomyr requests
         define(_CONTACT_NAME,"RPG requests for Cadomyr",false);
         define(_CONTACT_MAIL,"cadomyr@illarion.org",false);
         define(_CONTACT_DETAILS,"Here you can contact a Cadomyr Gamemaster ".
         "when you need their help with a quest."
         ,false);
      break;
      case 6: //Galmair requests
         define(_CONTACT_NAME,"RPG requests for Galmair",false);
         define(_CONTACT_MAIL,"galmair@illarion.org",false);
         define(_CONTACT_DETAILS,"Here you can contact a Galmair Gamemaster ".
         "when you need their help with a quest."
         ,false);
      break;
      case 7: //Runewick requests
         define(_CONTACT_NAME,"RPG requests for Runewick",false);
         define(_CONTACT_MAIL,"runewick@illarion.org",false);
         define(_CONTACT_DETAILS,"Here you can contact a Runewick Gamemaster ".
         "when you need their help with a quest."
         ,false);
      break;
      case 11: //Estralis Seborian
         define(_CONTACT_NAME,"Estralis Seborian",false);
         define(_CONTACT_MAIL,"estralis@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the lead content developer of Illarion.",false);
      break;
      case 15: //Zephyrius
         define(_CONTACT_NAME,"Zephyrius",false);
         define(_CONTACT_MAIL,"zephyrius@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Gamemaster who manages the faction of Runewick.",false);
      break;
      case 22: //Martin
         define(_CONTACT_NAME,"Martin",false);
         define(_CONTACT_MAIL,"martin@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the lead graphics developer of Illarion.",false);
      break;
      case 23: //Nitram
         define(_CONTACT_NAME,"Nitram",false);
         define(_CONTACT_MAIL,"nitram@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the lead client developer of Illarion.",false);
      break;
      case 25: //Vilarion
         define(_CONTACT_NAME,"Vilarion",false);
         define(_CONTACT_MAIL,"vilarion@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the lead server developer of Illarion. ".
         "He also is the server administrator, i.e. 'root'. Furthermore he is the chairman ".
         "of the Illarion society.",false);
      break;
      case 28: //Aragon
         define(_CONTACT_NAME,"Aragon",false);
         define(_CONTACT_MAIL,"aragon@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the treasurer of the ".
         "Illarion e.V. and is able to answer questions about the society."
         ,false);
      break;
      case 30: //Achae
         define(_CONTACT_NAME,"Achae Eanstray",false);
         define(_CONTACT_MAIL,"achae@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is an English speaking Community Manger.",false);
      break;
      case 31: //Obsydien
         define(_CONTACT_NAME,"Obsydien",false);
         define(_CONTACT_MAIL,"obdydien@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Gamemaster who manages the faction of Cadomyr.",false);
      break;
      case 32: //Djironnyma
         define(_CONTACT_NAME,"Djironnyma",false);
         define(_CONTACT_MAIL,"djironnyma@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a German speaking Community Manger.",false);
      break;
      case 34: //Slightly
         define(_CONTACT_NAME,"Slightly",false);
         define(_CONTACT_MAIL,"slightly@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Gamemaster who manages the faction of Galmair.",false);
      break;
      case 40: //Zot
         define(_CONTACT_NAME,"Evie",false);
         define(_CONTACT_MAIL,"evie@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the lead map developer of Illarion.",false);
      break;
      case 41: //Bloodraven
         define(_CONTACT_NAME,"Bloodraven",false);
         define(_CONTACT_MAIL,"bloodraven@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Gamemaster who manages the faction of Runewick.",false);
      break;
      case 42: //Teflon
         define(_CONTACT_NAME,"Teflon",false);
         define(_CONTACT_MAIL,"teflon@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Gamemaster who manages the faction of Galmair.",false);
      break;
      case 45: //Silverwing
         define(_CONTACT_NAME,"Silverwing",false);
         define(_CONTACT_MAIL,"silverwing@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Gamemaster who manages the faction of Cadomyr.",false);
      break;
      default:
         MainForm();
         exit();
      break;
   }
   define(_MAIL,"Your email address:",false);
   define(_SEND_MAIL,"Send email",false);
   define(_BAD_MAIL,"Invalid email address",false);
   define(_BAD_CONTENT,"email content too short",false);
   define(_SUBJECT,"Subject:",false);
   define(_CONTENT,"Email content:",false);
   define(_MAIL_TRANSMITTED,"Email was successfully transmitted<br />".
   "Forwarding in 3 seconds to the contact overview.",false);
   define(_MAIL_TRANSMITTED_FAILED,"Failed sending the email.<br />",false);
   ShowAndTransmitMail();
?>
