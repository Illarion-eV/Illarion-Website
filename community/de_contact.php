<?php
   /*
    * Contact Page of Illarion
    *
    * @author Martin Karing <nitram@illarion.org>
    * @copyright 2006, Illarion e.V.
    * @version 1.0 GERMAN
    *
    */
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	include 'inc.contact.php';
	
	Page::setTitle( 'Kontakt' );
	Page::setDescription( 'Hier stehen alle Möglichkeiten mit dem Illarion Teamin Verbindung zu treten.' );
	Page::setKeywords( array( 'Kontakt', 'E-Mail', 'email', 'Email' ) );
	Page::Init();
	Page::setXHTML();

	function MainForm() {
?>
<h1>Kontakt zu Illarion</h1>

<h2>Inhalt</h2>
<ul>
	<li><a class="hidden" href="#1">Allgemeine Informationen</a></li>
	<li><a class="hidden" href="#2">Gamemaster</a></li>
	<li><a class="hidden" href="#3">Allgemeine Kontakte</a></li>
	<li><a class="hidden" href="#4">Persönliche Kontakte</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="1"></a>Allgemeine Informationen</h2>

<?php echo Page::cap('R'); ?>
<p>und um Illarion tauchen immer wieder Fragen, Wünsche und Anregungen auf.
Da für unterschiedliche Bereiche unterschiedliche Projekt-Mitarbeiter
verantwortlich sind, gibt es für jeden Bereich eine extra
E-Mail-Adresse, an die Du Dich wenden kannst. Aber prüfe bitte GENAU,
in welche Kategorie Dein Anliegen fällt und teile die E-Mail
gegebenenfalls auf!</p>

<p>Überprüfe VORHER, ob deine Anfrage eventuell in der
<a href="<?php echo Page::getURL(); ?>/general/de_faq_graphic.php">Grafik-FAQ</a>,
<a href="<?php echo Page::getURL(); ?>/general/de_faq_concept.php">Konzept-FAQ</a>,
<a href="<?php echo Page::getURL(); ?>/general/de_faq_technic.php">Technik-FAQ</a> oder in den
verschiedenen Bereichen des
<a href= "<?php echo Page::getURL(); ?>/community/forums">Forum</a> beantwortet
wurde oder dort gestellt werden kann. Dies spart uns wertvolle Zeit für
der Weiterentwicklung von Illarion.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="2"></a>Gamemaster</h2>

<?php echo Page::cap('E'); ?>
<p>inige Spieler haben den Status eines Gamemasters für einen speziellen Charakter. Diese sind
dafür zuständig für Ordnung zu sorgen und können selbst Strafen zur Durchsetzung dieser Regeln
verhängen, bzw. diese durch den Administrator ausführen lassen. Das Belügen/Täuschen eines
Gamemasters in Bezug auf Regelverstöße und Programmfehler ist verboten. Ist ein Gamemaster
offensichtlich gerade mit Arbeit beschäftigt oder in ein wichtiges, spielrelevantes Gespräch
vertieft, soll er nur in dringenden Fällen gestört werden. Die Namen weiterer Charaktere eines
Gamemasters dürfen nicht gegen seinen Willen weitergegeben
werden.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="3"></a>Allgemeine Kontakte</h2>

<ul>
	<li><a href="?contact=1">Accountanfragen</a> - alle Fragen bezüglich
	deines Accounts, können hier gestellt werden</li>

	<li><a href="?contact=2">Kontakt zum Webmaster</a> - Fragen bezüglich
	der Webseite, können hier gestellt werden</li>

	<li><a href="?contact=3">Spieler melden</a> - Spieler, die die Regeln
	von Illarion verletzt haben, können hier gemeldet werden</li>

	<li><a href="?contact=4">Gamemaster melden</a> - hier kann man, so es
	nötig ist, sich über das Verhalten und Vorgehen eines
	Gamemasters beschweren</li>

	<li><a href="?contact=5">RPG-Anfragen</a> - sollte die Unterstützung
	eines Gamemasters für ein Quest benötigt werden, kann hier
	darum gebeten werden. Allerdings ist es besser sich direkt an einen
	Gamemaster zu wenden. Siehe <a class="hidden" href="#3">Persönliche
	Kontakte</a></li>

	<li><a href="?contact=6">Charakteranfragen</a> - alle Anfragen
	bezüglich der Charaktere sind hier richtig.</li>

	<li><a href="?contact=7">Fehlermeldungen</a> - Fehler im Spiel
	können hier gemeldet werden. Oder im <a href="../mantis/">
	Mantis-Bugtracker</a>.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="4"></a>Persönliche Kontakte</h2>

<h3>Gamemasters</h3>

<p>Diese Gamemaster kümmern sich um besondere Ereignisse im Spiel, um Neulinge
und um alle die es nicht so mit Regeln haben.</p>

<ul>
	<li><a href="?contact=14">Arien Edhel</a></li>
	<li><a href="?contact=11">Estralis Seborian</a></li>
	<li><a href="?contact=41">Flux</a></li>
	<li><a href="?contact=43">Nomos</a></li>
	<li><a href="?contact=40">Zot</a></li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Entwickler</h3>

<p>Das sind die Entwickler von Illarion und ihre Aufgaben.</p>

<ul>
	<li><a href="?contact=16">Alatar</a> - Webmaster, Serveradministration
	</li>
	<li><a href="?contact=33">Ardian</a> - Skripte</li>
	<li><a href="?contact=21">Lennier</a> - Karte</li>
	<li><a href="?contact=22">martin</a> - Skripte, Server, Grafik</li>
	<li><a href="?contact=23">Nitram</a> - Client, Skripte, Homepage</li>
	<li><a href="?contact=23">Kadiya</a> - Skripte, Homepage</li>
	<li><a href="?contact=31">pharse</a> - Skripte</li>
	<li><a href="?contact=25">Vilarion</a> - Skripte, Server, Serveradministration</li>
	<li><a href="?contact=40">Zot</a> - Karte</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Vereinsvorstand Illarion e.V.</h3>

<ul>
	<li><a href="?contact=25">Vilarion</a> - Vorsitzender</li>
	<li><a href="?contact=28">Aragon</a> - Kassenwart</li>
	<li><a href="?contact=21">Lennier</a> - Schriftführer</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
<?php
   }
	$contact = (isset($_GET['contact']) && is_numeric($_GET['contact']) ? (int) $_GET['contact'] : 0);
   switch($contact) {
      case 1: // Accountanfragen
         define(_CONTACT_NAME,"Accountanfragen",false);
         define(_CONTACT_MAIL,"accounts@illarion.org",false);
         define(_CONTACT_DETAILS,"Alle Fragen bezüglich der Account ".
         "werden hier beantwortet. Vergiss nicht deinen Account Namen in ".
         "die E-Mail zu schreiben, sonst können wir nicht helfen.".
         "<br />Außerdem ist es wichtig das du diese E-Mail mit der ".
         "selben E-Mail Adresse absendest, wie in deinem Account steht um ".
         "nachzuweisen das es wirklich dein Account ist.",false);
      break;
      case 2: //Webmaster contact
         define(_CONTACT_NAME,"Kontakt zum Webmaster",false);
         define(_CONTACT_MAIL,"webmaster@illarion.org",false);
         define(_CONTACT_DETAILS,"Alle Fragen an den Webmaster von Illarion".
         " und Fragen bezüglich der Webseite, können hier ".
         "gestellt werden.",false);
      break;
      case 3: //Reporting players
         define(_CONTACT_NAME,"Spieler melden",false);
         define(_CONTACT_MAIL,"violations@illarion.org",false);
         define(_CONTACT_DETAILS,"Hier kannst du Spieler die sich in deinen".
         " Augen schlecht verhalten haben und die Regeln gebrochen haben ".
         "melden.<br />Bitte notiere auch Zeit und Datum des Vorfalls damit".
         " wir den Vorfall mit Hilfe der Server Log Dateien beweisen ".
         "können.",false);
      break;
      case 4: //Reporting players
         define(_CONTACT_NAME,"Gamemaster melden",false);
         define(_CONTACT_MAIL,"gm_complaint@illarion.org",false);
         define(_CONTACT_DETAILS,"Sollte ein Gamemaster seine ".
         "Möglichkeiten dazu missbrauchen, Spieler in einem ".
         "unangemessenen Maß zu bestrafen oder zu unterstützen, ".
         "kann das hier gemeldet werden.<br />Die Meldungen werden von ".
         "einer neutralen Person bearbeitet.",false);
      break;
      case 5: //RPG requests
         define(_CONTACT_NAME,"Rollenspielanfragen",false);
         define(_CONTACT_MAIL,"RPG_requests@illarion.org",false);
         define(_CONTACT_DETAILS,"Hier kannst du mit einem Gamemaster in".
         "in Kontakt treten, wenn du Unterstützung bei einem Quest ".
         "brauchst. Allerdings ist es meist besser, sich direkt an einen ".
         "Gamemaster zu wenden. Sieh dir dazu die ".
         "<a href=\"de_contact.php#3\">persönlichen Kontakte</a> an."
         ,false);
      break;
      case 6: //Character requests
         define(_CONTACT_NAME,"Charakteranfragen",false);
         define(_CONTACT_MAIL,"character_requests@illarion.org",false);
         define(_CONTACT_DETAILS,"Alle Fragen und Anfragen bezüglich ".
         "deiner Charaktere sind hier zu stellen.<br />Bitte schreibe uns den".
         " Namen deines Accounts dazu, um nachzuweisen, dass es wirklich ".
         "dein Charakter ist.",false);
      break;
      case 7: //Bug reports
         define(_CONTACT_NAME,"Fehlermeldungen",false);
         define(_CONTACT_MAIL,"bugs@illarion.org",false);
         define(_CONTACT_DETAILS,"Alle Fehler im Spiel müssen hier ".
         "oder im <a href=\"../mantis\">Mantis</a> gemeldet ".
         "werden.<br />Bitte beschreibe genaustens, was nicht richtig geht."
         ,false);
      break;
      case 8: //Loralyn
         define(_CONTACT_NAME,"Loralyn",false);
         define(_CONTACT_MAIL,"loralyn@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der ".
         "sich um regelbrechende Spieler kümmert, Account und ".
         "Charakter verwaltet, Rassenbewerbungen bearbeitet und Neulingen ".
         "hilft.<br /><br />Bitte Englisch schreiben",false);
      break;
      case 9: //Latharan Caine
         define(_CONTACT_NAME,"Latharan Caine",false);
         define(_CONTACT_MAIL,"latharan@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist einer der Gamemaster ".
         "die sich um Quest bezogene Anfragen kümmern.<br />Abgesehen ".
         "davon kümmert er sich um regelbrechende Spieler, er ".
         "verwaltet Charakter und Account, bearbeitet Rassenbewerbungen und".
         " kümmert sich um Neulinge.<br />Außerdem ist er der ".
         "Ansprechparter sollte es Fragen zur Hintergrundgeschichte von ".
         "Illarion geben.",false);
      break;
      case 10: //Noradur
         define(_CONTACT_NAME,"Noradur",false);
         define(_CONTACT_MAIL,"noradur@hotmail.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 11: //Estralis Seborian
         define(_CONTACT_NAME,"Estralis Seborian",false);
         define(_CONTACT_MAIL,"estralis@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der ".
         "sich um regelbrechende Spieler kümmert, Account und ".
         "Charakter verwaltet, Rassenbewerbungen bearbeitet und Neulingen ".
         "hilft.",false);
      break;
	  case 12: //Zak
         define(_CONTACT_NAME,"Zak",false);
         define(_CONTACT_MAIL,"zak@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der ".
         "sich gezielt um neue Spieler kümmert und ihnen ".
         "den Einstieg in das Spiel erleichtert. <br />Zudem bearbeitet er ".
         "die (An-)Fragen alter wie auch neuer Spieler.",false);
      break;
      case 13: //Thorvald
         define(_CONTACT_NAME,"Thorvald",false);
         define(_CONTACT_MAIL,"Jenny_Pirker@gmx.at",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 14: //Arien Edhel
         define(_CONTACT_NAME,"Arien Edhel",false);
         define(_CONTACT_MAIL,"arien@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der ".
         "sich um regelbrechende Spieler kümmert, Account und ".
         "Charakter verwaltet, Rassenbewerbungen bearbeitet und Neulingen ".
         "hilft.",false);
      break;
      case 16: //Alatar
         define(_CONTACT_NAME,"Alatar",false);
         define(_CONTACT_MAIL,"alatar@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ",false);
      break;
      case 17: //Cassandra Fjurin
         define(_CONTACT_NAME,"Cassandra Fjurin",false);
         define(_CONTACT_MAIL,"cassandra@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist einer der ".
         "Server- und Scriptentwickler und damit in der Lage die meisten ".
         "Spielserver und Script bezogenen Fragen zu beantworten.",false);
      break;
      case 19: //Falk vom Wald
         define(_CONTACT_NAME,"Falk vom Wald",false);
         define(_CONTACT_MAIL,"falk@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist Entwickler für ".
         "die Skripte (Druidensystem).",false);
      break;
      case 20: //Gro'bul
         define(_CONTACT_NAME,"Gro'bul",false);
         define(_CONTACT_MAIL,"gamer_dudeman@hotmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist einer der Grafik ".
         "Designer und in der Lage Fragen und Vorschläge zur Grafik ".
         "von Illarion zu bearbeiten.<br /><br />Bitte Englisch schreiben"
         ,false);
      break;
      case 21: //Lennier
         define(_CONTACT_NAME,"Lennier",false);
         define(_CONTACT_MAIL,"Koschb5@yahoo.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der leitende Karten ".
         "Designer und damit in der Lage, Fragen und Vorschläge rund ".
         "um die Karte zu beantworten.",false);
      break;
      case 22: //martin
         define(_CONTACT_NAME,"martin",false);
         define(_CONTACT_MAIL,"martin@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist einer der ".
         "Serverentwickler und ein Scripter. Außerdem ".
         "beschäftigt er sich mit dem Entwerfen von Grafiken für ".
         "Illarion. Er kann Fragen zu diesen Themen bearbeiten.",false);
      break;
      case 23: //Nitram
         define(_CONTACT_NAME,"Nitram",false);
         define(_CONTACT_MAIL,"nitram@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist Entwickler für ".
         "die Skripte und die Webseite. Fragen zu diesen Themen kann er ".
         "beantworten.",false);
      break;
      case 24: //Shi'voc
         define(_CONTACT_NAME,"Shi'voc",false);
         define(_CONTACT_MAIL,"shivoc@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist einer der Server ".
         "Administratoren und kann Fragen bezüglich des Hardware ".
         "Servers beantworten.",false);
      break;
      case 25: //Vilarion
         define(_CONTACT_NAME,"Vilarion",false);
         define(_CONTACT_MAIL,"vilarion@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist Server und ".
         "Scriptentwickler sowie Serveradministrator. Er kann Fragen zu diesen Gebieten beantworten.<br />Er ist ".
         "außerdem der 1. Vorsitzende des Illarion e.V. und kann Fragen ".
         "zum Verein beantworten."
         ,false);
      break;
      case 26: //Nop
         define(_CONTACT_NAME,"Nop",false);
         define(_CONTACT_MAIL,"nop@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der Entwickler des ".
         "Java Clienten. Er kann Fragen zu Java und dem Client beantworten."
         ,false);
      break;
      case 27: //Misjbar
         define(_CONTACT_NAME,"Misjbar",false);
         define(_CONTACT_MAIL,"mastedoc@gmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist einer der Entwickler ".
         "für die Gestaltung der Karte. Dazu kann der Fragen beantworten.".
         "<br /><br />Bitte in englisch schreiben.",false);
      break;
      case 28: //Aragon
         define(_CONTACT_NAME,"Aragon",false);
         define(_CONTACT_MAIL,"aragon@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der Kassenwart des ".
         "Illarion e.V. und kann Fragen in Bezug auf den Verein beantworten."
         ,false);
      break;
      case 29: //Naerwyn
         define(_CONTACT_NAME,"Naerwyn",false);
         define(_CONTACT_MAIL,"NaerwynGM@hotmail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.<br /><br />Bitte englisch".
         " schreiben.",false);
      break;
      case 30: //Kadiya
         define(_CONTACT_NAME,"Kadiya",false);
         define(_CONTACT_MAIL,"kadiya@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist eine Entwicklerin die".
         " sich mit Scripten und der Entwicklung der Homepage befasst.<br />".
         "Sie kann darauf bezogene Anfragen bearbeiten.",false);
      break;
      case 31: //Pharse
         define(_CONTACT_NAME,"Pharse",false);
         define(_CONTACT_MAIL,"pharse@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist Entwickler für ".
         "die Skripte.",false);
      break;
      case 32: //Aegohl
         define(_CONTACT_NAME,"Aegohl",false);
         define(_CONTACT_MAIL,"aegohl@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 33: //Ardian
         define(_CONTACT_NAME,"Ardian",false);
         define(_CONTACT_MAIL,"a.kukalaj@googlemail.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist Entwickler für ".
         "die Skripte.",false);
      break;
      case 34: //Garou
         define(_CONTACT_NAME,"Garou",false);
         define(_CONTACT_MAIL,"garou@arcor.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 35: //Alsaya
         define(_CONTACT_NAME,"Alsaya",false);
         define(_CONTACT_MAIL,"alsaya@gmx.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 36: //Mesha
         define(_CONTACT_NAME,"Mesha",false);
         define(_CONTACT_MAIL,"mesha@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 37: //Revan
         define(_CONTACT_NAME,"Revan",false);
         define(_CONTACT_MAIL,"GmRevan@live.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
      break;
      case 38: //Vaun
         define(_CONTACT_NAME,"Vaun",false);
         define(_CONTACT_MAIL,"illavaun@live.com",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der ".
         "sich um regelbrechende Spieler kümmert, Account und ".
         "Charakter verwaltet, Rassenbewerbungen bearbeitet und Neulingen ".
         "hilft.",false);
      break;
      case 39: //Feliae
         define(_CONTACT_NAME,"Feliae",false);
         define(_CONTACT_MAIL,"Felidae.Illa@hotmail.de",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der bei".
         " Quest bezogenen Anfragen helfen kann.",false);
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
   define(_MAIL,"Deine E-Mail-Adresse:",false);
   define(_SEND_MAIL,"E-Mail abschicken",false);
   define(_BAD_MAIL,"Ungültige E-Mail-Adresse",false);
   define(_BAD_CONTENT,"E-Mail-Inhalt zu kurz",false);
   define(_SUBJECT,"Betreff:",false);
   define(_CONTENT,"E-Mail-Inhalt:",false);
   define(_MAIL_TRANSMITTED,"E-Mail erfolgreich gesendet.<br />Leite in 3 ".
   "Sekunden zur Kontaktübersicht weiter.",false);
   define(_MAIL_TRANSMITTED_FAILED,"Senden der E-Mail ist fehlgeschlagen.".
   "<br />",false);
   ShowAndTransmitMail();
?>
