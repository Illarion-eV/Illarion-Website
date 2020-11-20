<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Download' );
   Page::setDescription( 'Download the latest version of the Illarion Client and details concerning the installation' );
   Page::setKeywords( array( 'Download', 'Client', 'Program' ) );

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
<h1>Play Illarion</h1>

<h2>Download the game</h2>

<ul>
  <li><a href="<?php echo $pathList[60]; ?>">Windows (32-Bit) - All versions</a></li>
  <li><a href="<?php echo $pathList[226]; ?>">Windows (64-Bit) - All versions</a></li>
  <li><a href="<?php echo $pathList[590]; ?>">MacOS X - All versions</a></li>
  <li><a href="<?php echo $pathList[66]; ?>">Linux DEB (32-Bit) - Debian, Ubuntu, Mint etc.</a></li>
  <li><a href="<?php echo $pathList[411]; ?>">Linux DEB (64-Bit) - Debian, Ubuntu, Mint etc.</a></li>
  <li><a href="<?php echo $pathList[65]; ?>">Linux RPM (32-Bit) - Fedora, Mandriva, openSUSE, Red Hat etc.</a></li>
  <li><a href="<?php echo $pathList[416]; ?>">Linux RPM (64-Bit) - Fedora, Mandriva, openSUSE, Red Hat etc.</a></li>
  <li><a href="<?php echo $pathList[64]; ?>">Linux (32-Bit) - Other Linux distributions</a></li>
  <li><a href="<?php echo $pathList[420]; ?>">Linux (64-Bit) - Other Linux distributions</a></li>
</ul>

<p>To be able to play, you must
<a href="<?php echo Page::getURL(); ?>/community/account/us_register.php">create an account</a>
and after that create a character.</p>

<p><a rel="external" href="https://www.ej-technologies.com/products/install4j/overview.html">Illarion uses the multi-platform installer builder Install4J to generate the setup files.</a></p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Create or view a character</h2>

<p>On your account you can view your characters or create new ones.</p>

<ul>
  <li><a href='<?php echo Page::getURL(); ?>/community/account/us_charlist.php'>Character Maintenance</a></li>
</ul>

<p>In case your character can't be found when trying to log in, make sure you
have completed the character creation process, including spending all of the attributes 
points and selecting a starting package.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>System requirements</h2>

<h4>Minimum</h4>
<ul>
  <li>Operating System:
    <ul>
      <li>Windows XP, Vista, 7, 8, 8.1, 10</li>
      <li>Linux</li>
      <li>MacOS X 10.6 or more recent</li>
    </ul>
  </li>
  <li>Graphics card: 64 MB memory, driver supporting OpenGL, Shader 2.0 support</li>
  <li>CPU: Dual core processor with 1.4 GHz</li>
  <li>Java 7 update 6</li>
</ul>

<h4>Recommended</h4>
<ul>
  <li>Operating system:
    <ul>
      <li>Windows Vista, 7, 8, 8.1, 10</li>
      <li>Linux</li>
      <li>MacOS X 10.65 or more recent</li>
    </ul>
  </li>
  <li>Graphics card: 128 MB dedicated memory, driver supporting OpenGL, Shader 2.0 support</li>
  <li>CPU: Dual core processor with 2.0 GHz</li>
  <li>Java latest version (64-bit Version if you have a 64-bit operating system installed)</li>
</ul>

<h4>Note</h4>

<p>Windows Vista, Windows 7 and many Linux versions don't have drivers
supporting OpenGL hardware acceleration installed by default. Drivers that
support this feature can be found on your graphics card manufacturers
website.</p>

<h2>Installation</h2>

<p>During the first launch of the Illarion Launcher a short installation
assistent will request the required information. In case you got a old
installation of Illarion, the old settings will be used.</p>

<p>The main menu of the Illarion Launcher offers the possibility to launch
the client using the "play" button. The other applications are launched with
the buttons as labeled. Once a application is chosen the launcher will look
for the latest version, resolve its dependencies and download everything.
Especially during the first time a application is launched this can take some
time. Once the download is done the application is launched automatically.</p>

<p>If there should be problems during the installation or start of the client,
please ask for help on the IRC chat or the forum. There's almost no problem,
we can't find a solution for.</p>

<?php Page::insert_go_to_top_link(); ?>
