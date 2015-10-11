<?php
/** This is the view used to generate the character list output */
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

$name = $this->get('testName');

$result = [];

if ($name == 'guest') {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Der Name ist reserviert.',
            'en' => 'This name is reserved.'
        ]
    ];
    goto end;
}

$nameLength = strlen($name);

if ($nameLength < 5) {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Der Name ist zu kurz. Mindestens 5 Zeichen sind notwendig.',
            'en' => 'The name is too short. At least 5 characters are required.'
        ]
    ];
    goto end;
}

if ($nameLength > 32) {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Der Name ist zu lang. Mehr als 32 Zeichen sind nicht erlaubt.',
            'en' => 'The name is too long. More than 32 characters are not allowed.'
        ]
    ];
    goto end;
}

preg_match('/[A-Za-z0-9-_]+/', $name, $check);
if ($check[0] != $name) {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Der Name enthält ungültige Zeichen. Nur Buchstaben, Zahlen und Unterstriche sind erlaubt.',
            'en' => 'The name contains invalid characters. Only letters, numbers and underscores are permitted.'
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
WHERE acc_name = $1
SQL;

$result = pg_query_params($connection, $sql, [$name]);
if ($result == false) {
    throw new \RuntimeException("Database connection is not working", 500);
}

if (pg_num_rows($result) == 0) {
    $result = [
        'ok' => true,
        'description' => [
            'de' => 'Der Name ist in Ordnung.',
            'en' => 'The name is okay.'
        ]
    ];
    goto end;
} else {
    $result = [
        'ok' => false,
        'description' => [
            'de' => 'Dieser Name wird schon benutzt.',
            'en' => 'This name is already in use.'
        ]
    ];
    goto end;
}

end:
echo json_encode($result);
