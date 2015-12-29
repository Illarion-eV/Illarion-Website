<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class CharacterPaperDollResponse
{
    /**
     * The ID of the characters hair.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("hairId")
     * @JMS\Since("1.0")
     */
    private $hairId;

    /**
     * The ID of the characters beard.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("beardId")
     * @JMS\Since("1.0")
     */
    private $beardId;

    /**
     * The colour of the characters skin.
     *
     * @var ColourResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\ColourResponse")
     * @JMS\SerializedName("skinColour")
     * @JMS\Since("1.0")
     */
    private $skinColour;

    /**
     * The colour of the characters hair.
     *
     * @var ColourResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\ColourResponse")
     * @JMS\SerializedName("hairColour")
     * @JMS\Since("1.0")
     */
    private $hairColour;

    /**
     * @return int
     */
    public function getHairId()
    {
        return $this->hairId;
    }

    /**
     * @param int $hairId
     */
    public function setHairId($hairId)
    {
        $this->hairId = $hairId;
    }

    /**
     * @return int
     */
    public function getBeardId()
    {
        return $this->beardId;
    }

    /**
     * @param int $beardId
     */
    public function setBeardId($beardId)
    {
        $this->beardId = $beardId;
    }

    /**
     * @return ColourResponse
     */
    public function getSkinColour()
    {
        return $this->skinColour;
    }

    /**
     * @param ColourResponse $skinColour
     */
    public function setSkinColour($skinColour)
    {
        $this->skinColour = $skinColour;
    }

    /**
     * @return ColourResponse
     */
    public function getHairColour()
    {
        return $this->hairColour;
    }

    /**
     * @param ColourResponse $hairColour
     */
    public function setHairColour($hairColour)
    {
        $this->hairColour = $hairColour;
    }

}
