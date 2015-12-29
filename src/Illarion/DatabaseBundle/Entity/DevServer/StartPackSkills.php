<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * StartPackSkills
 *
 * @ORM\Table(schema="devserver", name="startpack_skills")
 * @ORM\Entity
 */
class StartPackSkills extends Server\StartPackSkills
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\Skills
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\Skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sps_skill_id", referencedColumnName="skl_skill_id")
     * })
     */
    private $skill;

    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\StartPacks
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\StartPacks", inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sps_id", referencedColumnName="stp_id")
     * })
     */
    private $startPack;

    /**
     * Get skill
     *
     * @return \Illarion\DatabaseBundle\Entity\DevServer\Skills
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set skill
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\Skills $skill
     *
     * @return StartPackSkills
     */
    public function setSkill(\Illarion\DatabaseBundle\Entity\DevServer\Skills $skill = null)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get startPack
     *
     * @return \Illarion\DatabaseBundle\Entity\DevServer\StartPacks
     */
    public function getStartPack()
    {
        return $this->startPack;
    }

    /**
     * Set startPack
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\StartPacks $startPack
     *
     * @return StartPackSkills
     */
    public function setStartPack(\Illarion\DatabaseBundle\Entity\DevServer\StartPacks $startPack = null)
    {
        $this->startPack = $startPack;

        return $this;
    }
}
