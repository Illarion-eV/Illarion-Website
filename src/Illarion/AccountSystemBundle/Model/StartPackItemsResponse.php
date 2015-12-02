<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class StartPackItemsResponse
{
    /**
     * The ID of the item.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("itemId")
     * @JMS\Since("1.0")
     */
    private $itemId;

    /**
     * The position of the item.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("position")
     * @JMS\Since("1.0")
     */
    private $position;

    /**
     * The number of the items.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("number")
     * @JMS\Since("1.0")
     */
    private $number;

    /**
     * The quality of the item.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("quality")
     * @JMS\Since("1.0")
     */
    private $quality;

    /**
     * The name of the item.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The worth of a single item.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("unitWorth")
     * @JMS\Since("1.0")
     */
    private $unitWorth;

    /**
     * The weight of a single item.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("unitWeight")
     * @JMS\Since("1.0")
     */
    private $unitWeight;

    /**
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param int $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param int $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
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
     * @return int
     */
    public function getUnitWorth()
    {
        return $this->unitWorth;
    }

    /**
     * @param int $unitWorth
     */
    public function setUnitWorth($unitWorth)
    {
        $this->unitWorth = $unitWorth;
    }

    /**
     * @return int
     */
    public function getUnitWeight()
    {
        return $this->unitWeight;
    }

    /**
     * @param int $unitWeight
     */
    public function setUnitWeight($unitWeight)
    {
        $this->unitWeight = $unitWeight;
    }
}
