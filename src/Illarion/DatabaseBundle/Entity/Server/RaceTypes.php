<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaceTypes
 *
 * @ORM\MappedSuperclass()
 */
abstract class RaceTypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rt_race_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $raceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rt_type_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeId;

    /**
     * Set raceId
     *
     * @param integer $raceId
     *
     * @return RaceTypes
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
     * @return RaceTypes
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
     * Get beards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getBeards();

    /**
     * Get hairs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getHairs();

    /**
     * Get hairColours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getHairColours();

    /**
     * Get skinColours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getSkinColours();
}
