<?php

namespace Illarion\DatabaseBundle\Entity\Accounts;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(
 *     schema="accounts",
 *     name="account",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="acc_name_idx", columns={"login"}),
 *         @ORM\UniqueConstraint(name="acc_email_idx", columns={"eMail"})
 *     },
 *     indexes={
 *         @ORM\Index(name="acc_name_password_idx", columns={"login", "password"})
 *     }
 * )
 * @ORM\Entity
 */
class Account
{
    /**
     * @var integer
     *
     * @ORM\Column(name="acc_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="accounts.account_seq", allocationSize=10, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="acc_login", type="string", length=50, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="acc_passwd", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="acc_email", type="string", length=50, nullable=true)
     */
    private $eMail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="acc_registerdate", type="datetime", nullable=false)
     */
    private $registerDate;

    /**
     * @var string
     *
     * @ORM\Column(name="acc_lastip", type="string", length=39, nullable=false)
     */
    private $lastIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="acc_state", type="integer", nullable=false)
     */
    private $state;

    /**
     * @var integer
     *
     * @ORM\Column(name="acc_maxchars", type="integer", nullable=false)
     */
    private $maxChars;

    /**
     * @var integer
     *
     * @ORM\Column(name="acc_lang", type="smallint", nullable=false)
     */
    private $language;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\IllarionServer\Chars", mappedBy="account")
     */
    private $illarionServerChars;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\TestServer\Chars", mappedBy="account")
     */
    private $testServerChars;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Illarion\DatabaseBundle\Entity\DevServer\Chars", mappedBy="account")
     */
    private $devServerChars;

    /**
     * @var AccountUnconfirmed
     *
     * @ORM\OneToOne(targetEntity="Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed", mappedBy="account")
     */
    private $unconfirmed;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->illarionServerChars = new \Doctrine\Common\Collections\ArrayCollection();
        $this->testServerChars = new \Doctrine\Common\Collections\ArrayCollection();
        $this->devServerChars = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Account
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get eMail
     *
     * @return string
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     *
     * @return Account
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     *
     * @return Account
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get lastIp
     *
     * @return string
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * Set lastIp
     *
     * @param string $lastIp
     *
     * @return Account
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Account
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get maxChars
     *
     * @return integer
     */
    public function getMaxChars()
    {
        return $this->maxChars;
    }

    /**
     * Set maxChars
     *
     * @param integer $maxChars
     *
     * @return Account
     */
    public function setMaxChars($maxChars)
    {
        $this->maxChars = $maxChars;

        return $this;
    }

    /**
     * Get language
     *
     * @return integer
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set language
     *
     * @param integer $language
     *
     * @return Account
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Add illarionServerChar
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Chars $illarionServerChar
     *
     * @return Account
     */
    public function addIllarionServerChar(\Illarion\DatabaseBundle\Entity\IllarionServer\Chars $illarionServerChar)
    {
        $this->illarionServerChars[] = $illarionServerChar;

        return $this;
    }

    /**
     * Remove illarionServerChar
     *
     * @param \Illarion\DatabaseBundle\Entity\IllarionServer\Chars $illarionServerChar
     */
    public function removeIllarionServerChar(\Illarion\DatabaseBundle\Entity\IllarionServer\Chars $illarionServerChar)
    {
        $this->illarionServerChars->removeElement($illarionServerChar);
    }

    /**
     * Get illarionServerChars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIllarionServerChars()
    {
        return $this->illarionServerChars;
    }

    /**
     * Add testServerChar
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\Chars $testServerChar
     *
     * @return Account
     */
    public function addTestServerChar(\Illarion\DatabaseBundle\Entity\TestServer\Chars $testServerChar)
    {
        $this->testServerChars[] = $testServerChar;

        return $this;
    }

    /**
     * Remove testServerChar
     *
     * @param \Illarion\DatabaseBundle\Entity\TestServer\Chars $testServerChar
     */
    public function removeTestServerChar(\Illarion\DatabaseBundle\Entity\TestServer\Chars $testServerChar)
    {
        $this->testServerChars->removeElement($testServerChar);
    }

    /**
     * Get testServerChars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTestServerChars()
    {
        return $this->testServerChars;
    }

    /**
     * Add devServerChar
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\Chars $devServerChar
     *
     * @return Account
     */
    public function addDevServerChar(\Illarion\DatabaseBundle\Entity\DevServer\Chars $devServerChar)
    {
        $this->devServerChars[] = $devServerChar;

        return $this;
    }

    /**
     * Remove devServerChar
     *
     * @param \Illarion\DatabaseBundle\Entity\DevServer\Chars $devServerChar
     */
    public function removeDevServerChar(\Illarion\DatabaseBundle\Entity\DevServer\Chars $devServerChar)
    {
        $this->devServerChars->removeElement($devServerChar);
    }

    /**
     * Get devServerChars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDevServerChars()
    {
        return $this->devServerChars;
    }

    /**
     * Set unconfirmed
     *
     * @param \Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed $unconfirmed
     *
     * @return Account
     */
    public function setUnconfirmed(\Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed $unconfirmed = null)
    {
        $this->unconfirmed = $unconfirmed;

        return $this;
    }

    /**
     * Get unconfirmed
     *
     * @return \Illarion\DatabaseBundle\Entity\Accounts\AccountUnconfirmed
     */
    public function getUnconfirmed()
    {
        return $this->unconfirmed;
    }
}
