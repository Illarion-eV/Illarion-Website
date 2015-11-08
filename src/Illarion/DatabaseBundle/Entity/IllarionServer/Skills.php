<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Skills
 *
 * @ORM\Table(schema="illarionserver", name="skills")
 * @ORM\Entity
 */
class Skills extends Server\Skills
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\SkillGroups
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\SkillGroups", inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="skl_group_id", referencedColumnName="skg_group_id")
     * })
     */
    private $group;

    /**
     * Set group
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\SkillGroups $group
     *
     * @return Skills
     */
    public function setGroup(\Illarion\DatabaseBundle\Entity\IllarionServer\SkillGroups $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\SkillGroups
     */
    public function getGroup()
    {
        return $this->group;
    }
}
