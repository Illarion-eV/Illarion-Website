<?php

namespace Illarion\AccountSystemBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * A RGBA colour value.
 *
 * @package Illarion\AccountSystemBundle\Model
 */
class ColourResponse
{
    /**
     * The red component of this color.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("red")
     * @JMS\Since("1.0")
     */
    private $red;

    /**
     * The green component of this color.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("green")
     * @JMS\Since("1.0")
     */
    private $green;

    /**
     * The blue component of this color.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("blue")
     * @JMS\Since("1.0")
     */
    private $blue;

    /**
     * The alpha component of this color.
     *
     * @var int
     * @JMS\Type("integer")
     * @JMS\SerializedName("alpha")
     * @JMS\Since("1.0")
     */
    private $alpha;

    /**
     * ColourResponse constructor.
     * @param int $red
     * @param int $green
     * @param int $blue
     * @param int $alpha
     */
    public function __construct($red, $green, $blue, $alpha)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
        $this->alpha = $alpha;
    }

    /**
     * @return int
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @param int $red
     */
    public function setRed($red)
    {
        $this->red = $red;
    }

    /**
     * @return int
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @param int $green
     */
    public function setGreen($green)
    {
        $this->green = $green;
    }

    /**
     * @return int
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param int $blue
     */
    public function setBlue($blue)
    {
        $this->blue = $blue;
    }

    /**
     * @return int
     */
    public function getAlpha()
    {
        return $this->alpha;
    }

    /**
     * @param int $alpha
     */
    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;
    }
}
