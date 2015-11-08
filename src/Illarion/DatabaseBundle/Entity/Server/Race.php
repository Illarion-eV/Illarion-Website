<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Race
 *
 * @ORM\MappedSuperclass()
 */
abstract class Race
{
    /**
     * @var integer
     *
     * @ORM\Column(name="race_id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="race_name_de", type="string", length=100)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="race_name_en", type="string", length=100)
     */
    private $nameEn;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_age_min", type="smallint")
     */
    private $ageMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_age_max", type="smallint")
     */
    private $ageMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_weight_min", type="integer")
     */
    private $weightMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_weight_max", type="integer")
     */
    private $weightMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_height_min", type="smallint")
     */
    private $heightMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_height_max", type="smallint")
     */
    private $heightMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_agility_min", type="smallint")
     */
    private $agilityMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_agility_max", type="smallint")
     */
    private $agilityMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_constitution_min", type="smallint")
     */
    private $constitutionMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_constitution_max", type="smallint")
     */
    private $constitutionMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_dexterity_min", type="smallint")
     */
    private $dexterityMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_dexterity_max", type="smallint")
     */
    private $dexterityMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_essence_min", type="smallint")
     */
    private $essenceMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_essence_max", type="smallint")
     */
    private $essenceMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_intelligence_min", type="smallint")
     */
    private $intelligenceMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_intelligence_max", type="smallint")
     */
    private $intelligenceMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_perception_min", type="smallint")
     */
    private $perceptionMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_perception_max", type="smallint")
     */
    private $perceptionMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_strength_min", type="smallint")
     */
    private $strengthMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_strength_max", type="smallint")
     */
    private $strengthMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_willpower_min", type="smallint")
     */
    private $willpowerMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_willpower_max", type="smallint")
     */
    private $willpowerMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="race_attribute_points_max", type="smallint")
     */
    private $attributePointsMax;

    /**
     * @var string
     *
     * @ORM\Column(name="race_name", type="string", length=100, unique=true)
     */
    private $name;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Race
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
     * @return Race
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
     * @return Race
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
     * Set ageMin
     *
     * @param integer $ageMin
     *
     * @return Race
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    /**
     * Get ageMin
     *
     * @return integer
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * Set ageMax
     *
     * @param integer $ageMax
     *
     * @return Race
     */
    public function setAgeMax($ageMax)
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * Get ageMax
     *
     * @return integer
     */
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * Set weightMin
     *
     * @param integer $weightMin
     *
     * @return Race
     */
    public function setWeightMin($weightMin)
    {
        $this->weightMin = $weightMin;

        return $this;
    }

    /**
     * Get weightMin
     *
     * @return integer
     */
    public function getWeightMin()
    {
        return $this->weightMin;
    }

    /**
     * Set weightMax
     *
     * @param integer $weightMax
     *
     * @return Race
     */
    public function setWeightMax($weightMax)
    {
        $this->weightMax = $weightMax;

        return $this;
    }

    /**
     * Get weightMax
     *
     * @return integer
     */
    public function getWeightMax()
    {
        return $this->weightMax;
    }

    /**
     * Set heightMin
     *
     * @param integer $heightMin
     *
     * @return Race
     */
    public function setHeightMin($heightMin)
    {
        $this->heightMin = $heightMin;

        return $this;
    }

    /**
     * Get heightMin
     *
     * @return integer
     */
    public function getHeightMin()
    {
        return $this->heightMin;
    }

    /**
     * Set heightMax
     *
     * @param integer $heightMax
     *
     * @return Race
     */
    public function setHeightMax($heightMax)
    {
        $this->heightMax = $heightMax;

        return $this;
    }

    /**
     * Get heightMax
     *
     * @return integer
     */
    public function getHeightMax()
    {
        return $this->heightMax;
    }

    /**
     * Set agilityMin
     *
     * @param integer $agilityMin
     *
     * @return Race
     */
    public function setAgilityMin($agilityMin)
    {
        $this->agilityMin = $agilityMin;

        return $this;
    }

    /**
     * Get agilityMin
     *
     * @return integer
     */
    public function getAgilityMin()
    {
        return $this->agilityMin;
    }

    /**
     * Set agilityMax
     *
     * @param integer $agilityMax
     *
     * @return Race
     */
    public function setAgilityMax($agilityMax)
    {
        $this->agilityMax = $agilityMax;

        return $this;
    }

    /**
     * Get agilityMax
     *
     * @return integer
     */
    public function getAgilityMax()
    {
        return $this->agilityMax;
    }

    /**
     * Set constitutionMin
     *
     * @param integer $constitutionMin
     *
     * @return Race
     */
    public function setConstitutionMin($constitutionMin)
    {
        $this->constitutionMin = $constitutionMin;

        return $this;
    }

    /**
     * Get constitutionMin
     *
     * @return integer
     */
    public function getConstitutionMin()
    {
        return $this->constitutionMin;
    }

    /**
     * Set constitutionMax
     *
     * @param integer $constitutionMax
     *
     * @return Race
     */
    public function setConstitutionMax($constitutionMax)
    {
        $this->constitutionMax = $constitutionMax;

        return $this;
    }

    /**
     * Get constitutionMax
     *
     * @return integer
     */
    public function getConstitutionMax()
    {
        return $this->constitutionMax;
    }

    /**
     * Set dexterityMin
     *
     * @param integer $dexterityMin
     *
     * @return Race
     */
    public function setDexterityMin($dexterityMin)
    {
        $this->dexterityMin = $dexterityMin;

        return $this;
    }

    /**
     * Get dexterityMin
     *
     * @return integer
     */
    public function getDexterityMin()
    {
        return $this->dexterityMin;
    }

    /**
     * Set dexterityMax
     *
     * @param integer $dexterityMax
     *
     * @return Race
     */
    public function setDexterityMax($dexterityMax)
    {
        $this->dexterityMax = $dexterityMax;

        return $this;
    }

    /**
     * Get dexterityMax
     *
     * @return integer
     */
    public function getDexterityMax()
    {
        return $this->dexterityMax;
    }

    /**
     * Set essenceMin
     *
     * @param integer $essenceMin
     *
     * @return Race
     */
    public function setEssenceMin($essenceMin)
    {
        $this->essenceMin = $essenceMin;

        return $this;
    }

    /**
     * Get essenceMin
     *
     * @return integer
     */
    public function getEssenceMin()
    {
        return $this->essenceMin;
    }

    /**
     * Set essenceMax
     *
     * @param integer $essenceMax
     *
     * @return Race
     */
    public function setEssenceMax($essenceMax)
    {
        $this->essenceMax = $essenceMax;

        return $this;
    }

    /**
     * Get essenceMax
     *
     * @return integer
     */
    public function getEssenceMax()
    {
        return $this->essenceMax;
    }

    /**
     * Set intelligenceMin
     *
     * @param integer $intelligenceMin
     *
     * @return Race
     */
    public function setIntelligenceMin($intelligenceMin)
    {
        $this->intelligenceMin = $intelligenceMin;

        return $this;
    }

    /**
     * Get intelligenceMin
     *
     * @return integer
     */
    public function getIntelligenceMin()
    {
        return $this->intelligenceMin;
    }

    /**
     * Set intelligenceMax
     *
     * @param integer $intelligenceMax
     *
     * @return Race
     */
    public function setIntelligenceMax($intelligenceMax)
    {
        $this->intelligenceMax = $intelligenceMax;

        return $this;
    }

    /**
     * Get intelligenceMax
     *
     * @return integer
     */
    public function getIntelligenceMax()
    {
        return $this->intelligenceMax;
    }

    /**
     * Set perceptionMin
     *
     * @param integer $perceptionMin
     *
     * @return Race
     */
    public function setPerceptionMin($perceptionMin)
    {
        $this->perceptionMin = $perceptionMin;

        return $this;
    }

    /**
     * Get perceptionMin
     *
     * @return integer
     */
    public function getPerceptionMin()
    {
        return $this->perceptionMin;
    }

    /**
     * Set perceptionMax
     *
     * @param integer $perceptionMax
     *
     * @return Race
     */
    public function setPerceptionMax($perceptionMax)
    {
        $this->perceptionMax = $perceptionMax;

        return $this;
    }

    /**
     * Get perceptionMax
     *
     * @return integer
     */
    public function getPerceptionMax()
    {
        return $this->perceptionMax;
    }

    /**
     * Set strengthMin
     *
     * @param integer $strengthMin
     *
     * @return Race
     */
    public function setStrengthMin($strengthMin)
    {
        $this->strengthMin = $strengthMin;

        return $this;
    }

    /**
     * Get strengthMin
     *
     * @return integer
     */
    public function getStrengthMin()
    {
        return $this->strengthMin;
    }

    /**
     * Set strengthMax
     *
     * @param integer $strengthMax
     *
     * @return Race
     */
    public function setStrengthMax($strengthMax)
    {
        $this->strengthMax = $strengthMax;

        return $this;
    }

    /**
     * Get strengthMax
     *
     * @return integer
     */
    public function getStrengthMax()
    {
        return $this->strengthMax;
    }

    /**
     * Set willpowerMin
     *
     * @param integer $willpowerMin
     *
     * @return Race
     */
    public function setWillpowerMin($willpowerMin)
    {
        $this->willpowerMin = $willpowerMin;

        return $this;
    }

    /**
     * Get willpowerMin
     *
     * @return integer
     */
    public function getWillpowerMin()
    {
        return $this->willpowerMin;
    }

    /**
     * Set willpowerMax
     *
     * @param integer $willpowerMax
     *
     * @return Race
     */
    public function setWillpowerMax($willpowerMax)
    {
        $this->willpowerMax = $willpowerMax;

        return $this;
    }

    /**
     * Get willpowerMax
     *
     * @return integer
     */
    public function getWillpowerMax()
    {
        return $this->willpowerMax;
    }

    /**
     * Set attributesPointsMax
     *
     * @param integer $attributePointsMax
     *
     * @return Race
     */
    public function setAttributePointsMax($attributePointsMax)
    {
        $this->attributePointsMax = $attributePointsMax;

        return $this;
    }

    /**
     * Get attributesPointsMax
     *
     * @return integer
     */
    public function getAttributePointsMax()
    {
        return $this->attributePointsMax;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Race
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public abstract function getTypes();
}
