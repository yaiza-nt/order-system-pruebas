<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Trait\EntityTrait;
use App\Repository\PackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackRepository::class)]
#[ORM\HasLifecycleCallbacks]

// API
#[ApiResource(
    routePrefix: "order_system/packs",
    collectionOperations: ['get', 'post'],
    itemOperations: ['get', 'patch']
)]
class Pack
{
    use EntityTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\JoinTable(name: 'pack_products')]
    #[ORM\JoinColumn(name: 'pack_id', referencedColumnName: 'uuid')]
    #[ORM\InverseJoinColumn(name: 'product_id', referencedColumnName: 'uuid')]
    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'packs')]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        $this->products->removeElement($product);

        return $this;
    }
    
}
