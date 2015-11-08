<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartPacks
 *
 * @ORM\MappedSuperclass()
 */
abstract class StartPacks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="stp_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="stp_german", type="string", length=20, unique=true)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="stp_english", type="string", length=20, unique=true)
     */
    private $nameEn;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return StartPacks
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameDe
     *
     * @param string $nameDe
     *
     * @return StartPacks
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
     * @return StartPacks
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

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getItems();

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getSkills();
}
