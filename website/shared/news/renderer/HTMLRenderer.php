<?php
namespace News\Renderer;
use News\NewsEntry;
use News\NewsEntryList;

/**
 * This renderer is used to render news entries to the HTML format.
 *
 * @package News\Renderer
 */
class HTMLRenderer extends BBCodeRenderer {
    /**
     * @var bool This flag selects of the HTML renderer is supposed to display advanced controls to view the controls
     *           for the news authors.
     */
    private $showAuthorView;

    /**
     * Create the HTML renderer and prepare all components to render the news as HTML files.
     *
     * @param bool $showAuthorView in case this flag is enabled the HTML news entries will contain the editor controls
     *                             and additional information for the editors.
     */
    public function __construct($showAuthorView = false) {
        parent::__construct();
        $this->showAuthorView = $showAuthorView;
    }

    /**
     * Check if the author view is enabled.
     *
     * @return bool true in case the author view is enabled
     */
    public function isShowAuthorView() {
        return $this->showAuthorView;
    }

    /**
     * Set if the author controls and information are supposed to be displayed in the rendered HTML components.
     *
     * @param bool $showAuthorView true in case the controls for authors should be displayed
     */
    public function setShowAuthorView($showAuthorView) {
        $this->showAuthorView = $showAuthorView;
    }

    /**
     * This functions renders the news entry to the HTML format depending on the settings applied to this renderer.
     *
     * @param NewsEntry $entry the entry that is supposed to be rendered
     * @param string $locale the locale string, this determines what language is used used to display the news
     * @return string the rendered result
     */
    public function renderEntry(NewsEntry $entry, $locale = 'en') {
        $german = ('de' == $locale);

        if (($german && !is_null($entry->getGerman())) || is_null($entry->getEnglish())) {
            $orgTitle = $entry->getGerman()->getTitle();
            $orgContent = $entry->getGerman()->getContent();
            $orgAuthor = $entry->getGerman()->getAuthor();
            $orgProofReader = $entry->getGerman()->getProofReader();
        } else {
            $orgTitle = $entry->getEnglish()->getTitle();
            $orgContent = $entry->getEnglish()->getContent();
            $orgAuthor = $entry->getEnglish()->getAuthor();
            $orgProofReader = $entry->getEnglish()->getProofReader();
        }
        if ($entry->isLegacy()) {
            $content = '<p class="hyphenate">' . preg_replace('/(\n\r)|(\r\n)|(\n|\r)/', '<br />', $orgContent) . '</p>';
        } else {
            $content = $this->bbcode->parse($orgContent);
        }
        $title = htmlspecialchars($orgTitle);
        $author = htmlspecialchars($orgAuthor->getName());
        $proofReader = (is_null($orgProofReader) ? null : htmlspecialchars($orgProofReader->getName()));

        $langTag = $german ? 'de' : 'us';

        if ($this->isShowAuthorView() && !$entry->isPublished()) {
            $pageURL = \Page::getURL();
            $editImage = \Page::getCurrentImageURL() . '/feder.png';
            $edit = <<<TEXT
<a href="{$pageURL}/general/{$langTag}_edit_news.php?targetid={$entry->getId()}" style="float:right;">
    <img src="$editImage" style="height:22px;width:18px;" alt="edit" />
</a>
TEXT;
        } else {
            $edit = '';
        }

        $writtenBy = ($german ? 'geschrieben von' : 'written by') . " <b>$author</b>";
        $authorInfo = '';
        if ($this->isShowAuthorView()) {
            if (!is_null($proofReader)) {
                $proofReadBy = ', ' . ($german ? 'geprüft von' : 'checked by') . " <b>$proofReader</b>";
            } else {
                $proofReadBy = '';
            }
            if (is_null($entry->getGerman())) {
                $authorInfo .= ($german ? 'Deutsch: fehlt - ' : 'German: missing - ');
            } elseif (!$entry->getGerman()->isProofReadingDone()) {
                $authorInfo .= ($german ? 'Deutsch: ungeprüft - ' : 'German: not checked - ');
            }
            if (is_null($entry->getEnglish())) {
                $authorInfo .= ($german ? 'Englisch: fehlt - ' : 'English: missing - ');
            } elseif (!$entry->getEnglish()->isProofReadingDone()) {
                $authorInfo .= ($german ? 'Englisch: ungeprüft - ' : 'English: not checked - ');
            }
            if (!$entry->isPublished()) {
                $authorInfo .= ($german? 'Nicht veröffentlicht - ' : 'Not published - ');
                $publishText = ($german? ', letzte Änderung am ' : ', last change on ');
            } else {
                $publishText = ($german? ', veröffentlicht am ' : ', published on ');
            }
            if (strlen($authorInfo) > 0) {
                $authorInfo = '<b>' . substr($authorInfo, 0, strlen($authorInfo) - 3) . '</b><br />';
            }
        } else {
            $proofReadBy = '';
            $publishText = ($german ? ' am ' : ' on ');
        }
        $publishDateTime = $entry->getPublicationDate();
        $publishDateTime->setTimezone(new \DatetimeZone(date_default_timezone_get()));
        $publishTime = $publishText . strftime(($german ? '%d. %B %Y um %H:%MUhr' : '%d. %B %Y %I:%M&nbsp;%P'), \IllaDateTime::TimestampWithOffset($publishDateTime->getTimestamp()));

        $result = <<<TEXT
<div>
    <a id="news_{$entry->getId()}"></a>
    <h2>
        $edit $title
    </h2>
    $content
    <div class="right">{$authorInfo}{$writtenBy}{$proofReadBy}{$publishTime}</div>
</div>
TEXT;
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
            $result .= \Page::go_to_top_link();
        }
        return $result;
    }
}