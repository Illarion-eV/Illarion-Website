<?php
	
	// Checks if an update is triggered
	if ($_GET[update]=="true") {
		
		// If Hitpoints are above 0, then Livestate is set to 1 (alive)
		// Else it is set to 0 (dead)
		if ($_POST[ply_hitpoints]>0) {
			$lifestate=1;
		} else {
			$lifestate=0;
		}
		if ($_POST[submit]=="transfer") {
			SQLQuery("UPDATE chars SET chr_accid=".$_POST[characcout]." WHERE chr_playerid=$_GET[playerid]",$_GET[servertype]);
		} else {					
		    // Update table "char"
            $db =& Database::getPostgreSQL()
		    sqlquery("UPDATE chars SET 
										chr_name='".db->getEscaped($_POST[chr_name])."',						
										chr_race='".$_POST[chr_race]."', 						
										chr_sex='".$_POST[chr_sex]."', 						
										chr_suffix='".db->getEscaped($_POST[chr_suffix])."', 				
										chr_prefix='".db->getEscaped$_POST[chr_prefix])."' 				
													WHERE chr_playerid=$_GET[playerid]",$_GET[servertype]);
		
		    // Update table "player"
		    sqlquery("UPDATE player SET ply_posx=".$_POST[ply_posx].",							
											ply_posy=".$_POST[ply_posy].", 							
											ply_posz=".$_POST[ply_posz].", 							
											ply_hitpoints=".$_POST[ply_hitpoints].", 		
											ply_mana=".$_POST[ply_mana].", 							
											ply_lifestate=$lifestate  									
														WHERE ply_playerid=$_GET[playerid]",$_GET[servertype]);
		}
				
	}
				
	// Gets the character information from table "chars"			
	$char=sqlquery("SELECT * FROM chars WHERE chr_playerid='$_GET[playerid]'",$_GET[servertype]);
	
	// Gets the account information for a specified char
	$acc=sqlquery("SELECT * FROM account WHERE acc_id=".$char[0][chr_accid],"accounts");
	
	// Gets the character information from the table player
	$ply=sqlquery("SELECT * FROM player WHERE ply_playerid='$_GET[playerid]'",$_GET[servertype]);
	
	// Gets online informations
	$onl=sqlquery("SELECT count(on_playerid) as hits FROM onlineplayer WHERE on_playerid='$_GET[playerid]'",$_GET[servertype]);
	
	// Creates the screen output
	$content="<form action='index.php?mod=charview&accountid=&playerid=$_GET[playerid]&servertype=$_GET[servertype]&update=true' method='post'>
									<table width='100%'>

									<tr><td width='100'>Char ID</td><td>".$char[0][chr_playerid]."</td></tr>
									<tr><td width='100'>Account ID</td><td><input type='text' name='characcout' value='".$acc[0][acc_id]."'><input type='submit' name='submit' value='transfer'></td></tr>
									<tr><td width='100'>Account Name</td><td><a href='index.php?mod=accountview&accountid=".$acc[0][acc_id]."'>".$acc[0][acc_login]." (".$acc[0][acc_email].")</a></td></tr>
									<tr><td>Onlinestatus:</td><td><b>".( $onl[0][hits]>0 ? "Online" : "Offline" )."</b></td></tr>
									<tr height='15'><td></td><td></td></tr>
									<tr><td>Name</td><td><input type='text' name='chr_name' value=\"".$char[0][chr_name]."\"></td></tr>
									<tr><td></td><td>Prefix <input type='text' name='chr_prefix' value='".$char[0][chr_prefix]."'> Suffix <input type='text' name='chr_suffix' value='".$char[0][chr_suffix]."'></td></tr>
									<tr height='15'><td></td><td></td></tr>
									<tr><td>Char Status</td><td>".VarCharStatus($char[0][chr_status])."</td></tr>

							    	<tr><td>Last Login</td><td>".date("y-m-d h:i:s",$char[0][chr_lastsavetime])." (via IP: ".( $acc[0][acc_id] == 107945 ? $acc[0][acc_lastip] : $char[0][chr_lastip] )." )</td></tr>
									<tr height='8'><td></td><td></td></tr>
									<tr><td>Race + Sex</td><td>".VarCharRace($char[0][chr_race])." ".VarCharSex($char[0][chr_sex])."</td></tr>
									<tr><td>HP + Mana</td><td> Hits <input type='text' name='ply_hitpoints' size='10' value='".$ply[0][ply_hitpoints]."'> Mana <input type='text' name='ply_mana' size='10' value='".$ply[0][ply_mana]."'></td></tr>
									<tr height='8'><td></td><td></td></tr>
									<tr><td>Position</td><td> x = <input type='text' name='ply_posx' size='5' value='".$ply[0][ply_posx]."'> y = <input type='text' name='ply_posy' size='5' value='".$ply[0][ply_posy]."'> z = <input type='text' name='ply_posz' size='5' value='".$ply[0][ply_posz]."'></td></tr>
									<tr height='8'><td></td><td></td></tr>
									
									
									</table><br><p align='center'><input type='submit' name='submit' value='Update'></p></form>";

?>
