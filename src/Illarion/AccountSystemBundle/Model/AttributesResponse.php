<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class AttributesResponse
{
    /**
     * The value range for the age of the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("age")
     * @JMS\Since("1.0")
     */
    private $age;

    /**
     * The value range of the weight in grams.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("weight")
     * @JMS\Since("1.0")
     */
    private $weight;

    /**
     * The valid range of the height of centimeters.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("height")
     * @JMS\Since("1.0")
     */
    private $height;

    /**
     * The valid range of the agility for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("agility")
     * @JMS\Since("1.0")
     */
    private $agility;

    /**
     * The valid range of the constitution for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("constitution")
     * @JMS\Since("1.0")
     */
    private $constitution;

    /**
     * The valid range of the dexterity for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("dexterity")
     * @JMS\Since("1.0")
     */
    private $dexterity;

    /**
     * The valid range of the essence for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("essence")
     * @JMS\Since("1.0")
     */
    private $essence;

    /**
     * The valid range of the intelligence for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("intelligence")
     * @JMS\Since("1.0")
     */
    private $intelligence;

    /**
     * The valid range of the perception for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("perception")
     * @JMS\Since("1.0")
     */
    private $perception;

    /**
     * The valid range of the strength for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("strength")
     * @JMS\Since("1.0")
     */
    private $strength;

    /**
     * The valid range of the willpower for the character.
     *
     * @var MinMaxResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\MinMaxResponse")
     * @JMS\SerializedName("willpower")
     * @JMS\Since("1.0")
     */
    private $willpower;

    /**
     * The total attribute points.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("totalAttributePoints")
     * @JMS\Since("1.0")
     */
    private $totalAttributePoints;

    /**
     * @return MinMaxResponse
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param MinMaxResponse $age
     */
    public function setAge(MinMaxResponse $age)
    {
        $this->age = $age;
    }

    /**
     * @return MinMaxResponse
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param MinMaxResponse $weight
     */
    public function setWeight(MinMaxResponse $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return MinMaxResponse
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param MinMaxResponse $height
     */
    public function setHeight(MinMaxResponse $height)
    {
        $this->height = $height;
    }

    /**
     * @return MinMaxResponse
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * @param MinMaxResponse $agility
     */
    public function setAgility(MinMaxResponse $agility)
    {
        $this->agility = $agility;
    }

    /**
     * @return MinMaxResponse
     */
    public function getConstitution()
    {
        return $this->constitution;
    }

    /**
     * @param MinMaxResponse $constitution
     */
    public function setConstitution(MinMaxResponse $constitution)
    {
        $this->constitution = $constitution;
    }

    /**
     * @return MinMaxResponse
     */
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * @param MinMaxResponse $dexterity
     */
    public function setDexterity(MinMaxResponse $dexterity)
    {
        $this->dexterity = $dexterity;
    }

    /**
     * @return MinMaxResponse
     */
    public function getEssence()
    {
        return $this->essence;
    }

    /**
     * @param MinMaxResponse $essence
     */
    public function setEssence(MinMaxResponse $essence)
    {
        $this->essence = $essence;
    }

    /**
     * @return MinMaxResponse
     */
    public function getIntelligence()
    {
        return $this->intelligence;
    }

    /**
     * @param MinMaxResponse $intelligence
     */
    public function setIntelligence(MinMaxResponse $intelligence)
    {
        $this->intelligence = $intelligence;
    }

    /**
     * @return MinMaxResponse
     */
    public function getPerception()
    {
        return $this->perception;
    }

    /**
     * @param MinMaxResponse $perception
     */
    public function setPerception(MinMaxResponse $perception)
    {
        $this->perception = $perception;
    }

    /**
     * @return MinMaxResponse
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param MinMaxResponse $strength
     */
    public function setStrength(MinMaxResponse $strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return MinMaxResponse
     */
    public function getWillpower()
    {
        return $this->willpower;
    }

    /**
     * @param MinMaxResponse $willpower
     */
    public function setWillpower(MinMaxResponse $willpower)
    {
        $this->willpower = $willpower;
    }

    /**
     * @return int
     */
    public function getTotalAttributePoints()
    {
        return $this->totalAttributePoints;
    }

    /**
     * @param int $totalAttributePoints
     */
    public function setTotalAttributePoints($totalAttributePoints)
    {
        $this->totalAttributePoints = $totalAttributePoints;
    }
}
