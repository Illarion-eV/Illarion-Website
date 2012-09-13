<?php

    function include_character_menu( $charid, $active, $server )
    {

        global $url;
        global $language;

        $entries = array();

        $entries[1] = array( 'link'=>'', 'name'=>( $language == 'de' ? 'Informationen' : 'Informations' ) );
			$entries[1]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character.php?charid='.$charid.'&amp;server='.$server, 'name'=>( $language == 'de' ? 'Allgemeines' : 'General' ) );
			$entries[1]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_settings.php?charid='.$charid.'&amp;server='.$server, 'name'=>( $language == 'de' ? 'Einstellungen' : 'Settings' ) );
        $entries[2] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_status.php?charid='.$charid.'&amp;server='.$server, 'name'=>( $language == 'de' ? 'Status' : 'Status' ) );
        $entries[3] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_attributs.php?charid='.$charid.'&amp;server='.$server, 'name'=>( $language == 'de' ? 'Attribute' : 'Attributs' ) );
        $entries[4] = array( 'link'=>'', 'name'=>( $language == 'de' ? 'Skills' : 'Skills' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=0', 'name'=>( $language == 'de' ? 'Sprachen' : 'Language' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=1', 'name'=>( $language == 'de' ? 'Kampf' : 'Fighting' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=2', 'name'=>( $language == 'de' ? 'Magie' : 'Magic' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=3', 'name'=>( $language == 'de' ? 'Handwerk' : 'Crafting' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=4', 'name'=>( $language == 'de' ? 'Druiden' : 'Druidic' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=5', 'name'=>( $language == 'de' ? 'Barden' : 'Bard' ) );
			$entries[4]['sub'][] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_skills.php?charid='.$charid.'&amp;server='.$server.'&amp;filter=6', 'name'=>( $language == 'de' ? 'Sonstiges' : 'Other' ) );
        $entries[5] = array( 'link'=>$url.'/illarion/gmtool/'.$language.'_character_runes.php?charid='.$charid.'&amp;server='.$server, 'name'=>( $language == 'de' ? 'Runen' : 'Runes' ) );

		echo "<div class='menu'>";
			echo "<ul class='menu_top'>";
			foreach($entries as $key=>$entry)
			{
				if (isset($entry['sub']))
				{
					$i=1;
					$count = count($entry['sub']);
					echo "<li".($active==$key ? " class='selected'" : "").">";
					echo "<a class='none'>".$entry['name']."</a>";
        			echo "<ul>";
					foreach ($entry['sub'] as $sub)
					{
						echo (($i==$count) ? "<li class='last'>" : "<li>");
						$i++;
            			echo "<a href='".$sub['link']."'>".$sub['name']."</a>";
            			echo "</li>";
					}
        			echo "</ul>";
    				echo "</li>";
				}
				else
				{
					echo "<li".($active==$key ? " class='selected'" : "").">";
					echo "<a".($active==$key ? " class='none'" : " href='".$entry['link']."'").">";
						echo $entry['name'];
					echo "</a></li>";
				}	
			}
			echo "</ul>";
		echo "</div>";

		return;
	}
