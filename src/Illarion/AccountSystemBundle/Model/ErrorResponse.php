<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Form\Form;

class ErrorResponse
{
    /**
     * The HTTP status number.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("status")
     * @JMS\Since("1.0")
     */
    private $status;

    /**
     * The error message. Translated and human readable.
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("message")
     * @JMS\Since("1.0")
     */
    private $message;

    /**
     * The form that triggered the error due to missing or wrong values.
     *
     * @var Form
     * @JMS\Type("Symfony\Component\Form\Form")
     * @JMS\SerializedName("form")
     * @JMS\Since("1.0")
     */
    private $form;

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

    /**
     * @return Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param Form $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }
}