<?php
	include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
	
	//Page::setXML('application/xml');
	Page::Init();
	
	if (!isset($_POST['character']) || !isset($_POST['password']) || !isset($_POST['questid']) || !isset($_POST['queststatus'])) {
		echo 'E_MISS';
		exit;
	}
	
	$char = urldecode($_POST['character']);
	$pass = crypt(stripslashes(urldecode($_POST['password'])), '$1$illarion1');
    $quest = $_POST['questid'];
    $status = $_POST['queststatus'];

	$db = &Database::getPostgreSQL('testserver');

	$query = 'SELECT "chr_accid", "chr_playerid"'
    .PHP_EOL.' FROM "chars"'
    .PHP_EOL.' WHERE "chr_name" = '. $accounts->Quote($char)
	;
    $db->setQuery($query);
	$ids = $db->loadAssocRow();

    if (is_null($ids)) {
        echo 'E_CHAR';
        exit;
    }

	$query = 'SELECT "acc_id"'
	.PHP_EOL.' FROM "account"'
	.PHP_EOL.' WHERE "acc_id" = ' . db->Quote($ids['chr_accid'])
	.PHP_EOL.' AND "acc_passwd" = ' . db->Quote($pass)
	;
	$db->setQuery($query);
	
	$login = $db->loadResult();
	
    if (is_null($login)) {
        echo 'E_LOGIN';
        exit;
    }

	$query = 'SELECT "qpg_progress"'
	.PHP_EOL.' FROM "questprogress"'
	.PHP_EOL.' WHERE "qpg_userid" = '.$db->Quote($ids['chr_playerid']);
    .PHP_EOL.' AND "qpg_questid" = '.$db->Quote($quest);
	$db->setQuery($query);

    $exists = $db->loadResult();

    if (is_null($exists)) {
        $query = 'INSERT INTO "questprogress" ("qpg_userid", "qpg_questid", "qpg_progress")'
        .PHP_EOL.' VALUES ('.$db->Quote($ids['chr_playerid']).', '.$db->Quote($quest).', '.$db->Quote($status).')';
    } else {
        $query = 'UPDATE "questprogress"'
        .PHP_EOL.' SET "qpg_progress" = ' . $db->Quote($status)
        .PHP_EOL.' WHERE "qpg_userid" = '.$db->Quote($ids['chr_playerid']);
        .PHP_EOL.' AND "qpg_questid" = '.$db->Quote($quest);
    }
    $db->setQuery($query);
    $db->query();

    echo 'SUCCESS';
?>
