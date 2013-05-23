<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
Page::setTitle( 'Illarion - TeamSpeak' );
Page::setDescription( 'Information about connecting to the Illarion TeamSpeak server.' );
Page::setKeywords( array( 'Chat, TeamSpeak' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Illarion TeamSpeak chat</h1>
<p>Illarion's TeamSpeak server allows voice and text chat for the community and staff.</p>

<h2>Start TeamSpeak</h2>
<ul>
  <li><a href="ts3server://illarion.org">Connect to illarion.org</a></li>
</ul>
<p>On the TeamSpeak server the <a href="<?php echo $url; ?>/illarion/us_rules.php">rules of Illarion</a> apply.</p>

<h2>Download TeamSpeak 3 client</h2>
<p class="center"><a href="http://www.teamspeak.com/?page=downloads" target="_blank"><img src="teamspeak.jpg" alt="Download from www.teamspeak.com" /></a></p>

<h2>Minimum Requirements</h2>

<h3><img src="http://www.teamspeak.com/images/downloads/windows.png" alt="" /> TeamSpeak 3 Client - Windows</h3>
<ul>
  <li>Windows 2000, XP, 2003, 2008, Vista or 7</li>
  <li>Intel Pentium III, AMD Athlon XP, or any newer CPU (<em>recommended:</em> 800 MHz or faster)</li>
  <li>128 MB of system memory (<em>recommended:</em> 512 MB or more)</li>
  <li>50 MB of disk space</li>
  <li>DirectX 8.1 (available at <a href="http://www.microsoft.com/directx" target="_blank">http://www.microsoft.com/directx</a>)</li>
  <li>Internet connection</li>
  <li>Speakers and a microphone</li>
</ul>

<h3><img src="http://www.teamspeak.com/images/downloads/macosx.png" alt="" /> TeamSpeak 3 Client - Mac OS X</h3>
<ul>
  <li>Mac OS X 10.4 (Tiger) or newer</li>
  <li>Mac computer with PowerPC G4/G5 or Intel processor (<em>recommended:</em> 800 MHz or faster)</li>
  <li>128 MB of system memory (<em>recommended:</em> 512 MB or more)</li>
  <li>75 MB of disk space</li>
  <li>Internet connection</li>
  <li>Speakers and a microphone</li>
</ul>

<h3><img src="http://www.teamspeak.com/images/downloads/linux.png" alt="" /> TeamSpeak 3 Client - Linux</h3>
<ul>
  <li>A reasonably modern Linux environment with libstdc++6. Note that Linux distributors may provide packages which have different requirements.</li>
  <li>Intel Pentium III, AMD Athlon XP, or any newer CPU (<em>recommended:</em> 800 MHz or faster)</li>
  <li>128 MB of system memory (<em>recommended:</em> 512 MB or more)></li>
  <li>25 MB of disk space</li>
  <li>X11 desktop environment (e.g. GNOME or KDE)</li>
  <li>Internet connection</li>
  <li>Speakers and a microphone</li>
</ul>
<?php Page::insert_go_to_top_link(); ?>
<?php include_footer(); ?>