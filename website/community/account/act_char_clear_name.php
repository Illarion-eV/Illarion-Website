<?php
include $_SERVER['DOCUMENT_ROOT'].'/shared/shared.php';
IllaUser::requireLogin();
includeWrapper::includeOnce( Page::getRootPath().'/community/account/inc_char_details.php' );

$server = '';
switch ($_POST['server']) {
    case '1':
        $server = 'devserver';
        break;
    case '2':
        $server = 'testserver';
        break;
    default:
        $server = 'illarionserver';
}

if (!is_numeric($_POST['charid']))
{
    exit();
}

//	$pgSQL =& Database::getPostgreSQL( $server );
$pgSQL =& Database::getPostgreSQL();

$charid = ( isset( $_POST['charid'] ) && is_numeric($_POST['charid']) ? (int)$_POST['charid'] : 0 );

if (!$charid)
{
    exit();
}

switch ($_POST['clear'])
{
    case 'known_names':
    case 'introduce':
    case 'all':
        break;
    default:
        exit();
}

if (!($chardata = loadCharacterData($charid, $server)))
{
    exit();
}

$rememberingChars = array();
if ($_POST['clear'] == 'known_names' || $_POST['clear'] == 'all')
{
    $query = 'SELECT chr_name'
    .PHP_EOL.' FROM '.$server.'.onlineplayer'
    .PHP_EOL.' INNER JOIN '.$server.'.chars ON on_playerid = chr_playerid'
    .PHP_EOL.' INNER JOIN '.$server.'.naming ON on_playerid = name_player'
    .PHP_EOL.' WHERE on_playerid = '.$pgSQL->Quote($charid);
    $pgSQL->setQuery( $query );
    $rememberingChars += $pgSQL->loadResultArray();

    $query = 'DELETE FROM '.$server.'.naming'
    .PHP_EOL.' WHERE name_named_player = '.$pgSQL->Quote($charid);
    $pgSQL->setQuery( $query );
    $pgSQL->query();
}

if ($_POST['clear'] == 'introduce' || $_POST['clear'] == 'all')
{
    $query = 'SELECT chr_name'
    .PHP_EOL.' FROM '.$server.'.onlineplayer'
    .PHP_EOL.' INNER JOIN '.$server.'.chars ON on_playerid = chr_playerid'
    .PHP_EOL.' INNER JOIN '.$server.'.introduction ON on_playerid = intro_known_player'
    .PHP_EOL.' WHERE on_playerid = '.$pgSQL->Quote($charid);
    $pgSQL->setQuery( $query );
    $rememberingChars += $pgSQL->loadResultArray();

    $query = 'DELETE FROM '.$server.'.introduction'
    .PHP_EOL.' WHERE intro_known_player = '.$pgSQL->Quote($charid);
    $pgSQL->setQuery( $query );
    $pgSQL->query();
}

$rememberingChars = array_unique($rememberingChars, SORT_STRING);

$baseMessage = '';
switch ($_POST['clear'])
{
    case 'known_names':
        $baseMessage = (Page::isGerman()?'Die Benennungen des Charakters wurden gelöscht.':'The namings of your character are deleted.');
        break;
    case 'introduce':
        $baseMessage = (Page::isGerman()?'Alle Vorstellungen deines Charakters wurden gelöscht.':'All introductions your character did are deleted.');
        break;
    case 'all':
        $baseMessage = (Page::isGerman()?'Alle Benennungen und Vorstellungen deines Charakters wurden gelöscht.':'All introductions your character did are deleted and the namings of your character are deleted.');
        break;
}

foreach ($rememberingChars as $char)
{
    $baseMessage .= PHP_EOL . $char . (Page::isGerman()?' behält die Benennung weil er/sie aktuell eingeloggt ist.':' keeps the naming information, because he/she is currently logged in.');
}

if (strlen($baseMessage) > 0)
{
    Messages::add($baseMessage, 'info' );
}
