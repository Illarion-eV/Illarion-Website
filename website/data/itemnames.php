<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	$devserver = &Database::getPostgreSQL('devserver');

	$query = 'SELECT "itm_id", "itm_name_german", "itm_name_english"'
    .PHP_EOL.' FROM items'
    .PHP_EOL.' ORDER BY "itm_id"'
	;
    $devserver->setQuery($query);
	$common = $devserver->loadAssocList();

	if (!is_null($common)) {
	   foreach($common as $key=>$item) {
	       echo $item['itm_id'],',"',$item['itm_name_german'],'","',$item['itm_name_english'],'"',PHP_EOL;
	   }
	}
?>
