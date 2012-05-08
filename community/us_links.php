<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

Page::setTitle( 'Links' );
Page::setDescription( 'This page contains Illarion guild and fan pages.' );
Page::setKeywords( array( 'Links', 'Guilds', 'Fan', 'Fans', 'Banner' ) );
Page::setXHTML();
Page::Init();
?>

<h1>Links to Illarion related sites</h1>

<h2>Content</h2>

<ul>
	<li><a class="hidden" href="#1">Guilds / Tribes / Clans</a></li>
	<li><a class="hidden" href="#2">Fan sites</a></li>
</ul>
<?php Page::insert_go_to_top_link(); ?>

<div><a id="1"></a></div>

<h2>Guilds / Tribes / Clans</h2>

<h4>The Order of the Grey Rose</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_greyrose.de.jpg" alt="Grey Rose" />
<p>
	<a rel="external" href="http://www.graurose.de">Link to the homepage of the Order of the Grey Rose (German Only)</a>
	<br /><br />
	We, the knights of the Grey Rose, think highly of honour and loyalty. We live with a
	strict code which is the base for our guild and our behaviour. We strive for peace and
	order between all beings. We select our squires as carefully as we select our
	knights, which are chosen from among our squires. In our stronghold (HP) you can
	find out more about us and our goals. Every visitor who wants to look around in peace
	is warmly welcome.
</p>

<h4>Order of the Grey Light</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_greylight-order.de.vu.jpg" alt="Grey Light" />
<p>
	<a rel="external" href="http://greylight.foren-city.de/forum,19,-das-graue-licht-the-grey-order.html">Link to the homepage of the Order of the Grey Light</a>
	<br /><br />
	The oldest organisation of illarion is the Order of the Grey Light. Goals of the
	Order are: upbuilding and keeping law and order; keeping the balance in all things,
	neutrality and harmony; keeping and enhancing knowledge, history and scholarship.
	While the "Scribes" of the Order act as scholars, philosophers, tacticians, bards or
	judges, the "Templars" of the order are fighters or fighter mages, law-keepers,
	soldiers, judges or paladins. Templars and Scribes follow the Grey Codex. Accepted
	as members are only those who have proven as honorable and worthy.
</p>

<?php Page::insert_go_to_top_link(); ?>

<div><a id="2"></a></div>

<h2>Fan sites</h2>

<h4>Moonsilver</h4>

<img class="float_left" src="<?php echo Page::getURL(); ?>/community/pic_moonsilver.jpg" alt="Moonsilver" />
<p>
	<a rel="external" href="http://www.moonsilver.de">Link to the homepage of Moonsilver</a>
	<br /><br />
	This is a site with the background story of Illarion. Here you will find the
	description of the gods and races, the history of the gods, information concerning the
	calendar, descriptions of professions and much more. Take your time and have a look
	at the content as it is helpful for the game.
</p>

<?php Page::insert_go_to_top_link(); ?>