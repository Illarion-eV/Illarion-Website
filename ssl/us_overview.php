<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php";

	Page::setTitle( 'Hilfmittle für das Team' );
	Page::setDescription( 'Eine Sammlung von Links mit praktischen Hilfsmitteln für die Teammitglieder von Illarion' );
	Page::setKeywords( array( 'Staff', 'Tools' ) );

	Page::setXHTML();
	Page::Init();
?>
<h1>Hilfsmittel für die Projektmitglieder</h1>

<h2>Allgemeines</h2>

<p>
	<ul>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/general/us_edit_news.php'>Post News</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/mantis/index.php'>Mantis - a bug tracking tool</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/mediawiki/index.php/Main_Page'>Internal Wiki</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/gmadmin/index.php'>Gamemaster - administration site</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/restart/us_restart.php'>Start or stop the test server</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/restart/us_restart_rs.php'>Start or stop the game server</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/~nop/client_dev/illarion_testclient.jnlp'>Testclient Java</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/~nop/ClientItemList.pdf'>Itemlist</a></li>
	</ul>
</p>

<?php Page::insert_go_to_top_link(); ?>