<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrait;
use App\Repository\OrderLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderLineRepository::class)]
#[ORM\HasLifecycleCallbacks]

class OrderLine
{
    use EntityTrait;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(nullable: true)]
    private ?float $discount = null;

    #[ORM\Column]
    private ?float $total = null;

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

}
