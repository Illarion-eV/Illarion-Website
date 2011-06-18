<?php
    include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );
    include_once ( $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php' );

    if (!IllaUser::auth('gmtool_pages'))
    {
        Messages::add('Zugriff verweigert');
        include_once( $_SERVER['DOCUMENT_ROOT'] . '/illarion/gmtool/de_gmtool.php' );
        exit();
    }

    create_header( 'Illarion - GM-Tool - Pages',
    'Auf dieser Seite kannst du gm-pages bearbeiten',

    'GM-Tool, Pages', '', '', '' );
    include_header();


	// MIT DER DATENBANK VERBINDEN
	//
	$db =& Database::getPostgreSQL( 'illarionserver' );

	// Eintrag Speichern
	if ( $_POST['justSave']=="Nur Speichern" )
	{
		echo "task->".$_POST['task']."<br>";
		echo "note->".$_POST['note']."<br>";
		$user=IllaUser::$ID;
		$user=666;
		echo "gm->".$user."<br>";
		echo "save->".$_POST['justSave']."<br>";
		echo "time->".$_POST['time']."<br>";
		echo "save2->".$_POST['SaveAnd']."<br>";

		//$update="UPDATE `gmpager` SET `pager_note`=".$db->Quote( $_POST['note'] )." WHERE `pager_text`=' test für suteki'";
							
		/*
		$update="UPDATE gmpager SET pager_note=".$_POST['note']."
									pager_gm=".$user."
								WHERE
									pager_time=";
		*/

		$text="test für suteki";

		$update = "UPDATE `gmpager`"
    . "\n SET `pager_note` = ".$db->Quote( $_POST['note'] )
    . "\n WHERE `pager_text` = ".$db->Quote( $text )
    ;
							
		$db->setQuery( $update );
		echo $db->getQuery();

	}

    // EINTRÄGE AUS DER DB HOLEN
    //
      $query = "SELECT gmpager.oid, gmpager.pager_user, chars_player.chr_name, chars_player.chr_accid AS player_accid, gmpager.pager_text, gmpager.pager_time, chars_gm.chr_accid AS gm_accid, gmpager.pager_note"
      . "\n FROM gmpager"
      . "\n LEFT JOIN chars AS chars_player ON gmpager.pager_user = chars_player.chr_playerid"
      . "\n LEFT JOIN chars AS chars_gm ON gmpager.pager_gm = chars_gm.chr_playerid"
      . "\n WHERE gmpager.pager_status = ".$_GET['filter']
      . "\n ORDER BY gmpager.pager_time DESC"
      . "\n LIMIT 30;"
      ;
      $db->setQuery( $query );
      $pages = $db->loadAssocList();
      //echo $db->getQuery();
    echo "<pre>";
    print_r ($pages[0]);
    echo "</pre>";

/* Kann vermutlich gelöscht werden

    $query = "SELECT * FROM gmpager WHERE pager_status = ".$_GET['filter']." ORDER BY pager_time DESC";
    $db->setQuery( $query );
    $line=$db->loadAssocList();

    echo "<pre>";
    print_r ($line[0]);
    echo "</pre>";

*/
/*
	// Char-IDs in ein zusätzliches Array ziehen
	$char_ids = $db->loadResultArray( 1 );
	//$gm_ids = $db->loadResultArray( 6 );
	$namequery ="SELECT chars.chr_playerid, chars.chr_name FROM chars WHERE chars.chr_playerid IN (".implode(',',$char_ids).") "; 
	$db->setQuery( $namequery );
    echo $db->getQuery();
	$names=$db->loadAssocList();
    echo "<pre>";
    print_r ($names);
    echo "</pre>";
*/
/*
	// gm-ids, die nicht leer sind in ein zusätzliches Array ziehen
	$gm_ids = $db->loadResultArray( 6 );
	$gm_count=count ($gm_ids);
	$gm="";
	if ($gm_count>0)
	{
		for ($i=0; $i<$gm_count; $i++)
		{
			if ($gm_ids[$i]!="") { $gm.=$gm_ids[$i].","; }
		}
	}
		$gm=substr($gm, 0,-1);
		$gm_ids=array($gm);

	// Mit account DB Verbinden
	$accdb =& Database::getPostgreSQL( 'accounts' );

	$gmquery ="SELECT acc_id, acc_name FROM account WHERE acc_id IN (".implode(',',$gm_ids).")";
    $accdb->setQuery( $gmquery );
    //echo $db->getQuery();
    $gms=$accdb->loadAssocList();
	echo $accdb->getQuery();
    echo "<pre>";
    print_r ($gms);
    echo "</pre>";	
*/

	// ANZEIGE
	
	$anzahlpages=count ($pages);
	$anzahlnames=count ($names);

	//echo "<table border='1' width='100%'>";
	if ($anzahlpages>0)
    {
        for ($i=0; $i<$anzahlpages; $i++)
        {
			if ($pages[$i]['chr_name']!="") { $NAME=$pages[$i]['chr_name']; }
			else { $NAME="Char gelöscht"; }
			

			echo "<table width='100%' border='0'>";
			echo "<tr><td colspan='3'>";
			echo "<h2>";
			echo "<a href=".$url."/illarion/gmtool/de_pages.php?filter=0&page=".$i.">".$pages[$i]['pager_time']." - ".$NAME." (".$pages[$i]['pager_user'].")</a>";
			echo "</h2>";
			echo "</td></tr>";

			// Mittelteil der nur bei dem aktuellen Eintrag angezeigt wird
			//
			if ($_GET['page']==""){ $_GET['page']=0; }
			if ($i==$_GET['page'])	
			{
				echo "<form action='".$url."/illarion/gmtool/de_pages.php?filter=".$_GET['filter']."&page=".$_GET['page']."' method='post'>"; 
				echo "<tr><td width='35%'><b>Message</b></td>";
				echo "<td><b>Notiz</b></td></tr>";	
				echo "<tr><td><textarea rows='3' cols='80' readonly>";
				echo $pages[$i]['pager_text'];
				echo "</textarea></td>";
				echo "<td valign='top'><textarea name='note' rows='3' cols='80'>";
            	echo $pages[$i]['pager_note'];
            	echo "</textarea></tr>";
				echo "<tr><td>&nbsp;<input type='submit' name='justSave' value='Nur Speichern'>";
            	echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='SaveAnd' value='Speichern und...'>";
            	echo "&nbsp;verschieben&nbsp;<select name='move_to'>";
            	echo "<option value='1'>nach \"in Arbeit\"</option>";
            	echo "<option value='2'>nach \"Erledigt\"</option>";
            	echo "<option value='3'>ins Archiv</option></select>";
            	echo "&nbsp;&nbsp;&nbsp;<input type='submit' name='delete' value='Löschen'></td>";
				echo "&nbsp;<td><b>Zuletzt geändert durch:</b>&nbsp;";
				if ($pages[$i]['gm_accid']=="") { $pages[$i]['gm_accid']="Niemand"; }
            	echo $pages[$i]['gm_accid']."</td></tr>";
				echo "<input type='hidden' name='time' value='".$pages[$i]['pager_time']."' />";
				echo "</from>";
			}
			echo "</table>";		

			

		}
	}

?>