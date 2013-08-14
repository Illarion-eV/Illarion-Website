<?php
namespace News;

/**
 * This class contains the parts of a news entry that have to exist for every language.
 *
 * @package News
 */
class NewsLanguageEntry {
    /**
     * @var string the title of the news entry.
     */
    private $title;

    /**
     * @var string the content of the news entry.
     */
    private $content;

    /**
     * @var NewsAuthor the author of the news entry
     */
    private $author;

    /**
     * @var NewsAuthor|null the author who checked the entry
     */
    private $proofReader;

    /**
     * @var bool the flag if the proof reading is done or not
     */
    private $proofReadingDone;

    /**
     * Create a new language entry for the news entry.
     *
     * @param $title string the title of the news
     * @param $content string the content of the news entry
     * @param NewsAuthor $author the author of the news entry
     * @param NewsAuthor|null $proofReader the author who read the entry proof or null
     * @param $proofReadingDone bool true in case the proof reading is done
     * @throws \InvalidArgumentException in case the proof reader is set null but the proof reading is marked as done
     */
    public function __construct($title, $content, NewsAuthor $author, NewsAuthor $proofReader = null,
                                  $proofReadingDone) {
        if ($proofReadingDone && is_null($proofReader)) {
            throw new \InvalidArgumentException('Proof reading can\'t be done without a proof reader.');
        }
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->proofReader = $proofReader;
        $this->proofReadingDone = $proofReadingDone;
    }

    /**
     * Get the title of the news entry.
     *
     * @return string the title of the news entry
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get the content of the news entry.
     *
     * @return string the content of the news entry
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Get the author of the news entry.
     *
     * @return NewsAuthor the author
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * Get the user who checked the news entry.
     *
     * @return NewsAuthor|null the user who checked the entry or null in case the entry was not yet checked
     */
    public function getProofReader() {
        return $this->proofReader;
    }

    /**
     * Get if the proof reading of this news entry is already done.
     *
     * @return boolean true in case the proof reading is done
     */
    public function isProofReadingDone() {
        return $this->proofReadingDone;
    }
}