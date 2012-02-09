<?php
function SQLQuery($query,$db) {
	    $conn=SQLConnect($db);
		$result=SQLQueryCon($query,$conn);
		SQLDisconnect($conn);
		return $result;
	}

	// connect to db and keep connection
	function SQLConnect($db) {
		$connection = pg_connect("dbname='illarion' user='gmtool' password=''", PGSQL_CONNECT_FORCE_NEW)
			or die ("PostGreSQL Error --> " . pg_last_error($connection));
			
		pg_query($connection, 'SET search_path TO '.$db.';');
		return $connection;
	}

	// query using an existing connection
	function SQLQueryCon($query, $connection) {
		$result=pg_query($connection,$query);
		$all = array();
		if (!$result) die ("Die Datenbankabfrage ist gescheitert.<br />\n".$query);
		if ($result<>"1") {
			while ($row = pg_fetch_assoc($result)) {
				$counter=$counter+1;
				$test=array($counter=>$row);
				$all = array_merge($all, $test);
			}
			pg_free_result($result);
		}
		return $all;
	}

	// close an existing connection
	function SQLDisconnect($connection) {
		pg_close($connection);
	}


	// FUNCTION GMLOG
	function GMLog($type,$gm,$name) {
		if ($type=="acc_pos") {
			SQLQuery("UPDATE gm_stats SET gm_acc_pos=gm_acc_pos+1 WHERE gm_name='".$gm."'","accounts");
			SQLQuery("INSERT INTO gm_stats_accs VALUES ('".$gm."',".$name.",'t')","accounts");
		} elseif ($type=="acc_neg") {
			SQLQuery("UPDATE gm_stats SET gm_acc_neg=gm_acc_neg+1 WHERE gm_name='".$gm."'","accounts");
			SQLQuery("INSERT INTO gm_stats_accs VALUES ('".$gm."',".$name.",'f')","accounts");
		} elseif ($type=="name_pos") {
			SQLQuery("UPDATE gm_stats SET gm_name_pos=gm_name_pos+1 WHERE gm_name='".$gm."'","accounts");
			SQLQuery("INSERT INTO gm_stats_chars VALUES ('".$gm."','".$name."','t')","accounts");
		} elseif ($type=="name_neg") {
			SQLQuery("UPDATE gm_stats SET gm_name_neg=gm_name_neg+1 WHERE gm_name='".$gm."'","accounts");
			SQLQuery("INSERT INTO gm_stats_chars VALUES ('".$gm."','".$name."','f')","accounts");
		} elseif ($type=="race_pos") {
			SQLQuery("UPDATE gm_stats SET gm_race_pos=gm_race_pos+1 WHERE gm_name='".$gm."'","accounts");
			SQLQuery("INSERT INTO gm_stats_race VALUES ('".$gm."',".$name.",'t')","accounts");
		} elseif ($type=="race_neg") {
			SQLQuery("UPDATE gm_stats SET gm_race_neg=gm_race_neg+1 WHERE gm_name='".$gm."'","accounts");
			SQLQuery("INSERT INTO gm_stats_race VALUES ('".$gm."',".$name.",'f')","accounts");
		}
	}

	// just a try, nothing to care about
	function CheckStringForSQL($checkstring)
		{
			$checkstring = str_replace (";","",$checkstring);
			$checkstring = str_replace ("\"","",$checkstring);

			return $checkstring;
		}

	// *** FUNKTION - Accountliste nach Namen
	function ViewAccountsByName($name) {
			$name=checkstring($name);
			$accountlist=SQLQuery("SELECT * FROM account WHERE acc_login LIKE '".pg_escape_string($name)."'", "accounts");
	}

	// FUNCTION VARLANGUAGE
	// This function just gives back the string for a language ID
	function VarLanguage($language) {
		switch($language) {
			case 0: $language="german";break;
			case 1: $language="english";break;
		}
		return $language;
	}


	// FUNCTION VARCHARSTATUS
	// This function just gives back the string for a char status ID
	function VarCharStatus($status) {
		switch($status) {
			case 0: $status="playable";break;
			case 1: $status="inactive";break;
			case 4:	$status="name check";break;
			//case 5: $status="stat selection";break;
			case 5:	$status="name accepted";break;
			case 6: $status="name rejected";break;
			case 21: $status="jailed";break;
			case 30: $status="banned";break;
			case 31: $status="temp banned";break;

			default: $status="Status ".$status;
		}
		return $status;

	}


	// FUNCTION VARCHARSTATUS2
	// This function creates a HTML dropdown box including all status possibilities
	// where the given status ($curstatus) is the selected item
	function VarCharStatus2($curstatus) {
		$status[0][id]=0;
		$status[0][name]="playable";
		$status[1][id]=1;
		$status[1][name]="inactive";
		$status[2][id]=4;
		$status[2][name]="name check";
		$status[3][id]=5;
		$status[3][name]="name accepted";
		$status[4][id]=6;
		$status[4][name]="name rejected";
		$status[5][id]=20;
		$status[5][name]="jailed";
		$status[6][id]=21;
		$status[6][name]="temp jailed";
		$status[7][id]=30;
		$status[7][name]="banned";
		$status[8][id]=31;
		$status[8][name]="temp banned";
		$status[9][id]=40;
		$status[9][name]="infos reset";

		$sts="<select name='chr_status'>";
		foreach ($status as $key=>$sglstatus) {
			if ($curstatus<>$sglstatus[id]) {
				$sts=$sts."<option value=".$sglstatus[id].">".$sglstatus[name]."</option>";
			} else {
				$sts=$sts."<option value=".$sglstatus[id]." selected='selected'>".$sglstatus[name]."</option>";
			}
		}
		$sts=$sts."</select>";
		return $sts;
	}

	// FUNCTION VARSTATUSLINE
	// This function creates a HTML checkbox
	// where the given status is selected, if $charstatus is the shown status
	function VarStatusLine($status,$charstatus,$statustext) {

		if ($status==$charstatus) {$selected="checked='checked'";}
		$ret="<tr><td></td><td><input type='radio' name='acc_status' value='$status' ".$selected.">$statustext</td></tr>";
		return $ret;
	}


	// FUNCTION VARGMVOTEGOODBAD
	// Just maps the given booleans from the DB to signs like + and -
	function VarGMVoteGoodBad($vote) {
		switch($vote) {
			case "t": $vote="+";break;
			case "f": $vote="-";break;
		}
		return $vote;
	}

	// FUNCTION VARRACELIST
	// creates an list of all races
	function VarRaceList() {
		$races[0][id]=0;
	  $races[0][name]="human";
		$races[1][id]=1;
	  $races[1][name]="dwarf";
		$races[2][id]=2;
	  $races[2][name]="halfling";
		$races[3][id]=3;
	  $races[3][name]="elf";
		$races[4][id]=4;
	  $races[4][name]="orc";
		$races[5][id]=5;
	  $races[5][name]="lizard";
		$races[6][id]=6;
	  $races[6][name]="gnome";
		$races[7][id]=7;
	  $races[7][name]="fairy";
		$races[8][id]=8;
	  $races[8][name]="goblin";
		$races[9][id]=9;
	  $races[9][name]="troll";
		$races[10][id]=10;
	  $races[10][name]="mummy";
		$races[11][id]=11;
	  $races[11][name]="skeleton";
		$races[12][id]=12;
	  $races[12][name]="beholder";
		$races[13][id]=13;
	  $races[13][name]="cloud";
		$races[14][id]=14;
	  $races[14][name]="yellow cross";
		$races[15][id]=15;
	  $races[15][name]="human (buyer)";
		$races[16][id]=16;
	  $races[16][name]="lizard (seller)";
		$races[17][id]=17;
	  $races[17][name]="insects";
		$races[18][id]=18;
	  $races[18][name]="sheep";
		$races[19][id]=19;
	  $races[19][name]="spider";
		$races[20][id]=20;
	  $races[20][name]="demon skeleton";
		$races[21][id]=21;
	  $races[21][name]="rotworm";
		$races[22][id]=22;
	  $races[22][name]="red demon";
		$races[23][id]=23;
	  $races[23][name]="scorpion";
		$races[24][id]=24;
	  $races[24][name]="pig";
		$races[25][id]=25;
	  $races[25][name]="invisible";
		$races[26][id]=26;
	  $races[26][name]="skull";
		$races[27][id]=27;
	  $races[27][name]="wasp";
		$races[28][id]=28;
	  $races[28][name]="forest troll";
		$races[29][id]=29;
	  $races[29][name]="shadow skeleton";
		$races[30][id]=30;
	  $races[30][name]="stone golem";
		$races[31][id]=31;
	  $races[31][name]="male goblin";
		$races[32][id]=32;
	  $races[32][name]="gnoll";
		$races[33][id]=33;
	  $races[33][name]="dragon";
		$races[34][id]=34;
	  $races[34][name]="male drow";
		$races[35][id]=35;
	  $races[35][name]="female drow";
		$races[36][id]=36;
	  $races[36][name]="lesser demon";
	  	$races[37][id]=37;
	  $races[37][name]="cow";
	  	  $races[38][id]=38;
	  $races[38][name]="deer";
	  	  $races[39][id]=39;
	  $races[39][name]="wolf";
	  	  $races[40][id]=40;
	  $races[40][name]="panther";
	  	  $races[41][id]=41;
	  $races[41][name]="rabbit";
	  	  $races[42][id]=42;
	  $races[42][name]="female goblin";
	  	  $races[43][id]=43;
	  $races[43][name]="fairy";
	  	  $races[44][id]=44;
	  $races[44][name]="male gnome";
	  	  $races[45][id]=45;
	  $races[45][name]="female gnome";
	  	  $races[46][id]=46;
	  $races[46][name]="fallen";
	  return $races;
	}

	// FUNCTION VARCHARRACE
	// This function creates a HTML dropdown box including all race possibilities
	// where the current char race ($currace) is the selected item
	function VarCharRace($currace) {
		$races=VarRaceList();
		$rc="<select name='chr_race'>";
		foreach ($races as $key=>$sglrace) {
			if ($currace<>$sglrace[id]) {
				$rc=$rc."<option value=".$sglrace[id].">".$sglrace[name]."</option>";
			} else {
				$rc=$rc."<option value=".$sglrace[id]." selected='selected'>".$sglrace[name]."</option>";
			}
		}
		$rc=$rc."</select>";
		return $rc;
	}

	function VarCharRace2($race) {
		switch ($race) {
			case 0: $race="human"; break;
			case 1: $race="dwarf"; break;
			case 2: $race="halfling"; break;
			case 3: $race="elf"; break;
			case 4: $race="orc"; break;
			case 5: $race="lizard"; break;
			case 6: $race="gnome"; break;
			case 7: $race="fairy"; break;
			case 8: $race="goblin"; break;
		}
		return $race;
	}


	// FUNCTION VARCHARSEX
	// This function creates a HTML dropdown box including all sex possibilities
	// where the current char sex ($cursex) is the selected item
	function VarCharSex($cursex) {
		$sex[0][id]=0;
		$sex[0][name]="male";
		$sex[1][id]=1;
		$sex[1][name]="female";

		$sx="<select name='chr_sex'>";
		foreach ($sex as $key=>$sglsex) {
			if ($cursex<>$sglsex[id]) {
				$sx=$sx."<option value=".$sglsex[id].">".$sglsex[name]."</option>";
			} else {
				$sx=$sx."<option value=".$sglsex[id]." selected='selected'>".$sglsex[name]."</option>";
			}
		}
		$sx=$sx."</select>";
		return $sx;
	}

	function VarCharSex2($race) {
		switch ($race) {
			case 0: $race="male"; break;
			case 1: $race="female"; break;
		}
		return $race;
	}

	// FUNCTION SENDSTATUSMAIL
	// Sends a formatted email to a user
	function SendStatusMail($to,$head,$body) {
		mail($to, $head, $body,
     "From: accounts@illarion.org\r\n" .
     "Reply-To: accounts@illarion.org\r\n" .
     "X-Mailer: PHP/" . phpversion());


	}



  function GetGMToolRights($user) {
  			$gm=SQLQuery("SELECT gm_rights_gmtool FROM gms WHERE gm_login='$user'","illarionserver");
  	return $gm[0][gm_rights_gmtool];

  }







php?>
