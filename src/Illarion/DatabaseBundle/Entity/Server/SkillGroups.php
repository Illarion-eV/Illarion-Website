<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * SkillGroups
 *
 * @ORM\MappedSuperclass()
 */
class SkillGroups
{
    /**
     * @var integer
     *
     * @ORM\Column(name="skg_group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="skg_name_german", type="string", length=45, unique=true)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="skg_name_english", type="string", length=45, unique=true)
     */
    private $nameEn;

    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return SkillGroups
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set nameDe
     *
     * @param string $nameDe
     *
     * @return SkillGroups
     */
    public function setNameDe($nameDe)
    {
        $this->nameDe = $nameDe;

        return $this;
    }

    /**
     * Get nameDe
     *
     * @return string
     */
    public function getNameDe()
    {
        return $this->nameDe;
    }

    /**
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return SkillGroups
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }
}
