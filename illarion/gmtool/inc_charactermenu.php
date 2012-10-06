<?php

    function include_character_menu( $charid, $active, $server )
    {

        $entries = array();
		$params = "?charid=".$charid."&amp;server=".$server;

        $entries[1] = array( 'link'=>'', 'name'=>( Page::isGerman() ? 'Informationen' : 'Informations' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character.php').$params, 'name'=>( Page::isGerman() ? 'Allgemeines' : 'General' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character_settings.php').$params, 'name'=>( Page::isGerman() ? 'Einstellungen' : 'Settings' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('character_log.php').$params, 'name'=>( Page::isGerman() ? 'Log' : 'Log' ) );
        $entries[2] = array( 'link'=>getUrlString('character_status.php').$params, 'name'=>( Page::isGerman() ? 'Status' : 'Status' ) );
        $entries[3] = array( 'link'=>getUrlString('character_attributs.php').$params, 'name'=>( Page::isGerman() ? 'Attribute' : 'Attributs' ) );
        $entries[4] = array( 'link'=>'', 'name'=>( Page::isGerman() ? 'Skills' : 'Skills' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_LANGUAGE, 'name'=>( Page::isGerman() ? 'Sprachen' : 'Language' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_FIGHTING, 'name'=>( Page::isGerman() ? 'Kampf' : 'Fighting' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_MAGIC, 'name'=>( Page::isGerman() ? 'Magie' : 'Magic' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_CRAFTING, 'name'=>( Page::isGerman() ? 'Handwerk' : 'Crafting' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_DRUID, 'name'=>( Page::isGerman() ? 'Druiden' : 'Druidic' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_BARD, 'name'=>( Page::isGerman() ? 'Barden' : 'Bard' ) );
			$entries[4]['sub'][] = array( 'link'=>getUrlString('character_skills.php').$params.'&amp;filter='.SKILL_CLASS_MISC, 'name'=>( Page::isGerman() ? 'Sonstiges' : 'Other' ) );
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
