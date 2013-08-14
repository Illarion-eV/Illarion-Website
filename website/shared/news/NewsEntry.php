<?php
namespace News;

/**
 * This class defines a single news entry with all its values. Its used as data storage.
 *
 * @package News
 */
class NewsEntry {
    /**
     * This is the constant for a unknown ID.
     */
    const UNKNOWN_ID = -1;

    /**
     * @var int The ID of the news entry in the database
     */
    private $id;

    /**
     * @var \DateTime the date this news entry was released or in case its not published yet, it stores the last change
     *               date
     */
    private $publicationDate;

    /**
     * @var NewsLanguageEntry|null the German part of the news entry or null in case the German version was not yet
     *                             created
     */
    private $german;

    /**
     * @var NewsLanguageEntry|null the English part of the news entry or null in case the English version was not yet
     *                             created
     */
    private $english;

    /**
     * @var bool true in case this news entry was already published
     */
    private $published;

    /**
     * @var bool true in case this news entry is a old style legacy news entry
     */
    private $legacy;

    /**
     * Create a new news entry.
     *
     * @param $id int the ID of the news entry
     * @param \DateTime $publicationDate the time when the news entry was published or the time of the last change
     * @param NewsLanguageEntry|null $german the German part of the news entry
     * @param NewsLanguageEntry|null $english the English part of the news entry
     * @param $published bool the published flag
     * @param $legacy bool true in case the post is a old legacy post
     * @throws \InvalidArgumentException in case the published flag is true but the language depending components are
     *                                   not ready for publishing
     */
    public function __construct($id, \DateTime $publicationDate, NewsLanguageEntry $german = null,
                                  NewsLanguageEntry $english = null, $published, $legacy) {
        if ($published) {
            if (is_null($german)) {
                throw new \InvalidArgumentException('A published news entry without German part is illegal.');
            } elseif (!$german->isProofReadingDone()) {
                throw new \InvalidArgumentException('A published news entry without proof read German part is illegal');
            }
            if (is_null($english)) {
                throw new \InvalidArgumentException('A published news entry without English part is illegal.');
            } elseif (!$english->isProofReadingDone()) {
                throw new \InvalidArgumentException('A published news entry without proof read English part is illegal');
            }
        }
        $this->id = $id;
        $this->publicationDate = $publicationDate;
        $this->german = $german;
        $this->english = $english;
        $this->published = $published;
        $this->legacy = $legacy;
    }

    /**
     * Get the ID of the news entry.
     *
     * This ID is used in the database to store the entry. Also its the reference to this news entry for permanently
     * valid links.
     *
     * @return int the ID
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the publication date of the news entry.
     *
     * This values stores the date and time of the publication of the news entry. In case the entry was not published
     * yet, the values stores the date and time of the last change done to this news entry.
     *
     * @return \DateTime the timestamp
     */
    public function getPublicationDate() {
        return $this->publicationDate;
    }

    /**
     * Get the German version of this news entry.
     *
     * @return NewsLanguageEntry|null the German news entry
     */
    public function getGerman() {
        return $this->german;
    }

    /**
     * Get the English version of this news entry.
     *
     * @return NewsLanguageEntry|null the English news entry
     */
    public function getEnglish() {
        return $this->english;
    }

    /**
     * Check if the news entry was published already.
     *
     * @return boolean true in case the news entry was published
     */
    public function isPublished() {
        return $this->published;
    }

    /**
     * Check if this news entry is a old legacy entry. These posts need to be rendered differently.
     *
     * @return boolean true if its a old legacy post
     */
    public function isLegacy() {
        return $this->legacy;
    }

    /**
     * This function can be used to sort the news entries.
     *
     * @param NewsEntry $news1 the first news entry
     * @param NewsEntry $news2 the second news entry
     * @return int a value greater, smaller or equal zero respective if news1 is greater, smaller or equal to news2
     */
    public static function compare(NewsEntry $news1, NewsEntry $news2) {
        if ($news1->publicationDate > $news2->publicationDate) {
            return 1;
        } elseif ($news1->publicationDate < $news2->publicationDate) {
            return -1;
        } else {
            return 0;
        }
    }
}