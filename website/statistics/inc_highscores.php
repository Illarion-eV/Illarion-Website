<?php
    class HighScore {

        private $title;
        private $select;
        private $points_item;
        private $item_title;
        private $item_alt;

        private function pointsConverter($value) {
            $locale = localeconv();
            return number_format($value, 0, $locale['decimal_point'], $locale['thousands_sep']);
        }

        // title: highscore title array (keys: us, de)
        // select: SELECT query returning player id AS id and some integer value AS points
        // points_item: id of the item used for the points column header
        // item_title: title of the points column header to be shown for the item picture (array keys: us, de)
        // item_alt: text to display as points column header if the item picture cannot be displayed (array keys: us, de)
        function __construct($title, $select, $points_item, $item_title, $item_alt) {
            $this->title = $title;
            $this->select = $select;
            $this->points_item = $points_item;
            $this->item_title = $item_title;
            $this->item_alt = $item_alt;
        }

        // lang: either 'us' or 'de'
        function print_on_site($lang) {
            if ($lang != 'us' and $lang != 'de') {
                return;
            }

            echo '<h2>'.$this->title[$lang].'</h2>';
        
            $query = 'SELECT id, chr_name AS name, points, qpg_progress AS faction, '
            .PHP_EOL.'       (character_details.settings IS NOT NULL AND (character_details.settings & 1) > 0) AS show_profile'
            .PHP_EOL.'FROM ('
            .PHP_EOL.'      SELECT id, points from ('.$this->select.') AS internal_query'
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
                echo '<table border="0" align="left">';
                
                echo ($lang == 'de') ? '<tr><th></th><th>Fraktion</th><th>Charakter</th>' : '<tr><th></th><th>Faction</th><th>Character</th>';
                echo '<th><img src="' . Page::getCurrentImageURL() . '/items/'.$this->points_item.'.png" alt="'.$this->item_alt[$lang].'" title="'.$this->item_title[$lang].'"/></th></tr>';
                
                $i = 1;
                $row = 0;
                foreach($list as $char) {
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
                    echo '<td style="text-align:center;">',$this->pointsConverter($char['points']),'</td>';
                    echo '</tr>';
                    
                    $i = $i + 1;
                    $row = 1 - $row;
                }
                
                echo '</table>';
            }
            
            $query = 'SELECT SUM(points) AS points, qpg_progress AS faction'
            .PHP_EOL.'FROM ('
            .PHP_EOL.'      SELECT id, points from ('.$this->select.') AS internal_query'
            .PHP_EOL.'      WHERE NOT id IN (SELECT gms.gm_charid FROM illarionserver.gms)'
            .PHP_EOL.'     )'
            .PHP_EOL.'AS points_query'
            .PHP_EOL.'INNER JOIN illarionserver.questprogress'
            .PHP_EOL.'ON id = qpg_userid AND qpg_questid = 199 AND qpg_progress IN (1, 2, 3)'
            .PHP_EOL.'GROUP BY faction'
            .PHP_EOL.'ORDER BY points DESC;';
            
            $pgSQL->setQuery( $query );
            $list = $pgSQL->loadAssocList();
            
            if (!is_null($list)) {
                echo '<table border="0" align="right">';
                
                echo ($lang == 'de') ? '<tr><th></th><th>Fraktion</th>' : '<tr><th></th><th>Faction</th>';
                echo '<th><img src="' . Page::getCurrentImageURL() . '/items/'.$this->points_item.'.png" alt="'.$this->item_alt[$lang].'" title="'.$this->item_title[$lang].'"/></th></tr>';
                
                $i = 1;
                $row = 0;
                foreach($list as $faction) {
                    echo '<tr class="row'.$row.'">';
                    echo '<td>',$i,'.</td>';
                    echo '<td style="text-align:center;">';
                    
                    if ($faction["faction"] == 1) {
                        echo '<img src="' . Page::getMediaURL() . '/cadomyr.png" alt="Cadomyr" title="Cadomyr" />';
                    } else if ($faction["faction"] == 2) {
                        echo '<img src="' . Page::getMediaURL() . '/runewick.png" alt="Runewick" title="Runewick" />';
                    } else if ($faction["faction"] == 3) {
                        echo '<img src="' . Page::getMediaURL() . '/galmair.png" alt="Galmair" title="Galmair" />';
                    }
                        
                    echo '</td>';	        
                    echo '<td style="text-align:center;">',$this->pointsConverter($faction['points']),'</td>';
                    echo '</tr>';
                    
                    $i = $i + 1;
                    $row = 1 - $row;
                }
                
                echo '</table><br clear="all" />';
            }
            
            Page::insert_go_to_top_link();
        }
    
    }

    function print_highscores($lang) {
        $highscores = [];

        $highscores[] = new HighScore(['us' => 'Gold Rush', 'de' => 'Goldrausch'],
                                      'SELECT richest.id AS id, richest.money AS points FROM homepage.richest',
                                      61, ['us' => 'gold coins', 'de' => 'Goldm&uuml;nzen'], ['us' => 'Gold', 'de' => 'Gold']
                        );

        $highscores[] = new HighScore(['us' => 'Arena Master', 'de' => 'Arenameister'],
                                      'SELECT qpg_userid AS id, SUM(qpg_progress) AS points FROM illarionserver.questprogress WHERE qpg_questid IN (801, 802, 803) GROUP BY id',
                                      1, ['us' => 'arena points', 'de' => 'Arenapunkte'], ['us' => 'sword', 'de' => 'Schwert']
                        );

        $highscores[] = new HighScore(['us' => 'Gold Rush', 'de' => 'Illarionbummler'],
                                      "SELECT qpg_userid AS id, SUM(char_length(replace((CASE WHEN qpg_progress < 0 THEN 2147483647-qpg_progress::bigint ELSE qpg_progress END)::bit(64)::text, '0', ''))) AS points FROM illarionserver.questprogress WHERE qpg_questid >= 130 AND qpg_questid < 150 GROUP BY id",
                                      66, ['us' => 'marker stones', 'de' => 'Markierungssteine'], ['us' => 'marker stone', 'de' => 'Markierungsstein']
                        );

        foreach ($highscores as $highscore) {
            $highscore->print_on_site($lang);
        }
    }
?>
