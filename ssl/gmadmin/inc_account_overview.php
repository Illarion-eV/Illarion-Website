<?php

	function powString($value) {
		if ($value==0) {
			return "1";
		} elseif ($value==1) {
			return "2";
		} elseif ($value<40) {
			$retString = 1;
			for ($k=1;$k<=$value;$k++) {
				$retString = $retString*2;
			}
			//$retString = substr($retString,0,-1);
			return $retString;
		} else {
			$retString = "549755813888";
			$retValue = 1;
			for ($k=1;$k<=$value-39;$k++) {
				$retValue = $retValue*2;
			}
			return $retString."*".$retValue;
		}
	}

	function CheckMulti(){
	   if (($_GET[accountid] == 666) || ($_GET[accountid] == 667) || ($_GET[accountid] == 107945)) {
	      return false;
	   }
	   $acco_connection = SQLConnect("accounts");
	   $illa_connection = SQLConnect("illarionserver");
	   $query = "SELECT acc_state FROM account WHERE acc_id = $_GET[accountid];";
	   $acc_state = SQLQueryCon($query,$acco_connection);
	   if ($acc_state[0][acc_state] != 3) {
	      return false;
	   }
      $query = "SELECT chr_lastip FROM chars WHERE chr_accid = $_GET[accountid];";
      $char_ips = SQLQueryCon($query,$illa_connection);
      if (count($char_ips) == 0) {
         return false;
      }
      $detectedips = array();
      foreach($char_ips as $ip_arrays ){
         if (!in_array($ip_arrays[chr_lastip],$detectedips)) {
            array_push($detectedips,"'".$ip_arrays[chr_lastip]."'");
         }
      }
      $ips = implode(",",$detectedips);
      $query = "SELECT chr_accid FROM chars WHERE chr_lastip IN ($ips) AND chr_accid <> $_GET[accountid];";
      $suspeced_accs = SQLQueryCon($query,$illa_connection);
      if (count($suspeced_accs) == 0) {
         return false;
      }
      $acc_array = array();
      foreach($suspeced_accs as $acc_arrays ){
         if (!in_array($acc_arrays[chr_accid],$acc_array) && ($acc_arrays[chr_accid] != 666) && ($acc_arrays[chr_accid] != 667) && ($acc_arrays[chr_accid] != 107945)) {
            array_push($acc_array,$acc_arrays[chr_accid]);
         }
      }
      if (count($acc_array) == 0) {
         return false;
      }
      foreach($acc_array as $accids ){
         $query = "SELECT count(*) as hits FROM account WHERE acc_state=3 AND acc_id=$accids";
         $acc_active = SQLQueryCon($query,$acco_connection);
         if ($acc_active[0][hits] == 1) {
            $query = "SELECT count(legtimulti.acc_id_1) as hits ".
                     "FROM legtimulti ".
                     "WHERE ((legtimulti.acc_id_1=$accids AND legtimulti.acc_id_2=$_GET[accountid]) ".
                     "OR (legtimulti.acc_id_2=$accids AND legtimulti.acc_id_1=$_GET[accountid]));";
            $multiaccs = SQLQueryCon($query,$acco_connection);
            if ($multiaccs[0][hits] == 0) {
               return true;
               break;
            }
         }
      }
      return false;
      SQLDisconnect($acco_connection);
      SQLDisconnect($illa_connection);
	}

	// Checks if update is triggered
	switch($_GET[update]) {
		case "general":
			sqlquery("UPDATE account SET acc_passwd='$_POST[acc_passwd]', acc_maxchars='$_POST[charlimit]', acc_email='$_POST[acc_email]' WHERE acc_id=$_GET[accountid]","accounts");
	    break;
		case "sendmail":
			mail($_POST[mailto],$_POST[subject],$_POST[textarea],"From: <$_POST[mailfrom]>");
			$content .= "E-Mail transmitted<br>";
		break;
		case "permissions":
			$racepermissions = "";
			$applypermissions = "";
			for($a=0;$a<46;$a++) {
				if($_POST['race'.$a]=="1") {
					$racepermissions=$racepermissions."+2^".$a;;
				}
				if($_POST['perm'.$a]=="1") {
					$applypermissions=$applypermissions."+2^".$a;;
				}
			}
			SQLQuery("UPDATE account SET acc_racepermission=".$racepermissions.", acc_applypermission=".$applypermissions." WHERE acc_id=".$_GET['accountid'],"accounts");
		break;
	}

	$menu3 = "<table width='100%'><div align='center'><tr><td>
			  	<a href='index.php?mod=accountview&accountid=$_GET[accountid]'>Account Informations</a></td><td>
				<a href='index.php?mod=accountview&submod=email&accountid=$_GET[accountid]'>E-Mail to player</a></td><td>
				<a href='index.php?mod=accountview&submod=raceper&accountid=$_GET[accountid]'>Race permissions</a></td><td>
				<a href='index.php?mod=accountview&submod=raceapp&accountid=$_GET[accountid]'>Race applys</a></td></tr></div></table>";

	// Gets account information from DB and prints it to screen
	$account=sqlquery("SELECT * FROM account WHERE acc_id=$_GET[accountid]","accounts");

	switch($_GET[submod]) {
	    case "raceper":
			$query = "SELECT ";
			for($a=0;$a<46;$a++) {
				$query .= "(account.acc_racepermission & (".powString($a).")) > 0 AS raceper".$a.", (account.acc_applypermission & (".powString($a).")) >0 AS applyper".$a.", ";
			}
			$query = substr($query,0,-2);
			$query .= " FROM account WHERE account.acc_id=".$_GET[accountid];
			$permissions = SQLQuery($query,"accounts");
			$content=$content."Race access and apply permissions<br><br>
			                   <table><tr><td>Race</td><td>Create</td><td>Apply for</td></tr>";
			$racelist = VarRaceList();
			$content.="<form action='index.php?mod=accountview&submod=raceper&accountid=$_GET[accountid]&update=permissions' method='post' name='permissions'>";
			for($i=0;$i<count($racelist);$i++) {
			  	$content.="<tr><td>".$racelist[$i][name]."</td><td><input type='checkbox' name='race".$i."' value='1'";
			  	if ($permissions[0]['raceper'.$i]=='t') { $content.=" checked"; }
			  	$content.="></td><td><input type='checkbox' name='perm".$i."' value='1'";
			  	if ($permissions[0]['applyper'.$i]=='t') { $content.=" checked"; }
			  	$content.="></td></tr>";
			}
			$content.="<tr><td colspan='3'><input type='submit' name='submit' value='set permissions'></td></tr></form></table>";
		break;
		case "raceapp":
		    $racelist = VarRaceList();
			if (!isset($_GET['appid'])) {
				$apps = SQLQuery("SELECT oid, ra_race, ra_status FROM raceapplys WHERE ra_accid=".$_GET['accountid'],"accounts");
				if (count($apps)==0) {
					$content.="no applys found";
				} else {
					$content.="<table><tr><td><b>race</b></td><td><b>status</b></td><td></td></tr>";
					foreach($apps as $key=>$app) {
						$content.="<tr><td>".$racelist[$app[ra_race]][name]."</td><td>";
						if($app[ra_status]=="0") { $content.="in work"; }
						elseif($app[ra_status]=="1") { $content.="accepted"; }
						elseif($app[ra_status]=="2") { $content.="rejected"; }
						else { $content.="unknown"; }
						$content.="</td><td><a href='index.php?mod=accountview&submod=raceapp&accountid=$_GET[accountid]&appid=".$app[oid]."'>view</a></td></tr>";
					}
					$content.="</table>";
				}
			} else {
    $apply = SQLQuery("SELECT * FROM raceapplys WHERE oid=".$_GET['appid'],"accounts");
	$account = SQLQuery("SELECT acc_login,acc_lang FROM account WHERE acc_id=".$apply[0][ra_accid],"accounts");
    $content.= "<table>
  <tr><td>Account Name:</td><td>".$account[0][acc_login]."</td></tr>
  <tr><td>Language:</td><td>"; if ($account[0][acc_lang]=="0") { $content.="german"; } else { $content.="english"; }; $content.="</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>Race:</td><td>".$racelist[$apply[0][ra_race]][name]."</td></tr>
  <tr><td>Status:</td><td>";
  	if($apply[0][ra_status]=="0") { $content.="in work"; }
	elseif($apply[0][ra_status]=="1") { $content.="accepted"; }
	elseif($apply[0][ra_status]=="2") { $content.="rejected"; }
	else { $content.="unknown"; }$content.="</td></tr>
  <tr>
    <td>Task:</td>
	<td>Please write how you want to play the race you apply for. Especially how your character would interact with others.</td>
  </tr>
  <tr>
    <td>Answer:</td>
	<td>".$apply[0][ra_how]."</td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td>Task:</td>
	<td>Please write why you want to play the race, you apply for.</td>
  </tr>
  <tr>
    <td>Answer:</td>
	<td>".$apply[0][ra_why]."</td>
  </tr>
  <tr>
    <td>GM Respond:</td>
	<td>".$apply[0][ra_answer]."</td>
  </tr>
</table>";
			}

		break;
		case "email":
			include("inc_account_email.php");
		break;
		case "editmultiacc":
		    if ($_GET['removeacc']>0) {
				SQLQuery("DELETE FROM legtimulti WHERE (acc_id_1=$_GET[accountid] AND acc_id_2=$_GET[removeacc]) OR (acc_id_2=$_GET[accountid] AND acc_id_1=$_GET[removeacc])","accounts");
				$content=$content."Link removed<br><br>";
			}
			if ($_GET['update']=="add") {
				$check = SQLQuery("SELECT count(acc_id_1) as hits FROM legtimulti WHERE (acc_id_1=$_GET[accountid] AND acc_id_2=$_POST[accid]) OR (acc_id_2=$_GET[accountid] AND acc_id_1=$_POST[accid])","accounts");
				if ($check[0][hits]==0) {
					SQLQuery("INSERT INTO legtimulti VALUES ($_GET[accountid],$_POST[accid],'".pg_escape_string(stripslashes($_POST[reason]))."')","accounts");
				} else {
					$content=$content."Link allready there<br><br>";
				}
			}
		    $multiacc=sqlquery("SELECT * FROM legtimulti WHERE acc_id_1=$_GET[accountid] OR acc_id_2=$_GET[accountid]","accounts");
			$content=$content."Linked accounts:<table>";
			if (count($multiacc)>0) {
				foreach($multiacc as $key=>$acc) {
					if ($acc[acc_id_1] == $_GET[accountid]) {
						$secAccId=$acc[acc_id_2];
					} else {
						$secAccId=$acc[acc_id_1];
					}
					$accname = SQLQuery("SELECT acc_login FROM account WHERE acc_id=".$secAccId,"accounts");
					$content=$content."<tr><td>".$secAccId."</td><td><a href='?mod=accountview&accountid=".$secAccId."'>".$accname[0][acc_login]."</a></td><td><form action='index.php?mod=accountview&accountid=$_GET[accountid]&submod=editmultiacc&removeacc=".$secAccId."' method='post'><input type='submit' name='remove' value='remove'></form></td></tr><tr><td>Reason:</td><td colspan='2'>".$acc[reason]."</td></tr><tr><td colspan='3'><hr></td></tr>\n";
				}
			}
			$content=$content."<form action='index.php?mod=accountview&accountid=$_GET[accountid]&submod=editmultiacc&update=add' method='post'><tr><td>Account ID:</td><td><input name='accid' value='' type='text'></td><td><input type='submit' value='add' name='add'></td></tr><tr><td colspan='3'><textarea cols='40' rows='3' name='reason'>Type in Reason</textarea></td></tr></form></table>";
		break;
		case "killmultisview":
		   $view_only = true;
		case "killmultis":
   	   if (($_GET[accountid] == 666) || ($_GET[accountid] == 667)  || ($_GET[accountid] == 107945)) {
   	      $content = "These accounts are no multi accounts for sure.";
   	      break;
   	   }
   	   $acco_connection = SQLConnect("accounts");
   	   $illa_connection = SQLConnect("illarionserver");
   	   $query = "SELECT acc_state FROM account WHERE acc_id = $_GET[accountid];";
   	   $acc_state = SQLQueryCon($query,$acco_connection);
   	   if ($acc_state[0][acc_state] != 3) {
   	      $content = "Account is not active";
   	      break;
   	   }
         $query = "SELECT chr_lastip FROM chars WHERE chr_accid = $_GET[accountid];";
         $char_ips = SQLQueryCon($query,$illa_connection);
         if (count($char_ips) == 0) {
            $content = "There are no characters in this account";
            break;
         }
         $detectedips = array();
         foreach($char_ips as $ip_arrays ){
            if (!in_array($ip_arrays[chr_lastip],$detectedips)) {
               array_push($detectedips,"'".$ip_arrays[chr_lastip]."'");
            }
         }
         $ips = implode(",",$detectedips);
         $query = "SELECT chr_accid FROM chars WHERE chr_lastip IN ($ips) AND chr_accid <> $_GET[accountid];";
         $suspeced_accs = SQLQueryCon($query,$illa_connection);
         if (count($suspeced_accs) == 0) {
            $content = "Can't detect any possible multi accounts.";
            break;
         }
         $acc_array = array();
         foreach($suspeced_accs as $acc_arrays ){
            if (!in_array($acc_arrays[chr_accid],$acc_array) && ($acc_arrays[chr_accid] != 666) && ($acc_arrays[chr_accid] != 667) && ($acc_arrays[chr_accid] != 107945)) {
               array_push($acc_array,$acc_arrays[chr_accid]);
            }
         }
         if (count($acc_array) == 0) {
            $content = "Can't detect any possible multi accounts.";
            break;
         }
         $found_multiaccounts = array($_GET[accountid]);
         foreach($acc_array as $accids ){
            $query = "SELECT count(*) as hits FROM account WHERE acc_state=3 AND acc_id=$accids";
            $acc_active = SQLQueryCon($query,$acco_connection);
            if ($acc_active[0][hits] == 1) {
               $query = "SELECT count(legtimulti.acc_id_1) as hits ".
                        "FROM legtimulti ".
                        "WHERE ((legtimulti.acc_id_1=$accids AND legtimulti.acc_id_2=$_GET[accountid]) ".
                        "OR (legtimulti.acc_id_2=$accids AND legtimulti.acc_id_1=$_GET[accountid]));";
               $multiaccs = SQLQueryCon($query,$acco_connection);
               if ($multiaccs[0][hits] == 0) {
                  if (!in_array($accids,$found_multiaccounts)) {
                     array_push($found_multiaccounts,$accids);
                  }
               }
            }
         }
         if (count($found_multiaccounts) == 0) {
            $content = "Can't detect any possible multi accounts.";
            break;
         } else {
            $multiacc_ids = implode(",",$found_multiaccounts);
            $ban_messages = "";
            $email_messages = "";
            if (!$view_only) {
               $content = "<pre>Multi Account Tracer Cleaning-Up Result:\n\n";
            } else {
               $content = "<pre>Multi Account Tracer Searching Result:\n\n";
            }
            $query = "SELECT acc_login,acc_id,acc_email,acc_lang FROM account WHERE acc_id IN ($multiacc_ids) ORDER BY acc_id ASC;";
            $accs = SQLQueryCon($query,$acco_connection);
            foreach($accs as $account_id){
               $content.= "Account: ".$account_id[acc_login]."(".$account_id[acc_id].")\n";
               $query = "SELECT chr_playerid, chr_name, chr_lastip FROM chars WHERE chr_accid = ".$account_id[acc_id];
               $acc_chars = SQLQueryCon($query,$illa_connection);
               foreach($acc_chars as $char_values){
                  $content.="--> ".$char_values[chr_playerid]." - ".$char_values[chr_name]." (".$char_values[chr_lastip].")\n";
               }
               $content.="\n";
               if (!$view_only) {
                  $ban_messages .= "Account Status \"".$account_id[acc_login]."\"(".$account_id[acc_id].") set to 8\n";
                  $ban_messages .= "--> Reason: multiple account suspicion (same IP)\n";
                  $email_messages .= "Mail send to: ".$account_id[acc_email]."\n";
				// moep
				  if ($account_id[acc_lang]=="0")
				  {
					mail($account_id[acc_email],"Multi Accounts",
					"Lieber Spieler,\n\nwir bedauern Dir mitteilen zu müssen, dass Dein Account \"".$account."\" gesperrt wurde. Der automatische Multi-Account-Tracer hat einen weiteren Account gefunden, der anscheinend Dir gehört.\nNach den Illarion-Regeln ist es einer Person nicht erlaubt, mehr als einen Account zu haben. Du kannst die Regeln hier nachlesen:\n
http://illarion.org/illarion/de_rules.php\n
Falls eine weitere Person neben Dir Deine Internetverbindung zum Spielen von Illarion benutzt, bitten wir Dich, dies den Gamemastern mitzuteilen. Du kannst einfach auf diese E-Mail antworten oder Dich direkt an einen Gamemaster Deiner Wahl wenden, damit Dein Account entsperrt wird.\n\n
Deine Illarion Gamemaster",
					"From: <account@illarion.org>");
				  }
				  else
				  {
                  	mail($account_id[acc_email],"Multi Accounts",
                    "Dear player,\n\nwe regret to tell you that your account \"".$account."\" is hereby banned. The automated multi account tracer detected another account that is probably owned by you. \nThe Illarion rules forbid one person having more than one account. You can review the rules here:\n
http://illarion.org/illarion/us_rules.php\n
In case another person uses your internet connection to play Illarion, you have to inform the gamemasters about this. You can reply to this e-mail or contact a gamemaster of your choice to get your account unbanned.\n\n
Yours,\n
The Illarion Gamemasters",
                    "From: <account@illarion.org>");
				  }
               }
            }
            if (!$view_only) {
               $content.="\n-------------------------------------------------------------------\n\n";
               $content.=$ban_messages;
               $content.="\n";
               $content.=$email_messages;
               $content.="</pre>";
               $query = "UPDATE account SET acc_state=8 WHERE acc_id IN ($multiacc_ids)";
               SQLQueryCon($query,$acco_connection);
            } else {
               $content.="</pre>";
               $content.="<br />";
               $content.="<a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=killmultis'>Ban the involved Accounts and send a mail to the players</a>";
            }
         }
         SQLDisconnect($acco_connection);
         SQLDisconnect($illa_connection);
		break;
		default:
		    $multiacc=sqlquery("SELECT * FROM legtimulti WHERE acc_id_1=$_GET[accountid] OR acc_id_2=$_GET[accountid]","accounts");
		    $warnings= SQLQuery("SELECT count(oid) as hits FROM warnings WHERE wrn_accid=$_GET[accountid]","accounts");
			$content=$content."<form action='index.php?mod=accountview&accountid=$_GET[accountid]&update=general' method='post'>
									<table width='100%'>
									<tr height='15'><td></td><td></td></tr>
									<tr><td width='100'>ID</td><td>".$account[0][acc_id]."</td></tr>
									<tr><td>Name</td><td>".$account[0][acc_login]."</td></tr>
									<tr height='15'><td></td><td></td></tr>
									<tr><td>Password</td><td><input type='text' name='acc_passwd' size='50' value='".$account[0][acc_passwd]."'></td></tr>
									<tr><td>Email</td><td><input type='text' name='acc_email' size='50' value='".$account[0][acc_email]."'></td></tr>
									<tr height='15'><td></td><td></td></tr>
									<tr><td>Last Login</td><td>".$account[0][acc_lastlogin]."</td></tr>
									<tr><td>Last IP</td><td>".$account[0][acc_lastip]."</td></tr>
									<tr height='15'><td></td><td></td></tr>\n";
									if ($warnings[0][hits]>0) {
									    $content=$content."<tr><td colspan=\"2\"><a href=\"index.php?mod=accountview&submod=warn&accountid=$_GET[accountid]\">Player has ".$warnings[0][hits]." Admonishments</b></td></tr>
                                    <tr height='15'><td></td><td></td></tr>\n";
									}
									if (CheckMulti()) {
									    $content.="<tr><td>&nbsp;</td></tr>\n";
									    $content.="<tr><td colspan=\"2\">Suspected multi accounts!&nbsp;&nbsp;&nbsp;<a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=killmultisview'>Handle the multi accounts</a></td></tr>";
									    $content.="<tr><td>&nbsp;</td></tr>\n";
                           }
         $content=$content."<tr><td>Language</td><td>".VarLanguage($account[0][acc_lang])."</td></tr>
									<tr><td>Character Limit</td><td><input type='text' name='charlimit' value='".$account[0][acc_maxchars]."'></td></tr>";
			if (count($multiacc)>0) {
				$content=$content."<tr><td>&nbsp;</td></tr><tr><td colspan='2'>This account is allowed to login with the same IP as the followling accounts:";
				foreach($multiacc as $key=>$acc) {
					if ($acc[acc_id_1] == $_GET[accountid]) {
						$secAccId=$acc[acc_id_2];
					} else {
						$secAccId=$acc[acc_id_1];
					}
					$accname = SQLQuery("SELECT acc_login FROM account WHERE acc_id=".$secAccId,"accounts");
					$content=$content."<li><a href='?mod=accountview&accountid=".$secAccId."'>".$accname[0][acc_login]."</a></li>";
				}
				$content=$content."</td></tr>";
			}
			$content=$content."<tr><td>&nbsp;</td></tr><tr><td><a href='?mod=accountview&accountid=$_GET[accountid]&submod=editmultiacc'>edit multi accounts</a></td></tr></table><br><p align='center'><input type='submit' value='Update'></p></form>";
		break;
	}
?>
