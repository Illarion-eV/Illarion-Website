<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Illarion\DatabaseBundle\Entity\Accounts\Account;

/**
 * Chars
 */
class Chars
{
    /**
     * @var integer
     */
    private $chrAccid;

    /**
     * @var integer
     */
    private $chrPlayerid;

    /**
     * @var integer
     */
    private $chrStatus;

    /**
     * @var integer
     */
    private $chrStatustime;

    /**
     * @var integer
     */
    private $chrStatusgm;

    /**
     * @var string
     */
    private $chrStatusreason;

    /**
     * @var string
     */
    private $chrLastip;

    /**
     * @var integer
     */
    private $chrOnlinetime;

    /**
     * @var integer
     */
    private $chrLastsavetime;

    /**
     * @var integer
     */
    private $chrRace;

    /**
     * @var integer
     */
    private $chrSex;

    /**
     * @var string
     */
    private $chrName;

    /**
     * @var Account
     */
    private $account;

    /**
     * Get id
     *
     * @return integer
     */
    public function getChrPlayerId()
    {
        return $this->chrPlayerid;
    }

    /**
     * Set chrAccid
     *
     * @param integer $chrAccid
     *
     * @return Chars
     */
    public function setChrAccid($chrAccid)
    {
        $this->chrAccid = $chrAccid;
    
        return $this;
    }

    /**
     * Get chrAccid
     *
     * @return integer
     */
    public function getChrAccid()
    {
        return $this->chrAccid;
    }

    /**
     * Set chrStatus
     *
     * @param integer $chrStatus
     *
     * @return Chars
     */
    public function setChrStatus($chrStatus)
    {
        $this->chrStatus = $chrStatus;
    
        return $this;
    }

    /**
     * Get chrStatus
     *
     * @return integer
     */
    public function getChrStatus()
    {
        return $this->chrStatus;
    }

    /**
     * Set chrStatustime
     *
     * @param integer $chrStatustime
     *
     * @return Chars
     */
    public function setChrStatustime($chrStatustime)
    {
        $this->chrStatustime = $chrStatustime;
    
        return $this;
    }

    /**
     * Get chrStatustime
     *
     * @return integer
     */
    public function getChrStatustime()
    {
        return $this->chrStatustime;
    }

    /**
     * Set chrStatusgm
     *
     * @param integer $chrStatusgm
     *
     * @return Chars
     */
    public function setChrStatusgm($chrStatusgm)
    {
        $this->chrStatusgm = $chrStatusgm;
    
        return $this;
    }

    /**
     * Get chrStatusgm
     *
     * @return integer
     */
    public function getChrStatusgm()
    {
        return $this->chrStatusgm;
    }

    /**
     * Set chrStatusreason
     *
     * @param string $chrStatusreason
     *
     * @return Chars
     */
    public function setChrStatusreason($chrStatusreason)
    {
        $this->chrStatusreason = $chrStatusreason;
    
        return $this;
    }

    /**
     * Get chrStatusreason
     *
     * @return string
     */
    public function getChrStatusreason()
    {
        return $this->chrStatusreason;
    }

    /**
     * Set chrLastip
     *
     * @param string $chrLastip
     *
     * @return Chars
     */
    public function setChrLastip($chrLastip)
    {
        $this->chrLastip = $chrLastip;
    
        return $this;
    }

    /**
     * Get chrLastip
     *
     * @return string
     */
    public function getChrLastip()
    {
        return $this->chrLastip;
    }

    /**
     * Set chrOnlinetime
     *
     * @param integer $chrOnlinetime
     *
     * @return Chars
     */
    public function setChrOnlinetime($chrOnlinetime)
    {
        $this->chrOnlinetime = $chrOnlinetime;
    
        return $this;
    }

    /**
     * Get chrOnlinetime
     *
     * @return integer
     */
    public function getChrOnlinetime()
    {
        return $this->chrOnlinetime;
    }

    /**
     * Set chrLastsavetime
     *
     * @param integer $chrLastsavetime
     *
     * @return Chars
     */
    public function setChrLastsavetime($chrLastsavetime)
    {
        $this->chrLastsavetime = $chrLastsavetime;
    
        return $this;
    }

    /**
     * Get chrLastsavetime
     *
     * @return integer
     */
    public function getChrLastsavetime()
    {
        return $this->chrLastsavetime;
    }

    /**
     * Set chrRace
     *
     * @param integer $chrRace
     *
     * @return Chars
     */
    public function setChrRace($chrRace)
    {
        $this->chrRace = $chrRace;
    
        return $this;
    }

    /**
     * Get chrRace
     *
     * @return integer
     */
    public function getChrRace()
    {
        return $this->chrRace;
    }

    /**
     * Set chrSex
     *
     * @param integer $chrSex
     *
     * @return Chars
     */
    public function setChrSex($chrSex)
    {
        $this->chrSex = $chrSex;
    
        return $this;
    }

    /**
     * Get chrSex
     *
     * @return integer
     */
    public function getChrSex()
    {
        return $this->chrSex;
    }

    /**
     * Set chrName
     *
     * @param string $chrName
     *
     * @return Chars
     */
    public function setChrName($chrName)
    {
        $this->chrName = $chrName;
    
        return $this;
    }

    /**
     * Get chrName
     *
     * @return string
     */
    public function getChrName()
    {
        return $this->chrName;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}

