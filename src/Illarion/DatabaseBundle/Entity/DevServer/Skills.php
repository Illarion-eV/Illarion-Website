<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Skills
 *
 * @ORM\Table(schema="devserver", name="skills")
 * @ORM\Entity
 */
class Skills extends Server\Skills
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\SkillGroups
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\SkillGroups", inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="skl_group_id", referencedColumnName="skg_group_id")
     * })
     */
    private $group;

    /**
     * Get group
     *
     * @return \Illarion\DatabaseBundle\Entity\DevServer\SkillGroups
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set group
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\SkillGroups $group
     *
     * @return Skills
     */
    public function setGroup(\Illarion\DatabaseBundle\Entity\DevServer\SkillGroups $group = null)
    {
        $this->group = $group;

        return $this;
    }
}
