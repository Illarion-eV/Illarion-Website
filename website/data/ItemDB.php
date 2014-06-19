<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
    header("Content-Type: text/plain");

	$devserver = &Database::getPostgreSQL('devserver');

	$query = 'SELECT "itm_id", "itm_weight", "itm_name_german", "itm_name_english"'
    .PHP_EOL.' FROM items'
    .PHP_EOL.' ORDER BY "itm_id"'
	;
    $devserver->setQuery($query);
	$common = $devserver->loadAssocList();

    echo '/NOP/',PHP_EOL;
	if (!is_null($common)) {
	   foreach($common as $key=>$item) {
	       echo $key,',0,1,',$item['itm_id'],',0,3,0,',$item['itm_weight'],',0,0,0,"","',$item['itm_name_german'],'","',$item['itm_name_english'],'",0,',PHP_EOL;
	   }
	}
?>
