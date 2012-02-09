<?php


	// Switches different account search types
	switch($_POST[searchtype]) {
		// search for accound ID
		case "id":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM account WHERE acc_id = $_POST[searchvalue]","accounts");
			$acc=sqlquery("SELECT * FROM account WHERE acc_id = $_POST[searchvalue] LIMIT 30","accounts");
		break;

		// search for accound name
		case "name":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM account WHERE acc_login LIKE '".pg_escape_string($_POST[searchvalue])."'","accounts");
			$acc=sqlquery("SELECT * FROM account WHERE acc_login LIKE '".pg_escape_string($_POST[searchvalue])."' LIMIT 30","accounts");
		break;

		// search for accound email address
		case "mail":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM account WHERE acc_email LIKE '".pg_escape_string($_POST[searchvalue])."'","accounts");
			$acc=sqlquery("SELECT * FROM account WHERE acc_email LIKE '".pg_escape_string($_POST[searchvalue])."' LIMIT 30","accounts");
		break;

		// search for accound status
		case "status":
			$sqlcount=sqlquery("SELECT COUNT(*) FROM account WHERE acc_state = $_POST[searchvalue]","accounts");
			$acc=sqlquery("SELECT * FROM account WHERE acc_state = $_POST[searchvalue] LIMIT 30","accounts");
		break;

		// search for a specific char included in an account
		case "char":
			$acc=sqlquery("SELECT chr_accid FROM chars WHERE chr_name LIKE '".pg_escape_string($_POST[searchvalue])."'","illarionserver");
			$chr_accid=$acc[0][chr_accid];
			$sqlcount=sqlquery("SELECT COUNT(*) FROM account WHERE acc_id = $chr_accid","accounts");
			$acc=sqlquery("SELECT * FROM account WHERE acc_id = $chr_accid LIMIT 30", "accounts");
		break;




	}


	// Counts fitting accounts
	$alloveracc=sqlquery("SELECT COUNT(*) FROM account","accounts");

	// Prints information to screen
	$content="<b>Search result (found ".$sqlcount[0][count]." of ".$alloveracc[0][count]." accounts):</b><br><br><table width='100%'>";
	if ($acc<>"") {
		foreach($acc as $key=>$acc_row) {
			if ($acc_row[acc_lang]=="0") {$language="(G)";} else {$language="(E)";}
			$content=$content."<tr><td width='40'>$acc_row[acc_id]</td><td>$acc_row[acc_login] $language</td><td width='20'></td><td><a href='index.php?mod=accountview&accountid=$acc_row[acc_id]'>$acc_row[acc_email]</a></td></tr>";
		}
		$content=$content."</table>";
	} else {
		$content=$content."<tr><td>No search results.</td></tr></table>";
	}



?>
