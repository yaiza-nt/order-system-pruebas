<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Trait\EntityTrait;
use App\Repository\CouponRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouponRepository::class)]
#[ORM\HasLifecycleCallbacks]

// API
#[ApiResource(
    routePrefix: "order_system/products",
    collectionOperations: ['get', 'post'],
    itemOperations: ['get', 'patch']
)]
class Coupon
{
    use EntityTrait;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $code = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $apply_status = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $valid_from = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $valid_to = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column]
    private ?bool $archived = null;

    #[ORM\Column]
    private ?bool $public = null;

    #[ORM\Column]
    private ?int $origin = null;

    #[ORM\Column]
    private ?int $purpose = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $conditional_usage = null;

    #[ORM\Column]
    private ?int $usage_max = null;

    #[ORM\Column]
    private ?int $usage_actual = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $last_used = null;

    #[ORM\OneToMany(mappedBy: 'coupon', targetEntity: Order::class)]
    private Collection $orders;

    #[ORM\ManyToOne(inversedBy: 'coupons')]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: "uuid")]
    private ?Product $product = null;

    #[ORM\JoinTable(name: 'coupon_validations')]
    #[ORM\JoinColumn(name: 'coupon_id', referencedColumnName: 'uuid')]
    #[ORM\InverseJoinColumn(name: 'validation_id', referencedColumnName: 'uuid')]
    #[ORM\ManyToMany(targetEntity: Validation::class, inversedBy: 'coupons_related')]
    private Collection $validations;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->validations = new ArrayCollection();
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getApplyStatus(): ?int
    {
        return $this->apply_status;
    }

    public function setApplyStatus(int $apply_status): self
    {
        $this->apply_status = $apply_status;

        return $this;
    }

    public function getValidFrom(): ?\DateTimeImmutable
    {
        return $this->valid_from;
    }

    public function setValidFrom(\DateTimeImmutable $valid_from): self
    {
        $this->valid_from = $valid_from;

        return $this;
    }

    public function getValidTo(): ?\DateTimeImmutable
    {
        return $this->valid_to;
    }

    public function setValidTo(?\DateTimeImmutable $valid_to): self
    {
        $this->valid_to = $valid_to;

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

    public function isArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function isPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getOrigin(): ?int
    {
        return $this->origin;
    }

    public function setOrigin(int $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getPurpose(): ?int
    {
        return $this->purpose;
    }

    public function setPurpose(int $purpose): self
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function getConditionalUsage(): ?string
    {
        return $this->conditional_usage;
    }

    public function setConditionalUsage(?string $conditional_usage): self
    {
        $this->conditional_usage = $conditional_usage;

        return $this;
    }

    public function getUsageMax(): ?int
    {
        return $this->usage_max;
    }

    public function setUsageMax(int $usage_max): self
    {
        $this->usage_max = $usage_max;

        return $this;
    }

    public function getUsageActual(): ?int
    {
        return $this->usage_actual;
    }

    public function setUsageActual(int $usage_actual): self
    {
        $this->usage_actual = $usage_actual;

        return $this;
    }

    public function getLastUsed(): ?\DateTimeImmutable
    {
        return $this->last_used;
    }

    public function setLastUsed(?\DateTimeImmutable $last_used): self
    {
        $this->last_used = $last_used;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setCouponId($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getCouponId() === $this) {
                $order->setCouponId(null);
            }
        }

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection<int, Validation>
     */
    public function getValidations(): Collection
    {
        return $this->validations;
    }

    public function addValidation(Validation $validation): self
    {
        if (!$this->validations->contains($validation)) {
            $this->validations->add($validation);
        }

        return $this;
    }

    public function removeValidation(Validation $validation): self
    {
        $this->validations->removeElement($validation);

        return $this;
    }
}
