<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	Page::setXML('application/xml');
	Page::Init();
	
	if (!isset($_POST['name']) || !isset($_POST['passwd'])) {
		echo '<error id="0">Missing Login data</error>';
		exit;
	}
	
	$name = urldecode($_POST['name']);
	$pass = crypt(stripslashes(urldecode($_POST['passwd'])), '$1$illarion1');




/* MOEP
	$mySQL = &Database::getMySQL();
	$query = 'SELECT `id`'
	.PHP_EOL.'FROM `homepage_user`'
	.PHP_EOL.' WHERE `username` = ' . $mySQL->Quote($name)
	.PHP_EOL.' AND `passwd` = ' . $mySQL->Quote($pass)
	;
	$mySQL->setQuery($query);
	$id = $mySQL->loadResult();
	
	if (is_null($id)) {
		echo '<error id="1">Account not found</error>';
        exit;
	}
*/
	$illarionserver = &Database::getPostgreSQL('illarionserver');
	$testserver = &Database::getPostgreSQL('testserver');
	$accounts = &Database::getPostgreSQL('accounts');

	$query = 'SELECT "acc_id"'
    .PHP_EOL.' FROM "account"'
    .PHP_EOL.' WHERE "acc_login" = '. $accounts->Quote($name)
    .PHP_EOL.' AND "acc_passwd" = ' . $accounts->Quote($pass)
	;
    $accounts->setQuery($query);
	$id = $accounts->loadResult();

    if (is_null($id)) {
        echo '<error id="1">Account not found</error>';
        exit;
    }

	$query = 'SELECT "chr_name", "chr_status", "chr_lastsavetime"'
	.PHP_EOL.'FROM "chars"'
	.PHP_EOL.'WHERE "chr_accid" = ' . $illarionserver->Quote($id)
	.PHP_EOL.'ORDER BY "chr_lastsavetime" DESC'
	;
	$illarionserver->setQuery($query);
	$testserver->setQuery($query);
	
	$rs_chars = $illarionserver->loadAssocList();
	$ts_chars = $testserver->loadAssocList();
	
	$query = 'SELECT "acc_lang"'
	.PHP_EOL.' FROM "account"'
	.PHP_EOL.' WHERE "acc_id" = '.$accounts->Quote($id);
	$accounts->setQuery($query);
	
	echo '<chars player="',$id,'" lang="',($accounts->loadResult() == 0 ? 'de' : 'us'),'">';
	if (!is_null($rs_chars)) {
	   foreach($rs_chars as $key=>$char) {
	       echo '<char server="illarionserver" status="',$char['chr_status'],'" lastLogin="',$char['chr_lastsavetime'],'">',$char['chr_name'],'</char>';	
	   }
	}
    if (!is_null($ts_chars)) {
       foreach($ts_chars as $key=>$char) {
           echo '<char server="testserver" status="',$char['chr_status'], '" lastLogin="',$char['chr_lastsavetime'], '">',$char['chr_name'],'</char>';	
       }
    }
    echo '</chars>';
?>
