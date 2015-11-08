<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaceSkinColour
 *
 * @ORM\MappedSuperclass()
 */
class RaceSkinColour
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rsc_race_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $raceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rsc_type_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rsc_red", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $red;

    /**
     * @var integer
     *
     * @ORM\Column(name="rsc_green", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $green;

    /**
     * @var integer
     *
     * @ORM\Column(name="rsc_blue", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $blue;

    /**
     * @var integer
     *
     * @ORM\Column(name="rsc_alpha", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $alpha;

    /**
     * Set raceId
     *
     * @param integer $raceId
     *
     * @return RaceSkinColour
     */
    public function setRaceId($raceId)
    {
        $this->raceId = $raceId;

        return $this;
    }

    /**
     * Get raceId
     *
     * @return integer
     */
    public function getRaceId()
    {
        return $this->raceId;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return RaceSkinColour
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return integer
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set red
     *
     * @param integer $red
     *
     * @return RaceSkinColour
     */
    public function setRed($red)
    {
        $this->red = $red;

        return $this;
    }

    /**
     * Get red
     *
     * @return integer
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * Set green
     *
     * @param integer $green
     *
     * @return RaceSkinColour
     */
    public function setGreen($green)
    {
        $this->green = $green;

        return $this;
    }

    /**
     * Get green
     *
     * @return integer
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * Set blue
     *
     * @param integer $blue
     *
     * @return RaceSkinColour
     */
    public function setBlue($blue)
    {
        $this->blue = $blue;

        return $this;
    }

    /**
     * Get blue
     *
     * @return integer
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * Set alpha
     *
     * @param integer $alpha
     *
     * @return RaceSkinColour
     */
    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;

        return $this;
    }

    /**
     * Get alpha
     *
     * @return integer
     */
    public function getAlpha()
    {
        return $this->alpha;
    }
}
