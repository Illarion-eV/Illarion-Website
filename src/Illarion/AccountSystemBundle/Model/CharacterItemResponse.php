<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class CharacterItemResponse
{
    /**
     * The ID of the item.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The position of the item.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("position")
     * @JMS\Since("1.0")
     */
    private $position;

    /**
     * The number of the item.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("number")
     * @JMS\Since("1.0")
     */
    private $number;

    /**
     * The quality of the item.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("quality")
     * @JMS\Since("1.0")
     */
    private $quality;

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
}
