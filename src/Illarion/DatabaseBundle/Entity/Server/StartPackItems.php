<?php

namespace Illarion\DatabaseBundle\Entity\Server;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartPackItems
 *
 * @ORM\MappedSuperclass()
 */
abstract class StartPackItems
{
    /**
     * @var integer
     *
     * @ORM\Column(name="spi_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $packId;

    /**
     * @var integer
     *
     * @ORM\Column(name="spi_linenumber", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $linenumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="spi_item_id", type="integer")
     */
    private $itemId;

    /**
     * @var integer
     *
     * @ORM\Column(name="spi_number", type="smallint")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="spi_quality", type="smallint")
     */
    private $quality;

    /**
     * Set packId
     *
     * @param integer $packId
     *
     * @return StartPackItems
     */
    public function setPackId($packId)
    {
        $this->packId = $packId;

        return $this;
    }

    /**
     * Get packId
     *
     * @return integer
     */
    public function getPackId()
    {
        return $this->packId;
    }

    /**
     * Set linenumber
     *
     * @param integer $linenumber
     *
     * @return StartPackItems
     */
    public function setLinenumber($linenumber)
    {
        $this->linenumber = $linenumber;

        return $this;
    }

    /**
     * Get linenumber
     *
     * @return integer
     */
    public function getLinenumber()
    {
        return $this->linenumber;
    }

    /**
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return StartPackItems
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return StartPackItems
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     *
     * @return StartPackItems
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Get item
     *
     * @return \Illarion\DatabaseBundle\Entity\Server\Items
     */
    public abstract function getItem();
}
