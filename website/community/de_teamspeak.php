<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - TeamSpeak' );
Page::setDescription( 'Informationen über die Verbindung zum Illarion TeamSpeak-Server.' );
Page::setKeywords( array( 'Chat, TeamSpeak' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion TeamSpeak Chat</h1>
<p>Der Illarion TeamSpeak-Server ermöglicht Sprach- und Text-Chat für Spieler und den Staff.</p>

<h2>Starte TeamSpeak</h2>
<ul>
  <li><a href="ts3server://illarion.org">Verbinden zu illarion.org</a></li>
</ul>
<p>Auf dem TeamSpeak-Server gelten die <a href="<?php echo $url; ?>/illarion/de_rules.php">Regeln von Illarion</a>.</p>

<h2>Download TeamSpeak 3 client</h2>
<p class="center"><a href="https://www.teamspeak.com/?page=downloads" target="_blank"><img src="teamspeak.jpg" alt="Runterladen von www.teamspeak.com" /></a></p>

<h2>Mindestanforderungen</h2>

<h3><img src="https://www.teamspeak.com/images/downloads/windows.png" alt="" /> TeamSpeak 3 Client - Windows</h3>
<ul>
  <li>Windows 2000, XP, 2003, 2008, Vista oder 7</li>
  <li>Intel Pentium III, AMD Athlon XP oder aktuellere CPU (<em>empfohlen:</em> 800 MHz oder schneller)</li>
  <li>128 MB Arbeitsspeicher (<em>empfohlen:</em> 512 MB oder mehr)</li>
  <li>50 MB Speicherplatz</li>
  <li>DirectX 8.1 (available at <a href="https://www.microsoft.com/directx" target="_blank">https://www.microsoft.com/directx</a>)</li>
  <li>Internetverbindung</li>
  <li>Lautsprecher und ein Mikrofon</li>
</ul>

<h3><img src="https://www.teamspeak.com/images/downloads/macosx.png" alt="" /> TeamSpeak 3 Client - Mac OS X</h3>
<ul>
  <li>Mac OS X 10.4 (Tiger) oder neuer</li>
  <li>Mac Computer mit PowerPC G4/G5 oder Intel Prozessor (<em>empfohlen:</em> 800 MHz oder schneller)</li>
  <li>128 MB Arbeitsspeicher (<em>empfohlen:</em> 512 MB oder mehr)</li>
  <li>75 MB Speicherplatz</li>
  <li>Internetverbindung</li>
  <li>Lautsprecher und ein Mikrofon</li>
</ul>

<h3><img src="https://www.teamspeak.com/images/downloads/linux.png" alt="" /> TeamSpeak 3 Client - Linux</h3>
<ul>
  <li>Ein aktuelles Linux Betriebssystem mit libstdc++6. Bedenken Sie das bestimmte Distributoren die Installation anderer Pakete voraussetzen können.</li>
  <li>Intel Pentium III, AMD Athlon XP, oder aktuellere CPU (<em>empfohlen:</em> 800 MHz oder schneller)</li>
  <li>128 MB Arbeitsspeicher (<em>empfohlen:</em> 512 MB oder mehr)</li>
  <li>25 MB Speicherplatz</li>
  <li>X11 desktop environment (z.B. GNOME or KDE)</li>
  <li>Internetverbindung</li>
  <li>Lautsprecher und ein Mikrofon</li>
</ul>
<?php Page::insert_go_to_top_link(); ?>
<?php include_footer(); ?>