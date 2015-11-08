<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Chars
 *
 * @ORM\Table(schema="devserver", name="chars")
 * @ORM\Entity()
 */
class Chars extends Server\Chars
{
    /**
     * @var \Illarion\DatabaseBundle\Entity\DevServer\Race
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\Race", inversedBy="chars")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chr_race", referencedColumnName="race_id")
     * })
     */
    private $race;

    /**
     * @var \Illarion\DatabaseBundle\Entity\Accounts\Account
     *
     * @ORM\ManyToOne(targetEntity="Illarion\DatabaseBundle\Entity\Accounts\Account", inversedBy="devServerChars")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chr_accid", referencedColumnName="acc_id")
     * })
     */
    private $account;

    /**
     * Set race
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\Race $race
     *
     * @return Chars
     */
    public function setRace(\Illarion\DatabaseBundle\Entity\DevServer\Race $race = null)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return \Illarion\DatabaseBundle\Entity\DevServer\Race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set account
     *
     * @param \Illarion\DatabaseBundle\Entity\Accounts\Account $account
     *
     * @return Chars
     */
    public function setAccount(\Illarion\DatabaseBundle\Entity\Accounts\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Illarion\DatabaseBundle\Entity\Accounts\Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}
