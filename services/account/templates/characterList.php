<?php
/** This is the view used to generate the character list output */
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

$accountId = $this->get('account');

$connection = pg_connect('dbname=\'illarion\' user=\'homepage\' password=\'\'');
if ($connection === false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

$sql = <<<SQL
SELECT chr_name, chr_status, chr_lastsavetime, 'illarionserver' AS chr_server
FROM illarionserver.chars
WHERE chr_accid = $1
UNION ALL
SELECT chr_name, chr_status, chr_lastsavetime, 'testserver' AS chr_server
FROM testserver.chars
WHERE chr_accid = $1
UNION ALL
SELECT chr_name, chr_status, chr_lastsavetime, 'devserver' AS chr_server
FROM devserver.chars
WHERE chr_accid = $1
SQL;

$result = pg_query_params($connection, $sql, [$accountId]);
if ($result == false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

$illarionserver = [];
$testserver = [];
$devserver = [];

while (($charData = pg_fetch_row($result)) !== false) {
    $resultData = ['name' => $charData[0], 'status' => $charData[1], 'lastsave' => $charData[2]];
    switch ($charData[3]) {
        case 'illarionserver':
            $illarionserver[] = $resultData;
            break;
        case 'testserver':
            $testserver[] = $resultData;
            break;
        case 'devserver':
            $devserver[] = $resultData;
            break;
    }
}

$finalArray = [];
if (!empty($illarionserver)) {
    $finalArray['illarionserver'] = $illarionserver;
}
if (!empty($testserver)) {
    $finalArray['testserver'] = $testserver;
}
if (!empty($devserver)) {
    $finalArray['devserver'] = $devserver;
}

echo json_encode($finalArray);