<?php
if (!defined('AUTOLOAD_PREPARED')):
	define('AUTOLOAD_PREPARED', 1);
/**
* This file controls the auto load of all classes. All exsisting classes need to be
* registred in this autoload function so they are loaded upon need
*/
function __autoload($class_name) {
	switch ($class_name) {
		case 'includeWrapper': require $_SERVER['DOCUMENT_ROOT'] . '/shared/include_wrapper.php';
			break;
		case 'Page': require $_SERVER['DOCUMENT_ROOT'] . '/shared/page.php';
			break;
		case 'Database': require $_SERVER['DOCUMENT_ROOT'] . '/shared/database.php';
			break;
		case 'IllaDateTime': require $_SERVER['DOCUMENT_ROOT'] . '/shared/datetime.php';
			break;
		case 'IllaUser': require $_SERVER['DOCUMENT_ROOT'] . '/shared/user.php';
			break;
		case 'XmlC': require $_SERVER['DOCUMENT_ROOT'] . '/shared/xmlC.php';
			break;
		case 'News': require $_SERVER['DOCUMENT_ROOT'] . '/shared/news.php';
			break;
		case 'PHPMailer': require $_SERVER['DOCUMENT_ROOT'] . '/shared/email/class.phpmailer.php';
			break;
		case 'IllarionData': require $_SERVER['DOCUMENT_ROOT'] . '/shared/illarion_data.php';
			break;
		case 'JSBuilder': require $_SERVER['DOCUMENT_ROOT'] . '/shared/jsbuilder.php';
			break;
		case 'Messages': require $_SERVER['DOCUMENT_ROOT'] . '/shared/messages.php';
			break;
		case 'msg': require $_SERVER['DOCUMENT_ROOT'] . '/shared/messages.php';
			break; //LEGACY
		default: break;
	}
}

endif;

?>