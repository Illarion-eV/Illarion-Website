<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AccountGetResponse
 * @package Illarion\AccountSystemBundle\Model
 */
class AccountGetResponse
{
    /**
     * The login name of this account.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The state of this account.
     *
     * 3: active
     * 8: banned
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("state")
     * @JMS\Since("1.0")
     */
    private $state;

    /**
     * The maximal amount of characters the account is allowed to have. This number only applies to characters on the
     * main server (illarionserver).
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("maxChars")
     * @JMS\Since("1.0")
     */
    private $maxChars;

    /**
     * The language this account is set to. (de/en)
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("lang")
     * @JMS\Since("1.0")
     */
    private $lang;

    /**
     * The characters that are assigned to this account.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\AccountGetCharsResponse>")
     * @JMS\SerializedName("chars")
     * @JMS\Since("1.0")
     */
    private $chars;

    /**
     * The information for the creation of this characters for this account.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\AccountGetCreateResponse>")
     * @JMS\SerializedName("create")
     * @JMS\Since("1.0")
     */
    private $create;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getMaxChars()
    {
        return $this->maxChars;
    }

    /**
     * @param int $maxChars
     */
    public function setMaxChars($maxChars)
    {
        $this->maxChars = $maxChars;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return array
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * @param array $chars
     */
    public function setChars($chars)
    {
        $this->chars = $chars;
    }

    /**
     * @param AccountGetCharsResponse $chars
     */
    public function addChars(AccountGetCharsResponse $chars)
    {
        $this->chars[] = $chars;
    }

    /**
     * @return array
     */
    public function getCreate()
    {
        return $this->create;
    }

    /**
     * @param array $create
     */
    public function setCreate($create)
    {
        $this->create = $create;
    }

    /**
     * @param AccountGetCreateResponse $create
     */
    public function addCreate(AccountGetCreateResponse $create)
    {
        $this->create[] = $create;
    }
}