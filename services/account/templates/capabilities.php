<?php
/** This is the view used to generate the character list output */
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

$accountId = $this->get('account');

$connection = pg_connect('dbname=\'illarion\' user=\'homepage\' password=\'\'');
if ($connection === false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

$sql = <<<SQL
SELECT acc_maxchars, acc_state, g_id IS NOT NULL AS acc_devserver_access,
       (SELECT COUNT(*) FROM illarionserver.chars WHERE chr_accid = acc_id) AS acc_chars
FROM accounts.account
  LEFT JOIN accounts.account_groups ON acc_id = ag_acc_id
  LEFT JOIN accounts.groups ON g_id = ag_group_id
WHERE acc_id = $1
      AND (g_id IS NULL
           OR (SELECT r_id
               FROM accounts.rights
               WHERE r_key_name = 'devserver')::text = ANY(regexp_split_to_array(g_rights, E',')))
SQL;

$result = pg_query_params($connection, $sql, [$accountId]);
if ($result == false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

$accountInfo = pg_fetch_row($result);
if ($accountInfo === false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

$resultArray = ['createChars' => ($accountInfo[0] > $accountInfo[3]),
                'accessDevserver' => boolval($accountInfo[2]),
                'state' => intval($accountInfo[1])];

echo json_encode($resultArray);