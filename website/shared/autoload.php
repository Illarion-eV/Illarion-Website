<?php
if (!defined('AUTOLOAD_PREPARED')):
	define('AUTOLOAD_PREPARED', 1);
/**
 * This file implements the function for auto loading the shared classes. Also it includes all other autoloading classes.
 */

require __DIR__ . '/libs/autoload.php';
require __DIR__ . '/news/autoload.php';

/**
 * Autoload the shared classes of the page.
 *
 * @param string $class the class name
 */
function shared_autoload($class) {
	switch ($class) {
		case 'includeWrapper': require __DIR__ . '/include_wrapper.php'; break;
		case 'Page': require __DIR__ . '/page.php'; break;
		case 'Database': require __DIR__ . '/database.php'; break;
		case 'IllaDateTime': require __DIR__ . '/datetime.php'; break;
		case 'IllaUser': require __DIR__ . '/user.php'; break;
		case 'XmlC': require __DIR__ . '/xmlC.php'; break;
		case 'News': require __DIR__ . '/news.php'; break;
		case 'IllarionData': require __DIR__ . '/illarion_data.php'; break;
		case 'JSBuilder': require __DIR__ . '/jsbuilder.php'; break;
		case 'Messages': require __DIR__ . '/messages.php'; break;
		case 'msg': require __DIR__ . '/messages.php'; break;
	}
}

spl_autoload_register('shared_autoload');

endif;