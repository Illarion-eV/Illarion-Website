<?
	
	$menu3="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=gmeditor&servertype=illarionserver'>Realserver</a></td>
						<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=gmeditor&servertype=testserver'>Testserver</a></td>
						<td width='100' align='center'></td>
						<td width='100' align='center'><a href='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=gmeditor&action=addgm'>Add GM</a></td>
						<td></td></tr></table>";
	
	
	
	
	if ($_GET[servertype]=="testserver") {
		$servertype="testserver";
	} else {
		$servertype="illarionserver";
	}
	
	
	if (($_GET[gmedit]=="") AND ($_GET[action]=="")) {
		$gms=sqlquery("SELECT * FROM gms ORDER BY gm_login ASC",$servertype);
		$content="<table width='100%'>";
		foreach ($gms as $key=>$gm) {
			$charname=sqlquery("SELECT chr_name FROM chars WHERE chr_playerid=".$gm[gm_charid],$servertype);
			$content=$content."<tr><td><a href='index.php?mod=gameeditors&submod=gmeditor&gmedit=$gm[gm_charid]&servertype=$servertype'>$gm[gm_login]</a></td><td>".$charname[0][chr_name]."</td></tr>";
		}
		$content=$content."</table>
		
		
		";
	}
	
	
	if ($_GET[action]=="addgm") {
		//
		$content="<form action='https://illarion.org/gmadmin/index.php?mod=gameeditors&submod=gmeditor&action=checkgm' method='post'>
							<table width='100%'>
							<tr><td><b>Add a new GM</b></td><td></td></tr>
							<tr height='20'><td></td><td></td></tr>
							<tr><td>Login GMTool</td><td><input name='gmtoollogin' type='text'></td></tr>
							<tr><td>Account Name</td><td><input name='accname' type='text'></td></tr>
							<tr><td>Char Name</td><td><input name='chrname' type='text'></td></tr>
							<tr height='20'><td></td><td></td></tr>
							<tr><td></td><td><input type='radio' name='servertype' value='illarionserver' checked> Illarionserver</td></tr>
							<tr><td></td><td><input type='radio' name='servertype' value='testserver'> Testserver</td></tr>
							<tr height='40'><td><b></b></td><td></td></tr>
							<tr><td></td><td><input type='submit' name='submit' value='Add GM'></td></tr>
							</table></form>";
	}
		

	if ($_GET[action]=="checkgm") {

		$accountid=sqlquery("SELECT acc_id FROM account WHERE acc_login='".$_POST[accname]."'","accounts");
		if ($accountid[0][acc_id]<>"") {
			$charid=sqlquery("SELECT chr_playerid FROM chars 
												WHERE chr_name='".$_POST[chrname]."' AND 
												chr_accid=".$accountid[0][acc_id],$_POST[servertype]);
			if ($charid[0][chr_playerid]<>"") {
				sqlquery("INSERT INTO gms (gm_login,gm_charid,gm_rights_server,gm_rights_gmtool) VALUES ('$_POST[gmtoollogin]',".$charid[0][chr_playerid].",0,0)",$_POST[servertype]);
				
				$content="Character '$_POST[chrname]' (".$charid[0][chr_playerid].") from account '$_POST[accname]' (".$accountid[0][acc_id].") added to the list of GMs on $_POST[servertype].<br><br><br>";
				
			} else {
				$content="Can't find character '$_POST[chrname]' in account '$_POST[accname]' on $_POST[servertype].";
			}
		} else {
			$content="Can't find account '$_POST[accname]' on $_POST[servertype].";
		}
	}
	

	
	
	
	
	
	if ($_POST[Update]=="Update") {
	    $newrights = "";
		for($i=0;$i<18;$i++) {
			$newrights= (($_POST['chk'.$i]==1) ? 1 : 0) . $newrights;
		}

		$newrights=bindec($newrights);
		sqlquery("UPDATE gms SET gm_rights_server=".$newrights." WHERE gm_charid='$_GET[gmedit]'",$servertype);
		
		
	}
	
	
	
	
	
	if ($_GET[gmedit]<>"") {	
		$gm=sqlquery("SELECT gm_rights_server FROM gms WHERE gm_charid='$_GET[gmedit]'",$servertype);
		
		$gmrights=decbin($gm[0][gm_rights_server]);
		while (strlen($gmrights)<18) {
			$gmrights="0".$gmrights;
		}
		$gmr_names = array("gmr_allowlogin","gmr_basiccommands","gmr_warp","gmr_summon","gmr_prison","gmr_settiles","gmr_clipping",
		                   "gmr_warpfields","gmr_import","gmr_visible","gmr_reload","gmr_ban","gmr_loginstate","gmr_save","gmr_broadcast",
						   "gmr_forcelogout","gmr_getgmcalls","gmr_isnotshownasgm");
						   
		$content=$gm[0][gm_login]."<br>
			<form action='index.php?mod=gameeditors&submod=gmeditor&gmedit=$_GET[gmedit]&servertype=$servertype' method='post'>
			<table width='100%'>";
		
		for($i=0;$i<18;$i++) {
			if (floor($i/2)==$i/2) {
				$content.="<tr>";
			}
			$content.="<td><input type='checkbox' name='chk".$i."' value='1'".(substr($gmrights,($i+1)*(-1),1)=="1" ? " checked" : "" )."></td><td>".$gmr_names[$i]."</td>";
			if (floor($i/2)!=$i/2) {
				$content.="</tr>";
			}
		}		
		$content.="</table>
				<br><input type='submit' name='Update' value='Update'><br><br>
				<input type='submit' name='Delete' value='Delete Char'><br>
				<input type='checkbox' name='sure' value='yes'>Sure?<br>
				<input type='checkbox' name='reallysure' value='yes'>Really sure?
				</form>";
	
	}
		
	
	
	
	if ($_POST[Delete]=='Delete Char') {
		if (($_POST[sure]=="yes") AND ($_POST[reallysure]=="yes")) {
			sqlquery("DELETE FROM gms WHERE gm_charid='$_GET[gmedit]'",$servertype); 
			$content="Character from GM list deleted.";
		}
	}
	
	
	

	
	
	
	
/*	

		gmr_allowlogin = 1, //GM is allowed to login if nologin is true 
    gmr_basiccommands = 2, //Basic Commands like !who !what !? !fi and !inform 
    gmr_warp = 4, //GM is allowed to Warp (includes #jump_to) 
    gmr_summon = 8, // GM is allowed to Summon 
    gmr_prison = 16, //GM is allowed to put people in prisons 
    gmr_settiles = 32, //GM is allowed to change tiles (includes ton and toff command) 
		gmr_clipping = 64, //GM is allowed to change his clipping state (Walk trough walls) 
    gmr_warpfields = 128, //GM is allowed to manipulate Warpfields  
    gmr_import = 256, //GM is allowed to import maps and Warpfields. includes also createArea 
    gmr_visible = 512, //GM is allowed to change his visiblity state 
    gmr_reload = 1024, //GM is allowed to reload the tabels (With #r or !rd) includes the right to set the spawnstate !setspawn
		gmr_ban = 2048, //GM is allowed to ban players. 
    gmr_loginstate = 4096, //GM is allowed to change loginstate 
    gmr_save = 8192, //GM is allowed to save players and maps (!playersave and #mapsave) 
    gmr_broadcast = 16384, //GM is allowed to broadcast messages 
    gmr_forcelogout = 32768, //GM is allowed to force a logout of players 
    gmr_getgmcalls = 65536 //Char gets GM messages;
	gmr_isnotshownasgm = 131072 //Char gets GM messages;
	
	
*/
?>
