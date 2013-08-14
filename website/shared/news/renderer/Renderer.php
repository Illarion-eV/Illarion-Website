<?php
namespace News\Renderer;

use News\NewsEntry;
use News\NewsEntryList;

/**
 * This is the renderer interface that defines the common function each renderer has to provide.
 *
 * @package News\Renderer
 */
interface Renderer {
    /**
     * This functions renders the news entry to the target format depending on the settings applied to this renderer.
     *
     * @param NewsEntry $entry the entry that is supposed to be rendered
     * @param string $locale the locale string, this determines what language is used used to display the news
     * @return string the rendered result
     */
    function renderEntry(NewsEntry $entry, $locale = 'en');

    /**
     * Render a list of news entries.
     *
     * @param NewsEntryList $list the news entries
     * @param string $locale the locale string, this determines what language is used used to display the news
     * @return string the rendered result
     */
    function renderList(NewsEntryList $list, $locale = 'en');
}