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
    addHighscore('Gold Rush',
                 'SELECT richest.id AS id, richest.money AS points FROM homepage.richest',
                 'us', 61, 'gold coins', 'Gold');
                 
    addHighscore('Arena Master',
                 'SELECT qpg_userid AS id, SUM(qpg_progress) AS points FROM illarionserver.questprogress WHERE qpg_questid IN (801, 802, 803) GROUP BY id',
                 'us', 1, 'arena points', 'sword');
                 
    addHighscore('Illariontrotter',             
                 "SELECT qpg_userid AS id, SUM(char_length(replace(qpg_progress::bit(32)::text, '0', ''))) AS points FROM illarionserver.questprogress WHERE qpg_questid >= 130 AND qpg_questid < 150 GROUP BY id",
                 'us', 66, 'marker stones', 'marker stone');
?>