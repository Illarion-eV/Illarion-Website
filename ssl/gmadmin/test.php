<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Unbenanntes Dokument</title>
</head>

<body>
<?php
   $time = mktime(10,00,00,1,1,2007);
   $sql_ressource = SQLConnect("accounts");
   while($time < time()){
      $result = SQLQueryCon("SELECT count(\"acc_id\") as hits FROM \"public\".\"account\" WHERE \"acc_lastlogin\" LIKE '".date("Y-m-d",$time)."%' AND \"acc_state\" = '3'",$sql_ressource);
      echo $result[0][hits]."<br>";
      $time = $time + (60*60*24);
   } // while

function SQLQuery($query,$db) {
	    $conn=SQLConnect($db);
		$result=SQLQueryCon($query,$conn);
		SQLDisconnect($conn);
		return $result;
	}

	// connect to db and keep connection
	function SQLConnect($db) {
		$connection = pg_connect("host=localhost port=5432 dbname=$db user='gmtool' password='Necebpij2'")
			or die ("PostGreSQL Error --> " . pg_last_error($connection));
		return $connection;
	}

	// query using an existing connection
	function SQLQueryCon($query, $connection) {
		$result=pg_exec($query);
		if (!$result) die ("Die Datenbankabfrage ist gescheitert.<br />\n");
		if ($result<>"1") {
			while ($row = pg_fetch_assoc($result)) {
				$counter=$counter+1;
				$test=array($counter=>$row);
				$all = array_merge($all, $test);
			}
			pg_free_result($result);
		}
		return $all;
	}

	// close an existing connection
	function SQLDisconnect($connection) {
		pg_close($connection);
	}
?>
</body>
</html>
