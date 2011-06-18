<?
  	$accfirst=sqlquery("SELECT count(*) as hits FROM account WHERE acc_state IN (2,5)","accounts");
  	$chars=sqlquery("SELECT count(*) as hits FROM chars WHERE chr_status=4 LIMIT 30","illarionserver");
  	$applys = SQLQuery("SELECT count(*) as hits FROM raceapplys WHERE ra_status=0","accounts");
  
  	$content.="<b>Pending account work:</b><br><br><br>";
  	if ($accfirst[0][hits]>0) {
  		$content.="<a style='color:#FF0000;' href='index.php?mod=accwork&submod=accs'>".$accfirst[0][hits]." account applications waiting</a><br><br>";
	} else {
		$content.="No account applications waiting<br><br>";
	}
  	if ($chars[0][hits]>0) {
  		$content.="<a style='color:#FF0000;' href='index.php?mod=accwork&submod=char'>".$chars[0][hits]." name checks waiting</a><br><br>";
	} else {
		$content.="No name checks waiting<br><br>";
	}
  	if ($applys[0][hits]>0) {
  		$content.="<a style='color:#FF0000;' href='index.php?mod=accwork&submod=race'>".$applys[0][hits]." race applys waiting</a><br><br>";
	} else {
		$content.="No race applys waiting<br><br>";
	}
?>