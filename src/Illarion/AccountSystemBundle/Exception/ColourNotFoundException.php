<?php

namespace Illarion\AccountSystemBundle\Exception;

class ColourNotFoundException extends AccountSystemException
{
    /**
     * ColourNotFoundException constructor.
     *
     * @param string $colorName the type name of the hair. Race or Hair.
     * @param integer $raceId the ID of the race that was requested
     * @param integer $typeId the ID of the type that was requested
     * @param integer $red the red component of the requested colour
     * @param integer $green the green component of the requested colour
     * @param integer $blue the blue component of the requested colour
     * @param integer $alpha the alpha component of the requested colour
     */
    public function __construct($colorName, $raceId, $typeId, $red, $green, $blue, $alpha)
    {
        parent::__construct(sprintf(
            'The colour for the group "%s" for race %d and type $d with the values (r: %d, g: %d, b: %d, a: %d)',
            $colorName, $raceId, $typeId, $red, $green, $blue, $alpha));
    }
}
