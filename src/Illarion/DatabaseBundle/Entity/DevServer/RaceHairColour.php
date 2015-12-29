<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * RaceHairColour
 *
 * @ORM\Table(schema="devserver", name="race_hair_colour")
 * @ORM\Entity
 */
class RaceHairColour extends Server\RaceHairColour
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\RaceTypes
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\RaceTypes", inversedBy="hairColours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rh_race_id", referencedColumnName="rt_race_id"),
     *   @ORM\JoinColumn(name="rh_type_id", referencedColumnName="rt_type_id")
     * })
     */
    private $raceType;

    /**
     * Get raceType
     *
     * @return \Illarion\DatabaseBundle\Entity\DevServer\RaceTypes
     */
    public function getRaceType()
    {
        return $this->raceType;
    }

    /**
     * Set raceType
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\RaceTypes $raceType
     *
     * @return RaceHairColour
     */
    public function setRaceType(\Illarion\DatabaseBundle\Entity\DevServer\RaceTypes $raceType = null)
    {
        $this->raceType = $raceType;

        return $this;
    }
}
