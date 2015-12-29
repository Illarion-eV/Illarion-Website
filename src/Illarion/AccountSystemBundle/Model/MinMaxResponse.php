<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * A range defined by a minimal and a maximal value.
 *
 * @package Illarion\AccountSystemBundle\Model
 */
class MinMaxResponse
{
    /**
     * The lower bound value.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("min")
     * @JMS\Since("1.0")
     */
    private $min;

    /**
     * The upper bound value.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("max")
     * @JMS\Since("1.0")
     */
    private $max;

    /**
     * MinMaxResponse constructor.
     * @param int $min
     * @param int $max
     */
    public function __construct($min, $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @return int
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @param int $min
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * @return int
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax($max)
    {
        $this->max = $max;
    }
}
