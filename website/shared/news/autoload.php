<?php
/**
 * This file implements the auto loading for the news classes.
 */

/**
 * Load the library files for the news automatically.
 *
 * @param string $class the class name
 */
function news_autoload($class) {
	switch ($class) {
        case 'News\\NewsAuthor': require __DIR__ . '/NewsAuthor.php'; break;
        case 'News\\NewsEntry': require __DIR__ . '/NewsEntry.php'; break;
        case 'News\\NewsLanguageEntry': require __DIR__ . '/NewsLanguageEntry.php'; break;
        case 'News\\NewsEntryList': require __DIR__ . '/NewsEntryList.php'; break;
        case 'News\\NewsDatabase': require __DIR__ . '/NewsDatabase.php'; break;
        case 'News\\Renderer\\Renderer': require __DIR__ . '/renderer/Renderer.php'; break;
        case 'News\\Renderer\\BBCodeRenderer': require __DIR__ . '/renderer/BBCodeRenderer.php'; break;
        case 'News\\Renderer\\HTMLRenderer': require __DIR__ . '/renderer/HTMLRenderer.php'; break;
        case 'News\\Renderer\\RSS20Renderer': require __DIR__ . '/renderer/RSS20Renderer.php'; break;
        case 'News\\Renderer\\MobileRenderer': require __DIR__ . '/renderer/MobileRenderer.php'; break;
        case 'News\\Renderer\\LauncherRenderer': require __DIR__ . '/renderer/LauncherRenderer.php'; break;
		default: break;
	}
}

spl_autoload_register('news_autoload');