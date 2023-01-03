<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrait;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ORM\Table(name: '`order`')]

class Order
{
    use EntityTrait;

    #[ORM\Column(type: 'uuid')]
    private ?Uuid $organization_id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $request_validation_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $response_validation_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $cancelled_at = null;

    #[ORM\Column]
    private ?int $origin = null;

    #[ORM\ManyToOne(inversedBy: 'orders', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: "uuid")]
    private ?Coupon $coupon_id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: "uuid")]
    private ?OrderHeader $order_header = null;

    public function getOrganizationId(): ?Uuid
    {
        return $this->organization_id;
    }

    public function setOrganizationId(Uuid $organization_id): self
    {
        $this->organization_id = $organization_id;

        return $this;
    }

    public function getRequestValidationAt(): ?\DateTimeImmutable
    {
        return $this->request_validation_at;
    }

    public function setRequestValidationAt(?\DateTimeImmutable $request_validation_at): self
    {
        $this->request_validation_at = $request_validation_at;

        return $this;
    }

    public function getResponseValidationAt(): ?\DateTimeImmutable
    {
        return $this->response_validation_at;
    }

    public function setResponseValidationAt(?\DateTimeImmutable $response_validation_at): self
    {
        $this->response_validation_at = $response_validation_at;

        return $this;
    }

    public function getCancelledAt(): ?\DateTimeImmutable
    {
        return $this->cancelled_at;
    }

    public function setCancelledAt(?\DateTimeImmutable $cancelled_at): self
    {
        $this->cancelled_at = $cancelled_at;

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

    public function getCouponId(): ?Coupon
    {
        return $this->coupon_id;
    }

    public function setCouponId(?Coupon $coupon_id): self
    {
        $this->coupon_id = $coupon_id;

        return $this;
    }

    public function getOrderHeader(): ?OrderHeader
    {
        return $this->order_header;
    }

    public function setOrderHeader(OrderHeader $order_header): self
    {
        $this->order_header = $order_header;

        return $this;
    }
    
}
