<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'Development Progress' );
	Page::setDescription( 'This page shows the development progress of Illarion.' );

	Page::addCSS( 'dev_progress' );

	Page::Init();
?>

<h1>Development Progress</h1>

<p>Illarion's development follows clearly specified milestones. Those milestones stand for a state of the game that does not require any future reworking on existing features. Hence, only improvements and new features will be added without fundamental flaws or bugs. The milestones are worked on in parallel and not in sequence. The number gives the predicted sequence of completion, though.</p>

<p>If you want to help to develop Illarion, please contact one of the <a href="http://illarion.org/community/us_contact.php#4">developers</a> or join the <a href="http://illarion.org/community/us_chat.php">chat</a>. Click on the title of a milestone to learn more about the individual development items on Mantis Bugtracker.</p>

<h2><a href="http://illarion.org/mantis/view.php?id=9659" target="_blank">Milestone I: Stable state for reviewers and promotion</a></h2>

<p>With this milestone, we want to get rid of any bugs and improve the impression of the game during the first hour of playing. The whole road from finding the game over installation until starting the game is affected. Content that is not part of the first hour is not part of this milestone albeit important for the overall game.</p>

<h3>Highlights</h3>

<ul>
    <li>Improving the character creation</li>
    <li>Visual improvements for the client and the interface</li>
    <li>Update of the website</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9822" target="_blank">Milestone II: New items and improved crafting</a></h2>

<p>This milestone will add a reasonable amount of new items to the game, especially weapons and armours, define their use properly and make the available to players. The crafts for these items will be rebalanced in terms of craft distribution over towns, resources, needed materials for items and also prices.</p>

<h3>Highlights</h3>

<ul>
    <li>More than 100 new weapons and armours</li>
    <li>Redesign of crafting recipes</li>
    <li>Improvements to gathering of resources</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9823" target="_blank">Milestone III: Magic</a></h2>

<p>Magic is a mandatory feature for a fantasy game. With this milestone arcane magic will return to the game and also, we'll release divine magic for priests. Adjustments to craft like actions like alchemy will also be included.</p>

<h3>Highlights</h3>

<ul>
    <li>Arcane magic with dozens of spells</li>
    <li>Divine magic of the gods for templars and priests</li>
    <li>Craft like enchanting and improvements to alchemy</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9914" target="_blank">Milestone IV: Review the fighting system</a></h2>

<p>The current fighting system is in need of a review to become more fair, clear and relieable. This milestone won't bring many visible changes but an improved and more flexible fighting system.</p>

<h3>Highlights</h3>

<ul>
    <li>Clear use of attributes</li>
    <li>Skillgain without issues</li>
    <li>The use of weapons and armours will be distributed in a fair way</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9825" target="_blank">Milestone V: Sandboxing and immersion</a></h2>

<p>Illarion competes with other games. To stand out as an indie game, it needs features no other game can offer. This milestone will add features for enhanced immersion and enable new options for the players to shape their characters.</p>

<h3>Highlights</h3>

<ul>
    <li>Build your own house</li>
    <li>Dynamic events</li>
    <li>Enhancement of the game atmosphere</li>
</ul>

<h2><a href="http://illarion.org/mantis/view.php?id=9824" target="_blank">Milestone VI: Content, quests and dungeons</a></h2>

<p>By adding further quests and dungeons, this milestone will increased the attractivity of this game. With these features, the lore shall be transported to the player. Books, NPCs, inscriptions and events will teach the lore at every noteable location.</p>

<h3>Highlights</h3>

<ul>
    <li>Redesign of Illarion's lore and history</li>
    <li>Release of dozens of new books</li>
    <li>Addition of new, complex and challenging quests</li>
</ul>

<?php Page::insert_go_to_top_link(); ?>
