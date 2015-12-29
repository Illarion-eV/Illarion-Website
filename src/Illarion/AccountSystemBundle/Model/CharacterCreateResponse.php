<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class CharacterCreateResponse
{
    /**
     * Error information regarding the character creation.
     *
     * This is only present if the character creation failed.
     *
     * @var ErrorResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\ErrorResponse")
     * @JMS\SerializedName("error")
     * @JMS\Groups({"error"})
     * @JMS\Since("1.0")
     */
    private $error;

    /**
     * Success information regarding the character creation.
     *
     * This is only present if the character creation was successful.
     *
     * @var SuccessResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\SuccessResponse")
     * @JMS\SerializedName("success")
     * @JMS\Groups({"success"})
     * @JMS\Since("1.0")
     */
    private $success;

    /**
     * @return ErrorResponse
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param ErrorResponse $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return SuccessResponse
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param SuccessResponse $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }
}
