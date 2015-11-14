<?php

namespace Illarion\DatabaseBundle\Entity\Homepage;

use Doctrine\ORM\Mapping as ORM;

/**
 * CharacterDetails
 *
 * @ORM\Table(schema="homepage", name="character_details")
 * @ORM\Entity()
 */
class CharacterDetails
{
    /**
     * @var integer
     *
     * @ORM\Column(name="char_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $charId;

    /**
     * @var string
     *
     * @ORM\Column(name="description_de", type="test")
     */
    private $descriptionDe;

    /**
     * @var string
     *
     * @ORM\Column(name="description_us", type="test")
     */
    private $descriptionEn;

    /**
     * @var string
     *
     * @ORM\Column(name="story_de", type="test")
     */
    private $storyDe;

    /**
     * @var string
     *
     * @ORM\Column(name="story_us", type="test")
     */
    private $storyEn;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=50)
     */
    private $pictureFile;

    /**
     * @var integer
     *
     * @ORM\Column(name="picture_height", type="integer")
     */
    private $pictureHeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="picture_width", type="integer")
     */
    private $pictureWidth;

    /**
     * Set charId
     *
     * @param integer $charId
     *
     * @return CharacterDetails
     */
    public function setCharId($charId)
    {
        $this->charId = $charId;

        return $this;
    }

    /**
     * Get charId
     *
     * @return integer
     */
    public function getCharId()
    {
        return $this->charId;
    }

    /**
     * Set descriptionDe
     *
     * @param \test $descriptionDe
     *
     * @return CharacterDetails
     */
    public function setDescriptionDe(\test $descriptionDe)
    {
        $this->descriptionDe = $descriptionDe;

        return $this;
    }

    /**
     * Get descriptionDe
     *
     * @return \test
     */
    public function getDescriptionDe()
    {
        return $this->descriptionDe;
    }

    /**
     * Set descriptionEn
     *
     * @param \test $descriptionEn
     *
     * @return CharacterDetails
     */
    public function setDescriptionEn(\test $descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    /**
     * Get descriptionEn
     *
     * @return \test
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * Set storyDe
     *
     * @param \test $storyDe
     *
     * @return CharacterDetails
     */
    public function setStoryDe(\test $storyDe)
    {
        $this->storyDe = $storyDe;

        return $this;
    }

    /**
     * Get storyDe
     *
     * @return \test
     */
    public function getStoryDe()
    {
        return $this->storyDe;
    }

    /**
     * Set storyEn
     *
     * @param \test $storyEn
     *
     * @return CharacterDetails
     */
    public function setStoryEn(\test $storyEn)
    {
        $this->storyEn = $storyEn;

        return $this;
    }

    /**
     * Get storyEn
     *
     * @return \test
     */
    public function getStoryEn()
    {
        return $this->storyEn;
    }

    /**
     * Set pictureFile
     *
     * @param string $pictureFile
     *
     * @return CharacterDetails
     */
    public function setPictureFile($pictureFile)
    {
        $this->pictureFile = $pictureFile;

        return $this;
    }

    /**
     * Get pictureFile
     *
     * @return string
     */
    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    /**
     * Set pictureHeight
     *
     * @param integer $pictureHeight
     *
     * @return CharacterDetails
     */
    public function setPictureHeight($pictureHeight)
    {
        $this->pictureHeight = $pictureHeight;

        return $this;
    }

    /**
     * Get pictureHeight
     *
     * @return integer
     */
    public function getPictureHeight()
    {
        return $this->pictureHeight;
    }

    /**
     * Set pictureWidth
     *
     * @param integer $pictureWidth
     *
     * @return CharacterDetails
     */
    public function setPictureWidth($pictureWidth)
    {
        $this->pictureWidth = $pictureWidth;

        return $this;
    }

    /**
     * Get pictureWidth
     *
     * @return integer
     */
    public function getPictureWidth()
    {
        return $this->pictureWidth;
    }
}
