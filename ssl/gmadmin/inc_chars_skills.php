<?php

	// Checks if skill update is triggered, and if yes, does it
	if ($_GET[action]=="update") {
		sqlquery("UPDATE playerskills SET psk_value=$_POST[skillvalue] WHERE psk_playerid=$_GET[playerid] AND psk_name='".$_GET[skill]."'",$_GET[servertype]);
	}

	// Checks if skill add is triggered, and if yes, does it
	if ($_GET[action]=="add") {
		sqlquery("INSERT INTO playerskills (psk_playerid,psk_name,psk_type,psk_value) VALUES ($_GET[playerid],'$_POST[skillname]',$_GET[group],1)",$_GET[servertype]);
	}

	// Checks if skill deletion is triggered, and if yes, does it
	if ($_GET[action]=="kill") {
		sqlquery("DELETE FROM playerskills WHERE psk_playerid=$_GET[playerid] AND psk_name='".$_GET[skill]."'",$_GET[servertype]);
	}

	// Creates 3rd level submenu to switch between skill categories
	$menu3="<table width='100%'><tr align='center'><td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=1&skill=$sglskill[psk_name]'>Language</td>
																									 <td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=2&skill=$sglskill[psk_name]'>Crafting</td>
																									 <td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=3&skill=$sglskill[psk_name]'>Magic</td>
																									 <td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=4&skill=$sglskill[psk_name]'>Misc</td>
																									 <td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=5&skill=$sglskill[psk_name]'>Fighting</td>
																									 <td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=6&skill=$sglskill[psk_name]'>Druidic</td>
																									 <td width='80'><a href='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&servertype=$_GET[servertype]&group=8&skill=$sglskill[psk_name]'>Bard</td>
																									 </tr></table>";

	// switches between (in 3rd level menu) selected skill categories
	// if no category is given, it is set to 1 as standard
	if ($_GET[group]=="") {
		$_GET[group]=1;
	}

	// Gets the skill for the given category from the DB
	$skills=sqlquery("SELECT * FROM playerskills WHERE psk_playerid='$_GET[playerid]' AND psk_type=$_GET[group] ORDER BY psk_name ASC",$_GET[servertype]);
	if ($skills<>"") {
		$content=$content."<table width='100%'>";

		// Prints out all the skill of a category including forms for changes
		foreach ($skills as $key=>$sglskill) {
			$content=$content."<tr><form action='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&group=$_GET[group]&servertype=$_GET[servertype]&action=update&skill=$sglskill[psk_name]' method='post'><td width='200'>$sglskill[psk_name]</td><td><input type='text' name='skillvalue' value='$sglskill[psk_value]'></td>
												 <td width='25'><input type='submit' value='SET'></td></form>
												 <form action='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&group=$_GET[group]&servertype=$_GET[servertype]&action=kill&skill=$sglskill[psk_name]' method='post'><td width='25'>
												 <input type='submit' value='KILL'></td></form></tr>";
		}
	} else {
		// Indicates that no skilsl where found if the DB out is empty
		$content=$content."This char has no skills.";
	}

	$content=$content."<tr height='50'><td></td><td></td></tr>
										 <tr width='200'><form action='index.php?mod=charview&playerid=$_GET[playerid]&submod=skills&group=$_GET[group]&servertype=$_GET[servertype]&action=add' method='post'><td>Add Skill</td>
										 <td><select name='skillname'>";

	// Does a distinct lookup for all skills in the testserver
	// The char Neonfire is used as an indicator (he got all skills to make sure that all skills are in DB present)
	$skilllist=sqlquery("SELECT DISTINCT psk_name FROM playerskills WHERE psk_type=$_GET[group] ORDER BY psk_name ASC","testserver");

	// Creates a dropdown box with the given skills, but only those which the char doesn't have yet
	foreach($skilllist as $key=>$sskill) {
		if ($skills<>"") {
			foreach($skills as $key2=>$sglskill) {
				if ($sskill[psk_name]==$sglskill[psk_name]) {
					$chkval="found";
				}
			}
		}
		if ($chkval<>"found") {
			$content=$content."<option>$sskill[psk_name]</option>";
		}
		$chkval="";
	}
	$content=$content."</select></td><td width='25'><input type='submit' value='SET'></td><td width='25'></td></form></tr></table>	";



?>