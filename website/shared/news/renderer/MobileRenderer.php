<?php
namespace News\Renderer;
use News\NewsEntry;
use News\NewsEntryList;

/**
 * This renderer is used to render news entries to the mobile format.
 *
 * @package News\Renderer
 */
class MobileRenderer extends BBCodeRenderer {

	private $collapsible;
	private $firstCollapsible = true;
	
    /**
     * Create the mobile renderer and prepare all components to render the news as mobile items.
     */
    public function __construct($collapsible=false) {
        parent::__construct();
        $this->bbcode->setParagraphHandlingParameters ("\n\n", '<p>', '</p>');
		$this->collapsible=$collapsible;
    }

    /**
     * This functions renders the news entry to the HTML format depending on the settings applied to this renderer.
     *
     * @param NewsEntry $entry the entry that is supposed to be rendered
     * @param string $locale the locale string, this determines what language is used used to display the news
     * @return string the rendered result
     */
    public function renderEntry(NewsEntry $entry, $locale = 'en') {
        if (!$entry->isPublished()) {
            throw new \InvalidArgumentException('The mobile renderer can\'t render not published posts.');
        }

        if ('de' === $locale) {
            $orgTitle = $entry->getGerman()->getTitle();
            $orgContent = $entry->getGerman()->getContent();
            $orgAuthor = $entry->getGerman()->getAuthor()->getName();
            $langTag = 'de_';
        } elseif ('en' === $locale) {
            $orgTitle = $entry->getEnglish()->getTitle();
            $orgContent = $entry->getEnglish()->getContent();
            $orgAuthor = $entry->getEnglish()->getAuthor()->getName();
            $langTag = 'us_';
        } else {
            $orgTitle = $entry->getEnglish()->getTitle() . ' - ' . $entry->getGerman()->getTitle();
            $orgContent = $entry->getEnglish()->getContent() . PHP_EOL.PHP_EOL . ' ---- ' . PHP_EOL.PHP_EOL . $entry->getGerman()->getContent();
            $orgAuthor = $entry->getEnglish()->getAuthor()->getName() . ', ' . $entry->getGerman()->getAuthor()->getName();
            $langTag = '';
        }
        if ($entry->isLegacy()) {
            $content = '<p>' . preg_replace('/(\n\r)|(\r\n)|(\n|\r)/', '<br />', $orgContent) . '</p>';
        } else {
            $content = $this->bbcode->parse($orgContent);
        }
        $title = htmlspecialchars($orgTitle);
        $author = htmlspecialchars($orgAuthor);

        $publishDateTime = $entry->getPublicationDate();
        $publishDateTime->setTimezone(new \DateTimeZone('GMT'));
        $publishDate = $publishDateTime->format('j.n.Y H:i');
		if ('de' === $locale) {
			$publishAuthor = $publishDate . ' von ' . $author;
        } else {
			$publishAuthor = $publishDate . ' by ' . $author;
        }

        $newsLink = \Page::getURL() . "/general/{$langTag}news.php?news={$entry->getId()}#news_{$entry->getId()}";

		if ($this->collapsible)
		{
			$dataCollapsed = (!$this->firstCollapsible ? "true" : "false");
			$this->firstCollapsible = false;
			$result = <<<Text
<div data-role="collapsible" data-collapsed="$dataCollapsed" class="news-collapsible">
<h4>$title</h4>
<div data-role="content" class="news-collapsible-text">
$content
<p>$publishAuthor</p>
</div>
</div>
Text;
		} else {
        $result = <<<Text
<h3><b>$title</b></h3>
$content
<p>$publishAuthor</p>
Text;
		}
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
		$this->firstCollapsible = true;
        foreach ($list as $entry) {
            $result .= $this->renderEntry($entry, $locale);
            $result .= PHP_EOL;
        }
        return $result;
    }
}