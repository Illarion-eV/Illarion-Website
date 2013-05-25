<?php
    // title: highscore title
    // select: SELECT query returning player id AS id and some integer value AS points
    // lang: either 'us' or 'de'
    // item: id of the item used for the points column header
    // item_title: title of the points column header to be shown for the item picture
    // item_alt: text to display as points column header if the item picture cannot be displayed
    function addHighscore($title, $select, $lang, $item, $item_title, $item_alt) {
        echo '<h2>'.$title.'</h2>';
    
        $query = 'SELECT id, chr_name AS name, points, qpg_progress AS faction, '
        .PHP_EOL.'       (character_details.settings IS NOT NULL AND (character_details.settings & 1) > 0) AS show_profile'
        .PHP_EOL.'FROM ('
        .PHP_EOL.'      SELECT id, points from ('.$select.') AS internal_query'
        .PHP_EOL.'      WHERE NOT id IN (SELECT gms.gm_charid FROM illarionserver.gms)'
        .PHP_EOL.'      ORDER BY points DESC'
        .PHP_EOL.'      LIMIT 20'
        .PHP_EOL.'     )'
        .PHP_EOL.'AS points_query'
        .PHP_EOL.'INNER JOIN illarionserver.chars'
        .PHP_EOL.'ON id = chr_playerid'
        .PHP_EOL.'INNER JOIN homepage.character_details'
    	.PHP_EOL.'ON id = character_details.char_id' 
    	.PHP_EOL.'LEFT JOIN illarionserver.questprogress'
    	.PHP_EOL.'ON id = qpg_userid AND qpg_questid = 199'
        .PHP_EOL.'ORDER BY points DESC;';
        
        $pgSQL =& Database::getPostgreSQL();
        $pgSQL->setQuery( $query );
    	$list = $pgSQL->loadAssocList();
    	
    	if (!is_null($list)) {
            echo '<table border="0">';
            
            echo ($lang == 'de') ? '<tr><th></th><th>Fraktion</th><th>Charakter</th>' : '<tr><th></th><th>Faction</th><th>Character</th>';
            echo '<th><img src="' . Page::getCurrentImageURL() . '/items/'.$item.'.png" alt="'.$item_alt.'" title="'.$item_title.'"/></th></tr>';
            
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
    				echo '<a class="rating8" href="'.Page::getURL().'/community/'.$lang.'_charprofile.php?id='.dechex( $char['id'] ).'">'.$char['name'] . '</a>';
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
    }
?>