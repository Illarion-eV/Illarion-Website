<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class RaceResponse
{
    /**
     * The ID of the race.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The name of the race.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The attribute limits of the race.
     *
     * @var AttributesCreationResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\AttributesCreationResponse")
     * @JMS\SerializedName("attributes")
     * @JMS\Since("1.0")
     */
    private $attributes;

    /**
     * The types of the race.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\RaceTypeResponse>")
     * @JMS\SerializedName("types")
     * @JMS\Since("1.0")
     */
    private $types;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return AttributesCreationResponse
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param AttributesCreationResponse $attributes
     */
    public function setAttributes(AttributesCreationResponse $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param array $types
     */
    public function setTypes(array $types)
    {
        $this->types = $types;
    }

    /**
     * @param RaceTypeResponse $type
     */
    public function addType(RaceTypeResponse $type)
    {
        $this->types[] = $type;
    }
}
