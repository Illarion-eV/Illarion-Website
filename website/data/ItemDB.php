<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
    header("Content-Type: text/plain");

	$devserver = &Database::getPostgreSQL('devserver');

	$query = 'SELECT "itm_id", "itm_weight", "itn_german", "itn_english"'
    .PHP_EOL.' FROM items, itemname'
    .PHP_EOL.' WHERE "itm_id" = "itn_itemid"'
    .PHP_EOL.' ORDER BY "itm_id"'
	;
    $devserver->setQuery($query);
	$common = $devserver->loadAssocList();

    echo '/NOP/',PHP_EOL;
	if (!is_null($common)) {
	   foreach($common as $key=>$item) {
	       echo $key,',0,1,',$item['itm_id'],',0,3,0,',$item['itm_weight'],',0,0,0,"","',$item['itn_german'],'","',$item['itn_english'],'",0,',PHP_EOL;
	   }
	}
?>
