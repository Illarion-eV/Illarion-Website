<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_highscores.php' );

	Page::setTitle( 'High Scores' );
	Page::setDescription( 'This page shows exceptional players.' );
	Page::setKeywords( array( 'High Score', 'Player', 'Statistics' ) );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>High Scores</h1>

<?php
    print_highscores('us');
?>
