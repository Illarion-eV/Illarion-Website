<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class StartPackResponse
{
    /**
     * The ID of the start pack.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The name of the start pack.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The skills that are part of this start pack.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\IdNameResponse>")
     * @JMS\SerializedName("skills")
     * @JMS\Since("1.0")
     */
    private $skills;

    /**
     * The items that are part of this start pack.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\StartPackItemsResponse>")
     * @JMS\SerializedName("items")
     * @JMS\Since("1.0")
     */
    private $items;

    /**
     * StartPackResponse constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

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
     * @return mixed
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param mixed $skills
     */
    public function setSkills(array $skills)
    {
        $this->skills = $skills;
    }

    /**
     * @param IdNameResponse $skill
     */
    public function addSkill(IdNameResponse $skill)
    {
        $this->skills[] = $skill;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param StartPackItemsResponse $item
     */
    public function addItem(StartPackItemsResponse $item)
    {
        $this->items[] = $item;
    }
}
