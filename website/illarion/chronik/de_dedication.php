<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( array('Chronik','Nachwort') );
	Page::setDescription( 'Nachwort für die Chronik von Gobaith' );
	Page::setKeywords(array('Nachwort','Chronik','Geschichte','Gobaith') );

	Page::setXHTML( );
	Page::Init( );

	Page::setFirstPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
	Page::setPrevPage( Page::getURL().'/illarion/chronik/de_chronik.php' );
?>

<?php Page::navBarTop(); ?>

<h1>Die Chronik von Gobaith</h1>

<h2>Nachwort</h2>

<p>Hiermit danke ich mir selbst, dass ich die Arbeit und die Mühen auf mich genommen
habe um diese Stadtchronik zu bauen. Und das, obwohl sie, aller Vorraussicht nach, doch
niemand nutzen oder benutzen wird.</p>

<p>Der Weg ist das Ziel!</p>

<p>Carpe Diem</p>

<?php Page::navBarBottom(); ?>