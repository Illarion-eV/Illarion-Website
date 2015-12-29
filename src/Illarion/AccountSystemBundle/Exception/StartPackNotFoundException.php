<?php

namespace Illarion\AccountSystemBundle\Exception;

class StartPackNotFoundException extends AccountSystemException
{
    public function __construct($startPackId)
    {
        parent::__construct(sprintf('No start pack with the ID %d was found.', $startPackId));
    }
}
