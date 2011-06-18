<?php

	// acc_lang




	// Gets the 1st story answer ID for the specified account
	$appstoryanswer=sqlquery("SELECT * FROM story_answer WHERE sa_accid=$_GET[accountid] AND sa_answerid=1","accounts");
	
	// Gets the 1st question answer ID for the specified account
	$appquestanswer=sqlquery("SELECT * FROM question_answer WHERE qa_accid=$_GET[accountid] AND qa_answerid=1","accounts");
	
	// Gets the story text for the specified story ID
	$appstory=sqlquery("SELECT story_de,story_us FROM story WHERE story_id=".$appstoryanswer[0][sa_storyid],"accounts");

	// Gets the question text for the specified question ID	
	$appquest=sqlquery("SELECT quest_de,quest_us FROM question WHERE quest_id=".$appquestanswer[0][qa_questid],"accounts");
	
	// Gets the current account status for the specified account
	$acc_state=sqlquery("SELECT acc_state,acc_lang,acc_login FROM account WHERE acc_id=$_GET[accountid]","accounts");
	
	
	// Generates the screen output
	$content="<table width='100%'><tr valign='top'><td width='75'>Question</td><td>".
									(($acc_state[0][acc_lang]==0) ? $appquest[0][quest_de] : $appquest[0][quest_us])
									."</td></tr>
									<tr height='10'><td></td><td></td></tr>
									<tr valign='top'><td>Answer</td><td>".$appquestanswer[0][qa_answer]."</td></tr>
									<tr height='25'><td></td><td></td></tr>
									<tr valign='top'><td width='25'>Story</td><td>".
									(($acc_state[0][acc_lang]==0) ? $appstory[0][story_de] : $appstory[0][story_us])
									."</td></tr>
									<tr height='10'><td></td><td></td></tr>
									<tr valign='top'><td>Ending</td><td>".$appstoryanswer[0][sa_answer]."</td></tr>";
	
	
	// Checks if the GM has voted yet
	$stillvote=sqlquery("SELECT * FROM votes WHERE vote_accid=$_GET[accountid] AND vote_gmname='".$PHP_AUTH_USER."' AND vote_answerid=1","accounts");
				
	// If GM has not voted yet, a input interface for a vote is created
	if (($acc_state[0][acc_state]==2) AND ($stillvote=="")) {
		$content=$content."<tr height='50'><td></td><td></td><form action='index.php?mod=accountview&accountid=$_GET[accountid]&submod=application&update=setvote&answerid=1' method='post'></tr>
									<tr valign='top'><td>Vote</td><td><input type='radio' name='goodbad' value='t' checked>Good <input type='radio' name='goodbad' value='f'>Bad</td></tr>
									<tr height='15'><td></td><td></td></tr>
									<tr height='50'><td><b>Remember:</b></td><td>If you finally reject an application, the entered reason will be sent to the player!</td></tr>
									<tr valign='top'><td>Reason</td><td><textarea name='reason' cols='40' rows='5' wrap='soft'></textarea><br>
									<p align='center'>
									<input type='submit' name='submitapp' value='Set Vote'>
									<input type='submit' name='submitapp' value='Accept'>
									<input type='submit' name='submitapp' value='Reject'>
									</p>
									<input type='hidden' name='acc_login' value='".$acc_state[0][acc_login]."'>
									</form></td></tr>";
	}					
									
	$content=$content."</table>";


?>
