<?
		if (($_POST[submit]=="Accept")) {
			sqlquery("UPDATE chars SET chr_status=0,chr_statusreason='$reason' WHERE chr_name='$_POST[charname]'","illarionserver");
			GMLog("name_pos",$_SERVER['PHP_AUTH_USER'],$_POST[charname]);
			if ($_POST[acclang]=="0") {
				SendStatusMail($_POST[accmail],"Illarion: Charakter Name akzeptiert","Hallo ".$_POST[accname].",\r\ndu hast einen Charakter mit dem Namen  ".$_POST[charname]." ür das Rollenspiel Illarion erstellt. Es freut uns, dir mitteilen zu können, dass dieser Name regelkonform ist und akzeptiert wurde. Du kannst dich jetzt in deinen Account auf http://account.illarion.org/ einloggen und die Attribute des Charakters verteilen um mit deinem neuen Charakter sogleich spielen zu können.\r\n\r\nhttp://account.illarion.org\r\n\r\nMit Freundlichen Grüßen, Das Illarion Team www.illarion.org");
			} else {
				SendStatusMail($_POST[accmail],"Illarion: Char name accepted","Dear ".$_POST[accname].",\r\nyou have requested a character by the name ".$_POST[charname]." for the roleplaying game Illarion. We are happy to tell you that it fits our name rules and hereby is accepted. Feel free to log into your account to distribute his or her attributes so you can play Illarion with your new character.\r\n\r\nhttp://account.illarion.org\r\n\r\nYours, The Illarion Staff www.illarion.org");
			}
		} elseif (($_POST[submit]=="Reject") AND ($_POST[namecheckreason]<>"Enter reason here!") AND ($_POST[namecheckreason]<>"")) {
			$reason=substr(($_SERVER['PHP_AUTH_USER'].": ".$_POST[namecheckreason]),0,250);
			sqlquery("UPDATE chars SET chr_status=6,chr_statusreason='$reason' WHERE chr_name='$_POST[charname]'","illarionserver");
			GMLog("name_neg",$_SERVER['PHP_AUTH_USER'],$_POST[charname]);
			if ($_POST[acclang]=="0") {
				SendStatusMail($_POST[accmail],"Illarion: Charakter Name abgelehnt","Sie haben einen Charakter mit dem Namen ".$_POST[charname]." für das Rollenspiel Illarion angefordert. Leider müssen wir ihnen mitteilen das der Name nicht regelkonform ist. Aus folgenden Gründen:\r\n\r\n".$_POST[namecheckreason]."\r\n\r\nSie können die Namensregeln hier lesen:\r\n\r\nhttp://illarion.org/illarion/de_name_rules.php\r\n\r\nDiese Entscheidung ist entgültig. Aber sie können trotzdem den Charakter löschen und einen Charakter mit einem anderen Namen anfordern. Das geht im Account System:\r\n\r\nhttp://account.illarion.org\r\n\r\nMit Freundlichen Grüßen, Das Illarion Team www.illarion.org");
			} else {
				SendStatusMail($_POST[accmail],"Illarion: Char name rejected","You have requested a character by the name ".$_POST[charname]." for the roleplaying game Illarion. We are sorry to inform you that this name does not fit our name rules for the following reason:\r\n\r\n".$_POST[namecheckreason]."\r\n\r\nYou can read the name rules here:\r\n\r\nhttp://illarion.org/illarion/us_name_rules.php\r\n\r\nThis decision is final. However, you can delete this character and apply for a different name in the account system:\r\n\r\nhttp://account.illarion.org\r\n\r\nYours, The Illarion Staff www.illarion.org");
			}
		}
	$chars=sqlquery("SELECT * FROM chars WHERE chr_status=4 LIMIT 30","illarionserver");
		if (count($chars)>0) {
			$content=$content."<br><b>Remember: </b>A negative reason will be sent to the player via email. A positive reason is only stored in the DB for further reference.<br><br><b>".count($chars)." waiting</b><br><br><table>";
			foreach($chars as $key=>$chars_row) {
			   // $charsstory=sqlquery("SELECT cs_story FROM charstory WHERE cs_playerid=".$chars_row['chr_playerid'],"illarionserver");
				$racelimits=sqlquery("SELECT story_needed FROM raceattr WHERE id=".$chars_row['chr_race'],"accounts");
				$accvalues=sqlquery("SELECT acc_email,acc_lang,acc_login FROM account WHERE acc_id=".$chars_row[chr_accid],"accounts");
				if ($accvalues[0][acc_lang]=="0") {
					$language="(G)";
				} else {
					$language="(E)";
				}
				$content=$content."<form action='index.php?mod=accwork&submod=char' method='post'><tr><td colspan='3'>".$chars_row[chr_name]." (".VarCharRace2($chars_row[chr_race])." - ".VarCharSex2($chars_row[chr_sex]).") ".$language;
				$content=$content."</td></tr><tr><td rowspan='2' width='100'><textarea name='namecheckreason' rows='3' cols='20'>Enter reason here!</textarea></td>
													<td width='50'>
													  <input type='hidden' name='servertype' value='$_POST[servertype]'>
													  <input type='hidden' name='charname' value=\"$chars_row[chr_name]\">
													  <input type='hidden' name='accmail' value='".$accvalues[0][acc_email]."'>
													  <input type='hidden' name='acclang' value='".$accvalues[0][acc_lang]."'>
													  <input type='hidden' name='accname' value='".$accvalues[0][acc_login]."'>
													  <input type='submit' name='submit' value='Accept'>
													</td>
													<td rowspan='2'><div style='height:60px; width:200px; border: 1px solid black; overflow:auto; padding:5px;'>This does not work anymore!! Wait for the cool new GM Tool</div></td>
													</tr>
													<tr>
													<td width='50'>
													  <input type='submit' name='submit' value='Reject'>
													  </td></tr></form>";
			}
			$content=$content."</table>";
		} else { $content=$content."No waiting name checks found"; };
?>
