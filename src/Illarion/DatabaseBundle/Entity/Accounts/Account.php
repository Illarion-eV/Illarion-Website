<?php

namespace Illarion\DatabaseBundle\Entity\Accounts;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Account
 */
class Account
{
    /**
     * @var integer
     */
    private $accId;

    /**
     * @var string
     */
    private $accLogin;

    /**
     * @var string
     */
    private $accPasswd;

    /**
     * @var string
     */
    private $accEmail;

    /**
     * @var \DateTime
     */
    private $accRegisterdate;

    /**
     * @var string
     */
    private $accLastip;

    /**
     * @var integer
     */
    private $accState;

    /**
     * @var integer
     */
    private $accMaxchars;

    /**
     * @var integer
     */
    private $accLang;

    /**
     * @var ArrayCollection
     */
    private $illarionServerChars;

    /**
     * @var ArrayCollection
     */
    private $testServerChars;

    /**
     * @var ArrayCollection
     */
    private $devServerChars;

    public function __construct()
    {
        $this->illarionServerChars = new ArrayCollection();
        $this->testServerChars = new ArrayCollection();
        $this->devServerChars = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getAccId()
    {
        return $this->accId;
    }

    /**
     * Set accLogin
     *
     * @param string $accLogin
     *
     * @return Account
     */
    public function setAccLogin($accLogin)
    {
        $this->accLogin = $accLogin;

        return $this;
    }

    /**
     * Get accLogin
     *
     * @return string
     */
    public function getAccLogin()
    {
        return $this->accLogin;
    }

    /**
     * Set accPasswd
     *
     * @param string $accPasswd
     *
     * @return Account
     */
    public function setAccPasswd($accPasswd)
    {
        $this->accPasswd = $accPasswd;

        return $this;
    }

    /**
     * Get accPasswd
     *
     * @return string
     */
    public function getAccPasswd()
    {
        return $this->accPasswd;
    }

    /**
     * Set accEmail
     *
     * @param string $accEmail
     *
     * @return Account
     */
    public function setAccEmail($accEmail)
    {
        $this->accEmail = $accEmail;

        return $this;
    }

    /**
     * Get accEmail
     *
     * @return string
     */
    public function getAccEmail()
    {
        return $this->accEmail;
    }

    /**
     * Set accRegisterdate
     *
     * @param \DateTime $accRegisterdate
     *
     * @return Account
     */
    public function setAccRegisterdate($accRegisterdate)
    {
        $this->accRegisterdate = $accRegisterdate;

        return $this;
    }

    /**
     * Get accRegisterdate
     *
     * @return \DateTime
     */
    public function getAccRegisterdate()
    {
        return $this->accRegisterdate;
    }

    /**
     * Set accLastip
     *
     * @param string $accLastip
     *
     * @return Account
     */
    public function setAccLastip($accLastip)
    {
        $this->accLastip = $accLastip;

        return $this;
    }

    /**
     * Get accLastip
     *
     * @return string
     */
    public function getAccLastip()
    {
        return $this->accLastip;
    }

    /**
     * Set accState
     *
     * @param integer $accState
     *
     * @return Account
     */
    public function setAccState($accState)
    {
        $this->accState = $accState;

        return $this;
    }

    /**
     * Get accState
     *
     * @return integer
     */
    public function getAccState()
    {
        return $this->accState;
    }

    /**
     * Set accMaxchars
     *
     * @param integer $accMaxchars
     *
     * @return Account
     */
    public function setAccMaxchars($accMaxchars)
    {
        $this->accMaxchars = $accMaxchars;

        return $this;
    }

    /**
     * Get accMaxchars
     *
     * @return integer
     */
    public function getAccMaxchars()
    {
        return $this->accMaxchars;
    }

    /**
     * Set accLang
     *
     * @param integer $accLang
     *
     * @return Account
     */
    public function setAccLang($accLang)
    {
        $this->accLang = $accLang;

        return $this;
    }

    /**
     * Get accLang
     *
     * @return integer
     */
    public function getAccLang()
    {
        return $this->accLang;
    }

    public function getIllarionServerChars() {
        return $this->illarionServerChars;
    }

    public function getTestServerChars() {
        return $this->testServerChars;
    }

    public function getDevServerChars() {
        return $this->devServerChars;
    }
}

