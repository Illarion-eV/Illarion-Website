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
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/general/de_edit_news.php'>News schreiben</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/mantis/index.php'>Mantis - Fehlerverwaltung</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/mediawiki/index.php/Main_Page'>Interne Wiki</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/gmadmin/index.php'>Gamemaster - Administrationsseite</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/restart/de_restart.php'>Testserver stoppen / starten</a></li>
		<li><a class="hidden" href='<?php echo Page::getSecureURL(); ?>/restart/de_restart_rs.php'>Spielserver stoppen / starten</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/~nop/client_dev/illarion_testclient.jnlp'>Testclient Java</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/~nop/ClientItemList.pdf'>Itemliste</a></li>
		<li><a class="hidden" href='<?php echo Page::getURL(); ?>/community/Illarion_e.V._-_Antrag_auf_aktive_Mitgliedschaft.pdf'>Antrag auf aktive Mitgliedschaft im Illarion e.V.</a></li>
	</ul>
</p>

<?php Page::insert_go_to_top_link(); ?>