<?php
	
	// Checks if a vote was made to an application
	if ($_GET[update]=="setvote") {

		// A vote was casted but not a final decision
		if ($_POST[submitapp]=="Set Vote") {
			sqlquery("INSERT INTO votes (vote_accid,vote_answerid,vote_gmname,vote_ispositive,vote_reason,vote_date) VALUES ($_GET[accountid],$_GET[answerid],'$PHP_AUTH_USER','$_POST[goodbad]','$_POST[reason]','".time()."')","accounts");
		}	
				
		// A vote was casted and the application finally accepted				
		if ($_POST[submitapp]=="Accept") {
			// Inserts vote into the DB
			sqlquery("INSERT INTO votes (vote_accid,vote_answerid,vote_gmname,vote_ispositive,vote_reason,vote_date) VALUES ($_GET[accountid],$_GET[answerid],'$PHP_AUTH_USER','t','Final Decision: $_POST[reason]','".time()."')","accounts");
			$status=sqlquery("SELECT acc_email,acc_login,acc_state FROM account WHERE acc_id=$_GET[accountid]","accounts");
			GMLog("acc_pos",$_SERVER['PHP_AUTH_USER'],$_GET[accountid]);

			// Switches if 1st or 2nd application (account status 2 and account status 5)
			// Sets the account to state 3 (accepted)
			switch($status[0][acc_state]) {
				case "2":
					sqlquery("UPDATE account SET acc_state=3 WHERE acc_id=$_GET[accountid]","accounts");
					SendStatusMail($status[0][acc_email],"Illarion: 1st application accepted","You have requested the account ".$_GET[acc_login]." for the roleplaying game Illarion. We are happy to tell you that your 1st application fits our requirements and hereby is accepted. Feel free to log into your account to create up to 5 characters.\r\n\r\nhttp://account.illarion.org\r\n\r\nYours, The Illarion Staff @ www.illarion.org");
				break;
				case "5":
					sqlquery("UPDATE account SET acc_state=3 WHERE acc_id=$_GET[accountid]","accounts");
					SendStatusMail($status[0][acc_email],"Illarion: 2nd application accepted","You have requested the account ".$_GET[acc_login]." for the roleplaying game Illarion. We are happy to tell you that your 2nd application fits our requirements and hereby is accepted. Feel free to log into your account to create up to 5 characters.\r\n\r\nhttp://account.illarion.org\r\n\r\nYours, The Illarion Staff www.illarion.org");	
				break;						
			}
		}
					
		// A vote was casted and the application finally rejected				
		if ($_POST[submitapp]=="Reject") {

			// Inserts vote into the DB
			sqlquery("INSERT INTO votes (vote_accid,vote_answerid,vote_gmname,vote_ispositive,vote_reason,vote_date) VALUES ($_GET[accountid],$_GET[answerid],'$PHP_AUTH_USER','f','Final Decision: $_POST[reason]','".time()."')","accounts");
			$status=sqlquery("SELECT acc_email,acc_login,acc_state FROM account WHERE acc_id=$_GET[accountid]","accounts");
			GMLog("acc_neg",$_SERVER['PHP_AUTH_USER'],$_GET[accountid]);

			// Switches if 1st or 2nd application (account status 2 and account status 5)
			switch($status[0][acc_state]) {
				case "2":
					// Sets account state to 4 (1st application rejected)
					sqlquery("UPDATE account SET acc_state=4 WHERE acc_id=$_GET[accountid]","accounts");
					// Sends Mail
					SendStatusMail($status[0][acc_email],"Illarion: 1st application rejected","You have requested the account ".$status[0][acc_login]." for the roleplaying game Illarion. We are sorry to tell you that your 1st application does not fit our requirements and hereby is rejected for the following reason:\r\n\r\n".$_POST[reason]."\r\n\r\nPlease take your time and try again. We hope to have you as a part of the Illarion Community. You can submit a 2nd application at your leisure.\r\n\r\nhttp://account.illarion.org\r\n\r\nYours, The Illarion Staff www.illarion.org");
					// Generates a new story ID not equal to the one from before, and writes it to the DB
					$story=sqlquery("SELECT acc_story FROM account WHERE acc_id=$_GET[accountid]","accounts");
					$storycount=sqlquery("SELECT COUNT(*) FROM story","accounts");
					$story[0][acc_story];
					$storycount=$storycount[0][count];
					srand ((double)microtime()*1000000);
					$randstory=$story;
					while ($randstory == $story):
    				$randstory=rand(1,$storycount);
					endwhile;
					$story=sqlquery("UPDATE account SET acc_story=$randstory WHERE acc_id=$_GET[accountid]","accounts");
				break;
				
				
				case "5":
					// Sets account state to 6 (account finally rejected)
					sqlquery("UPDATE account SET acc_state=6 WHERE acc_id=$_GET[accountid]","accounts");
					// Sends mail
					SendStatusMail($status[0][acc_email],"Illarion: 2st Application Rejected","You have requested the account ".$status[0][acc_login]." for the roleplaying game Illarion. We are sorry to tell you that your 2nd application also does not fit our requirements and hereby is permanently rejected for the following reason:\r\n\r\n".$_POST[reason]."\r\n\r\nYours, The Illarion Staff www.illarion.org");
				break;						
			}
		}
	}
				
	
	
	// Gets the story IDs and answer IDs from the DB for a specific account
	$storycheck=sqlquery("SELECT sa_storyid,sa_answerid FROM story_answer WHERE sa_accid=$_GET[accountid]","accounts");
	$content=$content."<table width='100%'>";
	
	// Checks if the first answer ID is not empty (to find out if it is answered yet)
	// If it is present, the casted votes are fetched from DB and shown
	if ($storycheck[0][sa_answerid]<>"") {
		$content=$content."<tr><td width='120'><a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=application1'>1st Application</a></td><td width='100'></td><td></td></tr>";
		$votes=sqlquery("SELECT * FROM votes WHERE vote_accid=$_GET[accountid] AND vote_answerid=1","accounts");
		if ($votes<>"") {
			foreach($votes as $key=>$vote) {
				$content=$content."<tr><td align='center'>".VarGMVoteGoodBad($vote[vote_ispositive])."</td><td>$vote[vote_gmname]</td><td>$vote[vote_reason]</td></tr>";
			}
		}
		$content=$content."<tr height='15'><td></td><td></td><td></td></tr>";
	}
				
	// Checks if the second answer ID is not empty (to find out if it is answered yet)
	// If it is present, the casted votes are fetched from DB and shown
	if ($storycheck[1][sa_answerid]<>"") {
		$content=$content."<tr><td width='120'><a href='index.php?mod=accountview&accountid=$_GET[accountid]&submod=application2'>2nd Application</a></td><td width='100'></td><td></td></tr>";
		$votes=sqlquery("SELECT * FROM votes WHERE vote_accid=$_GET[accountid] AND vote_answerid=2","accounts");
		if ($votes<>"") {
			foreach($votes as $key=>$vote) {
				$content=$content."<tr><td align='center'>".VarGMVoteGoodBad($vote[vote_ispositive])."</td><td>$vote[vote_gmname]</td><td>$vote[vote_reason]</td></tr>";
			}
		}
	}
				
	$content=$content."</table>";
	
	
?>
