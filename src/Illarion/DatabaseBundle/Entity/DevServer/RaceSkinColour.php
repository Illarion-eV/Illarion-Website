<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * RaceSkinColour
 *
 * @ORM\Table(schema="devserver", name="race_skin_colour")
 * @ORM\Entity
 */
class RaceSkinColour extends Server\RaceSkinColour
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\RaceTypes
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\RaceTypes", inversedBy="skinColours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rsc_race_id", referencedColumnName="rt_race_id"),
     *   @ORM\JoinColumn(name="rsc_type_id", referencedColumnName="rt_type_id")
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
     * @return RaceSkinColour
     */
    public function setRaceType(\Illarion\DatabaseBundle\Entity\DevServer\RaceTypes $raceType = null)
    {
        $this->raceType = $raceType;

        return $this;
    }
}
