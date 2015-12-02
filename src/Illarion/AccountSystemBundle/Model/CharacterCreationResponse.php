<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class CharacterCreationResponse
{
    /**
     * The races that are up to be selected.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\RaceResponse>")
     * @JMS\SerializedName("races")
     * @JMS\Since("1.0")
     */
    private $races;

    /**
     * The start packs that are up to be selected..
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\StartPackResponse>")
     * @JMS\SerializedName("startPacks")
     * @JMS\Since("1.0")
     */
    private $startPacks;

    /**
     * @return array
     */
    public function getRaces()
    {
        return $this->races;
    }

    /**
     * @param array $races
     */
    public function setRaces(array $races)
    {
        $this->races = $races;
    }

    /**
     * Add a race entry.
     *
     * @param RaceResponse $race
     */
    public function addRace(RaceResponse $race)
    {
        $this->races[] = $race;
    }

    /**
     * @return array
     */
    public function getStartPacks()
    {
        return $this->startPacks;
    }

    /**
     * @param array $startPacks
     */
    public function setStartPacks(array $startPacks)
    {
        $this->startPacks = $startPacks;
    }

    /**
     * @param StartPackResponse $startPack
     */
    public function addStartPack(StartPackResponse $startPack)
    {
        $this->startPacks[] = $startPack;
    }
}
