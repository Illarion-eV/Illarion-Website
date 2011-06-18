<?php
$last_mod = array();
$last_mod[] = filemtime($_SERVER['SCRIPT_FILENAME']);

$filenames = split(',', $_GET['file']);

foreach($filenames as $file) {
	if ($file != '') {
		$last_mod[] = filemtime('css/' . $file . '.css');
	}
}
rsort($last_mod);
$last_mod = $last_mod[0];
$if_last_mod = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : 0;
$if_not_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ? $_SERVER['HTTP_IF_NONE_MATCH'] : 0;
$etag = md5($last_mod);
header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $last_mod) . ' GMT');
header('ETag: ' . $etag);
if ($if_last_mod >= $last_mod && $if_not_match == $etag) {
	header('HTTP/1.0 304 Not Modified');
	exit;
}
header("HTTP/1.0 200 OK");
header('Content-type: text/css; charset: UTF-8');

$content = '';
$size = 0;
foreach($filenames as $file) {
	if ($file != '') {
		$size += filesize('css/' . $file . '.css');
		$content .= file_get_contents('css/' . $file . '.css');
	}
}

if (isset($_GET['inline_images'])) {
	$content = str_replace(array('pics/uebbg.jpg', 'pics/de_buttons.png', 'pics/us_buttons.png', 'pics/head_buttons.png', 'pics/footer_bar.jpg', 'pics/pergament.jpg', 'pics/navibar_back.jpg', 'pics/alodv.jpg', 'pics/alodh.jpg', 'pics/background.jpg', 'pics/de_navtitles.jpg', 'pics/us_navtitles.jpg', 'pics/background_message.png', 'pics/message.gif', 'pics/background_error.png', 'pics/error.gif', 'pics/background_notice.png', 'pics/notice.gif', 'pics/silver.gif', 'pics/ajax-loading-small-invert.gif', 'pics/nav_title_back.jpg'), '', $content);
}

header('Content-Length: ' . $size);
echo $content;

?>