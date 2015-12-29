<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

class AccountCheckResponse
{
    /**
     * In case the request failed this field will contain the error information. If all is good, this will be empty.
     *
     * @var ErrorResponse
     * @JMS\Type("Illarion\AccountSystemBundle\Model\ErrorResponse")
     * @JMS\SerializedName("error")
     * @JMS\Groups({"error"})
     * @JMS\Since("1.0")
     */
    private $error;

    /**
     * Contains the performed checks.
     *
     * The type of the checks match the input field names that supply the values that are checked.
     *
     * @var array
     * @JMS\Type("array<Illarion\AccountSystemBundle\Model\CheckResponse>")
     * @JMS\SerializedName("checks")
     * @JMS\Groups({"success"})
     * @JMS\Since("1.0")
     */
    private $checks;

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
     * @return array
     */
    public function getChecks()
    {
        return $this->checks;
    }

    /**
     * @param CheckResponse $check
     */
    public function addChecks($check)
    {
        $this->checks[] = $check;
    }
}