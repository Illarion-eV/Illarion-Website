<?php
namespace News\Renderer;
use News\NewsEntry;
use News\NewsEntryList;

/**
 * This renderer is dedicated to render the news entries into a format used by the launcher.
 *
 * @package News\Renderer
 */
class LauncherRenderer implements Renderer {
    /**
     * This functions renders the news entry to the XML format for the launcher.
     *
     * @param NewsEntry $entry the entry that is supposed to be rendered
     * @param string $locale the locale string that is unused by this renderer.
     */
    public function renderEntry(NewsEntry $entry, $locale = 'en') {
        if (!$entry->isPublished()) {
            throw new \InvalidArgumentException('The launcher renderer does not process unpublished news.');
        }
		
        $titleDe = htmlspecialchars($entry->getGerman()->getTitle());
        $titleEn = htmlspecialchars($entry->getEnglish()->getTitle());

        $publishDateTime = $entry->getPublicationDate();
        $publishDateTime->setTimezone(new \DateTimeZone('GMT'));
        $publishDate = $publishDateTime->format(DATE_RSS);

        $newsLink = \Page::getURL() . "/general/news.php?news={$entry->getId()}#news_{$entry->getId()}";

        $result = <<<XML
<item>
    <title lang="de">$titleDe</title>
    <title lang="en">$titleEn</title>
    <link>$newsLink</link>
	<pubDate>$publishDate</pubDate>
</item>
XML;
        return $result;
    }

    /**
     * Render a list of news entries.
     *
     * @param NewsEntryList $list the news entries
     * @param string $locale the locale string, this determines what language is used used to display the news
     * @return string the rendered result
     */
    public function renderList(NewsEntryList $list, $locale = 'en') {
        $result = '';
        foreach ($list as $entry) {
            $result .= $this->renderEntry($entry, $locale);
            $result .= PHP_EOL;
        }
        return $result;
    }
}