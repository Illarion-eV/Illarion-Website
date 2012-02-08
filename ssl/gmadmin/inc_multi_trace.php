<?php
  if (!isset($_POST['start'])) { $_POST['start']=0; };
  if (!isset($_POST['end'])) { $_POST['end']=40; };
  $content.="List of probably multi accounts:<br>";
  if (!isset($_POST['more'])) {
    $morestr="";
  } else {
    $morestr=$_POST['more'];
	$chars = explode("|",$morestr);
	foreach($chars as $key=>$char) {
	  $parts = explode("-",$char);
	  if ($parts[0]<>"") {
	  	$content.="<li><a href='?mod=accountview&accountid=".$parts[0]."'>".$parts[1]."</a> with ".$parts[2]."</li>";
	  }
	}
  }
  $illa_connection = SQLConnect("illarionserver");
  $acco_connection = SQLConnect("accounts");

  $accounts = SQLQueryCon("SELECT acc_id,acc_login,acc_passwd,acc_email,acc_lastip,acc_newmail FROM account WHERE acc_state=3 AND acc_id NOT IN (666,667) ORDER BY acc_id DESC OFFSET ".$_POST['start']." LIMIT ".$_POST['end'],$acco_connection);
  $acccount = SQLQueryCon("SELECT COUNT(acc_id) as hits FROM account WHERE acc_state=3 AND acc_id NOT IN (666,667)",$acco_connection);
  foreach($accounts as $key=>$acc) {
    $multiacc=false;
	$multiaccs="";
	$ipparts = explode(".",$acc[acc_lastip]);
	$query="SELECT account.acc_id ".
    "FROM account ".
    "WHERE ((account.acc_passwd='$acc[acc_passwd]' AND account.acc_lastip LIKE '$ipparts[0].%.%.%') OR account.acc_email='$acc[acc_email]' OR account.acc_lastip='$acc[acc_lastip]') AND account.acc_state=3 AND account.acc_id NOT IN (666,667,$acc[acc_id]) ".
    "AND ((SELECT count(legtimulti.acc_id_1) as hits FROM legtimulti WHERE (legtimulti.acc_id_1=$acc[acc_id] AND legtimulti.acc_id_2=account.acc_id) OR (legtimulti.acc_id_2=$acc[acc_id] AND legtimulti.acc_id_1=account.acc_id)) = 0);";
    //echo $query."<br>";
	$accsfound = SQLQueryCon($query,$acco_connection);
	if (count($accsfound)>1) {
	  $foundchars = false;
	  foreach($accsfound as $key=>$accids) {
	    $query="SELECT count(chr_playerid) as hits FROM chars WHERE chr_accid=".$accids[acc_id]." AND chr_status=0";
		//echo $query."<br>";
		$chars = SQLQueryCon($query,$illa_connection);
		if ($chars[0][hits]>0) {
		  if ($foundchars) {
		    $multiacc = true;
		    $multiaccs.=$accids[acc_id].",";
		  } else {
		    $foundchars = true;
		  }
		}
	  }
	}
	if ($multiacc) {
	  $multiaccs = substr($multiaccs,0,strlen($multiaccs)-1);
	  $content.="<li><a href='?mod=accountview&accountid=".$acc[acc_id]."'>".$acc[acc_login]."</a> with ".$multiaccs."</li>";
	  $morestr.=$acc[acc_id]."-".$acc[acc_login]."-".$multiaccs."|";
	}
  }
  $newStart=$_POST['end'];
  $newEnd=$_POST['end']+40;
  if (substr($morestr,-1,1) == "|") {
    $morestr = substr($morestr,0,strlen($morestr)-1);
  }
  $content.="<br>".$_POST['end']."/".$acccount[0][hits]."<br><form action='index.php?mod=search' method='post'><input type='hidden' value='multi' name='searchtype'><input type='hidden' value='".$morestr."' name='more'>
             <input type='hidden' value='".$newStart."' name='start'><input type='hidden' value='".$newEnd."' name='end'><input type='submit' value='more...'>";
  SQLDisconnect($illa_connection);
  SQLDisconnect($acco_connection);
?>
