<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class CharacterGetResponse
{
    /**
     * The ID of the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("id")
     * @JMS\Since("1.0")
     */
    private $id;

    /**
     * The name of the character.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     * @JMS\Since("1.0")
     */
    private $name;

    /**
     * The ID of the race.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("race")
     * @JMS\Since("1.0")
     */
    private $race;

    /**
     * The ID of the race type.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("raceType")
     * @JMS\Since("1.0")
     */
    private $raceType;

    /**
     * The number of the race type.
     *
     * @var CharacterAttributesResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\CharacterAttributesResponse")
     * @JMS\SerializedName("attributes")
     * @JMS\Since("1.0")
     */
    private $attributes;

    /**
     * The date of birth of the character.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("dateOfBirth")
     * @JMS\Since("1.0")
     */
    private $dateOfBirth;

    /**
     * The height of the character in centimeters.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("bodyHeight")
     * @JMS\Since("1.0")
     */
    private $bodyHeight;

    /**
     * The weight of the character in grams.
     *
     * @var integer
     * @JMS\Type("integer")
     * @JMS\SerializedName("bodyWeight")
     * @JMS\Since("1.0")
     */
    private $bodyWeight;

    /**
     * The information regarding the appearance of the character.
     *
     * @var CharacterPaperDollResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\CharacterPaperDollResponse")
     * @JMS\SerializedName("paperDoll")
     * @JMS\Since("1.0")
     */
    private $paperDoll;


    /**
     * The information regarding the appearance of the character.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\CharacterItemResponse>")
     * @JMS\SerializedName("items")
     * @JMS\Since("1.0")
     */
    private $items;

    /**
     * Error information regarding character get response.
     *
     * This is only present if fetching the data failed.
     *
     * @var ErrorResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\ErrorResponse")
     * @JMS\SerializedName("error")
     * @JMS\Groups({"error"})
     * @JMS\Since("1.0")
     */
    private $error;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param int $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return int
     */
    public function getRaceType()
    {
        return $this->raceType;
    }

    /**
     * @param int $raceType
     */
    public function setRaceType($raceType)
    {
        $this->raceType = $raceType;
    }

    /**
     * @return CharacterAttributesResponse
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param CharacterAttributesResponse $attributes
     */
    public function setAttributes(CharacterAttributesResponse $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return int
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param int $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return int
     */
    public function getBodyHeight()
    {
        return $this->bodyHeight;
    }

    /**
     * @param int $bodyHeight
     */
    public function setBodyHeight($bodyHeight)
    {
        $this->bodyHeight = $bodyHeight;
    }

    /**
     * @return int
     */
    public function getBodyWeight()
    {
        return $this->bodyWeight;
    }

    /**
     * @param int $bodyWeight
     */
    public function setBodyWeight($bodyWeight)
    {
        $this->bodyWeight = $bodyWeight;
    }

    /**
     * @return CharacterPaperDollResponse
     */
    public function getPaperDoll()
    {
        return $this->paperDoll;
    }

    /**
     * @param CharacterPaperDollResponse $paperDoll
     */
    public function setPaperDoll(CharacterPaperDollResponse $paperDoll)
    {
        $this->paperDoll = $paperDoll;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * Add a item to the list.
     *
     * @param CharacterItemResponse $item
     */
    public function addItem(CharacterItemResponse $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return ErrorResponse
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param ErrorResponse $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }
}
