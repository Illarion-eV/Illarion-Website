<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	includeWrapper::includeOnce( Page::getRootPath().'/statistics/inc_highscores.php' );

	Page::setTitle( 'Bestenlisten' );
	Page::setDescription( 'Diese Seite zeigt an, welche Spieler besonders herausragen.' );
	Page::setKeywords( array( 'Highscore', 'Spieler', 'Statistik' ) );

	Page::addCSS( 'onlineplayer' );

	Page::setXHTML();
	Page::Init();
?>

<h1>Bestenlisten</h1>

<?php
    addHighscore('Goldrausch',
                 'SELECT richest.id AS id, richest.money AS points FROM homepage.richest',
                 'de', 61, 'Goldm&uuml;nzen', 'Gold');
                 
    addHighscore('Arenameister',
                 'SELECT qpg_userid AS id, SUM(qpg_progress) AS points FROM illarionserver.questprogress WHERE qpg_questid IN (801, 802, 803) GROUP BY id',
                 'de', 1, 'Arenapunkte', 'Schwert');
                 
    addHighscore('Illarionbummler',             
                 "SELECT qpg_userid AS id, SUM(char_length(replace(qpg_progress::bit(32)::text, '0', ''))) AS points FROM illarionserver.questprogress WHERE qpg_questid >= 130 AND qpg_questid < 150 GROUP BY id",
                 'de', 66, 'Markierungssteine', 'Markierungsstein');
?>