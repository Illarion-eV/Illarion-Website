<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * PlayerSkills
 *
 * @ORM\Table(
 *     schema="illarionserver",
 *     name="playerskills",
 *     indexes={
 *         @ORM\Index(name="psk_player_id_idx", columns={"psk_playerid"})
 *     })
 * @ORM\Entity()
 */
class PlayerSkills extends Server\PlayerSkills
{
    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Player", inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="psk_playerid", referencedColumnName="ply_playerid"),
     * })
     */
    private $player;

    /**
     * @var Skills
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="psk_skill_id", referencedColumnName="skl_skill_id"),
     * })
     */
    private $skill;

    /**
     * Set player
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Player $player
     *
     * @return PlayerSkills
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
     * Set skill
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Skills $skill
     *
     * @return PlayerSkills
     */
    public function setSkill(\Illarion\DatabaseBundle\Entity\IllarionServer\Skills $skill = null)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\Skills
     */
    public function getSkill()
    {
        return $this->skill;
    }
}
