<?php

namespace Illarion\DatabaseBundle\Entity\TestServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Player
 *
 * @ORM\Table(schema="testserver", name="player")
 * @ORM\Entity()
 */
class Player extends Server\Player
{
    /**
     * @var Chars
     *
     * @ORM\OneToOne(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\Chars", inversedBy="player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ply_playerid", referencedColumnName="chr_playerid"),
     * })
     */
    private $character;

    /**
     * Set character
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\Chars $character
     *
     * @return Player
     */
    public function setCharacter(\Illarion\DatabaseBundle\Entity\TestServer\Chars $character = null)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return \Illarion\DatabaseBundle\Entity\TestServer\Chars
     */
    public function getCharacter()
    {
        return $this->character;
    }
}
