<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * RaceTypes
 *
 * @ORM\Table(schema="devserver", name="race_types")
 * @ORM\Entity
 */
class RaceTypes extends Server\RaceTypes
{
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\RaceBeard", mappedBy="raceType")
     */
    private $beards;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\RaceHair", mappedBy="raceType")
     */
    private $hairs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\RaceHairColour", mappedBy="raceType")
     */
    private $hairColours;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\RaceSkinColour", mappedBy="raceType")
     */
    private $skinColours;

    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\Race
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\Race", inversedBy="types")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rt_race_id", referencedColumnName="race_id")
     * })
     */
    private $race;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->beards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hairs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->hairColours = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skinColours = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add beard
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceBeard $beard
     *
     * @return RaceTypes
     */
    public function addBeard(\Illarion\DatabaseBundle\Entity\DevServer\RaceBeard $beard)
    {
        $this->beards[] = $beard;

        return $this;
    }

    /**
     * Remove beard
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceBeard $beard
     */
    public function removeBeard(\Illarion\DatabaseBundle\Entity\DevServer\RaceBeard $beard)
    {
        $this->beards->removeElement($beard);
    }

    /**
     * Get beards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBeards()
    {
        return $this->beards;
    }

    /**
     * Add hair
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceHair $hair
     *
     * @return RaceTypes
     */
    public function addHair(\Illarion\DatabaseBundle\Entity\DevServer\RaceHair $hair)
    {
        $this->hairs[] = $hair;

        return $this;
    }

    /**
     * Remove hair
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceHair $hair
     */
    public function removeHair(\Illarion\DatabaseBundle\Entity\DevServer\RaceHair $hair)
    {
        $this->hairs->removeElement($hair);
    }

    /**
     * Get hairs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHairs()
    {
        return $this->hairs;
    }

    /**
     * Add hairColour
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceHairColour $hairColour
     *
     * @return RaceTypes
     */
    public function addHairColour(\Illarion\DatabaseBundle\Entity\DevServer\RaceHairColour $hairColour)
    {
        $this->hairColours[] = $hairColour;

        return $this;
    }

    /**
     * Remove hairColour
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceHairColour $hairColour
     */
    public function removeHairColour(\Illarion\DatabaseBundle\Entity\DevServer\RaceHairColour $hairColour)
    {
        $this->hairColours->removeElement($hairColour);
    }

    /**
     * Get hairColours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHairColours()
    {
        return $this->hairColours;
    }

    /**
     * Add skinColour
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceSkinColour $skinColour
     *
     * @return RaceTypes
     */
    public function addSkinColour(\Illarion\DatabaseBundle\Entity\DevServer\RaceSkinColour $skinColour)
    {
        $this->skinColours[] = $skinColour;

        return $this;
    }

    /**
     * Remove skinColour
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceSkinColour $skinColour
     */
    public function removeSkinColour(\Illarion\DatabaseBundle\Entity\DevServer\RaceSkinColour $skinColour)
    {
        $this->skinColours->removeElement($skinColour);
    }

    /**
     * Get skinColours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkinColours()
    {
        return $this->skinColours;
    }

    /**
     * Get race
     *
     * @return \Illarion\DatabaseBundle\Entity\DevServer\Race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set race
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\Race $race
     *
     * @return RaceTypes
     */
    public function setRace(\Illarion\DatabaseBundle\Entity\DevServer\Race $race = null)
    {
        $this->race = $race;

        return $this;
    }
}
