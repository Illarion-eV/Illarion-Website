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
Page::setXHTML();
Page::Init();

function MainForm() {
?>
<h1>Kontakt zu Illarion</h1>

<h2>Inhalt</h2>
<ul>
<li><a class="hidden" href="#1">Allgemeine Informationen</a></li>
<li><a class="hidden" href="#2">Community-Manager</a></li>
<li><a class="hidden" href="#3">Gamemaster</a></li>
<li><a class="hidden" href="#4">Allgemeine Kontakte</a></li>
<li><a class="hidden" href="#5">Persönliche Kontakte</a></li>
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
<a href= "<?php echo Page::getURL(); ?>/community/forums">Forums</a> beantwortet
wurde oder dort gestellt werden kann. Dies spart uns wertvolle Zeit für
die Weiterentwicklung von Illarion.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="2"></a>Community-Manager</h2>

<?php echo Page::cap('E'); ?>
<p>inige Spieler sind "Community-Manager" (CM).
Zu den Aufgaben dieser Spieler gehört es neuen Spielern zu helfen und Probleme oder Konflikte zwischen den Spielern zu lösen.
Sie sollten die ersten sein, an die man sich bei nicht technischen Problemen wendet.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="3"></a>Gamemaster</h2>

<?php echo Page::cap('E'); ?>
<p>inige Spieler haben den Status eines Gamemasters für einen speziellen Charakter. Diese sind
dafür zuständig für Ordnung zu sorgen und können selbst Strafen zur Durchsetzung dieser Regeln
verhängen, bzw. diese durch den Administrator ausführen lassen. Das Belügen/Täuschen eines
Gamemasters in Bezug auf Regelverstöße und Programmfehler ist verboten. Ist ein Gamemaster
offensichtlich gerade mit Arbeit beschäftigt oder in ein wichtiges, spielrelevantes Gespräch
vertieft, sollte er nur in dringenden Fällen gestört werden. Die Namen weiterer Charaktere eines
Gamemasters dürfen nicht gegen seinen Willen weitergegeben
werden.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="4"></a>Allgemeine Kontakte</h2>

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

<li><a href="?contact=5">RPG-Anfragen Cadomyr</a> - sollte die Unterstützung
eines Gamemasters für ein Quest in Cadomyr benötigt werden, kann hier
darum gebeten werden.</li>

<li><a href="?contact=6">RPG-Anfragen Galmair</a> - sollte die Unterstützung
eines Gamemasters für ein Quest in Galmair benötigt werden, kann hier
darum gebeten werden.</li>

<li><a href="?contact=7">RPG-Anfragen Runewick</a> - sollte die Unterstützung
eines Gamemasters für ein Quest in Runewick benötigt werden, kann hier
darum gebeten werden.</li>

<li><a href="../mantis/">Fehlermeldungen</a> - Fehler im Spiel
können hier gemeldet werden.</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2><a name="5"></a>Persönliche Kontakte</h2>

<h3>Community-Manager</h3>

<p>Diese Spieler helfen neuen Spielern und bei Problemen zwischen Spielern.</p>

<ul>
<li><a href="?contact=30">Achae Eanstray</a> - Englischsprachige Community-Manager (US)</li>
<li><a href="?contact=31">Alessaina</a> - Englischsprachiger Community-Manager (US)</li>
<li><a href="?contact=32">Djironnyma</a> - Deutschsprachiger Community-Manager</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Gamemaster</h3>

<p>Diese Gamemaster kümmern sich um besondere Ereignisse im Spiel
und um alle die es nicht so mit Regeln haben.</p>

<ul>
   <li><a href="?contact=14">Arien Edhel</a> - Generelle Anfragen</li>
   <li><a href="?contact=41">Bloodraven</a> - Englischsprachiger GM für Runewick (EU)</li>
   <li><a href="?contact=43">White Crow</a> - Englischsprachiger GM für Cadomyr (US)</li>
   <li><a href="?contact=34">Slightly</a> - Englischsprachiger GM für Galmair (EU)</li>
   <li><a href="?contact=45">Silverwing</a> - Deutschsprachiger GM für Runewick</li>
   <li><a href="?contact=33">Skamato</a> - Deutschsprachiger GM für Cadomyr</li>
   <li><a href="?contact=42">Teflon</a> - Deutschsprachiger GM für Galmair</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Leitende Entwickler</h3>

<p>Das sind die leitenden Entwickler von Illarion und ihre Aufgaben.</p>

<ul>
<li><a href="?contact=11">Estralis Seborian</a> - Spielinhalte</li>
<li><a href="?contact=22">Martin</a> - Grafik</li>
<li><a href="?contact=23">Nitram</a> - Client, Homepage</li>
<li><a href="?contact=25">Vilarion</a> - Server, Serveradministration</li>
<li><a href="?contact=40">Zot</a> - Karte</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h3>Vereinsvorstand Illarion e.V.</h3>

<ul>
<li><a href="?contact=25">Vilarion</a> - Vorsitzender</li>
<li><a href="?contact=23">Nitram</a> - Kassenwart</li>
<li><a href="?contact=21">Lennier</a> - Schriftführer</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>

<h2>Impressum</h2>

<h3>Illarion e.V.</h3>

<p>
Registergericht: Amtsgericht Kempten<br />
Registernummer: VR 30767
</p>

<p>E-Mail: committee@illarion.org</p>

<?php Page::insert_go_to_top_link(); ?>
<?php
   }
$contact = (isset($_GET['contact']) && is_numeric($_GET['contact']) ? (int) $_GET['contact'] : 0);
   switch($contact) {
      case 1: // Accountanfragen
         define(_CONTACT_NAME,"Accountanfragen",false);
         define(_CONTACT_MAIL,"accounts@illarion.org",false);
         define(_CONTACT_DETAILS,"Alle Fragen bezüglich deines Accounts ".
         "werden hier beantwortet. Vergiss nicht deinen Accountnamen in ".
         "die E-Mail zu schreiben, sonst können wir nicht helfen.".
         "<br />Außerdem ist es wichtig, dass du diese E-Mail mit der ".
         "selben E-Mail-Adresse absendest, die in deinem Account steht um ".
         "nachzuweisen, dass es sich wirklich um deinen Account handelt.",false);
      break;
      case 2: //Webmaster contact
         define(_CONTACT_NAME,"Kontakt zum Webmaster",false);
         define(_CONTACT_MAIL,"webmaster@illarion.org",false);
         define(_CONTACT_DETAILS,"Alle Fragen an den Webmaster von Illarion".
         " und Fragen bezüglich der Webseite können hier ".
         "gestellt werden.",false);
      break;
      case 3: //Reporting players
         define(_CONTACT_NAME,"Spieler melden",false);
         define(_CONTACT_MAIL,"violations@illarion.org",false);
         define(_CONTACT_DETAILS,"Hier kannst du Spieler die sich in deinen".
         " Augen schlecht verhalten haben und die Regeln gebrochen haben ".
         "melden.<br />Bitte notiere auch Zeit und Datum des Vorfalls damit".
         " wir den Vorfall mit Hilfe der Server-Logs nachvollziehen ".
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
      case 5: //Cadomyr requests
         define(_CONTACT_NAME,"Rollenspielanfragen für Cadomyr",false);
         define(_CONTACT_MAIL,"cadomyr@illarion.org",false);
         define(_CONTACT_DETAILS,"Hier kannst du mit einem Gamemaster der Fraktion Cadomyr ".
         "in Kontakt treten, wenn du Unterstützung bei einem Quest brauchst."
         ,false);
      break;
      case 6: //Galmair requests
         define(_CONTACT_NAME,"Rollenspielanfragen für Galmair",false);
         define(_CONTACT_MAIL,"galmair@illarion.org",false);
         define(_CONTACT_DETAILS,"Hier kannst du mit einem Gamemaster der Fraktion Galmair ".
         "in Kontakt treten, wenn du Unterstützung bei einem Quest brauchst."
         ,false);
      break;
      case 7: //Runewick requests
         define(_CONTACT_NAME,"Rollenspielanfragen für Runewick",false);
         define(_CONTACT_MAIL,"runewick@illarion.org",false);
         define(_CONTACT_DETAILS,"Hier kannst du mit einem Gamemaster der Fraktion Runewick ".
         "in Kontakt treten, wenn du Unterstützung bei einem Quest brauchst."
         ,false);
      break;
      case 11: //Estralis Seborian
         define(_CONTACT_NAME,"Estralis Seborian",false);
         define(_CONTACT_MAIL,"estralis@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der leitende Inhaltsentwickler von Illarion.",false);
      break;
      case 14: //Arien Edhel
         define(_CONTACT_NAME,"Arien Edhel",false);
         define(_CONTACT_MAIL,"arien@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der ".
         "sich gezielt um um allgemeine Anfragen und Regelverstöße kümmert.",false);
      break;
      case 22: //Martin
         define(_CONTACT_NAME,"Martin",false);
         define(_CONTACT_MAIL,"martin@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der leitende Grafiker von Illarion.",false);
      break;
      case 23: //Nitram
         define(_CONTACT_NAME,"Nitram",false);
         define(_CONTACT_MAIL,"nitram@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der leitende Client-Entwickler von Illarion.",false);
      break;
      case 25: //Vilarion
         define(_CONTACT_NAME,"Vilarion",false);
         define(_CONTACT_MAIL,"vilarion@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der leitende Serverentwickler von Illarion und Serveradmin (d.h. 'root').<br />Er ist ".
         "außerdem der 1. Vorsitzende des Illarion e.V. und kann Fragen ".
         "zum Verein beantworten."
         ,false);
      break;
      case 28: //Aragon
         define(_CONTACT_NAME,"Aragon",false);
         define(_CONTACT_MAIL,"aragon@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der Kassenwart des ".
         "Illarion e.V. und kann Fragen in Bezug auf den Verein beantworten."
         ,false);
      break;
      case 30: //Achae
         define(_CONTACT_NAME,"Achae Eanstray",false);
         define(_CONTACT_MAIL,"achae@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein englischsprachiger Community-Manger.",false);
      break;
      case 31: //Alessaina
         define(_CONTACT_NAME,"Alessaina",false);
         define(_CONTACT_MAIL,"alessaina@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein englischsprachiger Community-Manger.",false);
      break;
      case 32: //Djironnyma
         define(_CONTACT_NAME,"Djironnyma",false);
         define(_CONTACT_MAIL,"djironnyma@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein deutschsprachiger Community-Manger.",false);
      break;
      case 33: //Skamato
         define(_CONTACT_NAME,"Skamato",false);
         define(_CONTACT_MAIL,"skamato@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der die Fraktion Cadomyr betreut.",false);
      break;
      case 34: //Slightly
         define(_CONTACT_NAME,"Slightly",false);
         define(_CONTACT_MAIL,"slightly@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der die Fraktion Galmair betreut.",false);
      break;
      case 40: //Zot
         define(_CONTACT_NAME,"Zot",false);
         define(_CONTACT_MAIL,"zot@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist der leitende Entwickler der Spiel-Karte.",false);
      break;
      case 41: //Bloodraven
         define(_CONTACT_NAME,"Bloodraven",false);
         define(_CONTACT_MAIL,"bloodraven@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der die Fraktion Runewick betreut.",false);
      break;
      case 42: //Teflon
         define(_CONTACT_NAME,"Semtex",false);
         define(_CONTACT_MAIL,"teflon@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der die Fraktion Galmair betreut.",false);
      break;
      case 43: //White Crow
         define(_CONTACT_NAME,"White Crow",false);
         define(_CONTACT_MAIL,"whitecrow@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der die Fraktion Cadomyr betreut.",false);
      break;
      case 45: //Silverwing
         define(_CONTACT_NAME,"Silverwing",false);
         define(_CONTACT_MAIL,"silverwing@illarion.org",false);
         define(_CONTACT_DETAILS,_CONTACT_NAME." ist ein Gamemaster der die Fraktion Runewick betreut.",false);
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
