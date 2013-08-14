<?php
namespace News;

/**
 * This class provides the access the the news entries in the database.
 *
 * @package News
 */
class NewsDatabase {
    /**
     * @var int The amount of news entries in the database. This value is -1 until the value is received from the
     *          database.
     */
    private $amount = -1;

    /**
     * @var bool In case this value is set to TRUE the database also uses the news entries that are not published yet.
     */
    private $loadNotPublished;

    /**
     * @param bool $loadNotPublished in case this is set to true, news entries that are not published yet will be
     *                               considered as well
     */
    public function __construct($loadNotPublished = false) {
        $this->loadNotPublished = $loadNotPublished;
    }

    /**
     * Get the amount of news entries in total.
     *
     * @return int the amount of news entries
     */
    public function getAmount() {
        if ($this->amount == -1) {
            if ($this->loadNotPublished) {
                $query = <<<SQL
SELECT COUNT(*)
FROM homepage.news
SQL;

            } else {
                $query = <<<SQL
SELECT COUNT(*)
FROM homepage.news
WHERE news_published = true
SQL;
            }

            $db = &\Database::getPostgreSQL();
            $db->setQuery($query);
            $this->amount = (int) $db->loadResult();
        }
        return $this->amount;
    }

    /**
     * Get the list index of the news entry in the ordered list of news.
     *
     * The resulting value is the amount of news published later then the selected one plus one.
     *
     * @param int $id the Id of the news entry
     * @return int the list index
     */
    public function getListIndexOfNewsEntry($id) {
        $pgSQL = &\Database::getPostgreSQL();
        $query = <<<SQL
SELECT news_published_at
FROM homepage.news
WHERE news_id = {$pgSQL->Quote($id)}
SQL;

        $pgSQL->setQuery($query, 0, 1);
        $published_at = $pgSQL->loadResult();

        if ($this->loadNotPublished) {
            $query = <<<SQL
SELECT COUNT(*)
FROM homepage.news
WHERE news_published_at >= {$pgSQL->Quote($published_at)}
SQL;
        } else {
            $query = <<<SQL
SELECT COUNT(*)
FROM homepage.news
WHERE news_published = true AND news_published_at >= {$pgSQL->Quote($published_at)}
SQL;
        }

        $pgSQL->setQuery($query, 0, 1);
        return (int) $pgSQL->loadResult();
    }

    /**
     * This function loads a single news entry from the database.
     *
     * @param int $id the ID of the requested news entry
     * @return NewsEntry the news entry that is received from the database
     */
    public function getEntry($id) {
        $pgSQL = &\Database::getPostgreSQL();
        $query = <<<SQL
SELECT news_id, news_published_at, news_title_de, news_title_us, news_content_de, news_content_us, news_published, news_legacy,
  news_author_de_id, account_author_de.acc_login AS news_author_de_login, account_author_de.acc_name AS news_author_de_name,
  news_author_us_id, account_author_us.acc_login AS news_author_us_login, account_author_us.acc_name AS news_author_us_name,
  news_proof_reader_de_id, account_proof_reader_de.acc_login AS news_proof_reader_de_login, account_proof_reader_de.acc_name AS news_proof_reader_de_name,
  news_proof_reader_us_id, account_proof_reader_us.acc_login AS news_proof_reader_us_login, account_proof_reader_us.acc_name AS news_proof_reader_us_name
FROM homepage.news
LEFT JOIN accounts.account AS account_author_de ON news_author_de_id = account_author_de.acc_id
LEFT JOIN accounts.account AS account_author_us ON news_author_us_id = account_author_us.acc_id
LEFT JOIN accounts.account AS account_proof_reader_de ON news_proof_reader_de_id = account_proof_reader_de.acc_id
LEFT JOIN accounts.account AS account_proof_reader_us ON news_proof_reader_us_id = account_proof_reader_us.acc_id
WHERE news_id = {$pgSQL->Quote($id)}
SQL;
        $pgSQL->setQuery($query, 0, 1);

        return NewsDatabase::createNewsEntry($pgSQL->loadAssocRow());
    }

    /**
     * Receive a list of news entries. The list is ordered by the date of publish in descending order.
     *
     * @param int $amount the amount of news entries
     * @param int $offset the amount of news entries skipped at the start of the list
     * @return NewsEntryList
     */
    public function getNewsList($amount = 5, $offset = 0) {
        $pgSQL = &\Database::getPostgreSQL();

        if ($this->loadNotPublished) {
            $query = <<<SQL
SELECT news_id, news_published_at, news_title_de, news_title_us, news_content_de, news_content_us, news_published, news_legacy,
  news_author_de_id, account_author_de.acc_login AS news_author_de_login, account_author_de.acc_name AS news_author_de_name,
  news_author_us_id, account_author_us.acc_login AS news_author_us_login, account_author_us.acc_name AS news_author_us_name,
  news_proof_reader_de_id, account_proof_reader_de.acc_login AS news_proof_reader_de_login, account_proof_reader_de.acc_name AS news_proof_reader_de_name,
  news_proof_reader_us_id, account_proof_reader_us.acc_login AS news_proof_reader_us_login, account_proof_reader_us.acc_name AS news_proof_reader_us_name
FROM homepage.news
LEFT JOIN accounts.account AS account_author_de ON news_author_de_id = account_author_de.acc_id
LEFT JOIN accounts.account AS account_author_us ON news_author_us_id = account_author_us.acc_id
LEFT JOIN accounts.account AS account_proof_reader_de ON news_proof_reader_de_id = account_proof_reader_de.acc_id
LEFT JOIN accounts.account AS account_proof_reader_us ON news_proof_reader_us_id = account_proof_reader_us.acc_id
ORDER BY news_published_at DESC
SQL;
        } else {
            $query = <<<SQL
SELECT news_id, news_published_at, news_title_de, news_title_us, news_content_de, news_content_us, news_published, news_legacy,
  news_author_de_id, account_author_de.acc_login AS news_author_de_login, account_author_de.acc_name AS news_author_de_name,
  news_author_us_id, account_author_us.acc_login AS news_author_us_login, account_author_us.acc_name AS news_author_us_name,
  news_proof_reader_de_id, account_proof_reader_de.acc_login AS news_proof_reader_de_login, account_proof_reader_de.acc_name AS news_proof_reader_de_name,
  news_proof_reader_us_id, account_proof_reader_us.acc_login AS news_proof_reader_us_login, account_proof_reader_us.acc_name AS news_proof_reader_us_name
FROM homepage.news
LEFT JOIN accounts.account AS account_author_de ON news_author_de_id = account_author_de.acc_id
LEFT JOIN accounts.account AS account_author_us ON news_author_us_id = account_author_us.acc_id
LEFT JOIN accounts.account AS account_proof_reader_de ON news_proof_reader_de_id = account_proof_reader_de.acc_id
LEFT JOIN accounts.account AS account_proof_reader_us ON news_proof_reader_us_id = account_proof_reader_us.acc_id
WHERE news_published = true
ORDER BY news_published_at DESC
SQL;
        }


        $pgSQL->setQuery($query, $offset, $amount);
        $result = $pgSQL->loadAssocList();

        $resultList = new NewsEntryList();
        foreach ($result as $newsArray) {
            $entry = NewsDatabase::createNewsEntry($newsArray);
            if (!is_null($entry)) {
                $resultList->addEntry($entry);
            }
        }
        return $resultList;
    }

    /**
     * This function converts the content of the database and creates a NewsEntry object from it.
     *
     * @param array $dbEntry the array that stores the database content
     * @return NewsEntry the resulting news entry
     */
    private static function createNewsEntry(array $dbEntry) {
        if (is_null($dbEntry)) {
            return null;
        }

        $germanEntry = null;
        if (!NewsDatabase::isNull($dbEntry['news_title_de']) || !NewsDatabase::isNull($dbEntry['news_content_de'])) {
            $author = null;
            $proofReader = null;
            if (!NewsDatabase::isNull($dbEntry['news_author_de_id'])) {
                $author = new NewsAuthor($dbEntry['news_author_de_id'], $dbEntry['news_author_de_login'], $dbEntry['news_author_de_name']);
            }
            if (!NewsDatabase::isNull($dbEntry['news_proof_reader_de_id'])) {
                $proofReader = new NewsAuthor($dbEntry['news_proof_reader_de_id'], $dbEntry['news_proof_reader_de_login'], $dbEntry['news_proof_reader_de_name']);
            }
            $germanEntry = new NewsLanguageEntry($dbEntry['news_title_de'], $dbEntry['news_content_de'], $author, $proofReader, !is_null($proofReader));   
        }
        $englishEntry = null;
        if (!NewsDatabase::isNull($dbEntry['news_title_us']) || !is_null($dbEntry['news_content_us'])) {
            $author = null;
            $proofReausr = null;
            if (!NewsDatabase::isNull($dbEntry['news_author_us_id'])) {
                $author = new NewsAuthor($dbEntry['news_author_us_id'], $dbEntry['news_author_us_login'], $dbEntry['news_author_us_name']);
            }
            if (!NewsDatabase::isNull($dbEntry['news_proof_reader_us_id'])) {
                $proofReausr = new NewsAuthor($dbEntry['news_proof_reausr_us_id'], $dbEntry['news_proof_reausr_us_login'], $dbEntry['news_proof_reausr_us_name']);
            }
            $englishEntry = new NewsLanguageEntry($dbEntry['news_title_us'], $dbEntry['news_content_us'], $author, $proofReausr, !is_null($proofReausr));
        }
        return new NewsEntry($dbEntry['news_id'], new \DateTime($dbEntry['news_published_at'], new \DateTimeZone('GMT')), $germanEntry, $englishEntry, $dbEntry['news_published'] === 't', $dbEntry['news_legacy'] === 't');
    }

    public static function isNull($value) {
        return is_null($value) || $value === 'NULL' || $value === 'null';
    }

    /**
     * Remote a news entry from the database.
     *
     * @param int $id the ID of the entry
     * @return bool true in case the entry got deleted
     */
    public function deleteEntry($id) {
        $pgSQL = &\Database::getPostgreSQL();
        $query = <<<SQL
DELETE FROM homepage.news
WHERE news_id = $id
SQL;
        $pgSQL->setQuery($query);
        $pgSQL->query();
        return ($pgSQL->getAffectedRows() > 0);
    }

    /**
     * Save a news entry to the database.
     *
     * @param NewsEntry $entry the entry to save
     * @return bool true in case the entry was saved
     */
    public function saveEntry(NewsEntry $entry) {
        $pgSQL = &\Database::getPostgreSQL();
        $id = ($entry->getId() != NewsEntry::UNKNOWN_ID ? $pgSQL->Quote($entry->getId()) : 'DEFAULT');

        $publishedDateTime = $entry->getPublicationDate();
        $publishedDateTime->setTimezone(new \DateTimeZone('GMT'));
        $published_at = $pgSQL->Quote($publishedDateTime->format('Y-m-d H:i:s'));
        if (is_null($entry->getGerman())) {
            $titleDe = 'NULL';
            $contentDe = 'NULL';
            $authorDe = 'NULL';
            $proofReaderDe = 'NULL';
        } else {
            $germanEntry = $entry->getGerman();
            $titleDe = $pgSQL->Quote($germanEntry->getTitle());
            $contentDe = $pgSQL->Quote($germanEntry->getContent());
            $authorDe = (is_null($germanEntry->getAuthor()) ? 'NULL' : $pgSQL->Quote($germanEntry->getAuthor()->getId()));
            $proofReaderDe = (is_null($germanEntry->getProofReader()) ? 'NULL' : $pgSQL->Quote($germanEntry->getProofReader()->getId()));
        }
        if (is_null($entry->getEnglish())) {
            $titleEn = 'NULL';
            $contentEn = 'NULL';
            $authorEn = 'NULL';
            $proofReaderEn = 'NULL';
        } else {
            $englishEntry = $entry->getEnglish();
            $titleEn = $pgSQL->Quote($englishEntry->getTitle());
            $contentEn = $pgSQL->Quote($englishEntry->getContent());
            $authorEn = (is_null($englishEntry->getAuthor()) ? 'NULL' : $pgSQL->Quote($englishEntry->getAuthor()->getId()));
            $proofReaderEn = (is_null($englishEntry->getProofReader()) ? 'NULL' : $pgSQL->Quote($englishEntry->getProofReader()->getId()));
        }
        $published = $pgSQL->Quote($entry->isPublished());
        $legacy = $pgSQL->Quote($entry->isLegacy());

        $pgSQL->Begin();

        if ($entry->getId() != NewsEntry::UNKNOWN_ID) {
            $this->deleteEntry($entry->getId());
        }

        $query = <<<SQL
INSERT INTO homepage.news (news_id, news_published_at, news_title_de, news_title_us, news_content_de, news_content_us,
                           news_author_de_id, news_author_us_id, news_proof_reader_de_id, news_proof_reader_us_id,
                           news_published, news_legacy)
VALUES ($id, $published_at, $titleDe, $titleEn, $contentDe, $contentEn, $authorDe, $authorEn, $proofReaderDe, $proofReaderEn, $published, $legacy)
SQL;
        $pgSQL->setQuery($query);
        $pgSQL->query();

        $publishingWorked = ($pgSQL->getAffectedRows() > 0);

        $pgSQL->Commit();

        return $publishingWorked;
    }
}