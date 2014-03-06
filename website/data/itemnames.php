<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	$devserver = &Database::getPostgreSQL('devserver');

	$query = 'SELECT "itn_itemid", "itn_german", "itn_english"'
    .PHP_EOL.' FROM itemname'
    .PHP_EOL.' ORDER BY "itn_itemid"'
	;
    $devserver->setQuery($query);
	$common = $devserver->loadAssocList();

	if (!is_null($common)) {
	   foreach($common as $key=>$item) {
	       echo $item['itn_itemid'],',"',$item['itn_german'],'","',$item['itn_english'],'"',PHP_EOL;
	   }
	}
?>
