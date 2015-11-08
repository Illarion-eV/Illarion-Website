<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartPackItems
 *
 * @ORM\MappedSuperclass()
 */
class StartPackSkills
{
    /**
     * @var integer
     *
     * @ORM\Column(name="sps_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $packId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sps_skill_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $skillId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sps_skill_value", type="smallint")
     */
    private $skillValue;

    /**
     * Set packId
     *
     * @param integer $packId
     *
     * @return StartPackSkills
     */
    public function setPackId($packId)
    {
        $this->packId = $packId;

        return $this;
    }

    /**
     * Get packId
     *
     * @return integer
     */
    public function getPackId()
    {
        return $this->packId;
    }

    /**
     * Set skillId
     *
     * @param integer $skillId
     *
     * @return StartPackSkills
     */
    public function setSkillId($skillId)
    {
        $this->skillId = $skillId;

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
     * Set skillValue
     *
     * @param integer $skillValue
     *
     * @return StartPackSkills
     */
    public function setSkillValue($skillValue)
    {
        $this->skillValue = $skillValue;

        return $this;
    }

    /**
     * Get skillValue
     *
     * @return integer
     */
    public function getSkillValue()
    {
        return $this->skillValue;
    }
}
