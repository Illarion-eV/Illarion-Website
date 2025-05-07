<?php
  include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/shared.php" );
  include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/illarion_data.php" );
    create_header( "Illarion - Charakterdatenbank",
    "Charakterdatenbank",
    "Charaktere, Hintergrund",
    "",
    "lightwindow,lightwindow_de,calendar","prototype,effects,lightwindow",true);
    include_header();


	// POSTGRE DB ABFRAGE
	//
    $db=& Database::getPostgreSQL( 'illarionserver' );

	// Variablen f�r die DB Abfrage
	if ($_GET['key']=="") { $key="A"; } else { $key=$_GET['key'];}
    $thiskey=$key."%";
    $aktiv_time=strtotime("-8 weeks");

	$_GET['SUCHBEGRIFF']=stripslashes($_GET['SUCHBEGRIFF']);

	// Wildcardsuche ??
	//
	$SUCHBEGRIFF=$_GET['SUCHBEGRIFF'];
	if  ($SUCHBEGRIFF=="") {$SUCHBEGRIFF="%"; }
	$SUCHBEGRIFF = str_replace( '*', '%', $SUCHBEGRIFF );

	if ($_GET['RASSE']==9) { $sign=">8";  } 
	elseif ($_GET['RASSE']=="") { $sign=">-1"; }
	else { $sign="=".$db->Quote( $_GET['RASSE'] ); }

	if ($_GET['aktion']=="suchen") { $thiskey=$SUCHBEGRIFF; }	

	if ($_GET['aktion']=="suchen" && $_GET['SEX']!="")
	{
		$query ="SELECT chars.chr_name, chars.chr_playerid, chars.chr_race, chars.chr_sex
            FROM chars
            WHERE chars.chr_name LIKE ".$db->Quote( $thiskey )."
            AND chr_lastsavetime > ".$db->Quote( $aktiv_time )."
			AND chr_race".$sign."
			AND chr_sex=".$db->Quote($_GET['SEX'])."
            AND chr_status=0
            AND (( SELECT COUNT(gms.gm_charid) AS count
                FROM gms
                WHERE gms.gm_charid = chars.chr_playerid
                AND NOT (gms.gm_rights_server & 131072) > 0)) = 0
            ORDER BY chars.chr_name
        ";
	}
	else
	{
	    $query ="SELECT chars.chr_name, chars.chr_playerid, chars.chr_race, chars.chr_sex
    	    FROM chars
            WHERE chars.chr_name LIKE ".$db->Quote( $thiskey )."
            AND chr_lastsavetime > ".$db->Quote( $aktiv_time )."
			AND chr_race".$sign."
            AND chr_status=0
            AND (( SELECT COUNT(gms.gm_charid) AS count
                FROM gms
                WHERE gms.gm_charid = chars.chr_playerid
                AND NOT (gms.gm_rights_server & 131072) > 0)) = 0
            ORDER BY chars.chr_name
        ";
	}

    $db->setQuery( $query );
	//echo $db->getQuery();
	//echo "ende";
	$chars=$db->loadAssocList();

    //echo "<pre>";
    //print_r ($chars);
    //echo "</pre>";


	// CHECKING FLAGS IN DB
	$db_hp=& Database::getPostgreSQL( 'homepage' );
	// CHAR IDs INTO ADDITIONAL ARRAY
	$char_ids = $db->loadResultArray( 1 );

	$query = "SELECT character_details.char_id, character_details.settings"
    	. "\n FROM character_details"
        . "\n WHERE char_id IN ('0".implode("','",$char_ids)."')"
    ;

    error_log($query);
    error_log(json_encode($char_ids));

	$db_hp->setQuery( $query );
	$char_settings=$db_hp->loadAssocList('char_id');
	
	//  ENDE DB KRAM

	// Start der Ausgabe
	//

	echo "<h1>Illarion-Charakterdatenbank</h1>";

	// SUCHE
	//
	echo "<form method='get' action='de_illachars.php'>";
	echo "<table style='width:100%;'>";
        echo "<tr><td>&nbsp;</td></tr>";
        echo "<tr><td>";
		echo "Nach einem Charakternamen suchen :&nbsp;<input name='SUCHBEGRIFF' type='text' size='30' value='".htmlspecialchars ($_GET['SUCHBEGRIFF'],ENT_QUOTES)."'/>";
		echo "&nbsp;&nbsp;Rasse&nbsp;<select name='RASSE' $readonly>";
        echo "<option value=''";
			if ($_GET['RASSE']=="") { echo " selected='selected'"; }
		echo ">Alle Rassen</option>";
        echo "<option value='0'";
			if ( ($_GET['RASSE']==0)and ($_GET['RASSE']!="") ) { echo " selected='selected'"; }
		echo ">Mensch</option>";
        echo "<option value='1'";
			if ($_GET['RASSE']==1) { echo " selected='selected'"; }
		echo ">Zwerg</option>";
		echo "<option value='2'";
			if ($_GET['RASSE']==2) { echo " selected='selected'"; }
		echo ">Halbling</option>";
        echo "<option value='3'";
			if ($_GET['RASSE']==3) { echo " selected='selected'"; }
		echo ">Elf</option>";
        echo "<option value='4'";
			if ($_GET['RASSE']==4) { echo " selected='selected'"; }
		echo ">Ork</option>";
        echo "<option value='5'";
			if ($_GET['RASSE']==5) { echo " selected='selected'"; }
		echo ">Echsenmensch</option>";
        echo "<option value='6'";
			if ($_GET['RASSE']==6) { echo " selected='selected'"; }
//		echo ">Gnom</option>";
//        echo "<option value='7'";
//			if ($_GET['RASSE']==7) { echo " selected='selected'"; }
//		echo ">Fee</option>";
//        echo "<option value='8'";
//			if ($_GET['RASSE']==8) { echo " selected='selected'"; }
//		echo ">Goblin</option>";
//        echo "<option value='9'";
//			if ($_GET['RASSE']==9) { echo " selected='selected'"; }
		echo ">Andere</option>";
        echo "</select>";
		echo "&nbsp;&nbsp;<select name='SEX' $readonly>";
		echo "<option value=''";
			if ($_GET['SEX']=="") { echo " selected='selected'"; }
		echo ">Egal</option>";
        echo "<option value='0'";
			if ( ($_GET['SEX']==0) and ($_GET['SEX']!="") ) { echo " selected='selected'"; }
		echo ">m&auml;nnlich</option>";
        echo "<option value='1'";
			if ($_GET['SEX']=="1") { echo " selected='selected'"; }
		echo ">weiblich</option>";
		echo "</select>";
        echo "<input type='hidden' name='aktion' value='suchen'/>";
        echo "&nbsp;&nbsp;<input type='submit' value='Jetzt suchen!'/></td></tr>";
        echo "<tr><td class='month'>Benutze das *-Zeichen als Joker</td></tr>";
	echo "</table>";
    echo "</form>";

	// ANZEIGE A bis Z
	//
	echo "<table style='text-align:center;width:78%;margin:auto;'>";
		echo "<tr>";
        $a="A";
		echo "<td><h1>&nbsp;</h1></td>";
        while (true)
        { 
        	echo "<td style='text-align:center;width:3%;'>";
			if ( ($key==$a) and ($_GET['aktion']!="suchen") ) 
			{
				echo "<a style='font-size:26px;' class='hidden' href='de_illachars.php?key=$a'>".$a."</a>"; 
			} 
			else 
			{ 
				echo "<a href='de_illachars.php?key=$a'>".$a."</a>"; 
			}
            echo "</td>";
			if ($a=="Z") { break; }
            $a++;
		}
		echo "<td><h1>&nbsp;</h1></td>";
        echo "</tr>";
	echo "</table>";

	// AUSGABE
	//
	$anzahl=count ($chars);

	if ($_GET['start']=="") 
	{ 
		$i=0; 
	}
	else
	{
		$i=$_GET['start'];
	}
	echo "<table style='vertical-align:top;width:100%;'>";
	echo "<tr>";
	if ($spalte=="") { $spalte=2; }
	while ($spalte>0)
	{
		echo "<td style='vertical-align:top;width:50%;'>";
		echo "<table style='width:100%;' >";
		if ( ($spalte==2 and $anzahl>0) or ($spalte==1 and $number>10) )
		{
			echo "<thead>";
        	echo "<tr>";
        	    echo "<th>Charaktername</th>";
        	    echo "<th>&nbsp;</th>";
        	    echo "<th>Geschlecht</th>";
        	    echo "<th>Rasse</th>";
        	    echo "<th>&nbsp;&nbsp;&nbsp;</th>";
        	echo "</tr>";
    		echo "</thead>";
			echo "<tbody>";
		}
		else
		{
			echo "<thead>";
            echo "<tr>";
			echo "<th>&nbsp;&nbsp;&nbsp;</th>";
            echo "</tr>";
            echo "</thead>";
			echo "<tbody>";

			echo "<tr><td>&nbsp;</td></tr>";

		}

			$number=0;
        	while ($number<=10 and $i<$anzahl)
        	{

				    //VARIABLEN BESTIMMEN
				    //
					$settings=$char_settings[$chars[$i]['chr_playerid']]['settings'];

                    error_log(json_encode($char_settings));
                    error_log(json_encode($chars));

                    $show_profil = ( (int)($settings&1) > 0 );
    				$show_online = ( (int)($settings&2) == 0 );
    				$show_story = ( (int)($settings&4) > 0 );
    				$show_birthday = ( (int)($settings&8) > 0 );

                echo "<tr>";
				echo "<td>&nbsp;";
                               
				if ($show_profil)
				{
					echo "<a href='".$url."/community/de_charprofile.php?id=".dechex( $chars[$i]['chr_playerid'] )."'>".$chars[$i]['chr_name']."</a></td>";
				}
				else
				{
					echo $chars[$i]['chr_name']."</td>";
				}
				// Rassenbild einbinden
				if ($race_pic = getRacePicture( $chars[$i]['chr_race'], $chars[$i]['chr_sex'] ))
				{
					echo "<td style='text-align:center;'>";
					echo "<img height='40' src='$race_pic' alt='".getRaceName($chars[$i]['chr_race'])." / ".getSexName( $chars[$i]['chr_sex'] )."'/>";
            		echo "</td>";
				}
				else
				{
					echo "<td style='text-align:center;'>";
                	echo getRaceName( $character['chr_race'] );
            		echo "</td>";
				}
				echo "<td style='text-align:center;'>".getSexName( $chars[$i]['chr_sex'])."</td>";
				echo "<td style='text-align:center;'>".getRaceName($chars[$i]['chr_race'])."</td>";
				echo "<td style='text-align:center;'></td>";
				echo "</tr>";
				$number++;
				$i++;
			}
			if ($anzahl==0 and $spalte==2)
			{
				echo "<tr><td><br/><br/>Es wurden keine Charaktere zu dem Suchbegriff \"".$_GET['SUCHBEGRIFF']."\" gefunden.</td></tr>";
			}
		$spalte--;
		echo "</tbody>";
		echo "</table>";
		echo "</td>";
	}
	echo "</tr>";
	echo "</table>";

	// WEITERBL�TTERN
	//
    $prev=$_GET['start']-22;
    $next=$_GET['start']+22;    
	
	if ($_GET['key']!="") { $keystring="&amp;key=".$_GET['key']; } else { $keystring=""; } 
	if ($_GET['RASSE']!="") { $racestring="&amp;RASSE=".$_GET['RASSE']; } else { $racestring=""; }
	if ($_GET['SUCHBEGRIFF']!="") { $searchstring="&amp;SUCHBEGRIFF=".$_GET['SUCHBEGRIFF'];} else { $searchstring=""; }
	if ($_GET['SEX']!="") { $sexstring="&amp;SEX=".$_GET['SEX']; } else { $sexstring=""; }
	if ($_GET['aktion']!="") { $actionstring="&amp;aktion=".$_GET['aktion'];} else { $actionstring=""; }

if ($anzahl>21)
{	
	if ( ($_GET['start']=="" or $_GET['start']==0) and ($i<$anzahl) )
    {
        navBarTop( "","","de_illachars.php?start=$next$keystring$racestring$searchstring$sexstring$actionstring" );
    }
	elseif ($i>=$anzahl)
    {
        navBarTop( "de_illachars.php?start=$prev$keystring$racestring$searchstring$sexstring$actionstring","de_illachars.php","" );
    }
    else
    {
        navBarTop( "de_illachars.php?start=$prev$keystring$racestring$searchstring$sexstring$actionstring","de_illachars.php","de_illachars.php?start=$next$keystring$racestring$searchstring$sexstring$actionstring" );
    }
}


include_footer();
