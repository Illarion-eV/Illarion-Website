<?php

namespace Illarion\DatabaseBundle\Entity\DevServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Race
 *
 * @ORM\Table(schema="devserver", name="items")
 * @ORM\Entity
 */
class Items extends Server\Items
{
}
