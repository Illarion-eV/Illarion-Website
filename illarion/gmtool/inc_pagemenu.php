<?php

    function include_page_menu($active, $filter )
    {

        $entries = array();
        $entries[1] = array( 'link'=>getUrlString('pages.php')."?filter=".PAGE_STATUS_NEW, 'name'=>( Page::isGerman() ? 'Neu' : 'New' ) );
        $entries[2] = array( 'link'=>getUrlString('pages.php')."?filter=".PAGE_STATUS_IN_WORK, 'name'=>( Page::isGerman() ? 'In Arbeit' : 'In Work' ) );
        $entries[3] = array( 'link'=>getUrlString('pages.php')."?filter=".PAGE_STATUS_DONE, 'name'=>( Page::isGerman() ? 'Erledigt' : 'Done' ) );
        $entries[4] = array( 'link'=>getUrlString('pages.php')."?filter=".PAGE_STATUS_ARCHIVE, 'name'=>( Page::isGerman() ? 'Archiv' : 'Archive' ) );
        $entries[5] = array( 'link'=>getUrlString('pages_log.php'), 'name'=>( Page::isGerman() ? 'Log' : 'Log' ) );

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
