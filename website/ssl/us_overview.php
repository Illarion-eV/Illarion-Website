<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php";

	Page::setTitle( 'Tools of the Team' );
	Page::setDescription( 'A collection of links to useful tools for Illarion team members' );
	Page::setKeywords( array( 'Staff', 'Tools' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Tools for project team members</h1>

<h2>General</h2>

<p>
	<ul>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/general/us_edit_news.php'>Post News</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/mantis/index.php'>Mantis - a bug tracking tool</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/mediawiki/index.php/Main_Page'>Internal Wiki</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/restart/us_restart.php'>Start or stop the test server</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/restart/us_restart_rs.php'>Start or stop the game server</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/community/Illarion_e.V._-_Request_for_Active_Membership.pdf'>Illarion e.V. - Request for Active Membership</a></li>
	</ul>
</p>

<?php Page::insert_go_to_top_link(); ?>