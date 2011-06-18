<?php
	
	// Checks if char status is triggered to update, and if yes, it updates the DB
	switch($_GET[update]) {
		case "true":
			sqlquery("UPDATE account SET acc_state=".$_POST[acc_status]." WHERE acc_id=$_GET[accountid]","accounts");
		break;
		case "warning":
			sqlquery("INSERT INTO warnings VALUES ('".$_GET[accountid]."','".pg_escape_string($_POST[reason])."','".$_SERVER['PHP_AUTH_USER']."',CURRENT_TIMESTAMP);","accounts");
		break;
		case "delwarn":
			sqlquery("DELETE FROM warnings WHERE oid=".$_GET[id],"accounts");
		break;
	}
		
	
	$menu3 = "<table width='100%'><div align='center'><tr><td>
				<a href='index.php?mod=accountview&submod=status&accountid=$_GET[accountid]'>Account Status</a></td><td>
				<a href='index.php?mod=accountview&submod=warn&accountid=$_GET[accountid]'>Admonishments</a></td><td>
				</div></table>";
	
	switch($_GET['submod']) {
		default:
		case "status":
		    // Gets the account status from the database
			$status=sqlquery("SELECT * FROM account WHERE acc_id=$_GET[accountid]","accounts");
			// Creates screen output, a list of radio boxes where the current status is selected
			$content="<form action='index.php?mod=accountview&accountid=$_GET[accountid]&submod=status&update=true' method='post'>
									<table width='100%'><tr><td>Status</td><td></td></tr>
									"
									.VarStatusLine("0",$status[0][acc_state],"0 - registered")
									.VarStatusLine("1",$status[0][acc_state],"1 - mail confirmed")
									.VarStatusLine("2",$status[0][acc_state],"2 - 1st application")
									.VarStatusLine("3",$status[0][acc_state],"3 - ACTIVATED")
									.VarStatusLine("4",$status[0][acc_state],"4 - 1st app rejected")
									.VarStatusLine("5",$status[0][acc_state],"5 - 2nd application")
									.VarStatusLine("6",$status[0][acc_state],"6 - 2nd app rejected")
									.VarStatusLine("7",$status[0][acc_state],"7 - TEMPORARY BANNED")
									.VarStatusLine("8",$status[0][acc_state],"8 - PERMANENT BANNED")
									."</table><p align='center'><input type='submit' value='Update'></p></form>";	
		break;
		case "warn":
			// Gets warnings from Database
			$warnings=sqlquery("SELECT wrn_reason,wrn_gm,wrn_time,oid FROM  warnings WHERE wrn_accid=$_GET[accountid]","accounts");
			$content.="<table>";
			if (count($warnings)==0) {
				$content.="<tr><td>This player don't have any admonishments</td></tr><tr><td>&nbsp;</td></tr>";
			} else {
			    $content.="<tr><td><b>Reason</b></td><td><b>GM</b></td><td><b>time</b></td><td></td></tr><tr><td colspan='4'><hr></td></tr>";
				foreach($warnings as $warn) {
					$content.="<tr><td>".$warn[wrn_reason]."</td><td>".$warn[wrn_gm]."</td><td>".$warn[wrn_time]."</td><td><form action='index.php?mod=accountview&accountid=$_GET[accountid]&submod=warn&update=delwarn&id=".$warn[oid]."' method='post'><input type='submit' name='submit' value='delete'></form></td></tr><tr><td colspan='4'><hr></td></tr>";
				}
			}
			$content.="<tr><td>&nbsp;</td></tr><tr><td><b>Add Admonishment</b></td></tr>
						  <form action='index.php?mod=accountview&accountid=$_GET[accountid]&submod=warn&update=warning' method='post'><tr>
				          <td colspan='4'><b>Reason:</b><input style='width:100%;' type='text' name='reason'></td></tr><tr>
						  </tr><tr><td colspan='2'><input type='submit' name='submit' value='submit'></td></tr></form></table>";
	   break;
	}
?>