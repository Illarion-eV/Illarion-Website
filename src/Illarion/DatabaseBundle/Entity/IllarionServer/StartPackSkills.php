<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * StartPackSkills
 *
 * @ORM\Table(schema="illarionserver", name="startpack_skills")
 * @ORM\Entity
 */
class StartPackSkills extends Server\StartPackSkills
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\Skills
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sps_skill_id", referencedColumnName="skl_skill_id")
     * })
     */
    private $skill;

    /**
     * @var \Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks", inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sps_id", referencedColumnName="stp_id")
     * })
     */
    private $startPack;

    /**
     * Set skill
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Skills $skill
     *
     * @return StartPackSkills
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

    /**
     * Set startPack
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks $startPack
     *
     * @return StartPackSkills
     */
    public function setStartPack(\Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks $startPack = null)
    {
        $this->startPack = $startPack;

        return $this;
    }

    /**
     * Get startPack
     *
     * @return \Illarion\DatabaseBundle\Entity\IllarionServer\StartPacks
     */
    public function getStartPack()
    {
        return $this->startPack;
    }
}
