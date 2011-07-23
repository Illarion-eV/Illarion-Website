<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Download' );
   Page::setDescription( 'Download der aktuellen Version des Illarion-Client sowie Details zur Installation' );
   Page::setKeywords( array( 'Download', 'Client', 'Programm' ) );

   Page::setXHTML();
   Page::Init();
?>
<h1>Illarion spielen</h1>

<p>Die aktuelle Client-Version ist V1.21</p>

<h2>Spiel starten</h2>

<ul>
  <li><a href="<?php echo Page::getURL(); ?>/illarion/download/illarion_client.jnlp">Spielen!</a></li>
  <li><a href="<?php echo Page::getURL(); ?>/illarion/manual_de.pdf">Handbuch lesen</a>(PDF, 1MB)</li>
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
<ul>
  <li>Betriebssystem:
    <ul>
      <li>Windows 98, ME, 2000, XP, XP 64bit, Vista, Vista 64bit, 7, 7 64bit</li>
      <li>Linux Kernel 2.4.20 oder neuer (32bit und 64bit)</li>
      <li>MacOS X 10.4 Tiger, 10.5 Leopard, 10.6 Snow Leopard</li>
      <li>Solaris 8, 9, 10 (nur 32bit)</li>
    </ul>
  </li>
  <li>Grafikkarte: 32MB Speicher, Treiber mit openGL Unterstützung</li>
  <li>CPU: 700 MHz und höher</li>
  <li>Eine Java 1.5 Laufzeitumgebung oder höher</li>
</ul>
<p>Windows Vista, Windows 7 und die meisten Linux Versionen haben von Haus aus keinen Treiber mit OpenGL Hardwarebeschleunigung installiert. Ein solcher Treiber kann auf der Homepage der
Hersteller deiner Grafikkarte gefunden werden.</p>

<h3>Installation</h3>

<p>Hier kannst Du den Illarion-Client herunterladen.</p>
<p>Es müssen einmalig ca. 34MB heruntergeladen werden, bei einem Update des Clients werden nur noch die veränderten Teile heruntergeladen, meist 500kB-5MB. Updates werden vom Client automatisch ermittelt und installiert.</p>
<p>Während der Installation musst Du einmal bestätigen, dass Du einem Zertifikat von "Illarion e.V." vertrauen willst. Bestätige dieses Fenster einfach. Beim ersten Start fragt Dich der Client nach dem Verzeichnis, in dem die Daten Deiner Charaktere (wie z.B. Landkarten) abgelegt werden sollen. Wähle ein beliebiges Verzeichnis. Wenn Du schon einmal gespielt hast, kannst Du das Verzeichnis eines bestehenden Clients angeben, die Daten Deiner Charaktere werden dann importiert (Sicherheitskopie empfohlen!).</p>
<p>Sollte der Client nicht starten, stelle sicher, dass Du eine aktuelle Java-Laufzeitumgebung installiert hast.</p>
<ul>
  <li><a href="<?php echo Page::getURL(); ?>/illarion/download/illarion_client.jnlp">Online-Installation</a> (neuste Version, Windows, Linux, Solaris und MacOS X, 34.5MB)</li>
  <li><a href="http://jdl.sun.com/webapps/getjava/BrowserRedirect?locale=de&amp;host=java.com">Java-Laufzeitumgebung</a> (von java.com)</li>
</ul>

<p>Sollte es Probleme bei der Installation oder beim Start des Clienten geben, frage bitte im IRC Chat oder im Forum nach Hilfe. Es gibt fast kein Problem das nicht gelöst werden kann.</p>

<?php Page::insert_go_to_top_link(); ?>
