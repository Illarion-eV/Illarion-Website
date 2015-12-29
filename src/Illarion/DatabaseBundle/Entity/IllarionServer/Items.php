<?php

namespace Illarion\DatabaseBundle\Entity\IllarionServer;

use Doctrine\ORM\Mapping as ORM;
use Illarion\DatabaseBundle\Entity\Server;

/**
 * Items
 *
 * @ORM\Table(schema="illarionserver", name="items")
 * @ORM\Entity
 */
class Items extends Server\Items
{
}
