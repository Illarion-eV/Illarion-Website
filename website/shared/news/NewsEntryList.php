<?php
namespace News;
use Traversable;

/**
 * This class is the storage for a list of news entries.
 *
 * @package News
 */
class NewsEntryList implements \IteratorAggregate {
    /**
     * @var array The list of news entries.
     */
    private $entryList;

    /**
     * Create a new list of entries.
     */
    public function __construct() {
        $this->entryList = array();
    }

    /**
     * Add a new entry to the end of the list.
     *
     * @param NewsEntry $entry the new entry
     */
    public function addEntry(NewsEntry $entry) {
        $this->entryList[] = $entry;
    }

    /**
     * Get the entry at the specified index
     *
     * @param int $index the index of the entry
     * @return NewsEntry|null the news entry at this slot or null in case the slot is not set
     */
    public function getEntry($index) {
        return $this->isValid($index) ? $this->entryList[$index] : null;
    }

    /**
     * Check if the index is valid and a entry is assigned to it.
     *
     * @param int $index the index to check
     * @return bool true in case a news entry is assigned to this index
     */
    public function isValid($index) {
        return isset($this->entryList[$index]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or <b>Traversable</b>
     */
    public function getIterator(): Traversable {
        return new NewsEntryListIterator($this);
    }
}

/**
 * This is the iterator used for the news entry list.
 *
 * @package News
 */
class NewsEntryListIterator implements \Iterator {
    /**
     * @var NewsEntryList
     */
    private $targetList;

    /**
     * @var int
     */
    private $currentIndex;

    /**
     * Create a new iterator.
     *
     * @param NewsEntryList $targetList the list instance this iterator receives its data from
     */
    public function __construct(NewsEntryList $targetList) {
        $this->targetList = $targetList;
        $this->currentIndex = 0;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current(): mixed {
        return $this->targetList->getEntry($this->currentIndex);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next(): void {
        ++$this->currentIndex;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key(): mixed {
        return $this->currentIndex;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated. Returns true on success or false
     *                 on failure.
     */
    public function valid(): bool {
        return $this->targetList->isValid($this->currentIndex);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind(): void {
        $this->currentIndex = 0;
    }
}