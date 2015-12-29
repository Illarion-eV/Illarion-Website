<?php

namespace Illarion\AccountSystemBundle\Exception;

class IllegalValueException extends AccountSystemException
{
    /**
     * IllegalValueException constructor.
     *
     * @param string $name the name of the value
     * @param mixed $value the value
     */
    public function __construct($name, $value)
    {
        parent::__construct(sprintf(
            'The %s has a invalid value: %s',
            $name, $value));
    }
}
