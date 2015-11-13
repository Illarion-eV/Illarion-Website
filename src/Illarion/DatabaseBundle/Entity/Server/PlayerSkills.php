<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class PlayerSkills
 *
 * @package Illarion\DatabaseBundle\Entity\Server
 * @ORM\MappedSuperclass()
 */
abstract class PlayerSkills
{
    /**
     * @var integer
     *
     * @ORM\Column(name="psk_playerid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="psk_skill_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $skillId;

    /**
     * @var integer
     *
     * @ORM\Column(name="psk_value", type="smallint")
     */
    private $value;

    /**
     * @var integer
     *
     * @ORM\Column(name="psk_firsttry", type="integer")
     */
    private $firstTry;

    /**
     * @var integer
     *
     * @ORM\Column(name="psk_secondtry", type="integer")
     */
    private $secondTry;

    /**
     * @var integer
     *
     * @ORM\Column(name="psk_minor", type="integer")
     */
    private $minor;

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
     * @return PlayerSkills
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * Get skillId
     *
     * @return integer
     */
    public function getSkillId()
    {
        return $this->skillId;
    }

    /**
     * Set skillId
     *
     * @param integer $skillId
     *
     * @return PlayerSkills
     */
    public function setSkillId($skillId)
    {
        $this->skillId = $skillId;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return PlayerSkills
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get firstTry
     *
     * @return integer
     */
    public function getFirstTry()
    {
        return $this->firstTry;
    }

    /**
     * Set firstTry
     *
     * @param integer $firstTry
     *
     * @return PlayerSkills
     */
    public function setFirstTry($firstTry)
    {
        $this->firstTry = $firstTry;

        return $this;
    }

    /**
     * Get secondTry
     *
     * @return integer
     */
    public function getSecondTry()
    {
        return $this->secondTry;
    }

    /**
     * Set secondTry
     *
     * @param integer $secondTry
     *
     * @return PlayerSkills
     */
    public function setSecondTry($secondTry)
    {
        $this->secondTry = $secondTry;

        return $this;
    }

    /**
     * Get minor
     *
     * @return integer
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * Set minor
     *
     * @param integer $minor
     *
     * @return PlayerSkills
     */
    public function setMinor($minor)
    {
        $this->minor = $minor;

        return $this;
    }

    /**
     * Set player
     *
     * @param Player $player
     *
     * @return PlayerSkills
     */
    public abstract function setPlayer(Player $player = null);

    /**
     * Get player
     *
     * @return Player
     */
    public abstract function getPlayer();
}
