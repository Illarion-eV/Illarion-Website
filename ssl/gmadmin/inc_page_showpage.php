<?

	$pages=sqlquery("SELECT gmpager.oid,chars.chr_name,gmpager.pager_user,gmpager.pager_text,gmpager.pager_time,gmpager.pager_note,gmpager.pager_gm FROM gmpager JOIN chars ON gmpager.pager_user = chars.chr_playerid WHERE gmpager.oid = $_GET[pageid] ORDER BY pager_time DESC LIMIT 100","illarionserver");
	if ($pages[0][pager_gm]<>"") {
	    $gmuser=sqlquery("SELECT chars.chr_name,gms.gm_login FROM chars JOIN gms ON chars.chr_playerid = gms.gm_charid WHERE chars.chr_playerid=".$pages[0][pager_gm],"illarionserver");
		$showgmname="<tr><td>GM:</td><td>".$gmuser[0][chr_name]." (".$gmuser[0][gm_login].")</td></tr>";
	} else {
        $showgmname="<tr><td>GM:</td><td>none</td></tr>";
    }
	$content=$content."<table width='100%'>
						<tr><td width='100'>player</td><td>".$pages[0][chr_name]."</td></tr>
						<tr height='5'></td><td></td></tr>
						<tr><td>time</td><td>".substr($pages[0][pager_time],0,19)."</td></tr>
						<tr height='10'></td><td></td></tr>
						<tr><td>message</td><td>".$pages[0][pager_text]."</td></tr>
                        <tr height='10'></td><td></td></tr>".
						$showgmname."
						<tr height='10'></td><td></td></tr>
						<form method='post' action='index.php?mod=pager&pageid=$_GET[pageid]&action=update'>
						<tr><td>comment</td><td><textarea name='comment'rows='5' cols='30'>".$pages[0][pager_note]."</textarea></td></tr>
						<tr height='5'></td><td></td></tr>
						<tr><td>move to</td><td><select name='folder' size='1'>
							<option value=\"0\">new</option>
							<option value=\"1\">in work</option>
							<option value=\"2\">done</option>
							<option value=\"3\">archive</option>
						</select> <input type='submit' value='Set'></td></tr>
						<tr height='5'></td><td></td></tr>
						</form>
						<tr><td>&nbsp;</td></tr>
						<tr><td>delete call</td>
						<td><form method='post' action='index.php?mod=pager&pageid=$_GET[pageid]&action=delete'>
						<input type='submit' value='delete'>
						</form></td></tr>
						</table>";

?>