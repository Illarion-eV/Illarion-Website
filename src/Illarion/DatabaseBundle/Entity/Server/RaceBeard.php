<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaceBeard
 *
 * @ORM\MappedSuperclass()
 */
class RaceBeard
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rb_race_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $raceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rb_type_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rb_beard_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $beardId;

    /**
     * @var string
     *
     * @ORM\Column(name="rb_name_de", type="string", length=100)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="rb_name_en", type="string", length=100)
     */
    private $nameEn;

    /**
     * Set raceId
     *
     * @param integer $raceId
     *
     * @return RaceBeard
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
     * @return RaceBeard
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
     * Set beardId
     *
     * @param integer $beardId
     *
     * @return RaceBeard
     */
    public function setBeardId($beardId)
    {
        $this->beardId = $beardId;

        return $this;
    }

    /**
     * Get beardId
     *
     * @return integer
     */
    public function getBeardId()
    {
        return $this->beardId;
    }

    /**
     * Set nameDe
     *
     * @param string $nameDe
     *
     * @return RaceBeard
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
     * @return RaceBeard
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
