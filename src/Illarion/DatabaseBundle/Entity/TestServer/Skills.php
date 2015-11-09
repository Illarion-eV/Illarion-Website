<?php

namespace Illarion\DatabaseBundle\Entity\TestServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Skills
 *
 * @ORM\Table(schema="testserver", name="skills")
 * @ORM\Entity
 */
class Skills extends Server\Skills
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\TestServer\SkillGroups
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\SkillGroups", inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="skl_group_id", referencedColumnName="skg_group_id")
     * })
     */
    private $group;

    /**
     * Get group
     *
     * @return \Illarion\DatabaseBundle\Entity\TestServer\SkillGroups
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set group
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\SkillGroups $group
     *
     * @return Skills
     */
    public function setGroup(\Illarion\DatabaseBundle\Entity\TestServer\SkillGroups $group = null)
    {
        $this->group = $group;

        return $this;
    }
}
