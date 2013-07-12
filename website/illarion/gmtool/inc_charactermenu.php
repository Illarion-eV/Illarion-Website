<?php

    function include_character_menu( $charid, $active, $server )
    {
		$servername = ( $server == '1' ? 'devserver' : 'illarionserver');
		$skill_groups = getSkillGroupList($servername);		
		$entries = array();
		$params = "?charid=".$charid."&amp;server=".$server;

        $entries[1] = array( 'link'=>'', 'name'=>( Page::isGerman() ? 'Informationen' : 'Information' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character.php').$params, 'name'=>( Page::isGerman() ? 'Allgemeines' : 'General' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character_settings.php').$params, 'name'=>( Page::isGerman() ? 'Einstellungen' : 'Settings' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character_style.php').$params, 'name'=>( Page::isGerman() ? 'Aussehen' : 'Style' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character_log.php').$params, 'name'=>( Page::isGerman() ? 'Log' : 'Log' ) );
        $entries[2] = array( 'link'=>getUrlString('character_status.php').$params, 'name'=>( Page::isGerman() ? 'Status' : 'Status' ) );
        $entries[3] = array( 'link'=>getUrlString('character_attributs.php').$params, 'name'=>( Page::isGerman() ? 'Attribute' : 'Attributes' ) );
        $entries[4] = array( 'link'=>'', 'name'=>( Page::isGerman() ? 'Skills' : 'Skills' ) );
			foreach ($skill_groups as $key => $group)
			{
				$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.$key, 'name'=>( Page::isGerman() ? $group['skg_name_german'] : $group['skg_name_english'] ) );
			}
        $entries[5] = array( 'link'=>getUrlString('character_runes.php').$params, 'name'=>( Page::isGerman() ? 'Runen' : 'Runes' ) );

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
            			echo "<a class='none' href='".$sub['link']."'>".$sub['name']."</a>";
            			echo "</li>";
					}
        			echo "</ul>";
    				echo "</li>";
				}
				else
				{
					echo "<li".($active==$key ? " class='selected'" : "").">";
					echo "<a class='none' ".($active==$key ? "" : " href='".$entry['link']."'").">";
						echo $entry['name'];
					echo "</a></li>";
				}	
			}
			echo '<li class="end" />';
			echo "</ul>";
		echo "</div>";

		return;
	}
	
	function getUrlString($file)
	{
		global $url;
        global $language;

		$url_string = $url."/illarion/gmtool/".$language."_".$file;

		return $url_string;
	} 
