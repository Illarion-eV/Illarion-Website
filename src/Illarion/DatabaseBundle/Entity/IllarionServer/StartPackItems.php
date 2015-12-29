<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * StartPackItems
 *
 * @ORM\Table(schema="illarionserver", name="startpack_items")
 * @ORM\Entity
 */
class StartPackItems extends Server\StartPackItems
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spi_id", referencedColumnName="stp_id")
     * })
     */
    private $startPack;

    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\Items
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spi_item_id", referencedColumnName="itm_id")
     * })
     */
    private $item;

    /**
     * Get startPack
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks
     */
    public function getStartPack()
    {
        return $this->startPack;
    }

    /**
     * Set startPack
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks $startPack
     *
     * @return StartPackItems
     */
    public function setStartPack(\Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks $startPack = null)
    {
        $this->startPack = $startPack;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\Items
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set item
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Items $item
     *
     * @return StartPackItems
     */
    public function setItem(\Illarion\DatabaseBundle\Entity\IllarionServer\Items $item = null)
    {
        $this->item = $item;

        return $this;
    }
}
