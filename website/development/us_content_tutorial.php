<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setTitle(array('Content Development Tutorial', 'Tutorial'));
	Page::setDescription('This page contains an introduction into Illarion content development.');
	Page::setKeywords( array( 'Open Source', 'Source', 'Git', 'GitHub', 'Content', 'Development', 'Lua' ) );
	Page::setXHTML();
	Page::Init();
?>

<h1>Introduction to Content Development</h1>

<p>
Did you ever stumble over an obvious mistake in the game like a spelling error?
Did you consider posting on Mantis but felt it was just not worth it?
Would you just have corrected it if given the means?
If so, keep reading, this tutorial is for <u>you</u>.
</p>
<p>
This tutorial lists an easy way to contribute to Illarion development by fixing
mistakes such as spelling errors yourself. It gives a basic introduction into
our development process and policies, i.e. what you need to know to contribute
to Illarion development. 
</p>

<p>Illarion uses a free revision control system called Git. Git was initially designed for Linux kernel development.
With Git, various developers can work on one project simultanously without causing conflicts between commits of different developers.
One can also define development branches. The running game is not affected by the development.
Using Git is quite challenging for beginners. Once you get used to it, it is really simple, promise!
</p>

<h2>Setup</h2>

<h4>Prerequisites</h4>
<ul>
<li>Link to the game content repository: <a href="https://github.com/Illarion-eV/Illarion-Content">https://github.com/Illarion-eV/Illarion-Content</a></li>
<li>A free account on <a href="https://github.com">github.com</a></li>
<li>A modern, good editor like <a href="http://notepad-plus-plus.org">Notepad++</a></li>
<li>An easy to use Git client like <a href="http://sourcetreeapp.com">SourceTree</a> on Windows and Mac, or the console client on Linux</li>
</ul>
	
<h4>Remarks</h4>
<ul>
<li>Note that GitHub is not affiliated with Illarion in any way.</li>
<li>You can use other editors, but if you do it is on you, since they might not meet my definition of modern and good.</li>
<li>For each step with Git, also the console commands are given.</li>
<li>Illarions team language is English. Thus, it is reasonable to use the English versions of the tools. This way, you don't have to ask for translations if a problem occurs.</li>
</ul>

<h4>Preparations</h4>
<ul>
<li>Open this page with your internet browser: <a href="https://github.com/Illarion-eV/Illarion-Content">https://github.com/Illarion-eV/Illarion-Content</a></li>
<li>Click on "Fork" to copy the game content repository to your GitHub account.</li>
<li>Your Illarion-Content fork URL will look like this: https://github.com/&lt;your_account_name&gt;/Illarion-Content</li>
</ul>

<h4>Windows/Mac</h4>
<ul>
<li>Start SourceTree and follow its instructions.</li>
<li>Open the "Options" from the "Tools" menu and select the "Default text encoding" iso-8859-1, click OK.</li>
<li>Hit "Clone / New".</li>
<li>Insert the "HTTPS clone URL" from your github fork as "Source Path / URL".</li>
<li>Insert the destination path where another copy of the content repository will be stored, this time on your hard disk.</li>
<li>Hit the "Clone" button. (You have now copied the entire game content twice already!)</li>
<li>In the "Repository" menu click "Add Remote..." and "Add" a remote with the name "upstream" and URL https://github.com/Illarion-eV/Illarion-Content</li>
</ul>

<h4>Linux/Console</h4>
<ul>
<li>git clone [your github fork url]</li>
<li>git remote add upstream https://github.com/Illarion-eV/Illarion-Content</li>
</ul>

<h2>General workflow</h2>

<h4>Find and correct the error</h4>
<ul>
<li>Write down the exact phrase containing the error, keep it as short as possible, since you might encounter multiple occurrences of the error.</li>
<li>In Notepad++ select "Find in Files..." from the "Search" menu.</li>
<li>Enter your phrase under "Find what" and select your copy of Illarion-Content under "Directory".</li>
<li>Hit "Find All" to list all occurrences of the error.</li>
<li>Review these and <u>either</u> use "Replace with" and "Replace All" to fix everything, <u>or</u> open each file by double-clicking the mentioned lines, replace manually and save.</li>
</ul>

<h4>Share your work using Windows/Mac</h4>
<ul>
<li>In SourceTree, right-click the "upstream"-remote in the left hand side list, select "Pull from upstream" and choose "master" as "Remote branch to pull" to update your local copy with the version currently in the game 
<li>You need to click "Refresh" first if "master" is not listed.</li>
<li>Click the "Commit" icon in the top bar to prepare a set of changes to send.</li>
<li>View your changes by selecting each file, then add them to the commit by using the single arrow up or add all of them by using the double arrow up.</li>
<li>Enter a meaningful commit message in imperative (like I did here). It should be something like, "Fix spelling error in NPC John Doe". If you need more than one line, use a short descriptive title and leave the second line blank.</li>
<li>Finally hit the "Commit" button to store your changeset locally.</li>
<li>Hit the "Push" button in the upper bar and confirm with "OK" to send your changeset(s) to your Github account. You will need to enter your GitHub login the first time at least.</li>
</ul>
<h4>Share your work using Linux/Console</h4>
<ul>
<li>git pull upstream master</li>
<li>git add [files to commit]</li>
<li>git commit</li>
<li>git push</li>
</ul>
<h4>In both cases</h4>
<ul>
<li>In your Illarion-Content fork in your GitHub account you will now see your latest commit message title (after refreshing).</li>
<li>Click "Pull Request" right above that message and for the last time review your changes before confirming with the "Click to create a pull request for this comparison" link.</li>
<li>If the automatic title is not descriptive enough, add a comment.</li>
<li>Finally hit the "Send pull request" button. You will be notified via e-mail when your changes are pulled. Soon after they will appear in the game.</li>
<li>Well done! Thank you very much for improving Illarion!</li>
</ul>

<h2>Further steps and options</h2>
<ul>
<li>Write your own NPCs with easyNPC.</li>
<li>Shape the map with the map editor.</li>
<li>Create quests or help developing the fighting and magic system.</li>
<li>Illarion uses Lua 5.1, a <a href="http://www.lua.org/pil/contents.html">book covering Lua 5.0</a> (very similar) is available online.</li>
<li>See the <a href="https://raw.github.com/Illarion-eV/Illarion-Server/testserver/doc/luadoc.pdf">Illarion extension to Lua</a>.</li>
<li>Get your own <a href="https://spideroak.com/browse/share/vilarion/localserver/localserver/">local Illarion server</a> to play around with.</li>
<li>Learn more about <a href="http://git-scm.com/book">Git</a>, the fast and distributed version control system.</li>
<li>Talk to our content developers in the <a href="http://illarion.org/community/us_chat.php">IRC chat</a> (#illarion on QuakeNet).</li>
</ul>