<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skills
 *
 * @ORM\MappedSuperclass()
 */
class Skills
{
    /**
     * @var integer
     *
     * @ORM\Column(name="skl_skill_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $skillId;

    /**
     * @var integer
     *
     * @ORM\Column(name="skl_group_id", type="integer")
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="skl_name", type="string", length=20, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="skl_name_german", type="string", length=45, unique=true)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="skl_name_english", type="string", length=45, unique=true)
     */
    private $nameEn;

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
     * @return Skills
     */
    public function setSkillId($skillId)
    {
        $this->skillId = $skillId;

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
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return Skills
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

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
     * @return Skills
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Set nameDe
     *
     * @param string $nameDe
     *
     * @return Skills
     */
    public function setNameDe($nameDe)
    {
        $this->nameDe = $nameDe;

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

    /**
     * Set nameEn
     *
     * @param string $nameEn
     *
     * @return Skills
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }
}
