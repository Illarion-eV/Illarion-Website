<?php
	
	switch($_GET[update]) {
	
	// ATTRIBUTE UPDATE
	// Checks update-trigger for attribute update
		case "attributes":
				sqlquery("UPDATE player SET ply_strength=$_POST[attri_str],ply_dexterity=$_POST[attri_dex],
							ply_constitution=$_POST[attri_con],ply_agility=$_POST[attri_agi],
							ply_intelligence=$_POST[attri_int],ply_perception=$_POST[attri_per],
							ply_willpower=$_POST[attri_wil],ply_essence=$_POST[attri_ess] WHERE ply_playerid=$_GET[playerid]"
							,$_GET[servertype]);
		break;				
	
	// STATUS UPDATE
	// Checks update-trigger for status update
		case "status":
				$gmvalues=sqlquery("SELECT gm_charid FROM gms WHERE gm_login='".$_SERVER['PHP_AUTH_USER']."'",$_GET[servertype]);
				sqlquery("UPDATE chars SET chr_status=".$_POST[chr_status].", chr_statustime=".time().", chr_statusgm=".$gmvalues[0][gm_charid].", chr_statusreason='$_POST[chr_statusreason]' WHERE chr_playerid=$_GET[playerid]",$_GET[servertype]);
					
					// Mapping of GM login ID to a GM char is neccessary here
					// , chr_statusgm='".$_SERVER['PHP_AUTH_USER']."'
		break;
		
	// MAGIC TYPE UPDATE
	// Checks update-trigger for magic type update
		case "magictype":
			sqlquery("UPDATE player SET ply_magictype=".$_POST[magictype]." WHERE ply_playerid=$_GET[playerid]",$_GET[servertype]);
		break;
		
	// RUNE UPDATE
	// Checks update-trigger for rune update
		case "runes":
			$runebinvalue="";
			for ($i=1;$i<33;$i++) {
				$name="rune".$i;
				if ($_POST[$name]==1) {
					$runebinvalue = "1".$runebinvalue;
				} else {
					$runebinvalue = "0".$runebinvalue;
				}
			}
			$runevalue=bindec($runebinvalue);
			switch($_POST[magictype]) {
				case 0: $table="ply_magicflagsmage"; break;
				case 1: $table="ply_magicflagspriest"; break;
				case 2: $table="ply_magicflagsbard"; break;
				case 3: $table="ply_magicflagsdruid"; break;
			}
			sqlquery("UPDATE player SET ".$table."=".$runevalue." WHERE ply_playerid=$_GET[playerid]",$_GET[servertype]);
		break;
	}
				
	$menu3 .= "<table width='100%'><tr><td></td>
			   <td width='100' align='center'><a href='index.php?mod=charview&submod=status&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]'>Attributes</a></td>
			   <td width='100' align='center'><a href='index.php?mod=charview&submod=status&subsubmod=status&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]'>Status</a></td>
			   <td width='100' align='center'><a href='index.php?mod=charview&submod=status&subsubmod=runes&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]'>Runes</a></td>
			   <td></td></tr></table>";
			   
	switch ($_GET[subsubmod]) {
		case "status":
			// Gets the char status from table "chars"
			$charstatus=sqlquery("SELECT * FROM chars WHERE chr_playerid=$_GET[playerid]",$_GET[servertype]);
			
			// Creates status output including last change (with GM name, time and reason)
			$content .= "<form action='index.php?mod=charview&submod=status&subsubmod=status&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]&update=status' method='post'>
										 <br><b>Status</b><br><br>".VarCharStatus2($charstatus[0][chr_status]);	
										 
			if ($charstatus[0][chr_statusgm]!="") {
				$gmlogin = sqlquery("SELECT gm_login FROM gms WHERE gm_charid=".$charstatus[0][chr_statusgm],$_GET[servertype]);
				if (isset($gmlogin[0][gm_login])) {
					$content .= " by ".$gmlogin[0][gm_login];
				} else {
					$content .= " by someone";
				}
			} else {
				$content .= " by someone";
			}
				
			if ($charstatus[0][chr_statustime]!="") {
			    if ($charstatus[0][chr_status]==31) { //temp ban
			        $content .= " until ";
			    } else {
				    $content .= " on ";
			    }
				$content .= date("y/m/d H:i",$charstatus[0][chr_statustime]);
			} else {
				$content .= " (no time logged)";
			}
				
				
			$content .= "<br><br>Reason<br><textarea name='chr_statusreason' cols='55' rows='4'>".$charstatus[0][chr_statusreason]."</textarea><br><p align='center'><input type='submit' value='Update'></p></form>";
		break;
		
		case "runes":
			$magicvalues = sqlquery("SELECT ply_magictype,ply_magicflagsmage,ply_magicflagspriest,ply_magicflagsbard,ply_magicflagsdruid FROM player WHERE ply_playerid=$_GET[playerid]",$_GET[servertype]);
			
			switch($magicvalues[0][ply_magictype]) {
				case 0: 
					$runes=decbin($magicvalues[0][ply_magicflagsmage]+1-1);
					$runenames=array("KEL","RA","HEPT","TAH","PEN","LUK","MES","ORL","TAUR","URA","IRA","CUN","SAV","YEG","JUS","QWAN","SOLH","SIH","FHAN","LEV","FHEN","KAH","ANTH","DUN","PHERC","BHONA","SUL","LHOR","GM 1","GM 2","GM 3","GM 4");
				break;
				case 1: 
					$runes=decbin($magicvalues[0][ply_magicflagspriest]+1-1); 
					$runenames=array("BROCH","DEMN","BARA","FESS","BRAG","unnamed","HUM","QUON","unnamed","PROT","HOH","unnamed","NID","USH","POS","unnamed","REA","ELD","unused","TAN","VIE","MET","unnamed","POI","GRE","FIN","ALT","DAR","GM 1","GM 2","GM 3","GM 4");
				break;
				case 2: 
					$runes=decbin($magicvalues[0][ply_magicflagsbard]+1-1); 
					$runenames=array("B 1","B 2","B 3","B 4","B 5","B 6","B 7","B 8","B 9","B 10","B 11","B 12","B 13","B 14","B 15","B 16","B 17","B 18","B 19","B 20","B 21","B 22","B 23","B 24","B 25","B 26","B 27","B 28","GM 1","GM 2","GM 3","GM 4");
				break;
				case 3: 
					$runes=decbin($magicvalues[0][ply_magicflagsdruid]+1-1); 
					$runenames=array("heal","poison","dead","life","spirit","firnis blossom","foot leaf","heath flower","virgins weed","sun herb","sand berry","flamegoblet blossom","steppe fern","herders mushroom","toadstool","red head","night angels blossom","bulbsponge mushroom","fourleafed oneberry","anger berry","rotten tree bark","donf blade","yellow weed","desert sky capsule","life root","pott ash","donf blade","rubin","GM 1","GM 2","GM 3","GM 4");
				break;
			}
			while (strlen($runes)<32) {
				$runes="0".$runes;
			}
			$content .= "<b>Magic Type</b><br><br>
			             <form action='index.php?mod=charview&submod=status&subsubmod=runes&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]&update=magictype' method='post'>
						 <select name='magictype'>
						   <option value='0'"; if($magicvalues[0][ply_magictype]==0) { $content .= " selected"; } $content .= ">Magician</option>
						   <option value='1'"; if($magicvalues[0][ply_magictype]==1) { $content .= " selected"; } $content .= ">Priest</option>
						   <option value='2'"; if($magicvalues[0][ply_magictype]==2) { $content .= " selected"; } $content .= ">Bard</option>
						   <option value='3'"; if($magicvalues[0][ply_magictype]==3) { $content .= " selected"; } $content .= ">Druid</option>
						   <input type='submit' value='Change' name='Change'>
						 </select></form>
						 <br><br>
						 <b>Runes</b><br><br>
						 <form action='index.php?mod=charview&submod=status&subsubmod=runes&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]&update=runes' method='post'>
						 <table width='100%'>";
			for($i=0;$i<8;$i++) {
				$content .= "<tr>";
				for($k=1;$k<5;$k++) {
					$number = $k+($i*4);
					$content = $content."<td><input type='checkbox' name='rune".$number."' value='1' "; if (substr($runes,32-$number,1)==1) { $content .= "checked"; } $content .=">".$runenames[$number-1]."</td>\n";
				}
				$content .= "</tr>";
			}
			$content .= "<tr><td colspan='4' align='center'><input type='hidden' name='magictype' value='".$magicvalues[0][ply_magictype]."'><input type='submit' value='Chance Runes'></td></tr></table></form>";	
		
		break;
		
		
		default:	
			// Gets the char attributes from table "player"
			$charattri=sqlquery("SELECT * FROM player WHERE ply_playerid=$_GET[playerid]",$_GET[servertype]);			
	
			// Creates output of the attributes section
			$content .= "<b>Stats</b><br><br>
									<form action='index.php?mod=charview&submod=status&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]&update=attributes' method='post'>
									<table width='100%'>
									<tr><td width='40'>STR</td><td width='85'><input type='text' name='attri_str' size='5' value='".$charattri[0][ply_strength]."'></td>
											<td width='40'>DEX</td><td width='85'><input type='text' name='attri_dex' size='5' value='".$charattri[0][ply_dexterity]."'></td>
											<td width='40'>CON</td><td width='85'><input type='text' name='attri_con' size='5' value='".$charattri[0][ply_constitution]."'></td>
											<td width='40'>AGI</td><td width='85'><input type='text' name='attri_agi' size='5' value='".$charattri[0][ply_agility]."'></td></tr>
									<tr><td width='40'>INT</td><td width='85'><input type='text' name='attri_int' size='5' value='".$charattri[0][ply_intelligence]."'></td>
											<td width='40'>PER</td><td width='85'><input type='text' name='attri_per' size='5' value='".$charattri[0][ply_perception]."'></td>
											<td width='40'>WIL</td><td width='85'><input type='text' name='attri_wil' size='5' value='".$charattri[0][ply_willpower]."'></td>
											<td width='40'>ESS</td><td width='85'><input type='text' name='attri_ess' size='5' value='".$charattri[0][ply_essence]."'></td></tr>
									</table><p align='center'><input type='submit' value='Update'></p></form>";
		break;
	}

?>