<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Player
 *
 * @ORM\Table(schema="illarionserver", name="player")
 * @ORM\Entity()
 */
class Player extends Server\Player
{
    /**
     * @var Chars
     *
     * @ORM\OneToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Chars", inversedBy="player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ply_playerid", referencedColumnName="chr_playerid"),
     * })
     */
    private $character;

    /**
     * Set character
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Chars $character
     *
     * @return Player
     */
    public function setCharacter(\Illarion\DatabaseBundle\Entity\IllarionServer\Chars $character = null)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\Chars
     */
    public function getCharacter()
    {
        return $this->character;
    }
}
