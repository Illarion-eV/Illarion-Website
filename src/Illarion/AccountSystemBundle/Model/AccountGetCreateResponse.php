<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class AccountGetCreateResponse
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
     * The route that is used to create a new character on this server.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("route")
     * @JMS\Since("1.0")
     */
    private $route;

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param string $route
     */
    public function setRoute($route)
    {
        if (($pos = stripos($route, '.php/')) !== false)
            $this->route = substr($route, $pos + 4);
        else
            $this->route = $route;
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