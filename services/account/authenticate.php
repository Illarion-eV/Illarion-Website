<?php

namespace Illarion\Services\Account;
/*
 * This script provides some functions to authenticate with the Illarion homepage and generate
 * the required session data
 */

if (!defined('IN_ACCOUNT_SERVICE')) { exit(); }

const LOGIN_RESULT_NO_DB_CONN = -1;
const LOGIN_RESULT_INVALID_CREDENTIALS = -2;

/**
 * Perform a login for a specific user.
 *
 * @param string $username the username used for the login
 * @param string $password the password used for the login
 * @return int|string the error code or the session id
 */
function login($username, $password) {
    $connection = pg_connect('dbname=\'illarion\' user=\'homepage\' password=\'\'');
    if ($connection === false) {
        return LOGIN_RESULT_NO_DB_CONN;
    }

    $password = crypt($password, '$1$illarion1');

    $sql = <<<SQL
SELECT acc_id
FROM accounts.account
WHERE acc_login = $1 AND "acc_passwd" = $2;
SQL;
    $result = pg_query_params($connection, $sql, [$username, $password]);
    if ($result === false) {
        return LOGIN_RESULT_NO_DB_CONN;
    }

    $accId = pg_fetch_result($result, 0, 0);

    if ($accId === false) {
        return LOGIN_RESULT_INVALID_CREDENTIALS;
    }

    $sql = <<<SQL
SELECT COUNT(*)
FROM accounts.account_sessions
WHERE as_id = $1;
SQL;

    pg_prepare($connection, 'createSession', $sql);
    do {
        $key = md5(rand(0, 100000000) . microtime());
        $result = pg_execute($connection, 'createSession', [$key]);
        if ($result === false) {
            return LOGIN_RESULT_NO_DB_CONN;
        }
    } while (pg_fetch_result($result, 0, 0) > 0);

    $sql = <<<SQL
INSERT INTO accounts.account_sessions (as_id, as_account_id, as_ip) VALUES ($1, $2, $3);
SQL;
    pg_query_params($connection, $sql, [$key, $accId, $_SERVER['REMOTE_ADDR']]);

    return $key;
}

const AUTH_RESULT_NO_DB_CONN = -1;
const AUTH_RESULT_INVALID_SESSION = -2;

/**
 * Authenticate the current session using the provided session id
 *
 * @param string $sessionId the session id that should be authenticated
 * @return int a error code or the id of the account
 */
function authenticate($sessionId) {
    $connection = pg_connect('dbname=\'illarion\' user=\'homepage\' password=\'\'');
    if ($connection === false) {
        return AUTH_RESULT_NO_DB_CONN;
    }

    $sql = <<<SQL
SELECT as_account_id
FROM accounts.account_sessions
WHERE as_id = $1 AND as_ip = $2;
SQL;

    $result = pg_query_params($connection, $sql, [$sessionId, $_SERVER['REMOTE_ADDR']]);
    if ($result === false) {
        return AUTH_RESULT_NO_DB_CONN;
    }

    $accountId = pg_fetch_result($result, 0, 0);
    if ($accountId === false) {
        return AUTH_RESULT_INVALID_SESSION;
    }

    return intval($accountId);
}

/**
 * Terminate a specific session.
 *
 * @param string $sessionId the session that is supposed to be terminated
 * @return bool true in case the session was terminated
 */
function logout($sessionId) {
    $connection = pg_connect('dbname=\'illarion\' user=\'homepage\' password=\'\'');
    if ($connection === false) {
        return false;
    }

    $sql = <<<SQL
DELETE FROM accounts.account_sessions
WHERE (as_id = $1 AND as_ip = $2) OR (as_created < NOW() - INTERVAL '1 day');
SQL;

    $result = pg_query_params($connection, $sql, [$sessionId, $_SERVER['REMOTE_ADDR']]);
    if ($result === false) {
        return false;
    }
    return pg_affected_rows($result) > 0;
}


