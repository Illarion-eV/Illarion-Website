<?php

namespace Illarion\AccountSystemBundle\Exception;

class AttributeOutOfRangeException extends AccountSystemException
{
    /**
     * AttributeOutOfRangeException constructor.
     * @param string $attribute
     * @param int $value
     * @param int $minValue
     * @param int $maxValue
     */
    public function __construct($attribute, $value, $minValue, $maxValue)
    {
        parent::__construct(sprintf('The attribute "%s" is set to %d, but is expected to be between %d and %d.',
            $attribute, $value, $minValue, $maxValue));
    }
}
