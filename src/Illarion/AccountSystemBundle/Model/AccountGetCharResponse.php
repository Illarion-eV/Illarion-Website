<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AccountGetCharsResponse
 * @package Illarion\AccountSystemBundle\Model
 */
class AccountGetCharResponse
{
    /**
     * The ID of the character.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The name of the character.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The status of the character.
     *
     * 0: playable
     * 30: banned
     * 31: temporary banned
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("status")
     * @JMS\Since("1.0")
     */
    private $status;

    /**
     * The ID of the race of this character.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("raceId")
     * @JMS\Since("1.0")
     */
    private $raceId;

    /**
     * The ID of the race subtype.
     *
     * 0: male
     * 1: female
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("raceTypeId")
     * @JMS\Since("1.0")
     */
    private $raceTypeId;

    /**
     * The last time this character logged out from the server.
     *
     * @var \DateTime
     * @JMS\Type("DateTime")
     * @JMS\SerializedName("lastSaveTime")
     * @JMS\Since("1.0")
     */
    private $lastSaveTime;

    /**
     * The total time in seconds this character was logged in.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("onlineTime")
     * @JMS\Since("1.0")
     */
    private $onlineTime;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getRaceId()
    {
        return $this->raceId;
    }

    /**
     * @param int $raceId
     */
    public function setRaceId($raceId)
    {
        $this->raceId = $raceId;
    }

    /**
     * @return int
     */
    public function getRaceTypeId()
    {
        return $this->raceTypeId;
    }

    /**
     * @param int $raceTypeId
     */
    public function setRaceTypeId($raceTypeId)
    {
        $this->raceTypeId = $raceTypeId;
    }

    /**
     * @return int
     */
    public function getLastSaveTime()
    {
        return $this->lastSaveTime->getTimestamp();
    }

    /**
     * @param int $lastSaveTime
     */
    public function setLastSaveTime($lastSaveTime)
    {
        if ($this->lastSaveTime == null)
            $this->lastSaveTime = new \DateTime();

        $this->lastSaveTime->setTimestamp($lastSaveTime);
    }

    /**
     * @return string
     */
    public function getOnlineTime()
    {
        return substr($this->onlineTime, 2, -1);
    }

    /**
     * @param int $onlineTime
     */
    public function setOnlineTime($onlineTime)
    {
        $this->onlineTime = 'PT' . $onlineTime . 'S';
    }
}
