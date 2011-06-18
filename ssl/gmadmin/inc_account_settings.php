<?php
	$menu2="<table width='100%'><tr><td></td>
						<td align='center'><a href='index.php?mod=accwork'>Accounts</a></td>
						<td align='center'><a href='index.php?mod=accwork&submod=char'>Characters</a></td>
						<td align='center'><a href='index.php?mod=accwork&submod=race'>Race Applys</a></td>
						<td align='center'><a href='index.php?mod=accsettings'>AS Settings</a></td>
						<td></td></tr></table>";
	$menu3="<table width='100%'><tr><td></td>
						<td width='100' align='center'><a href='index.php?mod=accsettings&submod=general'>General</a></td>
						<td width='100' align='center'><a href='index.php?mod=accsettings&submod=questions'>Questions</a></td>
						<td width='100' align='center'><a href='index.php?mod=accsettings&submod=stories'>Stories</a></td>
						<td></td></tr></table>";
	switch($_GET["update"]) {
		case "settings":
			$conn=SQLConnect("accounts");
			SQLQueryCon("begin",$conn);			
			if ($_POST['quest']=='quest') { $question='t'; } else { $question='f'; }
			if ($_POST['story']=='story') { $story='t'; } else { $story='f'; }
			SQLQueryCon("UPDATE assettings SET min_story_len='".$_POST['story_length']."', question='".$question."', story='".$story."'",$conn);
			
			if ($_POST['namecheckRS']=='namecheck') { $namecheckRS='t'; } else { $namecheckRS='f'; }
			if ($_POST['equip_packsRS']=='equip_packs') { $startpacksRS='t'; } else { $startpacksRS='f'; }
			if ($_POST['race_applyRS']=='race_app') { $special_racesRS='t'; } else { $special_racesRS='f'; }
			SQLQueryCon("UPDATE assettings SET namecheck='".$namecheckRS."', startpacks='".$startpacksRS."', special_races='".$special_racesRS."' WHERE server='illarionserver'",$conn);
			
			if ($_POST['namecheckTS']=='namecheck') { $namecheckTS='t'; } else { $namecheckTS='f'; }
			if ($_POST['equip_packsTS']=='equip_packs') { $startpacksTS='t'; } else { $startpacksTS='f'; }
			if ($_POST['race_applyTS']=='race_app') { $special_racesTS='t'; } else { $special_racesTS='f'; }
			SQLQueryCon("UPDATE assettings SET namecheck='".$namecheckTS."', startpacks='".$startpacksTS."', special_races='".$special_racesTS."' WHERE server='testserver'",$conn);
			SQLQueryCon("commit",$conn);
			SQLDisconnect($conn);
		break;
		case "question":
			$conn=SQLConnect("accounts");
			SQLQueryCon("begin",$conn);
			if ($_POST['questactive']=='questactive') { $active='t'; } else { $active='f'; }
			SQLQueryCon("UPDATE question SET quest_de='".pg_escape_string(stripslashes($_POST['questde']))."', quest_us=".pg_escape_string(stripslashes($_POST['questus'])).", quest_active=".$active." WHERE quest_id=".$_GET['questid'],$conn);
			SQLQueryCon("commit",$conn);
			SQLDisconnect($conn);
			$content.="<b>Changings saved</b><br>";
		break;
		case "addquest":
			$conn=SQLConnect("accounts");
			SQLQueryCon("begin",$conn);
			if ($_POST['questactive']=='questactive') { $active='t'; } else { $active='f'; }
			SQLQueryCon("INSERT INTO question VALUES (".$_GET['questid'].", '".pg_escape_string(stripslashes($_POST['questde']))."', '".pg_escape_string(stripslashes($_POST['questus']))."', ".$active.")",$conn);
			SQLQueryCon("commit",$conn);
			SQLDisconnect($conn);
			$content.="<b>Question added</b><br>";
		break;
		case "story":
			$conn=SQLConnect("accounts");
			SQLQueryCon("begin",$conn);
			if ($_POST['storyactive']=='storyactive') { $active='t'; } else { $active='f'; }
			SQLQueryCon("UPDATE story SET story_de='".pg_escape_string(stripslashes($_POST['storyde']))."', story_us=".pg_escape_string(stripslashes($_POST['storyus'])).", story_active=".$active." WHERE story_id=".$_GET['storyid'],$conn);
			SQLQueryCon("commit",$conn);
			SQLDisconnect($conn);
			$content.="<b>Changings saved</b><br>";
		break;
		case "addstory":
			$conn=SQLConnect("accounts");
			SQLQueryCon("begin",$conn);
			if ($_POST['storyactive']=='storyactive') { $active='t'; } else { $active='f'; }
			SQLQueryCon("INSERT INTO story VALUES (".$_GET['storyid'].", '".pg_escape_string(stripslashes($_POST['storyde']))."', '".pg_escape_string(stripslashes($_POST['storyus']))."', ".$active.")",$conn);
			SQLQueryCon("commit",$conn);
			SQLDisconnect($conn);
			$content.="<b>Story added</b><br>";
		break;
	}
			
	switch($_GET["submod"]) {
		case "general":
			if (GetGMToolRights($_SERVER['PHP_AUTH_USER'])!="1") {
				$content = "You are not allowed to view or change the settings of the account system";
			} else {
				$settings = SQLQuery("SELECT * FROM assettings","accounts");
				
				if ($settings[0][question]=='t') { $checks[0]=" checked"; } else { $checks[0]=""; }
				if ($settings[0][story]=='t') { $checks[1]=" checked"; } else { $checks[1]=""; }
				if ($settings[0][story_selectable]=='t') { $checks[2]=" checked"; } else { $checks[2]=""; }
				
				for($i=0;$i<2;$i++) {
				    if ($settings[$i][server]=="illarionserver") { $mod=0; } else { $mod=5; }
					if ($settings[$i][namecheck]=='t') { $checks[3+$mod]=" checked"; } else { $checks[3+$mod]=""; }
					if ($settings[$i][itemchoose]=='t') { $checks[4+$mod]=" checked"; } else { $checks[4+$mod]=""; }
					if ($settings[$i][skillchoose]=='t') { $checks[5+$mod]=" checked"; } else { $checks[5+$mod]=""; } 
					if ($settings[$i][startpacks]=='t') { $checks[6+$mod]=" checked"; } else { $checks[6+$mod]=""; }
					if ($settings[$i][special_races]=='t') { $checks[7+$mod]=" checked"; } else { $checks[7+$mod]=""; }
				}
			    $content = "<b>Global Settings:</b><br><form name='form1' method='post' action='index.php?mod=accsettings&submod=general&update=settings'>
                            <input type='checkbox' name='quest' value='quest'".$checks[0].">Question<br>
	                        <input type='checkbox' name='story' value='story'".$checks[1].">Story<br>
	                        <input type='checkbox' name='sel_story' value='sel_story'".$checks[2].">Story selectable (disabled)<br>
							<input name='story_length' type='text' size='10' value='".$settings[0][min_story_len]."'> minimal story length<br>
							<br><b>Realserver Settings</b><br>
							<input type='checkbox' name='namecheckRS' value='namecheck'".$checks[3].">Namecheck<br>
	                        <input type='checkbox' name='cho_itemRS' value='cho_item'".$checks[4].">Item choose (disabled)<br>
	                        <input type='checkbox' name='cho_sklRS' value='cho_skl'".$checks[5].">Skill choose (disabled)<br>
							<input type='checkbox' name='equip_packsRS' value='equip_packs'".$checks[6].">equip the character with given packs<br>
                            <input type='checkbox' name='race_applyRS' value='race_app'".$checks[7].">race apply system active<br>
							<br><b>Testserver Settings</b><br>
							<input type='checkbox' name='namecheckTS' value='namecheck'".$checks[8].">Namecheck<br>
	                        <input type='checkbox' name='cho_itemTS' value='cho_item'".$checks[9].">Item choose (disabled)<br>
	                        <input type='checkbox' name='cho_sklTS' value='cho_skl'".$checks[10].">Skill choose (disabled)<br>
							<input type='checkbox' name='equip_packsTS' value='equip_packs'".$checks[11].">equip the character with given packs<br>
                            <input type='checkbox' name='race_applyTS' value='equip_packs'".$checks[12].">race apply system active<br>
                            <br><input type='submit' name='Submit' value='Change Settings'></form>";
			}
		break;
		case "questions":
			if (!isset($_GET['quest'])) {
				$questions = SQLQuery("SELECT quest_id,quest_de,quest_us FROM question ORDER BY quest_id ASC","accounts");
				$content.="<table>";
				$lowestpossid = "1";
				if (count($questions) > 0 ) { 
					foreach($questions as $key=>$quest) {
						if ($lowestpossid==$quest[quest_id]) {
							$lowestpossid=$quest[quest_id]+1;
						}
						$content.="<tr><td><a href='index.php?mod=accsettings&submod=questions&quest=".$quest[quest_id]."'>Question ID ".$quest[quest_id]."</a></td><td>";
						if (strlen($quest[quest_de]) > 30) {
							$content.=substr($quest[quest_de],0,27)."...";
						} else {
							$content.=$quest[quest_de];
						}
						$content.="</td><td>";
						if (strlen($quest[quest_us]) > 30) {
							$content.=substr($quest[quest_us],0,27)."...";
						} else {
							$content.=$quest[quest_us];
						}
						$content.="</td></tr>";
					}
					$content.="</table><br><br>";
				}
				$content.="<a href='index.php?mod=accsettings&submod=questions&quest=".$lowestpossid."'>Add new Question</a>";
			} else {
				$question = SQLQuery("SELECT quest_de,quest_us,quest_active FROM question WHERE quest_id=".$_GET['quest'],"accounts");
				if (count($question) == 1 ) {
					$content.="<form name='form1' method='post' action='index.php?mod=accsettings&submod=questions&questid=".$_GET['quest']."&update=question'><b>Question ID ".$_GET['quest']."</b><br><br>";
					$content.="German:<br><textarea rows='10' cols='55' name='questde'>".$question[0]['quest_de']."</textarea><br><br>";
					$content.="English:<br><textarea rows='10' cols='55' name='questus'>".$question[0]['quest_us']."</textarea><br><br>";
					$content.="Question active&nbsp;<input type='checkbox' name='questactive' value='questactive'".( $question[0][quest_active]=='t' ? " checked" : "")."><br><br>";
					$content.="<input type='submit' name='submit' value='save changings'></form>";
				} else {
					$content.="<form name='form1' method='post' action='index.php?mod=accsettings&submod=questions&questid=".$_GET['quest']."&update=addquest'><b>Question ID ".$_GET['quest']."</b><br><br>";
					$content.="German:<br><textarea rows='10' cols='55' name='questde'></textarea><br><br>";
					$content.="English:<br><textarea rows='10' cols='55' name='questus'></textarea><br><br>";
					$content.="Question active&nbsp;<input type='checkbox' name='questactive' value='questactive'><br><br>";
					$content.="<input type='submit' name='submit' value='add question'></form>";
				}
			}
		break;
		case "stories":
			if (!isset($_GET['story'])) {
				$stories = SQLQuery("SELECT story_id,story_de,story_us FROM story ORDER BY story_id ASC","accounts");
				$content.="<table>";
				$lowestpossid = "1";
				if (count($stories) > 0 ) { 
					foreach($stories as $key=>$story) {
						if ($lowestpossid==$story[story_id]) {
							$lowestpossid=$story[story_id]+1;
						}
						$content.="<tr><td><a href='index.php?mod=accsettings&submod=stories&story=".$story[story_id]."'>Story ID ".$story[story_id]."</a></td><td>";
						if (strlen($story[story_de]) > 30) {
							$content.=substr($story[story_de],0,27)."...";
						} else {
							$content.=$story[story_de];
						}
						$content.="</td><td>";
						if (strlen($story[story_us]) > 30) {
							$content.=substr($story[story_us],0,27)."...";
						} else {
							$content.=$story[story_us];
						}
						$content.="</td></tr>";
					}
					$content.="</table><br><br>";
				}
				$content.="<a href='index.php?mod=accsettings&submod=stories&story=".$lowestpossid."'>Add new Story</a>";
			} else {
				$story = SQLQuery("SELECT story_de,story_us,story_active FROM story WHERE story_id=".$_GET['story'],"accounts");
				if (count($story) == 1 ) {
					$content.="<form name='form1' method='post' action='index.php?mod=accsettings&submod=stories&storyid=".$_GET['story']."&update=story'><b>Story ID ".$_GET['story']."</b><br><br>";
					$content.="German:<br><textarea rows='10' cols='55' name='storyde'>".$story[0]['story_de']."</textarea><br><br>";
					$content.="English:<br><textarea rows='10' cols='55' name='storyus'>".$story[0]['story_us']."</textarea><br><br>";
					$content.="Story active&nbsp;<input type='checkbox' name='storyactive' value='storyactive'".( $story[0][story_active]=='t' ? " checked" : "")."><br><br>";
					$content.="<input type='submit' name='submit' value='save changings'></form>";
				} else {
					$content.="<form name='form1' method='post' action='index.php?mod=accsettings&submod=stories&storyid=".$_GET['story']."&update=addstory'><b>Story ID ".$_GET['story']."</b><br><br>";
					$content.="German:<br><textarea rows='10' cols='55' name='storyde'></textarea><br><br>";
					$content.="English:<br><textarea rows='10' cols='55' name='storyus'></textarea><br><br>";
					$content.="Story active&nbsp;<input type='checkbox' name='storyactive' value='storyactive'><br><br>";
					$content.="<input type='submit' name='submit' value='add story'></form>";
				}
			}
		break;
		default:
			$content = "Account System Controls";
		break;
	}
?>