<?php

if (!defined('SHARED_INCLUDED')):
	if (isset($_GET['XDEBUG_TRACE'])) {
		ini_set('xdebug.show_mem_delta', 1);
		xdebug_start_trace(null);
	}
	define('SHARED_INCLUDED', 1);
	if (isset($_GET['XDEBUG_PROFILE'])) {
		define('NO_DEBUG', 1);
	}

	require $_SERVER['DOCUMENT_ROOT'] . '/shared/autoload.php';
	require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/def_common.php';

	date_default_timezone_set('Europe/Berlin');

	Page::Boot();

	if (!defined('NO_DEBUG') && !IllaUser::auth('errors')) {
		define('NO_DEBUG', 1);
	}
	// Legacy
	function include_header() {
		call_legacy();
		return null;
	}
	function include_footer() {
		call_legacy();
		return null;
	}
	function include_short_footer() {
		call_legacy();
		return null;
	}
	function insert_go_to_top_link() {
		call_legacy();
		return Page::insert_go_to_top_link();
	}
	function go_to_top_link() {
		call_legacy();
		return Page::go_to_top_link();
	}
	function cap($org_cap, $return = false) {
		call_legacy();
		return Page::cap($org_cap, $return);
	}
	function create_XMLheader() {
		call_legacy();
		Page::setXML();
		Page::init();
	}
	function create_header($title, $description, $keywords, $additional_links = "", $additional_css = "", $additional_js = "", $xhtml = false) {
		call_legacy();
		Page::setTitle($title);
		Page::setDescription($description);
		Page::setKeywords($keywords);
		Page::setCSS($additional_css);
		Page::setJavaScript($additional_js);
		if ($xhtml) {
			Page::setXHTML();
		}else {
			Page::setHTML();
		}
		Page::Init();
		return null;
	}
	function navBarTop($back_url, $table_of_contents_url, $forward_url) {
		call_legacy();
		Page::setFirstPage($table_of_contents_url);
		Page::setPrevPage($back_url);
		Page::setNextPage($forward_url);
		Page::NavBarTop();
	}
	function navBarBottom($back_url, $forward_url) {
		call_legacy();
		Page::setPrevPage($back_url);
		Page::setNextPage($forward_url);
		Page::NavBarBottom();
	}
	$url = Page::getURL();
	$language = Page::getLanguage();
	$month_names = array('Elos', 'Tanos', 'Zhas', 'Ushos', 'Siros', 'Ronas', 'Bras', 'Eldas', 'Irmas', 'Malas', 'Findos', 'Olos', 'Adras', 'Naras', 'Chos', 'Mas');
	function timestamp_with_offset($timestamp = false) {
		call_legacy();
		return IllaDateTime::TimestampWithOffset($timestamp);
	}
	function timestamp_without_offset($timestamp = false) {
		call_legacy();
		return IllaDateTime::TimestampWithoutOffset($timestamp);
	}
	function illa_time($time = false, $revert = false) {
		call_legacy();
		if ($revert) {
			return IllaDateTime::IllaTimeToRLTime($time);
		}else {
			return IllaDateTime::RLTimeToIllaTime($time);
		}
	}
	function illa_mktime($hour = 0, $minute = 0, $second = 0, $month = 1, $day = 1, $year = 0) {
		call_legacy();
		return IllaDateTime::mkIllaTimestamp($hour, $minute, $second, $month, $day, $year);
	}
	function illa_mkdate($month = 0, $day = 0, $year = 0) {
		call_legacy();
		return IllaDateTime::mkIllaDatestamp($month, $day, $year);
	}
	function illa_datestamp_to_date($datestamp) {
		call_legacy();
		return IllaDateTime::IllaDatestampToDate($datestamp);
	}
	function illa_date($format = '', $time = false) {
		call_legacy();
		return IllaDateTime::IllaTimestampToTime($format, $time);
	}
	function getRacePicture($raceid, $sex, $detailed = false) {
		call_legacy();
		return IllarionData::getRacePicture($raceid, $sex, $detailed);
	}
	function getItemPicture($id, $detailed = false) {
		call_legacy();
		return IllarionData::getItemPicture($id, $detailed);
	}
	function getRaceName($raceid) {
		call_legacy();
		return IllarionData::getRaceName($raceid);
	}
	function getSexName($sex) {
		call_legacy();
		return IllarionData::getSexName($sex);
	}
	function getCharacterStatusName($status) {
		call_legacy();
		return IllarionData::getCharacterStatusName($status);
	}
	function getAccountStatusName($status) {
		call_legacy();
		return IllarionData::getAccountStatusName($status);
	}

	function call_legacy() {
		$backtrace = debug_backtrace();
		trigger_error('Call of outdated legacy function "' . $backtrace[1]['function'] . '"', E_USER_WARNING);
	}
	endif;

	?>