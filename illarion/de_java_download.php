<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Download' );
   Page::setDescription( 'Download der aktuellen Version des Illarion-Client sowie Details zur Installation' );
   Page::setKeywords( array( 'Download', 'Client', 'Programm' ) );

   Page::setXHTML();
   Page::Init();
?>
<h1>Illarion spielen</h1>

<p>Die aktuelle Client-Version ist V1.22</p>

<h2>Spiel starten</h2>

<ul>
  <li><a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_client.jnlp">Spielen!</a></li>
</ul>

<p>Damit Du spielen kannst, musst Du
<a href="<?php echo Page::getURL(); ?>/community/account/de_register.php">einen Account erstellen</a>
und danach einen Charakter anlegen.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Charaktere anlegen oder ansehen</h2>

<p>In Deinem Account kannst Du Deine Charaktere ansehen oder neue Charaktere anlegen.</p>

<ul>
  <li><a href='<?php echo Page::getURL(); ?>/community/account/de_charlist.php'>Charaktere pflegen</a></li>
</ul>

<p>Falls Dein neuer Charakter beim Einloggen nicht gefunden wird, prüfe ob Du schon alle Punkte auf die Attribute verteilt hast und ein Startpacket ausgewählt hast.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Client herunterladen</h2>

<h3>Systemanforderungen</h3>

<h4>Minimal</h4>
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows 2000, XP, XP 64-bit, Vista, Vista 64-bit, 7, 7 64-bit</li>
      <li>Linux</li>
      <li>MacOS X 10.6 oder neuer</li>
    </ul>
  </li>
  <li>Grafikkarte: 64MB Speicher, Treiber mit openGL Unterstützung, Shader 2.0 Unterstützung</li>
  <li>CPU: Zwei-Kern-Prozessor mit 1,4 GHz</li>
  <li>Java 6</li>
</ul>

<h4>Empfohlen</h4>
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows XP, Vista, Vista 64-bit, 7, 7 64-bit</li>
      <li>Linux</li>
      <li>MacOS X 10.65 oder neuer</li>
    </ul>
  </li>
  <li>Grafikkarte: 128MB dedizierten-Speicher, Treiber mit openGL Unterstützung, Shader 2.0 Unterstützung</li>
  <li>CPU: Zwei-Kern-Prozessor mit 2,0 GHz</li>
  <li>Java 7 (64-bit Version auf 64-bit Betriebssystemen)</li>
</ul>

<h4>Hinweis</h4>

<p>Windows Vista, Windows 7 und die meisten Linux Versionen haben von Haus aus
keinen Treiber mit OpenGL Hardwarebeschleunigung installiert. Ein solcher
Treiber kann auf der Homepage der Hersteller deiner Grafikkarte gefunden
werden.</p>

<h3>Installation</h3>

<p>Die Installation läuft in mehreren Schritten ab. Zunächst wird ein
Hilfsprogramm gestartet, das dir bei der Installation des Client helfen wird.
Dieses Programm kümmert sich darum den Client herunterzuladen und auf dem
aktuellen Stand zu halten.</p>

<p>Damit der Client und der Download funktionieren kann wird eine
Java-Laufzeitumgebung gebraucht. Wenn du dir nicht sicher bist ob die
Version die du hast aktuell ist, oder wenn du gar nicht weist ob du
überhaupt eine Version von Java installiert hast, solltest du eine
aktuelle Version herunterladen. Java wird von Oracle kostenlos angeboten.</p>

<p><a href="http://java.com">Java Downloadseite (externe Seite)</a></p>

<p>Um die Client Installation zu starten musst du auf den Link für die 
&quot;Online-Installation&quot; klicken. Die Datei die damit heruntergeladen
wird (illarion_client.jnlp) ist eine Java-Webstart Datei und sollte
von deiner Java-Laufzeitumgebung gestartet werden.</p>

<p>Beim Start des &quot;Illarion Client&quot; kann es passieren das eine
Warnmeldung in Bezug auf ein potentielles Sicherheitsrisiko auftaucht.
Diese Meldung kann <b>vorerst</b> ignoriert werden. Java will damit darauf
hinweisen das die Anwendung auf deinen Rechner zugreifen wird. Das ist
notwendig um die Daten des Clients zu speichern.</p>

<p>
	<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_client.jnlp">
		Online-Installation
	</a>
</p>

<p>Sollte es Probleme bei der Installation oder beim Start des Clienten geben,
frage bitte im IRC Chat oder im Forum nach Hilfe. Es gibt fast kein Problem
das nicht gelöst werden kann.</p>

<h2>Weitere Anwendungen</h2>

<p>Illarion stellt neben dem Illarion Client noch einige weitere Anwendungen
zur Verfügung. Diese werden vor allem für die Weiterentwicklung von Illarion
verwendet. Für nähere Informationen dazu frage am besten im Chat nach.</p>

<ul>
	<li>
		<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_download.jnlp">
			Illarion-Starter
		</a>
		(Von dieser Anwendung aus können alle anderen Anwendungen, inklusive
		des Clienten gestartet werden)
	</li>
	<li>
		<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_easynpc.jnlp">
			Illarion easyNPC-Editor
		</a>
	</li>
	<li>
		<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_easyquest.jnlp">
			Illarion easyQuest-Editor
		</a>
	</li>
	<li>
		<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_mapeditor.jnlp">
			Illarion Karten-Editor
		</a>
	</li>
</ul>

<h2>Zertifikat-Problem lösen</h2>

<p>Beim Starten der Anwendungen von Illarion erscheint eine Meldung, die
besagt, dass das Zertifikat mit dem die Anwendungen signiert wurden nicht
überprüft werden kann oder nicht von einer vertrauten Zertifizierungsstelle
unterschieben wurde.</p>

<p>Dieser Fehler kommt daher das bei Illarion cacert als Zertifizierungsstelle
verwendet wird. Cacert ist bei Java allerdings noch nicht in der Liste der
vertrauenswürdigen Zertifizierungsstellen.</p>

<p>Damit das Zertifikat von Illarion geprüft werden kann und die Echtheit der
Anwendungen sichergestellt werden kann muss das entsprechende Zertifikat in
Java eingebunden werden.</p>

<h3>Download der Stammzertifikate</h3>

<p>Im ersten Schritt musst du die Stammzertifikate von cacert herunterladen.</p>

<p>
	<a href="http://www.cacert.org/index.php?id=3&amp;lang=de">
		Downloadseite von cacert (externe Seite)
	</a>
</p>

<p>Lade von dieser Seite den &quot;Class 1 PKI-Schlüssel&quot; und den
&quot;Class 3 PKI-Schlüssel&quot; jeweils im &quot;PEM Format&quot; herunter.
Die weitere Installation ist abhängig vom verwendeten Betriebssyste.</p>

<h3>Windows</h3>

<p>Unter Windows öffne die Systemsteuerung und suche dort nach dem Eintrag
&quot;Java&quot;. Wähle in dem Fenster das sich öffnet den Tab
&quot;Sicherheit&quot; und drücke dort auf den Knopf &quot;Zertifikate&quot;.
In dem neuen Fenster kannst du als &quot;Zertifikatstyp&quot; den Eintrag
&quot;Signaturgeber-CA&quot; auswählen. Benutze den Knopf
&quot;Importieren&quot; um beide Zertifikate die heruntergeladen wurden zu
installieren.</p>

<p>Schließe wenn du fertig bist alle Fenster. Damit sollten die Zertifikate
richtig geprüft werden.</p>

<h3>Linux</h3>

<p>Unter Linux solltest du am besten das &quot;keytool&quot; von Java
verwenden um die Installation durchzuführen. Wenn Java richtig installiert ist
befindet sich dieses Programm im path.</p>

<p><pre>
$ keytool -keystore $/PFAD/ZUM/CACERTS/KEYSTORE
	-storepass changeit -import
	-trustcacerts -v
	-alias cacertclass1
	-file root.crt
$ keytool -keystore $/PFAD/ZUM/CACERTS/KEYSTORE
	-storepass changeit -import
	-trustcacerts -v
	-alias cacertclass3
	-file class3.crt
</pre></p>

<p>Der Keystore ist meistens hier zu finden:</p>
<ul>
	<li>/usr/lib/jvm/java-$VERSION/jre/lib/security/cacerts</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
