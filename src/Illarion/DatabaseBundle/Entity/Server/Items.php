<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\MappedSuperclass()
 */
class Items
{
    /**
     * @var integer
     *
     * @ORM\Column(name="itm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_volume", type="integer")
     */
    private $volume;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_weight", type="integer")
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_agingspeed", type="smallint")
     */
    private $agingSpeed;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_objectafterrot", type="integer")
     */
    private $objectAfterRotId;

    /**
     * @var string
     *
     * @ORM\Column(name="itm_script", type="string", length=50, nullable=true)
     */
    private $script;

    /**
     * @var boolean
     *
     * @ORM\Column(name="itm_rotsininventory", type="boolean")
     */
    private $rotsInInventory;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_brightness", type="smallint")
     */
    private $brightness;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_worth", type="integer")
     */
    private $worth;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_buystack", type="smallint")
     */
    private $buyStack;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_maxstack", type="smallint")
     */
    private $maxStack;

    /**
     * @var string
     *
     * @ORM\Column(name="itm_name_german", type="string", length=100)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="itm_name_english", type="string", length=100)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="itm_description_german", type="string", length=255)
     */
    private $descriptionDe;

    /**
     * @var string
     *
     * @ORM\Column(name="itm_description_english", type="string", length=255)
     */
    private $descriptionEn;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_rareness", type="smallint")
     */
    private $rareness;

    /**
     * @var string
     *
     * @ORM\Column(name="itm_name", type="string", length=50)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="itm_level", type="smallint")
     */
    private $level;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Items
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
     * Set volume
     *
     * @param integer $volume
     *
     * @return Items
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Items
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set agingSpeed
     *
     * @param integer $agingSpeed
     *
     * @return Items
     */
    public function setAgingSpeed($agingSpeed)
    {
        $this->agingSpeed = $agingSpeed;

        return $this;
    }

    /**
     * Get agingSpeed
     *
     * @return integer
     */
    public function getAgingSpeed()
    {
        return $this->agingSpeed;
    }

    /**
     * Set objectAfterRotId
     *
     * @param integer $objectAfterRotId
     *
     * @return Items
     */
    public function setObjectAfterRotId($objectAfterRotId)
    {
        $this->objectAfterRotId = $objectAfterRotId;

        return $this;
    }

    /**
     * Get objectAfterRotId
     *
     * @return integer
     */
    public function getObjectAfterRotId()
    {
        return $this->objectAfterRotId;
    }

    /**
     * Set script
     *
     * @param string $script
     *
     * @return Items
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get script
     *
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set rotsInInventory
     *
     * @param boolean $rotsInInventory
     *
     * @return Items
     */
    public function setRotsInInventory($rotsInInventory)
    {
        $this->rotsInInventory = $rotsInInventory;

        return $this;
    }

    /**
     * Get rotsInInventory
     *
     * @return boolean
     */
    public function getRotsInInventory()
    {
        return $this->rotsInInventory;
    }

    /**
     * Set brightness
     *
     * @param integer $brightness
     *
     * @return Items
     */
    public function setBrightness($brightness)
    {
        $this->brightness = $brightness;

        return $this;
    }

    /**
     * Get brightness
     *
     * @return integer
     */
    public function getBrightness()
    {
        return $this->brightness;
    }

    /**
     * Set worth
     *
     * @param integer $worth
     *
     * @return Items
     */
    public function setWorth($worth)
    {
        $this->worth = $worth;

        return $this;
    }

    /**
     * Get worth
     *
     * @return integer
     */
    public function getWorth()
    {
        return $this->worth;
    }

    /**
     * Set buyStack
     *
     * @param integer $buyStack
     *
     * @return Items
     */
    public function setBuyStack($buyStack)
    {
        $this->buyStack = $buyStack;

        return $this;
    }

    /**
     * Get buyStack
     *
     * @return integer
     */
    public function getBuyStack()
    {
        return $this->buyStack;
    }

    /**
     * Set maxStack
     *
     * @param integer $maxStack
     *
     * @return Items
     */
    public function setMaxStack($maxStack)
    {
        $this->maxStack = $maxStack;

        return $this;
    }

    /**
     * Get maxStack
     *
     * @return integer
     */
    public function getMaxStack()
    {
        return $this->maxStack;
    }

    /**
     * Set nameDe
     *
     * @param string $nameDe
     *
     * @return Items
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
     * @return Items
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
     * Set descriptionDe
     *
     * @param string $descriptionDe
     *
     * @return Items
     */
    public function setDescriptionDe($descriptionDe)
    {
        $this->descriptionDe = $descriptionDe;

        return $this;
    }

    /**
     * Get descriptionDe
     *
     * @return string
     */
    public function getDescriptionDe()
    {
        return $this->descriptionDe;
    }

    /**
     * Set descriptionEn
     *
     * @param string $descriptionEn
     *
     * @return Items
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set rareness
     *
     * @param integer $rareness
     *
     * @return Items
     */
    public function setRareness($rareness)
    {
        $this->rareness = $rareness;

        return $this;
    }

    /**
     * Get rareness
     *
     * @return integer
     */
    public function getRareness()
    {
        return $this->rareness;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Items
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
     * Set level
     *
     * @param integer $level
     *
     * @return Items
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }
}
