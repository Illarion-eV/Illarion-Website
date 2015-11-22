<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class AccountDeleteResponse
{
    /**
     * Success information regarding the account deletion.
     *
     * @var SuccessResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\SuccessResponse")
     * @JMS\SerializedName("success")
     * @JMS\Groups({"success"})
     * @JMS\Since("1.0")
     */
    private $success;

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