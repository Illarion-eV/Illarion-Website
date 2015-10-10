<?php
if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

use Illarion\Services\Account;

$app = \Slim\Slim::getInstance();

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

/* Terminate a session */
$app->delete('/session/:sessionId', Account\getAuthMiddleware(), function($sessionId) use ($app) {
    if (Account\logout($sessionId)) {
        $app->response()->setStatus(200);
    } else {
        $app->response()->setStatus(500);
    }
})->conditions(Account\SESSION_ID_CONDITION);