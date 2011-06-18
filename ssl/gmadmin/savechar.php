<?
  if (!isset($_POST[charid])) {
?>
<form name="form1" method="post" action="">
  <p>Charid: 
    <input name="charid" type="text" id="charid">
  </p>
  <p>
    <input type="submit" name="Submit" value="Create Inserts">
</p>
</form>
<?
  } else {
    include ("toolset.inc");
	$char=SQLQuery("SELECT * FROM chars WHERE chr_playerid=".$_POST[charid],"illarionserver");
	$player=SQLQuery("SELECT * FROM player WHERE ply_playerid=".$_POST[charid],"illarionserver");
	$playeritmes=SQLQuery("SELECT * FROM playeritems WHERE pit_playerid=".$_POST[charid],"illarionserver");
	$playerskills=SQLQuery("SELECT * FROM playerskills WHERE psk_playerid=".$_POST[charid],"illarionserver");
	echo "INSERT INTO chars VALUES (";
	foreach($char[0] as $key=>$charvals) {
		if ($charvals==NULL) {
			echo "NULL,";
		} else {
			echo $charvals.",";
		}
	}
	echo ");<br>";
	foreach($player as $key=>$playervals) {
		echo "INSERT INTO player VALUES (";
		foreach($playervals as $key2=>$playervals2) {
			if ($playervals2==NULL) {
				echo "NULL,";
			} else {
				echo $playervals2.",";
			}
		}
		echo ");<br>";
	}
	foreach($playeritmes as $key=>$playervals) {
		echo "INSERT INTO playeritems VALUES (";
		foreach($playervals as $key2=>$playervals2) {
			if ($playervals2==NULL) {
				echo "NULL,";
			} else {
				echo $playervals2.",";
			}
		}
		echo ");<br>";
	}
	foreach($playerskills as $key=>$playervals) {
		echo "INSERT INTO playerskills VALUES (";
		foreach($playervals as $key2=>$playervals2) {
			if ($playervals2==NULL) {
				echo "NULL,";
			} else {
				echo $playervals2.",";
			}
		}
		echo ");<br>";
	}
  }
?>