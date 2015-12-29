<?php

namespace Illarion\DatabaseBundle\Entity\TestServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Race
 *
 * @ORM\Table(schema="testserver", name="items")
 * @ORM\Entity
 */
class Items extends Server\Items
{
}
