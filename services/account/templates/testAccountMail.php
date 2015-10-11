<?php
/** This is the view used to generate the character list output */
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

$mail = $this->get('testMail');

$result = [];

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Diese E-Mail Adresse scheint nicht gültig zu sein..',
            'en' => 'This e-mail address does not seem to be valid.'
        ]
    ];
    goto end;
}

$connection = pg_connect('dbname=\'illarion\' user=\'homepage\' password=\'\'');
if ($connection === false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

$sql = <<<SQL
SELECT DISTINCT 1
FROM accounts.account
WHERE acc_email = $1
SQL;

$result = pg_query_params($connection, $sql, [$mail]);
if ($result == false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

if (pg_num_rows($result) == 0) {
    $result = [
        'ok' => true,
        'description' => [
            'de' => 'Die E-Mail Adresse ist in Ordnung.',
            'en' => 'The e-mail address is okay.'
        ]
    ];
    goto end;
} else {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Die E-Mail Adresse ist schon in Benutzung.',
            'en' => 'This e-mail address is already in use.'
        ]
    ];
    goto end;
}

end:
echo json_encode($result);
