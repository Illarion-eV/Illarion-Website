<?php
   include $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php';

   Page::setTitle( 'Download' );
   Page::setDescription( 'Download the latest version of the Illarion-Client and details concerning the installation' );
   Page::setKeywords( array( 'Download', 'Client', 'Programm' ) );

   Page::setXHTML();
   Page::Init();
?>
<h1>Play Illarion</h1>

<p>The latest client-version is V1.22</p>

<h2>Start game</h2>

<ul>
  <li><a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_client.jnlp">Play!</a></li>
</ul>

<p>To be able to play, you must
<a href="<?php echo Page::getURL(); ?>/community/account/us_register.php">create an account</a>
and after that create a character.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Create or view a character</h2>

<p>On your account you can view your characters or create new ones.</p>

<ul>
  <li><a href='<?php echo Page::getURL(); ?>/community/account/us_charlist.php'>Maintain character</a></li>
</ul>

<p>In case your character can't be found when trying to log in, make sure you
have spent all of the attributes points and selected a starting package.</p>

<?php Page::insert_go_to_top_link(); ?>

<h2>Download client</h2>

<h3>System requirements</h3>

<h4>Minimum</h4>
<ul>
  <li>Operating System:
    <ul>
      <li>Windows 2000, XP, XP 64-bit, Vista, Vista 64-bit, 7, 7 64-bit</li>
      <li>Linux</li>
      <li>MacOS X 10.6 or more recent</li>
    </ul>
  </li>
  <li>Graphics card: 64MB memory, driver supporting OpenGL, Shader 2.0 support</li>
  <li>CPU: Duel-core processor with 1,4 GHz</li>
  <li>Java 6</li>
</ul>

<h4>Recommended</h4>
<ul>
  <li>Operating system:
    <ul>
      <li>Windows XP, Vista, Vista 64-bit, 7, 7 64-bit</li>
      <li>Linux</li>
      <li>MacOS X 10.65 or more recent</li>
    </ul>
  </li>
  <li>Graphics card: 128MB dedicated memory, driver supporting OpenGL, Shader 2.0 support</li>
  <li>CPU: Duel-core processor with 2,0 GHz</li>
  <li>Java 7 (64-bit Version of 64-bit operating system)</li>
</ul>

<h4>Note</h4>

<p>Windows Vista, Windows 7 and most Linux versions don't have drivers
supporting OpenGL hardware acceleration installed by default. Drivers that
support this feature can be found on your graphics card manufacturers
website.</p>

<h3>Installation</h3>

<p>The installation takes several steps. First a tool will start up, to help
you through the installation of the client. This program will download the
client for you and keep it up to date.</p>

<p>For the Client and the download to work, Java Runtime Environment is needed.
If you're not sure whether or not, you have the latest version installed, or
any version at all, you should download the latest version. Java is freely
provided by Oracle.</p>

<p><a href="http://java.com">Java downloadpage (external page)</a></p>

<p>To start the client installation, you click on the
&quot;Online-installation&quot; link. The file downloaded by that
(illarion_client.jnlp) is a Java-webstart file and should be run by your Java
Runtime Environment.</p>

<p>When starting the &quot;Illarion Client&quot; a warning message, concerning
a potential security risk may appear. This message may <b>for now</b> be
ignored. With that Java wants to point out, that this application will access
your computer, which is necessary for the client files to be saved on your
machine.</p>

<p>
	<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_client.jnlp">
		Online-installation
	</a>
</p>

<p>If there should be problems during the installation or start of the client,
please ask for help on the IRC chat or the forum. There's almost no problem,
we can't find a solution for.</p>

<h2>Additional applications</h2>

<p>Next to the Illarion client, Illarion is providing additional applications
for you to use. These are mainly used for further development of Illarion. For
more information, please ask on the IRC chat.</p>

<ul>
	<li>
		<a href="<?php echo Page::getURL(); ?>/illarion/media/java/illarion_download.jnlp">
			Illarion-starter
		</a>
		(With this application, all other applications can be started, including the client itself.)
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
			Illarion Map-Editor
		</a>
	</li>
</ul>

<h2>Solve certificate error</h2>

<p>Upon starting the Illarion applications, a message appears saying, that
the certificate the applications has been signed with cannot be verified or
has not been signed by a trusted certification authority.</p>

<p>This error appears, because Illarion uses CAcert as the certification
authority. Java however, has not listed CAcert as a trustworthy certification
authority yet.</p>

<p>For the Illarion certificate to be verified and the validity to be ensured,
the according certificate must be embedded in Java.</p>

<h3>Downloading the root certificates</h3>

<p>First you have to download the root certificates from CAcert.</p>

<p>
	<a href="http://www.cacert.org/index.php?id=3&amp;lang=de">
		Downloadpage of CAcert (external page)
	</a>
</p>

<p>From this page download the &quot;Class 1 PKI-Key&quot; and the
&quot;Class 3 PKI-Key&quot; each in &quot;PEM Format&quot;.
Further installation is depending on your operating system.</p>

<h3>Windows</h3>

<p>On Windows, open Windows Control Panel and look for the entry
&quot;Java&quot;. In the window that will open, choose the
&quot;Security&quot; tab and click on the &quot;Certificates&quot; button. In
the new window, choose &quot;Signer-CA&quot; as &quot;Certificate type&quot;
entry. Use the &quot;Import&quot; button to install the certificate that have
been downloaded.</p>

<p>When you're done close all windows. With that, all certificates should get
verified correctly.</p>

<h3>Linux</h3>

<p>On Linux it is best to use the ;keytool&quot; from Java, to perform the
installation. If Java is installed correctly, the program should be in this
path.</p>

<p><pre>
$ keytool -keystore $/PATH/TO/CACERTS/KEYSTORE \
	-storepass changeit -import \
	-trustcacerts -v \
	-alias cacertclass1 \
	-file root.crt
$ keytool -keystore $/PATH/TO/CACERTS/KEYSTORE \
	-storepass changeit -import \
	-trustcacerts -v \
	-alias cacertclass3 \
	-file class3.crt
</pre></p>

<p>Mostly the Keystore can be found here:</p>
<ul>
	<li>/usr/lib/jvm/java-$VERSION/jre/lib/security/cacerts</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
