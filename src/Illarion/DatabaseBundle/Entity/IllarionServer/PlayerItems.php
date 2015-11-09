<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * PlayerItems
 *
 * @ORM\Table(
 *     schema="illarionserver",
 *     name="playeritems",
 *     indexes={
 *         @ORM\Index(name="pit_player_id_idx", columns={"pit_playerid"})
 *     })
 * @ORM\Entity()
 */
class PlayerItems extends Server\PlayerItems
{
    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Player", inversedBy="items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pit_playerid", referencedColumnName="ply_playerid"),
     * })
     */
    private $player;

    /**
     * @var Items
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pit_itemid", referencedColumnName="itm_id"),
     * })
     */
    private $item;

    /**
     * Set player
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Player $player
     *
     * @return PlayerItems
     */
    public function setPlayer(\Illarion\DatabaseBundle\Entity\IllarionServer\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set item
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Items $item
     *
     * @return PlayerItems
     */
    public function setItem(\Illarion\DatabaseBundle\Entity\IllarionServer\Items $item = null)
    {
        $this->item = $item;

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
}
