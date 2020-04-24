<?php
/** This is the language independent access file for the news. */
include ( $_SERVER['DOCUMENT_ROOT'] . '/shared/shared.php' );

$query = '';
if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) {
    $query = '?' . $_SERVER['QUERY_STRING'];
}
if (preg_match('/de/', $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '')) {
    Page::redirect(Page::getUrlToFile(__DIR__ . '/de_quests.php') . $query);
} else {
    Page::redirect(Page::getUrlToFile(__DIR__ . '/us_quests.php') . $query);
}