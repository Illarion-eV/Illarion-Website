<?php

namespace Illarion\DatabaseBundle\Entity\Accounts;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(schema="accounts", name="account_unconfirmed")
 * @ORM\Entity
 */
class AccountUnconfirmed
{
    /**
     * @var string
     *
     * @ORM\Column(name="au_id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="au_acc_id", type="integer")
     */
    private $accountId;

    /**
     * @var string
     *
     * @ORM\Column(name="au_mail", type="string", length=50)
     */
    private $newMail;

    /**
     * @var Account
     *
     * @ORM\OneToOne(targetEntity="Illarion\DatabaseBundle\Entity\Accounts\Account", inversedBy="unconfirmed")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="au_acc_id", referencedColumnName="acc_id"),
     * })
     */
    private $account;

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set accountId
     *
     * @param integer $accountId
     *
     * @return AccountUnconfirmed
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Get accountId
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set newMail
     *
     * @param string $newMail
     *
     * @return AccountUnconfirmed
     */
    public function setNewMail($newMail)
    {
        $this->newMail = $newMail;

        return $this;
    }

    /**
     * Get newMail
     *
     * @return string
     */
    public function getNewMail()
    {
        return $this->newMail;
    }

    /**
     * Set account
     *
     * @param \Illarion\DatabaseBundle\Entity\Accounts\Account $account
     *
     * @return AccountUnconfirmed
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
