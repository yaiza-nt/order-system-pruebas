<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrait;
use App\Repository\OrderHeaderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderHeaderRepository::class)]
#[ORM\HasLifecycleCallbacks]

class OrderHeader
{
    use EntityTrait;
}
