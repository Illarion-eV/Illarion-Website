<?
	$accfirst=sqlquery("SELECT * FROM account WHERE acc_state=2 LIMIT 30","accounts");
	$accsecond=sqlquery("SELECT * FROM account WHERE acc_state=5 LIMIT 30","accounts");
	$content="<b>First application check (".count($accfirst)." waiting):</b><br><br><table width='100%'>";
	if (count($accfirst)>0) {
		foreach($accfirst as $key=>$acc_row) {
			if ($acc_row[acc_lang]=="0") {$language="(G)";} else {$language="(E)";}
			$content=$content."<tr><td width='40'>$acc_row[acc_id]</td><td>$acc_row[acc_login] $language</td><td width='20'></td><td><a href='index.php?mod=accountview&accountid=$acc_row[acc_id]'>$acc_row[acc_email]</a></td></tr>";					
		}
		$content=$content."</table>";
	} else {
		$content=$content."<tr><td>No search results.</td></tr></table>";
	}
	$content.="<br><br><b>Second application check (".count($accsecond)." waiting):</b><br><br><table width='100%'>";
	if (count($accsecond)>0) {
		foreach($accsecond as $key=>$acc_row) {
			if ($acc_row[acc_lang]=="0") {$language="(G)";} else {$language="(E)";}
			$content=$content."<tr><td width='40'>$acc_row[acc_id]</td><td>$acc_row[acc_login] $language</td><td width='20'></td><td><a href='index.php?mod=accountview&accountid=$acc_row[acc_id]'>$acc_row[acc_email]</a></td></tr>";					
		}
		$content=$content."</table>";
	} else {
		$content=$content."<tr><td>No search results.</td></tr></table>";
	}
?>
