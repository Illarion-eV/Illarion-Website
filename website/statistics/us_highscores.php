<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';

	Page::setTitle( 'High Scores' );
	Page::setDescription( 'This page shows exceptional players.' );
	Page::setKeywords( array( 'High Score', 'Player', 'Statistics' ) );

	Page::addCSS( 'onlineplayer' );
	Page::addCSS( 'highscore' );

	Page::setXHTML();
	Page::Init();
?>

<h1>High Scores</h1>

<h2>Gold Rush</h2>

<?php
	$pgSQL =& Database::getPostgreSQL();

	$query = 'SELECT richest.id, richest.name, richest.money, questprogress.qpg_progress AS faction, '
	.PHP_EOL.'       (character_details.settings IS NOT NULL AND (character_details.settings & 1) > 0) AS show_profile'
	.PHP_EOL.'FROM homepage.richest'
	.PHP_EOL.'INNER JOIN homepage.character_details'
	.PHP_EOL.'ON richest.id = character_details.char_id' 
	.PHP_EOL.'LEFT JOIN illarionserver.questprogress'
	.PHP_EOL.'ON richest.id = questprogress.qpg_userid AND questprogress.qpg_questid = 199'
	.PHP_EOL.'ORDER BY richest.money DESC';
	
	$pgSQL->setQuery( $query );
	$list = $pgSQL->loadAssocList();

    if (!is_null($list)) {
        echo '<table border="0">';
        
        echo '<tr><th></th><th>Faction</th><th>Character</th><th><img src="' . Page::getCurrentImageURL() . '/items/61.png" alt="Gold" title="gold coins"/></th></tr>';
        
        $i = 1;
        $row = 0;
	    foreach($list as $key=>$char) {
	        echo '<tr class="row'.$row.'">';
	        echo '<td>',$i,'.</td>';
	        echo '<td style="text-align:center;">';
	        
	        if ($char["faction"] == 1) {
	            echo '<img src="' . Page::getMediaURL() . '/cadomyr.png" alt="Cadomyr" title="Cadomyr" />';
	        } else if ($char["faction"] == 2) {
	            echo '<img src="' . Page::getMediaURL() . '/runewick.png" alt="Runewick" title="Runewick" />';
	        } else if ($char["faction"] == 3) {
	            echo '<img src="' . Page::getMediaURL() . '/galmair.png" alt="Galmair" title="Galmair" />';
	        }
	            
	        echo '</td>';	        
	        echo '<td>';
	        if ($char["show_profile"] == 't')
			{
				echo '<a class="rating8" href="'.Page::getURL().'/community/us_charprofile.php?id='.dechex( $char['id'] ).'">'.$char['name'] . '</a>';
			}
			else
			{
				echo $char['name'];
			}
			echo '</td>';
			echo '<td style="text-align:center;">',$char['money'],'</td>';
	        echo '</tr>';
	        
	        $i = $i + 1;
	        $row = 1 - $row;
	    }
	    
	    echo '</table>';
	}
	
    Page::insert_go_to_top_link();
?>

<h2>Arena Master</h2>

<?php
    
    $query = 'SELECT id, chr_name AS name, points, qpg_progress AS faction, '
    .PHP_EOL.'       (character_details.settings IS NOT NULL AND (character_details.settings & 1) > 0) AS show_profile'
    .PHP_EOL.'FROM ('
    .PHP_EOL.'      SELECT qpg_userid AS id, SUM(qpg_progress) AS points'
    .PHP_EOL.'      FROM illarionserver.questprogress'
    .PHP_EOL.'      WHERE qpg_questid IN (801, 802, 803) AND NOT qpg_userid IN (SELECT gms.gm_charid FROM illarionserver.gms)'
    .PHP_EOL.'      GROUP BY id'
    .PHP_EOL.'      LIMIT 20'
    .PHP_EOL.'     )'
    .PHP_EOL.'AS arenapoints'
    .PHP_EOL.'INNER JOIN illarionserver.chars'
    .PHP_EOL.'ON id = chr_playerid'
    .PHP_EOL.'INNER JOIN homepage.character_details'
	.PHP_EOL.'ON id = character_details.char_id' 
	.PHP_EOL.'LEFT JOIN illarionserver.questprogress'
	.PHP_EOL.'ON id = qpg_userid AND qpg_questid = 199'
    .PHP_EOL.'ORDER BY points DESC;';
    
    $pgSQL->setQuery( $query );
	$list = $pgSQL->loadAssocList();
	
	if (!is_null($list)) {
        echo '<table border="0">';
        
        echo '<tr><th></th><th>Faction</th><th>Character</th><th><img src="' . Page::getCurrentImageURL() . '/items/1.png" alt="sword" title="arena points"/></th></tr>';
        
        $i = 1;
        $row = 0;
	    foreach($list as $key=>$char) {
	        echo '<tr class="row'.$row.'">';
	        echo '<td>',$i,'.</td>';
	        echo '<td style="text-align:center;">';
	        
	        if ($char["faction"] == 1) {
	            echo '<img src="' . Page::getMediaURL() . '/cadomyr.png" alt="Cadomyr" title="Cadomyr" />';
	        } else if ($char["faction"] == 2) {
	            echo '<img src="' . Page::getMediaURL() . '/runewick.png" alt="Runewick" title="Runewick" />';
	        } else if ($char["faction"] == 3) {
	            echo '<img src="' . Page::getMediaURL() . '/galmair.png" alt="Galmair" title="Galmair" />';
	        }
	            
	        echo '</td>';	        
	        echo '<td>';
	        if ($char["show_profile"] == 't')
			{
				echo '<a class="rating8" href="'.Page::getURL().'/community/us_charprofile.php?id='.dechex( $char['id'] ).'">'.$char['name'] . '</a>';
			}
			else
			{
				echo $char['name'];
			}
			echo '</td>';
			echo '<td style="text-align:center;">',$char['points'],'</td>';
	        echo '</tr>';
	        
	        $i = $i + 1;
	        $row = 1 - $row;
	    }
	    
	    echo '</table>';
	}
    
    Page::insert_go_to_top_link();
?>