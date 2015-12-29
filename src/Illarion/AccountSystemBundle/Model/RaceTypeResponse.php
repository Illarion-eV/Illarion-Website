<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class RaceTypeResponse
{
    /**
     * The ID of the race type.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The possible hair values.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\IdNameResponse>")
     * @JMS\SerializedName("hairs")
     * @JMS\Since("1.0")
     */
    private $hairs;

    /**
     * The possible beard values.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\IdNameResponse>")
     * @JMS\SerializedName("beards")
     * @JMS\Since("1.0")
     */
    private $beards;

    /**
     * The possible hair colour values.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\ColourResponse>")
     * @JMS\SerializedName("hairColour")
     * @JMS\Since("1.0")
     */
    private $hairColours;

    /**
     * The possible skin colour values.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\ColourResponse>")
     * @JMS\SerializedName("skinColour")
     * @JMS\Since("1.0")
     */
    private $skinColours;

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
     * @return array
     */
    public function getHairs()
    {
        return $this->hairs;
    }

    /**
     * @param array $hairs
     */
    public function setHairs(array $hairs)
    {
        $this->hairs = $hairs;
    }

    /**
     * @param IdNameResponse $hair
     */
    public function addHair(IdNameResponse $hair)
    {
        $this->hairs[] = $hair;
    }

    /**
     * @return array
     */
    public function getBeards()
    {
        return $this->beards;
    }

    /**
     * @param array $beards
     */
    public function setBeards(array $beards)
    {
        $this->beards = $beards;
    }

    /**
     * @param IdNameResponse $beard
     */
    public function addBeard(IdNameResponse $beard)
    {
        $this->beards[] = $beard;
    }

    /**
     * @return array
     */
    public function getHairColours()
    {
        return $this->hairColours;
    }

    /**
     * @param array $hairColours
     */
    public function setHairColours(array $hairColours)
    {
        $this->hairColours = $hairColours;
    }

    /**
     * @param ColourResponse $hairColour
     */
    public function addHairColour(ColourResponse $hairColour)
    {
        $this->hairColours[] = $hairColour;
    }

    /**
     * @return array
     */
    public function getSkinColours()
    {
        return $this->skinColours;
    }

    /**
     * @param array $skinColours
     */
    public function setSkinColours(array $skinColours)
    {
        $this->skinColours = $skinColours;
    }

    /**
     * @param ColourResponse $skinColour
     */
    public function addSkinColour(ColourResponse $skinColour)
    {
        $this->skinColours[] = $skinColour;
    }
}
