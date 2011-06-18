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
	Page::Init();
	Page::setXHTML();

   function MainForm() {
?>

<h1>Contact to Illarion</h1>

<h2>Content</h2>
<ul>
	<li><a class="hidden" href="#1">General information</a></li>
	<li><a class="hidden" href="#2">Gamemaster</a></li>
	<li><a class="hidden" href="#3">General contacts</a></li>
	<li><a class="hidden" href="#4">Personal contacts</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="1"></a>General information</h2>

<?php echo Page::cap('Q'); ?>
<p>uestions may arise when you play Illarion, so we have created a list of
relevant email addresses to which you can send your inquiries, bug reports,
wishes and such. As there are quite a few people working on Illarion, we have
divided the addresses into different categories, so that each mail is sent to
the appropriate people. Therefore, you should make sure you send your e-mails
to the right address, as they will otherwise probably just be ignored.</p>

<p>Make sure you have already read the
<a href="<?php echo Page::getURL(); ?>/general/us_faq_graphic.php">Graphic-FAQ</a>,
<a href="<?php echo Page::getURL(); ?>/general/us_faq_concept.php">Concepts-FAQ</a>,
<a href="<?php echo Page::getURL(); ?>/general/us_faq_technic.php">Technical-FAQ</a> or even checked
out the <a href= "<?php echo Page::getURL(); ?>/community/forums/">Forum</a> before
you write us your mails, as the answer to your problem may well be there,
and it is an annoyance for us to answer the same questions again and
again.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="2"></a>Gamemaster</h2>

<?php echo Page::cap('S'); ?>
<p>ome players have a special Gamemaster character. These uphold the rules of Illarion, and may
punish any and all infractions severely, or even pass it on to the admins. Lying to or
decieveing a Gamemaster, regarding rule offenders and bugs/errors is strictly forbidden.
Furthermore, if a Gamemaster is busy or discussing game relevant matters, he should only be
disturbed in urgent cases. The names of other characters of a Gamemaster are witheld, and will
only be released when speciffically requested by the Gamemaster
herself/himself.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="3"></a>General contacts</h2>

<ul>
	<li><a href="?contact=1">Account requests</a> - every question
	concerning your account fit in here.</li>

	<li><a href="?contact=2">Webmaster contact</a> - Every question concerning
	the website goes here</li>

	<li><a href="?contact=3">Reporting players</a> - here you can report
	players, who break the rules of Illarion</li>

	<li><a href="?contact=4">Reporting gamemasters</a> - here you can
	complain about gamemasters if it is needed</li>

	<li><a href="?contact=5">RPG requests</a> - If you need gamemaster support
	for a quest you can mail to this adress. A better alternative however is
	to seek direct contact with a gamemaster. You will find their addresses
	further below at the <a class="hidden" href="#3">personal contacts</a>
	</li>

	<li><a href="?contact=6">Character requests</a> - all requests concerning
	your character go here.</li>

	<li><a href="?contact=7">Bug reports</a> - mistakes and errors you locate
	within the game, can be reported here. But it's better to report them
	on the <a href="../mantis/">Mantis-Bugtracker</a>.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="4"></a>Personal contacts</h2>

<?php echo Page::cap('S'); ?>
<p>ome players have a special Gamemaster character. These uphold the rules
of Illarion, and may punish any and all infractions severely, or even pass
it on to the admins. Lying to or decieveing a Gamemaster, regarding rule
offenders and bugs/errors is strictly forbidden. Furthermore, if a
Gamemaster is busy or discussing game relevant matters, he should only be
disturbed in urgent cases. The names of other characters of a Gamemaster
are witheld, and will only be released when speciffically requested by the
Gamemaster herself/himself.</p>

<?php Page::insert_go_to_top_link(); ?>

<h3>Gamemasters</h3>

<p>These Gamemasters take care of all things concerning quests, new players,
and of players who don't care for the rules.</p>

<ul>
	<li><a href="?contact=14">Arien Edhel</a></li>
	<li><a href="?contact=11">Estralis Seborian</a></li>
	<li><a href="?contact=41">Flux</a></li>
	<li><a href="?contact=43">Nomos</a></li>
	<li><a href="?contact=42">Randar</a></li>
	<li><a href="?contact=40">Zot</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Developers</h3>

<p>These are the developers of Illarion and their responsibilities</p>

<ul>
	<li><a href="?contact=16">Alatar</a> - webmaster, server administrator
	</li>
	<li><a href="?contact=33">Ardian</a> - scripts</li>
	<li><a href="?contact=21">Lennier</a> - map</li>
	<li><a href="?contact=22">martin</a> - scripts, server, graphic</li>
	<li><a href="?contact=23">Nitram</a> - client, scripts, homepage</li>
	<li><a href="?contact=31">pharse</a> - scripts</li> server administrator
	<li><a href="?contact=25">Vilarion</a> - scripts, server, server administrator</li>
	<li><a href="?contact=40">Zot</a> - map</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Committee Illarion e.V.</h3>

<ul>
	<li><a href="?contact=25">Vilarion</a> - chairman</li>
	<li><a href="?contact=28">Aragon</a> - treasurer</li>
	<li><a href="?contact=21">Lennier</a> - secretary</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<?php
   }

	$contact = (isset($_GET['contact']) && is_numeric($_GET['contact']) ? (int) $_GET['contact'] : 0);
   switch($contact) {
      case 1: // Account requests
         define(_CONTACT_NAME,"Account requests",false);
         define(_CONTACT_MAIL,"accounts@illarion.org",false);
         define(_CONTACT_DETAILS,"All questions concerning the accounts ".
         "will be answered here. Don't forget to note down your account ".
         "name in the email if the problem is about a existing account else".
         " we can't help you.<br />To make sure that it is your account, ".
         "you need to send this mail from the e-mail address you used to ".
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
         define(_CONTACT_DETAILS,"Here you can report players, whom behaved".
         " incorrectly in your eyes and broke the rules.<br />Please add ".
         "the time and the date of when the problems took place, so we can ".
         "check your report with the server log files.",false);
      break;
      case 4: //Reporting players
         define(_CONTACT_NAME,"Reporting gamemasters",false);
         define(_CONTACT_MAIL,"gm_complaint@illarion.org",false);
         define(_CONTACT_DETAILS,"In the situation that a gamemaster abused".
         " his or her powers to support or punish a player in an unproper".
         " way you can report this here. Those reports are handled by a".
         " impartial person.",false);
      break;
      case 5: //RPG requests
         define(_CONTACT_NAME,"Roleplay requests",false);
         define(_CONTACT_MAIL,"RPG_requests@illarion.org",false);
         define(_CONTACT_DETAILS,"Here you can contact a gamemaster if you ".
         "need their help for a quest.<br />Most of the time it will be ".
         "better to personally contact one. Take a look at the".
         "<a href=\"us_contact.php#3\">Personal ".
         " contacts</a> to do this.",false);
      break;
      case 6: //Character requests
         define(_CONTACT_NAME,"Character requests",false);
         define(_CONTACT_MAIL,"character_requests@illarion.org",false);
         define(_CONTACT_DETAILS,"Every question and request concerning ".
         "your character can be send here. Please send us the name of your ".
         "account as well, to prove that it is really your character."
         ,false);
      break;
      case 7: //Bug reports
         define(_CONTACT_NAME,"Bug reports",false);
         define(_CONTACT_MAIL,"bugs@illarion.org",false);
         define(_CONTACT_DETAILS,"Any bug you find in the game, has to be ".
         "reported either here or on <a href=\"../flyspray/index.php\">".
         "Flyspray</a>.<br />Please describe exactly, what went wrong."
         ,false);
      break;
      case 8: //Loralyn
         define(_CONTACT_NAME,"Loralyn",false);
         define(_CONTACT_MAIL,"loralyn@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who takes".
         " care of rule breaking players, managing account and characters, ".
         "answers race applications and helps newbies.",false);
      break;
      case 9: //Latharan Caine
         define(_CONTACT_NAME,"Latharan Caine",false);
         define(_CONTACT_MAIL,"latharan@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.<br />Beside this he ".
         "takes care of rule breaking players, managing account and ".
         "characters, answers race applications and helps newbies.<br />If ".
         "you are in need of information related to the background of ".
         "Illarion, you can contact him too.",false);
      break;
      case 10: //Noradur
         define(_CONTACT_NAME,"Noradur",false);
         define(_CONTACT_MAIL,"noradur@hotmail.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 11: //Estralis Seborian
         define(_CONTACT_NAME,"Estralis Seborian",false);
         define(_CONTACT_MAIL,"estralis@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who takes".
         " care of rule breaking players, managing account and characters, ".
         "answers race applications and helps newbies.",false);
      break;
      case 13: //Thorvald
         define(_CONTACT_NAME,"Thorvald",false);
         define(_CONTACT_MAIL,"Jenny_Pirker@gmx.at",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 14: //Arien Edhel
         define(_CONTACT_NAME,"Arien Edhel",false);
         define(_CONTACT_MAIL,"arien@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who takes".
         " care of rule breaking players, managing account and characters, ".
         "answers race applications and helps newbies.",false);
      break;
      case 16: //Alatar
         define(_CONTACT_NAME,"Alatar",false);
         define(_CONTACT_MAIL,"alatar@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME."is the webmaster of ".
         "Illarion and one of the two server administrators. Homepage ".
         "related questions.<br />Furthermore he is the chairman of the ".
         "Illarion e.V. and is able to answer questions about the society."
         ,false);
      break;
      case 17: //Cassandra Fjurin
         define(_CONTACT_NAME,"Cassandra Fjurin",false);
         define(_CONTACT_MAIL,"cassandra@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is one of the server ".
         "and script developers. He is able to answer server and script ".
         "related questions.",false);
      break;
      case 19: //Falk vom Wald
         define(_CONTACT_NAME,"Falk vom Wald",false);
         define(_CONTACT_MAIL,"falk@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a script developer (druid system)."
         ,false);
      break;
      case 20: //Gro'bul
         define(_CONTACT_NAME,"Gro'bul",false);
         define(_CONTACT_MAIL,"gamer_dudeman@hotmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is one of the graphic ".
         "designers. Proposals and questions concerning graphics can be ".
         "send to him.",false);
      break;
      case 21: //Lennier
         define(_CONTACT_NAME,"Lennier",false);
         define(_CONTACT_MAIL,"Koschb5@yahoo.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the leading map ".
         "designer and takes care for the developing of the map. Questions ".
         "about the map are to be directed to him.",false);
      break;
      case 22: //martin
         define(_CONTACT_NAME,"martin",false);
         define(_CONTACT_MAIL,"martin@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a server- and script-".
         "developer. Furthermore he takes care of the graphics. Questions ".
         "concerning these topics can be directed to him.",false);
      break;
      case 23: //Nitram
         define(_CONTACT_NAME,"Nitram",false);
         define(_CONTACT_MAIL,"nitram@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is one of the developers ".
         "for scripts and for the website. Questions concerning these ".
         "topics can be directed to him.",false);
      break;
      case 24: //Shi'voc
         define(_CONTACT_NAME,"Shi'voc",false);
         define(_CONTACT_MAIL,"shivoc@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is one of the server ".
         "administrators and answers questions related to the server."
         ,false);
      break;
      case 25: //Vilarion
         define(_CONTACT_NAME,"Vilarion",false);
         define(_CONTACT_MAIL,"vilarion@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is one of the server and ".
         "script developers as well as a server administrator. He can answer questions related to these ".
         "topics.",false);
      break;
      case 26: //Nop
         define(_CONTACT_NAME,"Nop",false);
         define(_CONTACT_MAIL,"nop@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the developer of the ".
         "Java Client and is able to answer Client related questions."
        ,false);
      break;
      case 27: //Misjbar
         define(_CONTACT_NAME,"Misjbar",false);
         define(_CONTACT_MAIL,"mastedoc@gmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is one of the developers ".
         "for map design. He can answer map related questions."
         ,false);
      break;
      case 28: //Aragon
         define(_CONTACT_NAME,"Aragon",false);
         define(_CONTACT_MAIL,"aragon@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is the treasurer of the ".
         "Illarion e.V. and is able to answer questions about the society."
         ,false);
      break;
      case 29: //Naerwyn
         define(_CONTACT_NAME,"Naerwyn",false);
         define(_CONTACT_MAIL,"NaerwynGM@hotmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 30: //Kadiya
         define(_CONTACT_NAME,"Kadiya",false);
         define(_CONTACT_MAIL,"kadiya@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a Developer who cares ".
         "mainly for the development of the homepage. She is able to answer ".
         "Homepage related questions.",false);
      break;
      case 31: //Pharse
         define(_CONTACT_NAME,"Pharse",false);
         define(_CONTACT_MAIL,"pharse@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a script developer.",false);
      break;
      case 32: //Aegohl
         define(_CONTACT_NAME,"Aegohl",false);
         define(_CONTACT_MAIL,"aegohl@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 33: //Ardian
         define(_CONTACT_NAME,"Ardian",false);
         define(_CONTACT_MAIL,"a.kukalaj@googlemail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a script developer.",false);
      break;
      case 34: //Garou
         define(_CONTACT_NAME,"Garou",false);
         define(_CONTACT_MAIL,"garou@arcor.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 35: //Alsaya
         define(_CONTACT_NAME,"Alsaya",false);
         define(_CONTACT_MAIL,"alsaya@gmx.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 36: //Mesha
         define(_CONTACT_NAME,"Mesha",false);
         define(_CONTACT_MAIL,"mesha@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 37: //Revan
         define(_CONTACT_NAME,"Revan",false);
         define(_CONTACT_MAIL,"GmRevan@live.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 38: //Vaun
         define(_CONTACT_NAME,"Vaun",false);
         define(_CONTACT_MAIL,"illavaun@live.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who takes".
         " care of rule breaking players, managing account and characters, ".
         "answers race applications and helps newbies.",false);
      break;
      case 39: //Feliae
         define(_CONTACT_NAME,"Feliae",false);
         define(_CONTACT_MAIL,"Felidae.Illa@hotmail.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." is a gamemaster who helps ".
         "you in quest related things.",false);
      break;
      case 40: //Zot
         define(_CONTACT_NAME,"Zot",false);
         define(_CONTACT_MAIL,"arjan.k@web.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 41: //Flux
         define(_CONTACT_NAME,"Flux",false);
         define(_CONTACT_MAIL,"fluxilla@hotmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 42: //Randnar
         define(_CONTACT_NAME,"Randnar",false);
         define(_CONTACT_MAIL,"randnarillarion@yahoo.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 43: //Nomos
         define(_CONTACT_NAME,"Nomos",false);
         define(_CONTACT_MAIL,"gmnomos@hotmail.co.uk",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
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
