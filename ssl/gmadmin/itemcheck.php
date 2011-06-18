<html>
<body>


<?
include("toolset.inc");


$item=$_GET[itemid];

if ($item=="") {$item=1;}

$itemname=sqlquery("SELECT * FROM itemname WHERE itn_itemid = ".$item,"illarionserver");

echo "LOOKUP FOR ITEM <b> ".$itemname[0][itn_german]."</b> / <b>".$itemname[0][itn_english]."</b> WITH <b>ID = $item</b><br><br><br>";



$charids=sqlquery("SELECT DISTINCT pit_playerid FROM playeritems WHERE playeritems.pit_itemid = 100","illarionserver");
echo "<table width=500 border=1><tr><th width='125'>Char Name</th><th width='125'>Account</th><th width='250'>Account Mail</th></tr>";
foreach($charids as $key=>$charid) {
	$playerinfo=sqlquery("SELECT chr_name,chr_accid FROM chars WHERE chr_playerid=".$charid[pit_playerid],"illarionserver");
	$accountinfo=sqlquery("SELECT acc_login,acc_email FROM account WHERE acc_id=".$playerinfo[0][chr_accid],"accounts");
	echo "<tr><td>".$playerinfo[0][chr_name]."</td><td>".$accountinfo[0][acc_login]."</td><td>".$accountinfo[0][acc_email]."</td></tr>";
}
echo "</table>";
?>
