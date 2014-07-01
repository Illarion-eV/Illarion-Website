<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Download' );
   Page::setDescription( 'Download der aktuellen Version des Illarion-Client sowie Details zur Installation' );
   Page::setKeywords( array( 'Download', 'Client', 'Programm' ) );

   Page::setXHTML();
   Page::Init();
   
   $pathList = [];
   $outputFile = file('/var/www/illarion/website/media/java/install/output.txt');
   foreach ($outputFile as $line) {
	  if (strpos($line, '#') === 0) {
	     continue;
	  }
	  $elements = explode("\t", $line);
      $pathList[$elements[0]] = str_replace(Page::getMediaRootPath(), Page::getMediaURL(), $elements[3]);	  
   }
?>
<h1>Illarion spielen</h1>

<h2>Spiel herunterladen</h2>

<ul>
  <li><a href="<?php echo $pathList[60]; ?>">Windows (32-Bit)</a></li>
  <li><a href="<?php echo $pathList[226]; ?>">Windows (64-Bit)</a></li>
  <li><a href="<?php echo $pathList[63]; ?>">MacOS X</a></li>
  <li><a href="<?php echo $pathList[64]; ?>">Unix</a></li>
  <li><a href="<?php echo $pathList[65]; ?>">Linux RPM</a></li>
  <li><a href="<?php echo $pathList[66]; ?>">Linux DEB</a></li>
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

<p>Falls Dein neuer Charakter beim Einloggen nicht gefunden wird, prüfe ob
du schon alle Punkte auf die Attribute verteilt hast und ein Startpacket
ausgewählt hast.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Client herunterladen</h2>

<h3>Systemanforderungen</h3>

<h4>Minimal</h4>
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows XP, Vista, 7, 8, 8.1</li>
      <li>Linux</li>
      <li>MacOS X 10.6 oder neuer</li>
    </ul>
  </li>
  <li>Grafikkarte: 64MB Speicher, Treiber mit openGL Unterstützung, Shader 2.0 Unterstützung</li>
  <li>CPU: Zwei-Kern-Prozessor mit 1,4 GHz</li>
  <li>Java 7 Update 6</li>
</ul>

<h4>Empfohlen</h4>
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows XP, Vista, 7, 8, 8.1</li>
      <li>Linux</li>
      <li>MacOS X 10.65 oder neuer</li>
    </ul>
  </li>
  <li>Grafikkarte: 128MB dedizierten-Speicher, Treiber mit openGL Unterstützung, Shader 2.0 Unterstützung</li>
  <li>CPU: Zwei-Kern-Prozessor mit 2,0 GHz</li>
  <li>Java 7 neuste Verion (64-bit Version auf 64-bit Betriebssystemen)</li>
</ul>

<h4>Hinweis</h4>

<p>Windows Vista, Windows 7 und die meisten Linux Versionen haben von Haus aus
keinen Treiber mit OpenGL Hardwarebeschleunigung installiert. Ein solcher
Treiber kann auf der Homepage der Hersteller deiner Grafikkarte gefunden
werden.</p>

<h3>Installation</h3>

<p>Für die Installation des Clients wird zunächst ein kleines Hilfsprogramm
benötigt. Dieses Programm übernimmt den Download und des Start des Clienten
und aller Hilfsprogramme die für Illarion entwickelt wurden. Dieses
Hilfsprogramm ist der Illarion-Starter.</p>

<p>Damit der Starter, der Client und alle anderen Anwendungen von Illarion
verwendet werden können wird zunächst eine Java-Laufzeitumgebung gebraucht.
Die Laufzeitumgebung wird kostenlos von Oracle angeboten und sollte auf dem
aktuellen Stand sein, damit die Anwendungen richtig funktionieren.</p>

<p><a href="http://java.com">Java Downloadseite (externe Seite)</a></p>

<p>Wenn Java installiert ist, kann der Illarion-Starter heruntergeladen
werden. Das Programm befindet sich in einer JAR-Datei. Diese Dateien sind
Java-Anwendungen die auf vielen Betriebssystemen ausgeführt werden können,
vorrausgesetzt das Java richtig installiert ist. Der Start der JAR-Datei
funktioniert wie mit jeder anderen Anwendung auch. Unter Windows zum 
Beispiel mit einem Doppelklick. Sollte es nicht funktionieren gibt es ein
Problem mit der Java-Installation.</p>

<p><a href="<?php echo Page::getURL(); ?>/media/java/launcher/illarion.jar">Illarion-Starter Download</a></p>

<p>Bei ersten Start des Illarion-Starters fragt ein kurzer
Installationsassistent die noch fehlenden Einstellungen ab. Wenn es schon 
eine alte Installation von Illarion auf dem Rechner gab, dann wird dieser
Assistent übersprungen und die bestehenden Einstellungen werden weiterhin
benutzt.</p>

<p>Das Hauptmenu des Illarion-Starters bietet die Möglichkeit den Client
zu starten in dem man auf "Spielen" drückt. Alle anderen Anwendungen werden
durch die jeweiligen beschrifteten Knöpfe gestartet. Sobald eine Anwendung
ausgewählt wird beginnt der Downloader die aktuelle Version der Anwendung
zu suchen, eine Downloadliste zu erzeugen und die Anwendung herunterzuladen.
Beim ersten Start kann einige Zeit vergehen bis der Download sichtbar beginnt.
Lasst dem Starter etwas Zeit. Einige Minuten sind völlig normal.</p>

<p>Nach dem Download startet die Anwendung automatisch.</p>

<p>Die JAR-Datei des Downloaders kann an einem beliebigen Ort gespeichert werden.
Es ist nicht notwendig die Datei immer wieder herunterzuladen.</p>

<p>Sollte es Probleme bei der Installation oder beim Start des Clienten geben,
frage bitte im IRC Chat oder im Forum nach Hilfe. Es gibt fast kein Problem
das nicht gelöst werden kann.</p>

<?php Page::insert_go_to_top_link(); ?>
