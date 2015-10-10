<?php
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

use Illarion\Services\Account;

$app = \Slim\Slim::getInstance();

$app->post('/account', function() use ($app) {
    // TODO: To be continued
});

/* Get the character list of the specified account. */
$app->get('/account/characters/:sessionId', Account\getAuthMiddleware(), function() use ($app) {
    $app->response()->setStatus(200);
    $env = $app->environment();
    $accountId = intval($env['illarion.accountId']);
    $app->view()->set('account', $accountId);
    $app->response()->headers->set('Content-Type', 'application/json');
    $app->render('characterList.php');
})->conditions(Account\SESSION_ID_CONDITION);

/* Get the capabilities of the account. As in the things the account system is allowed to do. */
$app->get('/account/caps/:sessionId', Account\getAuthMiddleware(), function() use ($app) {
    $app->response()->setStatus(200);
    $env = $app->environment();
    $accountId = intval($env['illarion.accountId']);
    $app->view()->set('account', $accountId);
    $app->response()->headers->set('Content-Type', 'application/json');
    $app->render('capabilities.php');
})->conditions(Account\SESSION_ID_CONDITION);