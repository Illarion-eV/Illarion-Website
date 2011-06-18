<?php
date_default_timezone_set('Europe/Berlin');

$last_mod = array();
$last_mod[] = filemtime(__FILE__);

if (!isset($_GET['file'])) {
	exit();
}

$filenames = split(',', $_GET['file']);
if (isset($_GET['no_opti'])) {
	$filetype = '_uncompressed.js';
}else {
	$filetype = '.js';
}

foreach($filenames as $file) {
	if ($file != '') {
		$last_mod[] = filemtime('js/' . $file . $filetype);
	}
}
rsort($last_mod);
$last_mod = $last_mod[0];
$if_last_mod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : 0;
if ($if_last_mod >= $last_mod) {
	header('HTTP/1.0 304 Not Modified');
	exit;
}

$content = '';
foreach($filenames as $file) {
	if ($file != '') {
		$content .= file_get_contents('js/' . $file . $filetype);
	}
}
$if_not_match = (string)(isset($_SERVER['HTTP_IF_NONE_MATCH']) ? $_SERVER['HTTP_IF_NONE_MATCH'] : '0');
$etag = md5($content);
if ($etag == $if_not_match) {
	header('HTTP/1.0 304 Not Modified');
	exit;
}

header('HTTP/1.0 200 OK');
header('Last-Modified: ' . date('D, d M Y H:i:s', $last_mod) . ' GMT');
header('ETag: ' . $etag);
header('Content-type: text/javascript; charset: UTF-8');
header('Content-Length: ' . strlen($content));
echo $content;

?>