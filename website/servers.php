<?php
include_once ( $_SERVER['DOCUMENT_ROOT'] . "/shared/database.php" );

$pgSQL =& Database::getPostgreSQL();
$query = "SELECT port, name FROM servers.servers ORDER BY port";
$pgSQL->setQuery($query);
$result = $pgSQL->loadAssocList();

$servers = array();

foreach ($result as $key => $value) {
    $servers[] = array('port' => $value['port'], 'name' => $value['name']);
}

header('Content-Type:application/json');
echo json_encode($servers);
?>
