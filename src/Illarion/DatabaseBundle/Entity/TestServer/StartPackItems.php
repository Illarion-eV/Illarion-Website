<?php

namespace Illarion\DatabaseBundle\Entity\TestServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * StartPackItems
 *
 * @ORM\Table(schema="testserver", name="startpack_items")
 * @ORM\Entity
 */
class StartPackItems extends Server\StartPackItems
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\TestServer\StartPacks
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\StartPacks", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spi_id", referencedColumnName="stp_id")
     * })
     */
    private $startPack;

    /**
     * @var \Illarion\DatabaseBundle\Entity\TestServer\Items
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spi_item_id", referencedColumnName="itm_id")
     * })
     */
    private $item;

    /**
     * Set startPack
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\StartPacks $startPack
     *
     * @return StartPackItems
     */
    public function setStartPack(\Illarion\DatabaseBundle\Entity\TestServer\StartPacks $startPack = null)
    {
        $this->startPack = $startPack;

        return $this;
    }

    /**
     * Get startPack
     *
     * @return \Illarion\DatabaseBundle\Entity\TestServer\StartPacks
     */
    public function getStartPack()
    {
        return $this->startPack;
    }

    /**
     * Set item
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\Items $item
     *
     * @return StartPackItems
     */
    public function setItem(\Illarion\DatabaseBundle\Entity\TestServer\Items $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Illarion\DatabaseBundle\Entity\TestServer\Items
     */
    public function getItem()
    {
        return $this->item;
    }
}
