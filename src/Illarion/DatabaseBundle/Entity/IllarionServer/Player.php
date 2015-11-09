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
     * @var PlayerItems
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\PlayerItems", mappedBy="player")
     */
    private $items;

    /**
     * @var PlayerSkills
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\PlayerSkills", mappedBy="player")
     */
    private $skills;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add item
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\PlayerItems $item
     *
     * @return Player
     */
    public function addItem(\Illarion\DatabaseBundle\Entity\IllarionServer\PlayerItems $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\PlayerItems $item
     */
    public function removeItem(\Illarion\DatabaseBundle\Entity\IllarionServer\PlayerItems $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add skill
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\PlayerSkills $skill
     *
     * @return Player
     */
    public function addSkill(\Illarion\DatabaseBundle\Entity\IllarionServer\PlayerSkills $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\PlayerSkills $skill
     */
    public function removeSkill(\Illarion\DatabaseBundle\Entity\IllarionServer\PlayerSkills $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
