<?php
$servers = array(array('port' => 3008, 'name' => 'Illarion'), array('port' => 3012, 'name' => 'Development'));
header('Content-Type:application/json');
echo json_encode($servers);
?>
