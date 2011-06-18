<?
	include "toolset.inc";
	$query = SQLQuery("SELECT mob_monsterid, mob_name FROM monster ORDER BY mob_monsterid ASC","illarionserver");
	echo "<table><tr><td>monster id</td><td>monster name</td></tr>";
	foreach ($query as $key=>$monster) {
		echo "<tr><td>".$monster[mob_monsterid]."</td><td>".$monster[mob_name]."</td></tr>";
	}
	echo "</table>";
?>