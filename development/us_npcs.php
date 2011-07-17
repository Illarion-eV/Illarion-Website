<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

Page::setTitle( 'Creating NPCs' );
Page::setDescription( 'This page contains information about creating Illarion NPCs' );
Page::setKeywords( array( 'Development', 'NPCs' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Creating NPCs for Illarion</h1>

<p>
Since the VBU (Very Big Update) is still a lot of work and we're still searching for people willing to help, we created a new possibility to get into NPC development pretty fast and direct. Using this, everyone can test the NPC that (s)he is working on. This is now it works:
</p>
<p>
You all know the easyNPC-editor written by Nitram. Using it, there is an option to "upload" the script which simply copies the script you're working on to the server (implying that you need internet connection of course). The corresponding NPC using this script stands on the testserver and we provide you from now on with the testclient and an account with 2 characters on the testserver to access it directly so that you can test your own NPC immediately.
</p>
<p>
Everything you need for that is in the <a href="http://illarion.org/~nitram/downloads/illarion_download.jnlp">Illarion Loader</a>.
This contains 3 different programs:
<ul>
<li>The actual testclient</li>
<li>The NPC editor</li>
<li>The map editor (not working right now)</li>
</ul>
</p>
<p>
Here's a small step-by-step introduction to get started:
<ol>
<li>Start the file given above</li>
<li>Start the easyNPC editor</li>
<li>Enter an easy script, e.g.: "Hi" -> "Hello, stranger!"</li>
<li>Click on "build script" (which automatically completes the script)</li>
<li>It's recommended but not mandatory to save the script.</li>
<li>By clicking on the application's main button (on the top left) and selecting "upload lua script", the script will be transfered to the server.</li>
<li>To start the client, start the file of the given link (illarion_download.jnlp) once more and select the Testclient.</li>
<li>Enter "testserver" as both, account name and password. By that, you will be given the choice between two characters, "Testserver" and "Testserver One". Chose one of them and start the client.</li>
<li>As soon as you see your character on the map, hit enter to start the speech-mode and enter "!fr".</li>
<li>As soon as the server has loaded all scripts, it will inform you. You can now walk over to the NPC, say "Hi" and he will answer according to your script.</li>
</ol>
</p>

<?php Page::insert_go_to_top_link(); ?>
