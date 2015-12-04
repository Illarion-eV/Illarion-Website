<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class CharacterAttributesResponse
{
    /**
     * The valid range of the agility for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("agility")
     * @JMS\Since("1.0")
     */
    private $agility;

    /**
     * The valid range of the constitution for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("constitution")
     * @JMS\Since("1.0")
     */
    private $constitution;

    /**
     * The valid range of the dexterity for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("dexterity")
     * @JMS\Since("1.0")
     */
    private $dexterity;

    /**
     * The valid range of the essence for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("essence")
     * @JMS\Since("1.0")
     */
    private $essence;

    /**
     * The valid range of the intelligence for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("intelligence")
     * @JMS\Since("1.0")
     */
    private $intelligence;

    /**
     * The valid range of the perception for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("perception")
     * @JMS\Since("1.0")
     */
    private $perception;

    /**
     * The valid range of the strength for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("strength")
     * @JMS\Since("1.0")
     */
    private $strength;

    /**
     * The valid range of the willpower for the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("willpower")
     * @JMS\Since("1.0")
     */
    private $willpower;

    /**
     * @return int
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * @param int $agility
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;
    }

    /**
     * @return int
     */
    public function getConstitution()
    {
        return $this->constitution;
    }

    /**
     * @param int $constitution
     */
    public function setConstitution($constitution)
    {
        $this->constitution = $constitution;
    }

    /**
     * @return int
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * @param int $dexterity
     */
    public function setDexterity($dexterity)
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return int
     */
    public function getEssence()
    {
        return $this->essence;
    }

    /**
     * @param int $essence
     */
    public function setEssence($essence)
    {
        $this->essence = $essence;
    }

    /**
     * @return int
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * @param int $intelligence
     */
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence;
    }

    /**
     * @return int
     */
    public function getPerception()
    {
        return $this->perception;
    }

    /**
     * @param int $perception
     */
    public function setPerception($perception)
    {
        $this->perception = $perception;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return int
     */
    public function getWillpower()
    {
        return $this->willpower;
    }

    /**
     * @param int $willpower
     */
    public function setWillpower($willpower)
    {
        $this->willpower = $willpower;
    }
}
