<?php

namespace Illarion\DatabaseBundle\Entity\TestServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * RaceHairColour
 *
 * @ORM\Table(schema="testserver", name="race_hair_colour")
 * @ORM\Entity
 */
class RaceHairColour extends Server\RaceHairColour
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\TestServer\RaceTypes
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\RaceTypes", inversedBy="hairColours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rhc_race_id", referencedColumnName="rt_race_id"),
     *   @ORM\JoinColumn(name="rhc_type_id", referencedColumnName="rt_type_id")
     * })
     */
    private $raceType;

    /**
     * Get raceType
     *
     * @return \Illarion\DatabaseBundle\Entity\TestServer\RaceTypes
     */
    public function getRaceType()
    {
        return $this->raceType;
    }

    /**
     * Set raceType
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\RaceTypes $raceType
     *
     * @return RaceHairColour
     */
    public function setRaceType(\Illarion\DatabaseBundle\Entity\TestServer\RaceTypes $raceType = null)
    {
        $this->raceType = $raceType;

        return $this;
    }
}
