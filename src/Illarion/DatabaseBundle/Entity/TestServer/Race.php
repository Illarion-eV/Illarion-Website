<?php

namespace Illarion\DatabaseBundle\Entity\TestServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Race
 *
 * @ORM\Table(schema="testserver", name="race")
 * @ORM\Entity
 */
class Race extends Server\Race
{
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\Chars", mappedBy="race")
     */
    private $chars;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\RaceTypes", mappedBy="race")
     */
    private $types;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chars = new \Doctrine\Common\Collections\ArrayCollection();
        $this->types = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add char
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\Chars $char
     *
     * @return Race
     */
    public function addChar(\Illarion\DatabaseBundle\Entity\TestServer\Chars $char)
    {
        $this->chars[] = $char;

        return $this;
    }

    /**
     * Remove char
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\Chars $char
     */
    public function removeChar(\Illarion\DatabaseBundle\Entity\TestServer\Chars $char)
    {
        $this->chars->removeElement($char);
    }

    /**
     * Get chars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChars()
    {
        return $this->chars;
    }

    /**
     * Add type
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\RaceTypes $type
     *
     * @return Race
     */
    public function addType(\Illarion\DatabaseBundle\Entity\TestServer\RaceTypes $type)
    {
        $this->types[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\RaceTypes $type
     */
    public function removeType(\Illarion\DatabaseBundle\Entity\TestServer\RaceTypes $type)
    {
        $this->types->removeElement($type);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypes()
    {
        return $this->types;
    }
}
