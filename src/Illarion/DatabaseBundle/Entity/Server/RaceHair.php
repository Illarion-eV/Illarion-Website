<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaceHair
 *
 * @ORM\MappedSuperclass()
 */
class RaceHair
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rh_race_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $raceId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rh_type_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="rh_hair_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $hairId;

    /**
     * @var string
     *
     * @ORM\Column(name="rh_name_de", type="string", length=100)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="rh_name_en", type="string", length=100)
     */
    private $nameEn;

    /**
     * Set raceId
     *
     * @param integer $raceId
     *
     * @return RaceHair
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
     * @return RaceHair
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
     * Set hairId
     *
     * @param integer $hairId
     *
     * @return RaceHair
     */
    public function setHairId($hairId)
    {
        $this->hairId = $hairId;

        return $this;
    }

    /**
     * Get hairId
     *
     * @return integer
     */
    public function getHairId()
    {
        return $this->hairId;
    }

    /**
     * Set nameDe
     *
     * @param string $nameDe
     *
     * @return RaceHair
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
     * @return RaceHair
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
