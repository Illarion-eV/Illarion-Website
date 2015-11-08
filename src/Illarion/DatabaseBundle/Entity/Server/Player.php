<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 *
 * @package Illarion\DatabaseBundle\Entity\Server
 * @ORM\MappedSuperclass()
 */
abstract class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ply_playerid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_posx", type="smallint")
     */
    private $posX;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_posy", type="smallint")
     */
    private $posY;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_posz", type="smallint")
     */
    private $posZ;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_faceto", type="smallint")
     */
    private $faceTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_age", type="smallint")
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_weight", type="integer")
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_body_height", type="smallint")
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_hitpoints", type="smallint")
     */
    private $hitPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_mana", type="smallint")
     */
    private $manaPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_attitude", type="smallint")
     */
    private $attitude;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_luck", type="smallint")
     */
    private $luck;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_strength", type="smallint")
     */
    private $strength;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_dexterity", type="smallint")
     */
    private $dexterity;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_constitution", type="smallint")
     */
    private $consitution;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_agility", type="smallint")
     */
    private $agility;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_intelligence", type="smallint")
     */
    private $intelligence;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_perception", type="smallint")
     */
    private $perception;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_willpower", type="smallint")
     */
    private $willpower;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_essence", type="smallint")
     */
    private $essence;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_foodlevel", type="integer")
     */
    private $foodPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_appearance", type="integer")
     */
    private $appearance;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_lifestate", type="smallint")
     */
    private $lifeState;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_magictype", type="smallint")
     */
    private $magicType;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_magicflagsbard", type="bigint")
     */
    private $magicFlagsBard;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_magicflagsdruid", type="bigint")
     */
    private $magicFlagsDruid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_magicflagsmage", type="bigint")
     */
    private $magicFlagsMage;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_magicflagspriest", type="bigint")
     */
    private $magicFlagsPriest;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_lastmusic", type="integer")
     */
    private $lastMusic;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_poison", type="smallint")
     */
    private $poisonPoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_mental_capacity", type="integer")
     */
    private $mentalCapacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_dob", type="integer")
     */
    private $dateOfBirth;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_hair", type="smallint")
     */
    private $hairId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_beard", type="smallint")
     */
    private $beardId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_hairred", type="smallint")
     */
    private $hairColorRed;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_hairgreen", type="smallint")
     */
    private $hairColorGreen;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_hairblue", type="smallint")
     */
    private $hairColorBlue;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_hairalpha", type="smallint")
     */
    private $hairColorAlpha;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_skinred", type="smallint")
     */
    private $skinColorRed;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_skingreen", type="smallint")
     */
    private $skinColorGreen;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_skinblue", type="smallint")
     */
    private $skinColorBlue;

    /**
     * @var integer
     *
     * @ORM\Column(name="ply_skinalpha", type="smallint")
     */
    private $skinColorAlpha;

    /**
     * Set playerId
     *
     * @param integer $playerId
     *
     * @return Player
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * Get playerId
     *
     * @return integer
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * Set posX
     *
     * @param integer $posX
     *
     * @return Player
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;

        return $this;
    }

    /**
     * Get posX
     *
     * @return integer
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set posY
     *
     * @param integer $posY
     *
     * @return Player
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;

        return $this;
    }

    /**
     * Get posY
     *
     * @return integer
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set posZ
     *
     * @param integer $posZ
     *
     * @return Player
     */
    public function setPosZ($posZ)
    {
        $this->posZ = $posZ;

        return $this;
    }

    /**
     * Get posZ
     *
     * @return integer
     */
    public function getPosZ()
    {
        return $this->posZ;
    }

    /**
     * Set faceTo
     *
     * @param integer $faceTo
     *
     * @return Player
     */
    public function setFaceTo($faceTo)
    {
        $this->faceTo = $faceTo;

        return $this;
    }

    /**
     * Get faceTo
     *
     * @return integer
     */
    public function getFaceTo()
    {
        return $this->faceTo;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Player
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Player
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
     * Set height
     *
     * @param integer $height
     *
     * @return Player
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set hitPoints
     *
     * @param integer $hitPoints
     *
     * @return Player
     */
    public function setHitPoints($hitPoints)
    {
        $this->hitPoints = $hitPoints;

        return $this;
    }

    /**
     * Get hitPoints
     *
     * @return integer
     */
    public function getHitPoints()
    {
        return $this->hitPoints;
    }

    /**
     * Set manaPoints
     *
     * @param integer $manaPoints
     *
     * @return Player
     */
    public function setManaPoints($manaPoints)
    {
        $this->manaPoints = $manaPoints;

        return $this;
    }

    /**
     * Get manaPoints
     *
     * @return integer
     */
    public function getManaPoints()
    {
        return $this->manaPoints;
    }

    /**
     * Set attitude
     *
     * @param integer $attitude
     *
     * @return Player
     */
    public function setAttitude($attitude)
    {
        $this->attitude = $attitude;

        return $this;
    }

    /**
     * Get attitude
     *
     * @return integer
     */
    public function getAttitude()
    {
        return $this->attitude;
    }

    /**
     * Set luck
     *
     * @param integer $luck
     *
     * @return Player
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * Get luck
     *
     * @return integer
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     *
     * @return Player
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set dexterity
     *
     * @param integer $dexterity
     *
     * @return Player
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    /**
     * Get dexterity
     *
     * @return integer
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * Set consitution
     *
     * @param integer $consitution
     *
     * @return Player
     */
    public function setConsitution($consitution)
    {
        $this->consitution = $consitution;

        return $this;
    }

    /**
     * Get consitution
     *
     * @return integer
     */
    public function getConsitution()
    {
        return $this->consitution;
    }

    /**
     * Set agility
     *
     * @param integer $agility
     *
     * @return Player
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;

        return $this;
    }

    /**
     * Get agility
     *
     * @return integer
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set intelligence
     *
     * @param integer $intelligence
     *
     * @return Player
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    /**
     * Get intelligence
     *
     * @return integer
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * Set perception
     *
     * @param integer $perception
     *
     * @return Player
     */
    public function setPerception($perception)
    {
        $this->perception = $perception;

        return $this;
    }

    /**
     * Get perception
     *
     * @return integer
     */
    public function getPerception()
    {
        return $this->perception;
    }

    /**
     * Set willpower
     *
     * @param integer $willpower
     *
     * @return Player
     */
    public function setWillpower($willpower)
    {
        $this->willpower = $willpower;

        return $this;
    }

    /**
     * Get willpower
     *
     * @return integer
     */
    public function getWillpower()
    {
        return $this->willpower;
    }

    /**
     * Set foodPoints
     *
     * @param integer $foodPoints
     *
     * @return Player
     */
    public function setFoodPoints($foodPoints)
    {
        $this->foodPoints = $foodPoints;

        return $this;
    }

    /**
     * Get foodPoints
     *
     * @return integer
     */
    public function getFoodPoints()
    {
        return $this->foodPoints;
    }

    /**
     * Set appearance
     *
     * @param integer $appearance
     *
     * @return Player
     */
    public function setAppearance($appearance)
    {
        $this->appearance = $appearance;

        return $this;
    }

    /**
     * Get appearance
     *
     * @return integer
     */
    public function getAppearance()
    {
        return $this->appearance;
    }

    /**
     * Set lifeState
     *
     * @param integer $lifeState
     *
     * @return Player
     */
    public function setLifeState($lifeState)
    {
        $this->lifeState = $lifeState;

        return $this;
    }

    /**
     * Get lifeState
     *
     * @return integer
     */
    public function getLifeState()
    {
        return $this->lifeState;
    }

    /**
     * Set magicType
     *
     * @param integer $magicType
     *
     * @return Player
     */
    public function setMagicType($magicType)
    {
        $this->magicType = $magicType;

        return $this;
    }

    /**
     * Get magicType
     *
     * @return integer
     */
    public function getMagicType()
    {
        return $this->magicType;
    }

    /**
     * Set magicFlagsBard
     *
     * @param integer $magicFlagsBard
     *
     * @return Player
     */
    public function setMagicFlagsBard($magicFlagsBard)
    {
        $this->magicFlagsBard = $magicFlagsBard;

        return $this;
    }

    /**
     * Get magicFlagsBard
     *
     * @return integer
     */
    public function getMagicFlagsBard()
    {
        return $this->magicFlagsBard;
    }

    /**
     * Set magicFlagsDruid
     *
     * @param integer $magicFlagsDruid
     *
     * @return Player
     */
    public function setMagicFlagsDruid($magicFlagsDruid)
    {
        $this->magicFlagsDruid = $magicFlagsDruid;

        return $this;
    }

    /**
     * Get magicFlagsDruid
     *
     * @return integer
     */
    public function getMagicFlagsDruid()
    {
        return $this->magicFlagsDruid;
    }

    /**
     * Set magicFlagsMage
     *
     * @param integer $magicFlagsMage
     *
     * @return Player
     */
    public function setMagicFlagsMage($magicFlagsMage)
    {
        $this->magicFlagsMage = $magicFlagsMage;

        return $this;
    }

    /**
     * Get magicFlagsMage
     *
     * @return integer
     */
    public function getMagicFlagsMage()
    {
        return $this->magicFlagsMage;
    }

    /**
     * Set magicFlagsPriest
     *
     * @param integer $magicFlagsPriest
     *
     * @return Player
     */
    public function setMagicFlagsPriest($magicFlagsPriest)
    {
        $this->magicFlagsPriest = $magicFlagsPriest;

        return $this;
    }

    /**
     * Get magicFlagsPriest
     *
     * @return integer
     */
    public function getMagicFlagsPriest()
    {
        return $this->magicFlagsPriest;
    }

    /**
     * Set lastMusic
     *
     * @param integer $lastMusic
     *
     * @return Player
     */
    public function setLastMusic($lastMusic)
    {
        $this->lastMusic = $lastMusic;

        return $this;
    }

    /**
     * Get lastMusic
     *
     * @return integer
     */
    public function getLastMusic()
    {
        return $this->lastMusic;
    }

    /**
     * Set poisonPoints
     *
     * @param integer $poisonPoints
     *
     * @return Player
     */
    public function setPoisonPoints($poisonPoints)
    {
        $this->poisonPoints = $poisonPoints;

        return $this;
    }

    /**
     * Get poisonPoints
     *
     * @return integer
     */
    public function getPoisonPoints()
    {
        return $this->poisonPoints;
    }

    /**
     * Set mentalCapacity
     *
     * @param integer $mentalCapacity
     *
     * @return Player
     */
    public function setMentalCapacity($mentalCapacity)
    {
        $this->mentalCapacity = $mentalCapacity;

        return $this;
    }

    /**
     * Get mentalCapacity
     *
     * @return integer
     */
    public function getMentalCapacity()
    {
        return $this->mentalCapacity;
    }

    /**
     * Set dateOfBirth
     *
     * @param integer $dateOfBirth
     *
     * @return Player
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return integer
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set hairId
     *
     * @param integer $hairId
     *
     * @return Player
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
     * Set beardId
     *
     * @param integer $beardId
     *
     * @return Player
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
     * Set hairColorRed
     *
     * @param integer $hairColorRed
     *
     * @return Player
     */
    public function setHairColorRed($hairColorRed)
    {
        $this->hairColorRed = $hairColorRed;

        return $this;
    }

    /**
     * Get hairColorRed
     *
     * @return integer
     */
    public function getHairColorRed()
    {
        return $this->hairColorRed;
    }

    /**
     * Set hairColorGreen
     *
     * @param integer $hairColorGreen
     *
     * @return Player
     */
    public function setHairColorGreen($hairColorGreen)
    {
        $this->hairColorGreen = $hairColorGreen;

        return $this;
    }

    /**
     * Get hairColorGreen
     *
     * @return integer
     */
    public function getHairColorGreen()
    {
        return $this->hairColorGreen;
    }

    /**
     * Set hairColorBlue
     *
     * @param integer $hairColorBlue
     *
     * @return Player
     */
    public function setHairColorBlue($hairColorBlue)
    {
        $this->hairColorBlue = $hairColorBlue;

        return $this;
    }

    /**
     * Get hairColorBlue
     *
     * @return integer
     */
    public function getHairColorBlue()
    {
        return $this->hairColorBlue;
    }

    /**
     * Set hairColorAlpha
     *
     * @param integer $hairColorAlpha
     *
     * @return Player
     */
    public function setHairColorAlpha($hairColorAlpha)
    {
        $this->hairColorAlpha = $hairColorAlpha;

        return $this;
    }

    /**
     * Get hairColorAlpha
     *
     * @return integer
     */
    public function getHairColorAlpha()
    {
        return $this->hairColorAlpha;
    }

    /**
     * Set skinColorRed
     *
     * @param integer $skinColorRed
     *
     * @return Player
     */
    public function setSkinColorRed($skinColorRed)
    {
        $this->skinColorRed = $skinColorRed;

        return $this;
    }

    /**
     * Get skinColorRed
     *
     * @return integer
     */
    public function getSkinColorRed()
    {
        return $this->skinColorRed;
    }

    /**
     * Set skinColorGreen
     *
     * @param integer $skinColorGreen
     *
     * @return Player
     */
    public function setSkinColorGreen($skinColorGreen)
    {
        $this->skinColorGreen = $skinColorGreen;

        return $this;
    }

    /**
     * Get skinColorGreen
     *
     * @return integer
     */
    public function getSkinColorGreen()
    {
        return $this->skinColorGreen;
    }

    /**
     * Set skinColorBlue
     *
     * @param integer $skinColorBlue
     *
     * @return Player
     */
    public function setSkinColorBlue($skinColorBlue)
    {
        $this->skinColorBlue = $skinColorBlue;

        return $this;
    }

    /**
     * Get skinColorBlue
     *
     * @return integer
     */
    public function getSkinColorBlue()
    {
        return $this->skinColorBlue;
    }

    /**
     * Set skinColorAlpha
     *
     * @param integer $skinColorAlpha
     *
     * @return Player
     */
    public function setSkinColorAlpha($skinColorAlpha)
    {
        $this->skinColorAlpha = $skinColorAlpha;

        return $this;
    }

    /**
     * Get skinColorAlpha
     *
     * @return integer
     */
    public function getSkinColorAlpha()
    {
        return $this->skinColorAlpha;
    }

    /**
     * Get character
     *
     * @return \Illarion\DatabaseBundle\Entity\Server\Chars
     */
    public abstract function getCharacter();

    /**
     * Set essence
     *
     * @param integer $essence
     *
     * @return Player
     */
    public function setEssence($essence)
    {
        $this->essence = $essence;

        return $this;
    }

    /**
     * Get essence
     *
     * @return integer
     */
    public function getEssence()
    {
        return $this->essence;
    }
}
