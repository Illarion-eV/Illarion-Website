<?php
define('IN_ACCOUNT_SERVICE', true);

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/authenticate.php';

use Illarion\Services\Account;

$app = new Slim\Slim([
    'templates.path' => __DIR__ . '/templates'
]);

require __DIR__ . '/account.php';
require __DIR__ . '/session.php';

$app->run();