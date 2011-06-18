<?php

	// GENERAL NOTE
	// If the illarionserver DB is established, remove the // from the lines below
	// to allow illarionserver access as well
	// Only by that it is possible to list the chars from both, testserver and illarionserver

	
	// Gets the list of testserver chars for a specific account			
	$chartestserver=sqlquery("SELECT * FROM chars WHERE chr_accid=$_GET[accountid]","testserver");
	
	// Gets the list of testserver chars for a specific account			
	$charillarionserver=sqlquery("SELECT * FROM chars WHERE chr_accid=$_GET[accountid]","illarionserver");
		
	// Generates screen output
	$content="<table width='100%'>";				

	if ($charillarionserver<>"") {
		foreach($charillarionserver as $key=>$singlecharis) {
			if ($singlecharis[chr_playerid]<>"") {
				$content=$content."<tr><td width='100'>".$singlecharis[chr_playerid]."</td><td><a href='index.php?mod=charview&playerid=$singlecharis[chr_playerid]&servertype=illarionserver'>".$singlecharis[chr_name]."</a></td><td width='75'>".VarCharStatus($singlecharis[chr_status])."</td><td width='75'>LiveServer</td></tr>";
			} else {
				$content=$content."<tr><td width='100'>".$singlecharis[chr_playerid]."</td><td>".$singlecharis[chr_name]."</td><td width='75'>".VarCharStatus($singlecharis[chr_status])."</td><td width='75'>LiveServer</td></tr>";
			}
		}
	}
				
	if ($chartestserver<>"") {
		foreach($chartestserver as $key=>$singlecharts) {
			if ($singlecharts[chr_playerid]<>"") {
				$content=$content."<tr><td width='100'>".$singlecharts[chr_playerid]."</td><td><a href='index.php?mod=charview&playerid=$singlecharts[chr_playerid]&servertype=testserver'>".$singlecharts[chr_name]."</a></td><td width='75'>".VarCharStatus($singlecharts[chr_status])."</td><td width='75'>TestServer</td></tr>";
			} else {
				$content=$content."<tr><td width='100'>".$singlecharts[chr_playerid]."</td><td>".$singlecharts[chr_name]."</td><td width='75'>".VarCharStatus($singlecharts[chr_status])."</td><td width='75'>TestServer</td></tr>";
			}
		}
	}
	$content=$content."</table>";
?>