<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * RaceHairColour
 *
 * @ORM\Table(schema="illarionserver", name="race_hair_colour")
 * @ORM\Entity
 */
class RaceHairColour extends Server\RaceHairColour
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes", inversedBy="hairColours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rhc_race_id", referencedColumnName="rt_race_id"),
     *   @ORM\JoinColumn(name="rhc_type_id", referencedColumnName="rt_type_id")
     * })
     */
    private $raceType;

    /**
     * Set raceType
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\RaceTypes $raceType
     *
     * @return RaceHairColour
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
