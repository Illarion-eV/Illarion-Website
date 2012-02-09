<?php

	// Switches between the different search possibilities
	switch($_POST[searchtype]) {

		// Looking for character ID
		case "charid":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM chars WHERE chr_playerid = $_POST[searchvalue]",$_POST[servertype]);
			$chars=sqlquery("SELECT * FROM chars WHERE chr_playerid = $_POST[searchvalue] LIMIT 30",$_POST[servertype]);
		break;

		// Looking for character name
		case "charname":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM chars WHERE chr_name LIKE '".pg_escape_string($_POST[searchvalue])."'",$_POST[servertype]);
			$chars=sqlquery("SELECT * FROM chars WHERE chr_name LIKE '".pg_escape_string($_POST[searchvalue])."' LIMIT 30",$_POST[servertype]);
		break;

		// Looking for account ID
		case "accountid":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM chars WHERE chr_accid = $_POST[searchvalue]",$_POST[servertype]);
			$chars=sqlquery("SELECT * FROM chars WHERE chr_accid = $_POST[searchvalue] LIMIT 30",$_POST[servertype]);
		break;

		// Looking for last IP used
		case "lastip":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM chars WHERE chr_lastip LIKE '$_POST[searchvalue]'",$_POST[servertype]);
			$chars=sqlquery("SELECT * FROM chars WHERE chr_lastip LIKE '$_POST[searchvalue]' LIMIT 30",$_POST[servertype]);
		break;

		// Looking chars who are online
		case "online":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM onlineplayer",$_POST[servertype]);
			$chars=sqlquery("SELECT chars.* FROM chars,onlineplayer WHERE chr_playerid = onlineplayer.on_playerid;",$_POST[servertype]);
		break;

		// Looking for specified char status
		case "charstatus":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM chars WHERE chr_status=$_POST[chr_status]",$_POST[servertype]);
			$chars=sqlquery("SELECT * FROM chars WHERE chr_status=$_POST[chr_status] LIMIT 30",$_POST[servertype]);
		break;
	}


	// Counts the char which fit in the search and prints it on screen
	$alloverchars=sqlquery("SELECT COUNT(*) FROM chars",$_POST[servertype]);
	$content="<b>Search result (found ".$sqlcount[0][count]." of ".$alloverchars[0][count]." chars on $_POST[servertype]):</b><br><br><table width='100%'>";


	// Creates normal search result output with links to the chars
	if (($chars<>"")) {
		foreach($chars as $key=>$chars_row) {
			if ($chars_row[chr_playerid]<>"") {
				$content=$content."<tr><td width='50'>$chars_row[chr_playerid]</td><td><a href='index.php?mod=charview&playerid=$chars_row[chr_playerid]&servertype=$_POST[servertype]'>".$chars_row[chr_name]."</a></td></tr>";
			} else {
				$content=$content."<tr><td width='50'>$chars_row[chr_playerid]</td><td>".$chars_row[chr_name]."</td></tr>";
			}
		}
		$content=$content."</table>";
	}


	// Output if no chars are found
	if ($chars=="") {
		$content=$content."<tr><td>No search results.</td></tr></table>";
	}

?>
