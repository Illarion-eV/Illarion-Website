<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class AccountGetCharsResponse
{
    /**
     * The ID of the server this information applies to.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The human readable name of this server.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The list of characters of this account on this server.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\AccountGetCharResponse>")
     * @JMS\SerializedName("list")
     * @JMS\Since("1.0")
     */
    private $list = array();

    /**
     * @return array
     */
    public function getCharList()
    {
        return $this->list;
    }

    /**
     * @param AccountGetCharResponse $char
     */
    public function addChar(AccountGetCharResponse $char)
    {
        $this->list[] = $char;
    }

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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}