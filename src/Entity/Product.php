<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrait;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ORM\HasLifecycleCallbacks]

class Product
{
    use EntityTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?float $unit_price = null;

    #[ORM\Column]
    private ?int $type = null;

    #[ORM\ManyToMany(targetEntity: Pack::class, mappedBy: 'products')]
    private Collection $packs;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Coupon::class, orphanRemoval: true)]
    private Collection $coupons;

    public function __construct()
    {
        $this->packs = new ArrayCollection();
        $this->coupons = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unit_price;
    }

    public function setUnitPrice(float $unit_price): self
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Pack>
     */
    public function getPacks(): Collection
    {
        return $this->packs;
    }

    public function addPack(Pack $pack): self
    {
        if (!$this->packs->contains($pack)) {
            $this->packs->add($pack);
            $pack->addProduct($this);
        }

        return $this;
    }

    public function removePack(Pack $pack): self
    {
        if ($this->packs->removeElement($pack)) {
            $pack->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Coupon>
     */
    public function getCoupons(): Collection
    {
        return $this->coupons;
    }

    public function addCoupon(Coupon $coupon): self
    {
        if (!$this->coupons->contains($coupon)) {
            $this->coupons->add($coupon);
            $coupon->setProduct($this);
        }

        return $this;
    }

    public function removeCoupon(Coupon $coupon): self
    {
        if ($this->coupons->removeElement($coupon)) {
            // set the owning side to null (unless already changed)
            if ($coupon->getProduct() === $this) {
                $coupon->setProduct(null);
            }
        }

        return $this;
    }
    
}
