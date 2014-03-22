<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Download' );
   Page::setDescription( 'Download the latest version of the Illarion Client and details concerning the installation' );
   Page::setKeywords( array( 'Download', 'Client', 'Program' ) );

   Page::setXHTML();
   Page::Init();
?>
<h1>Play Illarion</h1>

<h2>Start game</h2>

<ul>
  <li><a href="<?php echo Page::getURL(); ?>/media/java/launcher/illarion.jar">Play!</a></li>
</ul>

<p>To be able to play, you must
<a href="<?php echo Page::getURL(); ?>/community/account/us_register.php">create an account</a>
and after that create a character.</p>

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

<h2>Download the client</h2>

<h3>System requirements</h3>

<h4>Minimum</h4>
<ul>
  <li>Operating System:
    <ul>
      <li>Windows XP, Vista, 7, 8, 8.1</li>
      <li>Linux</li>
      <li>MacOS X 10.6 or more recent</li>
    </ul>
  </li>
  <li>Graphics card: 64MB memory, driver supporting OpenGL, Shader 2.0 support</li>
  <li>CPU: Dual core processor with 1.4 GHz</li>
  <li>Java 7 update 6</li>
</ul>

<h4>Recommended</h4>
<ul>
  <li>Operating system:
    <ul>
      <li>Windows XP, Vista, 7, 8, 8.1</li>
      <li>Linux</li>
      <li>MacOS X 10.65 or more recent</li>
    </ul>
  </li>
  <li>Graphics card: 128MB dedicated memory, driver supporting OpenGL, Shader 2.0 support</li>
  <li>CPU: Dual core processor with 2.0 GHz</li>
  <li>Java 7 newest version(64-bit Version if you have a 64-bit operating system installed)</li>
</ul>

<h4>Note</h4>

<p>Windows Vista, Windows 7 and many Linux versions don't have drivers
supporting OpenGL hardware acceleration installed by default. Drivers that
support this feature can be found on your graphics card manufacturers
website.</p>

<h3>Installation</h3>

<p>To perform the installation of the client there is a small helper
application required. This applications downloads and launches the client
and all other applications created for Illarion. This application is the
Illarion-Launcher.</p>

<p>For the launcher, the client and all other applications of Illarion
the Java runtime environment is required. The JRE is free and you can
download it from Oracle. Java should be up-to-date to ensure the
applications to work properly.</p>

<p><a href="http://java.com">Java download page (external page)</a></p>

<p>Once Java is installed, the Illarion-Launcher can be downloaded. This
applications is packaged in a JAR file. These files are Java applications
that can be launched on many operating systems. Launching a JAR file works
like any other application. Windows launches those files simply with a 
double click. Provided a proper Installation of Java.</p>

<p><a href="<?php echo Page::getURL(); ?>/media/java/launcher/illarion.jar">Illarion-Launcher download</a></p>

<p>During the first launch of the Illarion-Launcher a short installation
assistent will request the required information. In case you got a old
installation of Illarion, this assistent will be skipped and the old settings
will be used.</p>

<p>The main menu of the Illarion-Launcher offers the possibility to launch
the client using the "play" button. The other applications are launched with
the buttons as labeled. Once a application is chosen the launcher will look
for the latest version, resolve its dependencies and download everything.
Especially during the first time a application is launched this can take some
time. A few minutes are not unusual. So give the launcher some time.</p>

<p>Once the download is done the application is launched automatically.</p>

<p>The JAR file of the launcher can be saved where ever you like. Its not
needed to download this file over and over again.</p>

<p>If there should be problems during the installation or start of the client,
please ask for help on the IRC chat or the forum. There's almost no problem,
we can't find a solution for.</p>

<?php Page::insert_go_to_top_link(); ?>
