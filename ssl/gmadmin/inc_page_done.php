<?

				$pages=sqlquery("SELECT * FROM gmpager WHERE pager_status=2 ORDER BY pager_time DESC LIMIT 30","illarionserver");
				if ($pages<>"") {
					$content="<table width='100%'>";
					foreach ($pages as $key=>$page) {
						$user=sqlquery("SELECT * FROM chars WHERE chr_playerid=".$page[pager_user],"illarionserver");
						$content=$content."<tr><td width='100' valign='top'><a href='index.php?mod=charview&playerid=$page[pager_user]&servertype=illarionserver'>".$user[0][chr_name]."</a></td>
								<td width='100' valign='top'><a href='index.php?mod=pager&submod=showpage&ptime=$page[pager_time]&puser=$page[pager_user]'>".substr($page[pager_time],0,19)."</a></td>
								<td valign='top'>$page[pager_text]</tr>";
						$content=$content."<tr height='5'><td width='100'></td><td></td></tr>";
					}
				}
				$content=$content."</table>";	

?>