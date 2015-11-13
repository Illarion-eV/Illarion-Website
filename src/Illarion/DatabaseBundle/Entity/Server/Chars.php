<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Accounts\Account;

/**
 * Chars
 *
 * @ORM\MappedSuperclass()
 */
abstract class Chars
{
    /**
     * @var integer
     *
     * @ORM\Column(name="chr_playerid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_accid", type="integer")
     */
    private $accId;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_status", type="integer")
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_statustime", type="bigint")
     */
    private $statustime;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_statusgm", type="integer")
     */
    private $statusgm;

    /**
     * @var string
     *
     * @ORM\Column(name="chr_statusreason", type="string", length=250)
     */
    private $statusreason;

    /**
     * @var string
     *
     * @ORM\Column(name="chr_lastip", type="string", length=39)
     */
    private $lastip;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_onlinetime", type="bigint")
     */
    private $onlinetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_lastsavetime", type="bigint")
     */
    private $lastsavetime;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_race", type="integer")
     */
    private $raceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="chr_sex", type="smallint")
     */
    private $raceTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="chr_name", type="string", length=50)
     */
    private $name;

    /**
     * Get playerid
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * Set playerid
     *
     * @param integer $playerId
     *
     * @return Chars
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * Get accId
     *
     * @return integer
     */
    public function getAccId()
    {
        return $this->accId;
    }

    /**
     * Set accId
     *
     * @param integer $accId
     *
     * @return Chars
     */
    public function setAccId($accId)
    {
        $this->accId = $accId;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Chars
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get statustime
     *
     * @return integer
     */
    public function getStatustime()
    {
        return $this->statustime;
    }

    /**
     * Set statustime
     *
     * @param integer $statustime
     *
     * @return Chars
     */
    public function setStatustime($statustime)
    {
        $this->statustime = $statustime;

        return $this;
    }

    /**
     * Get statusgm
     *
     * @return integer
     */
    public function getStatusgm()
    {
        return $this->statusgm;
    }

    /**
     * Set statusgm
     *
     * @param integer $statusgm
     *
     * @return Chars
     */
    public function setStatusgm($statusgm)
    {
        $this->statusgm = $statusgm;

        return $this;
    }

    /**
     * Get statusreason
     *
     * @return string
     */
    public function getStatusreason()
    {
        return $this->statusreason;
    }

    /**
     * Set statusreason
     *
     * @param string $statusreason
     *
     * @return Chars
     */
    public function setStatusreason($statusreason)
    {
        $this->statusreason = $statusreason;

        return $this;
    }

    /**
     * Get lastip
     *
     * @return string
     */
    public function getLastip()
    {
        return $this->lastip;
    }

    /**
     * Set lastip
     *
     * @param string $lastip
     *
     * @return Chars
     */
    public function setLastip($lastip)
    {
        $this->lastip = $lastip;

        return $this;
    }

    /**
     * Get onlinetime
     *
     * @return integer
     */
    public function getOnlinetime()
    {
        return $this->onlinetime;
    }

    /**
     * Set onlinetime
     *
     * @param integer $onlinetime
     *
     * @return Chars
     */
    public function setOnlinetime($onlinetime)
    {
        $this->onlinetime = $onlinetime;

        return $this;
    }

    /**
     * Get lastsavetime
     *
     * @return integer
     */
    public function getLastsavetime()
    {
        return $this->lastsavetime;
    }

    /**
     * Set lastsavetime
     *
     * @param integer $lastsavetime
     *
     * @return Chars
     */
    public function setLastsavetime($lastsavetime)
    {
        $this->lastsavetime = $lastsavetime;

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
     * Set raceId
     *
     * @param integer $raceId
     *
     * @return Chars
     */
    public function setRaceId($raceId)
    {
        $this->raceId = $raceId;

        return $this;
    }

    /**
     * Get raceTypeId
     *
     * @return integer
     */
    public function getRaceTypeId()
    {
        return $this->raceTypeId;
    }

    /**
     * Set raceTypeId
     *
     * @param integer $raceTypeId
     *
     * @return Chars
     */
    public function setRaceTypeId($raceTypeId)
    {
        $this->raceTypeId = $raceTypeId;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Chars
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get account
     *
     * @return Account
     */
    public abstract function getAccount();

    /**
     * Set account
     *
     * @param Account $account
     *
     * @return Chars
     */
    public abstract function setAccount(Account $account = null);

    /**
     * Get race
     *
     * @return Race
     */
    public abstract function getRace();

    /**
     * Set race
     *
     * @param Race $race
     *
     * @return Chars
     */
    public abstract function setRace(Race $race = null);

    /**
     * Get player
     *
     * @return \Illarion\DatabaseBundle\Entity\Server\Player
     */
    public abstract function getPlayer();
}
