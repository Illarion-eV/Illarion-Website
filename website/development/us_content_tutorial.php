<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Content Development Tutorial', 'Tutorial'));
	Page::setDescription('This page contains an introduction into Illarion content development.');
	Page::setKeywords( array( 'Open Source', 'Source', 'Git', 'GitHub', 'Content', 'Development', 'Lua' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>How to fix spelling errors yourself!</h1>

<p>
Did you ever stumble over an obvious mistake in the game like a spelling error?
Did you consider posting on Mantis but felt it was just not worth it?
Would you just have corrected it if given the means?
If so, keep reading, this tutorial is dedicated to YOU.
</p>
<p>
This How-To lists an easy way to contribute to Illarion development by fixing mistakes such as spelling errors yourself.
</p>

<h2>Setup</h2>

<h3>You will need the following:</h3>
<ul>
<li>Link to the game content repository: <a href="https://github.com/Illarion-eV/Illarion-Content">https://github.com/Illarion-eV/Illarion-Content</a></li>
<li>A free account on <a href="https://github.com">github.com</a></li>
<li>A modern, good editor like <a href="http://notepad-plus-plus.org">Notepad++</a></li>
<li>An easy to use Git client like <a href="http://sourcetreeapp.com">SourceTree</a> on Windows and Mac, or the console client on Linux</li>
</ul>
	
<h4>Some remarks:</h4>
<ul>
<li>If you know what you are doing you can probably stop reading here.</li>
<li>Note that GitHub is not affiliated with Illarion in any way.</li>
<li>You can use other editors, but if you do it is on you, since they might not meet my definition of modern and good.</li>
<li>If you use Linux, I will generally assume that you know what you are doing (e.g how to install Git).</li>
<li>For each step with Git I will also write down the console command.</li>
</ul>

<h3>Preparation (you only need to do this once):</h3>
<ul>
<li>In GitHub, on the game content repository page, copy the game content repository to your account. This is called forking, so click "Fork".
	Your Illarion-Content fork URL will look like this: https://github.com/&lt;your_account_name&gt;/Illarion-Content</li>
</ul>
<h4>Windows/Mac:</h4>
<ul>
<li>Fire up SourceTree.</li>
<li>Open the "Options" from the "Tools" menu and select the "Default text encoding" iso-8859-1, click OK.</li>
<li>Hit "Clone / New".</li>
<li>Insert the "HTTPS clone URL" from your github fork as "Source Path / URL".</li>
<li>Insert the destination path where another copy of the content repository will be stored, this time on your hard disk.</li>
<li>Hit the "Clone" button. (You have now copied the entire game content twice already!)</li>
<li>In the "Repository" menu click "Add Remote..." and "Add" a remote with the name "upstream" and URL https://github.com/Illarion-eV/Illarion-Content</li>
</ul>
<h4>Linux/Console:</h4>
<ul>
<li>git clone [your github fork url]</li>
<li>git remote add upstream https://github.com/Illarion-eV/Illarion-Content</li>
</ul>

<h2>General workflow to correct an error (e.g. typo)</h2>

<h3>Find and correct the error:</h3>
<ul>
<li>Write down the exact phrase containing the error, keep it as short as possible, since you might encounter multiple occurrences of the error.</li>
<li>In Notepad++ click select "Find in Files..." from the "Search" menu.</li>
<li>Enter your phrase under "Find what" and select your copy of Illarion-Content under "Directory".</li>
<li>Hit "Find All" to list all occurrences of the error.</li>
<li>Review these and <u>either</u> use "Replace with" and "Replace All" to fix everything, <u>or</u> open each file by double-clicking the mentioned lines, replace manually and save.</li>
</ul>

<h3>Share your great work with us:</h3>
<h4>Windows/Mac:</h4>
<ul>
<li>In SourceTree right-click the "upstream"-remote in the left hand side list, select "Pull from upstream" and choose "master" as "Remote branch to pull" to update your local copy with the version currently in the game (you need to click "Refresh" first if "master" is not listed).</li>
<li>Click the "Commit" icon in the top bar to prepare a set of changes to send.</li>
<li>View your changes by selecting each file, then add them to the commit by using the single arrow up or add all of them by using the double arrow up.</li>
<li>Enter a meaningful commit message in imperative (like I did here). It should be something like, "Fix spelling error in NPC John Doe". If you need more than one line, use a short descriptive title and leave the second line blank.</li>
<li>Finally hit the "Commit" button to store your changeset locally.</li>
<li>Hit the "Push" button in the upper bar and confirm with "OK" to send your changeset(s) to your Github account. You will need to enter your GitHub login the first time at least.</li>
</ul>
<h4>Linux/Console:</h4>
<ul>
<li>git pull upstream master</li>
<li>git add [files to commit]</li>
<li>git commit</li>
<li>git push</li>
</ul>
<h4>In both cases:</h4>
<ul>
<li>In your Illarion-Content fork in your GitHub account you will now see your latest commit message title (after refreshing).</li>
<li>Click "Pull Request" right above that message and for the last time review your changes before confirming with the "Click to create a pull request for this comparison" link.</li>
<li>If the automatic title is not descriptive enough, add a comment.</li>
<li>Finally hit the "Send pull request" button. You will be notified via e-mail when your changes are pulled. Soon after they will appear in the game.</li>
<li>Well done! Thank you very much for improving Illarion!</li>
</ul>

<h2>Interested in more serious stuff?</h2>
<ul>
<li>Write your own easyNPCs.</li>
<li>Illarion uses Lua 5.1, a <a href="http://www.lua.org/pil/contents.html">book covering Lua 5.0</a> (very similar) is available online.</li>
<li>See the <a href="https://raw.github.com/Illarion-eV/Illarion-Server/testserver/doc/luadoc.pdf">Illarion extension to Lua</a>.</li>
<li>Get your own <a href="https://spideroak.com/browse/share/vilarion/localserver/localserver/">local Illarion server</a> to play around with.</li>
<li>Learn more about <a href="http://git-scm.com/book">Git</a>, the fast and distributed version control system.</li>
<li>Talk to our content developers in #illarion-sv on QuakeNet (IRC).</li>
</ul>