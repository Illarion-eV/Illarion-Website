<?php
define('IN_ACCOUNT_SERVICE', true);

require __DIR__ . '../../vendor/autoload.php';
require __DIR__ . '/authenticate.php';

use Illarion\Services\Account;

$app = new Slim\Slim([
    'templates.path' => __DIR__ . '/templates'
]);

/* Create a new session (aka login) */
$app->post('/session', function() use ($app) {
    $username = $app->request->post('user');
    $password = $app->request->post('password');

    if (is_null($username) || is_null($password)) {
        // username and password are not set
        $app->halt(400, "Username and password are missing");
    }

    $result = Account\login($username, $password);
    switch ($result) {
        case Account\LOGIN_RESULT_NO_DB_CONN:
            $app->halt(503, 'Database connection failed.');
            break;
        case Account\LOGIN_RESULT_INVALID_CREDENTIALS:
            $app->halt(401, 'Username or password is wrong.');
            break;
        default:
            $app->response()->setStatus(200);
            $app->response()->headers->set('Content-Type', 'application/json');
            $app->response()->setBody(json_encode(['sessionId' => $result]));
            break;
    }
});

function authenticate(\Slim\Route $route) {
    $app = \Slim\Slim::getInstance();
    $sessionId = $route->getParam('sessionId');
    $result = Account\authenticate($sessionId);
    switch ($result) {
        case Account\AUTH_RESULT_NO_DB_CONN:
            $app->halt(503, 'Database connection failed.');
            break;
        case Account\AUTH_RESULT_INVALID_SESSION:
            $app->halt(401, 'Session is invalid');
            break;
        default:
            $env = $app->environment();
            $env['illarion.accountId'] = $result;
            break;
    }
}

/* Terminate a session */
$app->delete('/session/:sessionId', 'authenticate', function($sessionId) use ($app) {
    if (Account\logout($sessionId)) {
        $app->response()->setStatus(200);
    } else {
        $app->response()->setStatus(500);
    }
})->conditions(['sessionId' => '[a-f0-9]{32}']);

/* Get the character list */
$app->get('/characters/:sessionId', 'authenticate', function() use ($app) {
    $app->response()->setStatus(200);
    $env = $app->environment();
    $accountId = intval($env['illarion.accountId']);
    $app->view()->set('account', $accountId);
    $app->response()->headers->set('Content-Type', 'application/json');
    $app->render('characterList.php');
})->conditions(['sessionId' => '[a-f0-9]{32}']);

$app->run();