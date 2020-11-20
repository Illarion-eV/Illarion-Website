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
  <li><a href="<?php echo $pathList[60]; ?>">Windows (32-Bit) - Alle Versionen</a></li>
  <li><a href="<?php echo $pathList[226]; ?>">Windows (64-Bit) - Alle Versionen</a></li>
  <li><a href="<?php echo $pathList[590]; ?>">MacOS X - Alle Versionen</a></li>
  <li><a href="<?php echo $pathList[66]; ?>">Linux DEB (32-Bit) - Debian, Ubuntu, Mint usw.</a></li>
  <li><a href="<?php echo $pathList[411]; ?>">Linux DEB (64-Bit) - Debian, Ubuntu, Mint usw.</a></li>
  <li><a href="<?php echo $pathList[65]; ?>">Linux RPM (32-Bit) - Fedora, Mandriva, openSUSE, Red Hat usw.</a></li>
  <li><a href="<?php echo $pathList[416]; ?>">Linux RPM (64-Bit) - Fedora, Mandriva, openSUSE, Red Hat usw.</a></li>
  <li><a href="<?php echo $pathList[64]; ?>">Linux (32-Bit) - Andere Linux-Distributionen</a></li>
  <li><a href="<?php echo $pathList[420]; ?>">Linux (64-Bit) - Andere Linux-Distributionen</a></li>
</ul>

<p>Damit Du spielen kannst, musst Du
<a href="<?php echo Page::getURL(); ?>/community/account/de_register.php">einen Account erstellen</a>
und danach einen Charakter anlegen.</p>

<p><a href="<?php echo Page::getURL(); ?>https://www.ej-technologies.com/products/install4j/overview.html">Illarion verwendet Install4J um die Setup-Dateien zu erzeugen.</a></p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Charaktere anlegen oder ansehen</h2>

<p>In Deinem Account kannst Du Deine Charaktere ansehen oder neue Charaktere anlegen.</p>

<ul>
  <li><a href='<?php echo Page::getURL(); ?>/community/account/de_charlist.php'>Charaktere pflegen</a></li>
</ul>

<p>Falls Dein neuer Charakter beim Einloggen nicht gefunden wird, prüfe ob
du schon alle Punkte auf die Attribute verteilt hast und ein Startpaket
ausgewählt hast.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Systemanforderungen</h2>

<h4>Minimal</h4>
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows XP, Vista, 7, 8, 8.1, 10</li>
      <li>Linux</li>
      <li>MacOS X 10.6 oder neuer</li>
    </ul>
  </li>
  <li>Grafikkarte: 64 MB Speicher, Treiber mit openGL Unterstützung, Shader 2.0 Unterstützung</li>
  <li>CPU: Zwei-Kern-Prozessor mit 1,4 GHz</li>
  <li>Java 7 Update 6</li>
</ul>

<h4>Empfohlen</h4>
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows Vista, 7, 8, 8.1, 10</li>
      <li>Linux</li>
      <li>MacOS X 10.65 oder neuer</li>
    </ul>
  </li>
  <li>Grafikkarte: 128 MB dedizierten-Speicher, Treiber mit openGL Unterstützung, Shader 2.0 Unterstützung</li>
  <li>CPU: Zwei-Kern-Prozessor mit 2,0 GHz</li>
  <li>Java neuste Verion (64-bit Version auf 64-bit Betriebssystemen)</li>
</ul>

<h4>Hinweis</h4>

<p>Windows Vista, Windows 7 und die meisten Linux Versionen haben von Haus aus
keinen Treiber mit OpenGL Hardwarebeschleunigung installiert. Ein solcher
Treiber kann auf der Homepage der Hersteller deiner Grafikkarte gefunden
werden.</p>

<h2>Installation</h2>

<p>Beim ersten Start des Illarion-Starters fragt ein kurzer
Installationsassistent die noch fehlenden Einstellungen ab. Wenn es schon 
eine alte Installation von Illarion auf dem Rechner gab, dann werden die bestehenden Einstellungen werden weiterhin
benutzt.</p>

<p>Das Hauptmenu des Illarion-Launchers bietet die Möglichkeit, den Client
zu starten, indem man auf "Spielen" drückt. Alle anderen Anwendungen werden
durch die jeweiligen beschrifteten Knöpfe gestartet. Sobald eine Anwendung
ausgewählt wird beginnt der Launcher die aktuelle Version der Anwendung
zu suchen, eine Downloadliste zu erzeugen und die Anwendung herunterzuladen.
Beim ersten Start kann einige Zeit vergehen bis der Download beginnt.
Nach dem Download startet die Anwendung automatisch.</p>

<p>Sollte es Probleme bei der Installation oder beim Start des Clienten geben,
frage bitte im IRC-Chat oder im Forum nach Hilfe. Es gibt fast kein Problem,
das nicht gelöst werden kann.</p>

<?php Page::insert_go_to_top_link(); ?>
