<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * RaceSkinColour
 *
 * @ORM\Table(schema="illarionserver", name="race_skin_colour")
 * @ORM\Entity
 */
class RaceSkinColour extends Server\RaceSkinColour
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes", inversedBy="skinColours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rsc_race_id", referencedColumnName="rt_race_id"),
     *   @ORM\JoinColumn(name="rsc_type_id", referencedColumnName="rt_type_id")
     * })
     */
    private $raceType;

    /**
     * Set raceType
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes $raceType
     *
     * @return RaceSkinColour
     */
    public function setRaceType(\Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes $raceType = null)
    {
        $this->raceType = $raceType;

        return $this;
    }

    /**
     * Get raceType
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes
     */
    public function getRaceType()
    {
        return $this->raceType;
    }
}
