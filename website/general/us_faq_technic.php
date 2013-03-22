<?php
	include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
	create_header( "Illarion - FAQ Technic",
	"This FAQ contains questions and answers with relevancy to Illarion technics.",
	"FAQ, Questions, Technics" );
	include_header();
?>

<h2>
	<a class="float_left" href='/general/us_faq_concept.php'>Game Concept - FAQ</a>
	<a class="float_right" href='/general/us_faq_graphic.php'>Graphics - FAQ</a>
	<a class="clr" style="display:block;"></a>
</h2>

<h1>Technical FAQ</h1>

<h2>Contents</h2>

<ul>
	<li><a class="hidden" href="#1">Illegal Win32-application</a></li>
	<li><a class="hidden" href="#2">DirectDrawCreateEx</a></li>
	<li><a class="hidden" href="#3">WS2_32.dll</a></li>
	<li><a class="hidden" href="#4">Can't connect</a></li>
	<li><a class="hidden" href="#5">DDERR_INVALIDMODE</a></li>
	<li><a class="hidden" href="#6">Black screen</a></li>
	<li><a class="hidden" href="#7">Password</a></li>
	<li><a class="hidden" href="#8">Character generation</a></li>
	<li><a class="hidden" href="#9">Can't log on</a></li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="1"></a></p>

<h2>Illegal Win32-application</h2>

<ul>
	<li class="question">Windows error message: "Illarion.exe is a illegal Win32
	application."</li>
	<li class="answer">The download may have failed. This problem happens for instance with
	programs like Go!Zilla. Just download the file with the default browser downloader.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="2"></a></p>

<h2>DirectDrawCreateEx</h2>

<ul>
	<li class="question">Windows error message: "export DDraw.DLL:DirectDrawCreateEx"
	or "... connected device is out of order".</li>
	<li class="answer">You do not have DirectX 7.0. Illarion needs DX7.0 or above to run. Windows
	NT can only run DX3 and earlier. To get the newest version, go to Microsoft's
	homepage.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="3"></a></p>

<h2>WS2_32.dll</h2>

<ul>
	<li class="question">Windows error message: "File WS2_32.dll not found"</li>
	<li class="answer">You seem to be using Windows 95. To play Illarion you have to download and
	install <a href="../illarion/W95ws2setup.exe">Winsock2</a> from Microsoft at first!</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="4"></a></p>

<h2>Can't connect</h2>

<ul>
	<li class="question">Illarion client error message: "Can't establish connection -
	Maybe the server is not online or you have no internet connection." or "Connecting
	to Server, Can't connect!"</li>
	<li class="answer">There can be two reasons for this: Either you are using Windows 95 (please
	take a look <a href="#3">here</a> for a possible solution) or the server is offline. (you can
	check whether Server is online or not on the main page)</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="5"></a></p>

<h2>DDERR_INVALIDMODE</h2>

<ul>
	<li class="question">Illarion client error message: "DDERR_INVALIDMODE"</li>
	<li class="answer">Your monitor or graphics adapter does not support a 1024*768 resolution
	with 65536 (16 bit 64k colours)</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="6"></a></p>

<h2>Black screen</h2>

<ul>
	<li class="question">After logging on, I see the interface, and the text box, but the map
	remains black</li>
	<li class="answer">There can be two reasons for that:
		<ul>
			<li>Either, you started Illarion from a shortcut. You need to start the client from the
			icon in the Illarion main folder!</li>
			<li>You did not unzip all the files into the Illarion Folder. Make sure that especially
			the *.tbl files are there.</li>
		</ul>
	</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="7"></a></p>

<h2>Password</h2>

<ul>
	<li class="question">I do not have a password - Where can I get one?</li>
	<li class="answer">Open the Illarion client, and choose "create new". This takes
	you to the character generation screen, where you also choose your password.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="8"></a></p>

<h2>Character generation</h2>

<ul>
	<li class="question">I made a character, but nothing happens</li>
	<li class="answer">After having decided upon a character, press "create". then
	click "ok" to log in. Hence forth, just type your name and password directly in the
	start screen.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<p><a name="9"></a></p>

<h2>Can't log on</h2>

<ul>
	<li class="question">I receive the error message "Wrong password" or "No
	character with this name has been found!"</li>
	<li class="answer">Both the names and passwords are case sensitive.</li>
</ul>

<?php insert_go_to_top_link(); ?>

<?php include_footer(); ?>