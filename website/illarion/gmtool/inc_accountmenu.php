<?php
	function include_account_menu( $accid, $active )
	{
		global $url;
		global $language;

		$entries = array();
		$params = "?accid=".$accid;

		$entries[1] = array( 'link'=>'', 'name'=>( Page::isGerman() ? 'Informationen' : 'Informations' ) );
			$entries[1]['sub'][] = array( 'link'=>getUrlString('account.php').$params, 'name'=>( Page::isGerman() ? 'Allgemeines' : 'General' ) );
            $entries[1]['sub'][] = array( 'link'=>getUrlString('account_log.php').$params, 'name'=>( Page::isGerman() ? 'Log' : 'Log' ) );
		$entries[2] = array( 'link'=>getUrlString('account_chars.php').$params, 'name'=>( Page::isGerman() ? 'Charaktere' : 'Characters' ) );
		$entries[3] = array( 'link'=>getUrlString('account_status.php').$params, 'name'=>( Page::isGerman() ? 'Status' : 'State' ) );
		$entries[4] = array( 'link'=>getUrlString('account_notes.php').$params, 'name'=>( Page::isGerman() ? 'Notizen' : 'Notes' ) );
		if (IllaUser::auth('gmtool_gms'))
		{
			$entries[5] = array( 'link'=>getUrlString('account_rights.php').$params, 'name'=>( Page::isGerman() ? 'Berechtigungen' : 'Rights' ) );
		}
		else
		{ 
			$entries[5] = array( 'link'=>'', 'name'=>"&nbsp;");
		}

        echo "<div class='menu'>";
            echo "<ul class='menu_top'>";
			$x=1;
			$xcount = count($entries);
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
                        echo "<a class='none' href='".$sub['link']."'>".$sub['name']."</a>";
                        echo "</li>";
						$i++;
                    }
                    echo "</ul>";
                    echo "</li>";
                }
                else
                {
					$class_string = "";
					$class_array 	= array();
					$class_array[] = ($active==$key ? "selected" : "");
					$class_array[] = ($x==$xcount ? "last" : "");
					foreach ($class_array as $class)
					{
						if (strlen($class) > 0)
						{
							$class_string .= ($class_string=="" ? " ".$class : " ".$class);
						}
					}
					$class_string = (strlen($class_string) > 0 ? "class='".$class_string."'" : "" );
					echo "<li ".$class_string.">";
                    echo "<a class='none' ".($active==$key ? "" : " href='".$entry['link']."'").">";
                        echo $entry['name'];
                    echo "</a></li>";

                }
				$x++;
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

