<?php
namespace News;

/**
 * This class defines a news author. These authors can be used as real authors or as proof readers.
 *
 * @package News
 */
class NewsAuthor {
    /**
     * @var int the ID of the user in the database
     */
    private $id;

    /**
     * @var string the login name of the user
     */
    private $userName;

    /**
     * @var string|null the chose display name of the user
     */
    private $displayName;

    /**
     * This constructor is used to set the information about this user.
     *
     * @param $id int the ID of the user
     * @param $userName string the login name of the user
     * @param $displayName string|null the display name of the user
     */
    public function __construct($id, $userName, $displayName) {
        $this->id = $id;
        $this->userName = $userName;
        $this->displayName = $displayName;
    }

    /**
     * Get the ID of the user in the database.
     *
     * @return int the ID
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get the login name of the author.
     *
     * @return string the login name
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * Get the selected display name of the author.
     *
     * @return string|null the display name or null in case none was selected
     */
    public function getDisplayName() {
        return $this->displayName;
    }

    /**
     * Get the preferred name of the author.
     *
     * This function returns the display name in case one is set. In any other case the login name is returned.
     *
     * @return string the name of the author
     */
    public function getName() {
        if (!isset($this->displayName) || is_null($this->displayName) || (!strlen(trim($this->displayName)))) {
            return $this->userName;
        } else {
            return $this->displayName;
        }
    }
}