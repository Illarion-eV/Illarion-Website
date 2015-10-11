<?php
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

use Illarion\Services\Account;

$app = \Slim\Slim::getInstance();

$app->post('/account/check/name', function() use ($app) {
    $testedName = $app->request->post('name');

    $app->response()->setStatus(200);
    $app->view()->set('testName', $testedName);
    $app->response()->headers->set('Content-Type', 'application/json');
    $app->render('testAccountName.php');
});

$app->post('/account/check/email', function() use ($app) {
    $testedMail = $app->request->post('email');

    $app->response()->setStatus(200);
    $app->view()->set('testMail', $testedMail);
    $app->response()->headers->set('Content-Type', 'application/json');
    $app->render('testAccountMail.php');
});

/* Register a new account */
$app->put('/account', function() use ($app) {
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