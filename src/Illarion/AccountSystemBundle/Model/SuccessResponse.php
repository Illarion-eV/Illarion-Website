<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class SuccessResponse
{
    /**
     * The HTTP status code.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("status")
     * @JMS\Since("1.0")
     */
    private $status;

    /**
     * The human readable and translated message of this status.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("message")
     * @JMS\Since("1.0")
     */
    private $message;

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}
