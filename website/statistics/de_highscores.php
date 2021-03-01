<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_highscores.php' );
	IllaUser::requireGmStatus();
	Page::setTitle( 'Bestenlisten' );
	Page::setDescription( 'Diese Seite zeigt an, welche Spieler besonders herausragen.' );
	Page::setKeywords( array( 'Highscore', 'Spieler', 'Statistik' ) );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Bestenlisten</h1>

<?php
    print_highscores('de');
?>
