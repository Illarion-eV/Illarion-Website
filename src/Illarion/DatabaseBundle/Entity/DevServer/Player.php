<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Player
 *
 * @ORM\Table(schema="devserver", name="player")
 * @ORM\Entity()
 */
class Player extends Server\Player
{
    /**
     * @var Chars
     *
     * @ORM\OneToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\Chars", inversedBy="player")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ply_playerid", referencedColumnName="chr_playerid"),
     * })
     */
    private $character;

    /**
     * @var PlayerItems
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\PlayerItems", mappedBy="player")
     */
    private $items;

    /**
     * @var PlayerSkills
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\PlayerSkills", mappedBy="player")
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
     * @return \Illarion\DatabaseBundle\Entity\DevServer\Chars
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set character
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\Chars $character
     *
     * @return Player
     */
    public function setCharacter(\Illarion\DatabaseBundle\Entity\DevServer\Chars $character = null)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Add item
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\PlayerItems $item
     *
     * @return Player
     */
    public function addItem(\Illarion\DatabaseBundle\Entity\DevServer\PlayerItems $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\PlayerItems $item
     */
    public function removeItem(\Illarion\DatabaseBundle\Entity\DevServer\PlayerItems $item)
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
     * @param \Illarion\DatabaseBundle\Entity\DevServer\PlayerSkills $skill
     *
     * @return Player
     */
    public function addSkill(\Illarion\DatabaseBundle\Entity\DevServer\PlayerSkills $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\PlayerSkills $skill
     */
    public function removeSkill(\Illarion\DatabaseBundle\Entity\DevServer\PlayerSkills $skill)
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
