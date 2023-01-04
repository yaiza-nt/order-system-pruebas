<?php

namespace App\Entity\Trait;

use ApiPlatform\Metadata\ApiProperty;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;


#[ORM\HasLifecycleCallbacks]

/*
Base entity methods and properties
*/
trait EntityTrait
{
    #[ORM\Id]
    #[ORM\Column(type: Types::GUID, unique:true)]
    #[ApiProperty(identifier: true)]
    private $uuid;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private $createdAt;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private $updatedAt;

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    /**
     * updatedTimestamps. Set createdAt and udatedAt automatically
     *
     * @return void
     */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTimeImmutable('now'));
        }
    }

    #[ORM\PrePersist]
    public function updateUuid()
    {
        if (!$this->uuid) {
            $this->uuid = Uuid::v1();
        }
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

}