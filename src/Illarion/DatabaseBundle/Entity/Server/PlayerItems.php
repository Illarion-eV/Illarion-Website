<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class PlayerItems
 *
 * @package Illarion\DatabaseBundle\Entity\Server
 * @ORM\MappedSuperclass()
 */
abstract class PlayerItems
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pit_playerid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_linenumber", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $lineNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_itemid", type="integer")
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_in_container", type="smallint")
     */
    private $inContainer;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_depot", type="smallint")
     */
    private $depot;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_wear", type="smallint")
     */
    private $wear;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_number", type="smallint")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_quality", type="smallint")
     */
    private $quality;

    /**
     * @var integer
     *
     * @ORM\Column(name="pit_containerslot", type="smallint")
     */
    private $containerSlot;

    /**
     * Get playerId
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * Set playerId
     *
     * @param integer $playerId
     *
     * @return PlayerItems
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * Get lineNumber
     *
     * @return integer
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Set lineNumber
     *
     * @param integer $lineNumber
     *
     * @return PlayerItems
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return PlayerItems
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get inContainer
     *
     * @return integer
     */
    public function getInContainer()
    {
        return $this->inContainer;
    }

    /**
     * Set inContainer
     *
     * @param integer $inContainer
     *
     * @return PlayerItems
     */
    public function setInContainer($inContainer)
    {
        $this->inContainer = $inContainer;

        return $this;
    }

    /**
     * Get depot
     *
     * @return integer
     */
    public function getDepot()
    {
        return $this->depot;
    }

    /**
     * Set depot
     *
     * @param integer $depot
     *
     * @return PlayerItems
     */
    public function setDepot($depot)
    {
        $this->depot = $depot;

        return $this;
    }

    /**
     * Get wear
     *
     * @return integer
     */
    public function getWear()
    {
        return $this->wear;
    }

    /**
     * Set wear
     *
     * @param integer $wear
     *
     * @return PlayerItems
     */
    public function setWear($wear)
    {
        $this->wear = $wear;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return PlayerItems
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get quality
     *
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     *
     * @return PlayerItems
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get containerSlot
     *
     * @return integer
     */
    public function getContainerSlot()
    {
        return $this->containerSlot;
    }

    /**
     * Set containerSlot
     *
     * @param integer $containerSlot
     *
     * @return PlayerItems
     */
    public function setContainerSlot($containerSlot)
    {
        $this->containerSlot = $containerSlot;

        return $this;
    }
}
