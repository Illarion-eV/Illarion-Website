<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaceHairColour
 *
 * @ORM\MappedSuperclass()
 */
class RaceHairColour
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rhc_race_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $raceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rhc_type_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rhc_red", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $red;

    /**
     * @var integer
     *
     * @ORM\Column(name="rhc_green", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $green;

    /**
     * @var integer
     *
     * @ORM\Column(name="rhc_blue", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $blue;

    /**
     * @var integer
     *
     * @ORM\Column(name="rhc_alpha", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $alpha;

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
     * Set raceId
     *
     * @param integer $raceId
     *
     * @return RaceHairColour
     */
    public function setRaceId($raceId)
    {
        $this->raceId = $raceId;

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
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return RaceHairColour
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

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
     * Set red
     *
     * @param integer $red
     *
     * @return RaceHairColour
     */
    public function setRed($red)
    {
        $this->red = $red;

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
     * Set green
     *
     * @param integer $green
     *
     * @return RaceHairColour
     */
    public function setGreen($green)
    {
        $this->green = $green;

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
     * Set blue
     *
     * @param integer $blue
     *
     * @return RaceHairColour
     */
    public function setBlue($blue)
    {
        $this->blue = $blue;

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

    /**
     * Set alpha
     *
     * @param integer $alpha
     *
     * @return RaceHairColour
     */
    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;

        return $this;
    }
}
