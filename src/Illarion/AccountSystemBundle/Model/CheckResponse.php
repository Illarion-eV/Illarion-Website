<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Form\Form;

class CheckResponse
{
    /**
     * True in case the check was successful.
     *
     * @var bool
     * @JMS\Type("boolean")
     * @JMS\SerializedName("success")
     * @JMS\Since("1.0")
     */
    private $success;

    /**
     * The identification type of the check.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("checkedValue")
     * @JMS\Since("1.0")
     */
    private $checkType;

    /**
     * The value that was checked.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("checkedValue")
     * @JMS\Since("1.0")
     */
    private $checkedValue;

    /**
     * The description of the check result.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     * @JMS\Since("1.0")
     */
    private $description;

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param boolean $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getCheckedValue()
    {
        return $this->checkedValue;
    }

    /**
     * @param string $checkedValue
     */
    public function setCheckedValue($checkedValue)
    {
        $this->checkedValue = $checkedValue;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCheckType()
    {
        return $this->checkType;
    }

    /**
     * @param mixed $checkType
     */
    public function setCheckType($checkType)
    {
        $this->checkType = $checkType;
    }
}