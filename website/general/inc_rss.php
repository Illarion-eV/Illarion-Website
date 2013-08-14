<?php

if (!defined('IN_RSS_FEED')) {
    exit('Access to illegal file.');
}

$newsDb = new \News\NewsDatabase(false);
$news_list = $newsDb->getNewsList(15, 0);

$newestNewsEntry = $news_list->getEntry(0);
$publishDateTime = $newestNewsEntry->getPublicationDate();
$publishDateTime->setTimezone(new \DateTimeZone(date_default_timezone_get()));

$time = (is_null($newestNewsEntry) ? time() : $publishDateTime->getTimestamp());

$etag = md5($time);

header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $time) . ' GMT');
header('ETag: ' . $etag );

$if_last_mod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : 0;
$if_not_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? $_SERVER['HTTP_IF_NONE_MATCH'] : 0;

if ( $if_last_mod >= $time && $if_not_match == $etag )
{
    header('HTTP/1.0 304 Not Modified');
    exit;
}

$newsRenderer = new \News\Renderer\RSS20Renderer();