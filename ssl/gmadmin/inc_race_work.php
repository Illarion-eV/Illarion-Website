<?
  if($_GET['update'] == "do") {
    if ($_POST['submit']=="accept") {
	  $permissions = SQLQuery("SELECT acc_racepermission, acc_applypermission FROM account WHERE acc_id=".$_POST['accid'],"accounts");
	  $apply = SQLQuery("SELECT ra_status,ra_race FROM raceapplys WHERE oid=".$_GET['id'],"accounts");
	  $raceper = decbin($permissions[0][acc_racepermission]);
	  $applyper = decbin($permissions[0][acc_applypermission]);
	  while (strlen($raceper)<42) {
    	$raceper="0".$raceper;
  	  }
  	  while (strlen($applyper)<42) {
    	$applyper="0".$applyper;
      }
	  if ($apply[0][ra_status]=="0") {
	    if (substr($raceper,(($apply[0][ra_race])+1)*(-1),1) == "0") {
	      if (substr($applyper,(($apply[0][ra_race])+1)*(-1),1) == "1") {
	        SQLQuery("UPDATE raceapplys SET ra_answer='".pg_escape_string(stripslashes($_POST['answer']))."', ra_status=1 WHERE oid=".$_GET['id'],"accounts");
		    SQLQuery("UPDATE account SET acc_racepermission = acc_racepermission+".pow(2,(($apply[0][ra_race])))." WHERE acc_id=".$_POST['accid'],"accounts");
		    GMLog("race_pos",$_SERVER['PHP_AUTH_USER'],$_GET['id']);
			$content.= "Accepted<br>";
		  } else { $content.="Account is not allowed to apply for this race<br>"; };
	    } else { $content.= "Account is allowed to create this race allready<br>"; };
	  } else { $content.= "Account apply was allready processed<br>"; };
	} elseif($_POST['submit']=="reject") {
	  $permissions = SQLQuery("SELECT acc_racepermission, acc_applypermission FROM account WHERE acc_id=".$_POST['accid'],"accounts");
	  $apply = SQLQuery("SELECT ra_status,ra_race FROM raceapplys WHERE oid=".$_GET['id'],"accounts");
	  $raceper = decbin($permissions[0][acc_racepermission]);
	  $applyper = decbin($permissions[0][acc_applypermission]);
	  while (strlen($raceper)<42) {
    	$raceper="0".$raceper;
  	  }
  	  while (strlen($applyper)<42) {
    	$applyper="0".$applyper;
      }
	  if ($apply[0][ra_status]=="0") {
	    if (substr($raceper,(($apply[0][ra_race])+1)*(-1),1) == "0") {
	      if (substr($applyper,(($apply[0][ra_race])+1)*(-1),1) == "1") {
	        SQLQuery("UPDATE raceapplys SET ra_answer='".pg_escape_string(stripslashes($_POST['answer']))."', ra_status=2 WHERE oid=".$_GET['id'],"accounts");
			GMLog("race_neg",$_SERVER['PHP_AUTH_USER'],$_GET['id']);
			$content.= "Rejected<br>";
		  } else { $content.= "Account is not allowed to apply for this race<br>"; };
	    } else { $content.= "Account is allowed to create this race allready<br>"; };
	  } else { $content.= "Account apply was allready processed<br>"; };
	}
	unset($_GET['id']);	  
  }
  $racelist = VarRaceList();  
  if(!isset($_GET['id'])) {
    $applys = SQLQuery("SELECT oid,ra_race,ra_accid FROM raceapplys WHERE ra_status=0","accounts");
	if (count($applys)>0) {    
	  foreach($applys as $key=>$apply) {
		  $account = SQLQuery("SELECT acc_login, acc_lang FROM account WHERE acc_id=".$apply[ra_accid],"accounts");
		  $content.="<a href='?mod=accwork&submod=race&id=".$apply[oid]."'>".$account[0][acc_login]."</a> ";
		  if ($account[0][acc_lang]=="0") { $content.="(G)"; } else { $content.="(E)"; };
		  $content.=" for the ".$racelist[$apply[ra_race]][name]." race<br>";
	  }
	} else { $content.= "no applys found"; }
  } else {
    $apply = SQLQuery("SELECT * FROM raceapplys WHERE oid=".$_GET['id'],"accounts");
	$account = SQLQuery("SELECT acc_login,acc_lang FROM account WHERE acc_id=".$apply[0][ra_accid],"accounts");
    $content.= "<table>
  <form action=\"?mod=accwork&submod=race&id=".$_GET['id']."&update=do\" method=\"post\" name=\"work\">
  <tr><td>Account Name:</td><td>".$account[0][acc_login]."</td></tr>
  <tr><td>Language:</td><td>"; if ($account[0][acc_lang]=="0") { $content.="german"; } else { $content.="english"; }; $content.="</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>Race:</td><td>".$racelist[$apply[0][ra_race]][name]."</td></tr>
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
  <tr><td>&nbsp;</td></tr>
  <tr>
   <td>Your answer:</td>
   <td><textarea name=\"answer\" style=\"width:100%;\"></textarea><input type=\"hidden\" value=\"".$apply[0][ra_accid]."\" name=\"accid\"></td>
  </tr>
  <tr>
   <td><input type=\"submit\" name=\"submit\" value=\"accept\"></td>
   <td><input type=\"submit\" name=\"submit\" value=\"reject\"></td>
  </tr>
  </form>
</table>";
} ?>
