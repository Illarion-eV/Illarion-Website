<?php

namespace Illarion\AccountSystemBundle\Exception;

class UnexpectedTypeException extends AccountSystemException
{
    /**
     * UnexpectedTypeException constructor.
     *
     * @param mixed $value the value with the wrong type
     * @param string $expectedType the string of the correct type
     */
    public function __construct($value, $expectedType)
    {
        parent::__construct(sprintf('Expected argument of type %s, %s given', $expectedType, is_object($value) ? get_class($value) : gettype($value)));
    }
}
