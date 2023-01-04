<?php

namespace App\Entity;

use App\Entity\Trait\EntityTrait;
use App\Repository\ValidationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValidationRepository::class)]
#[ORM\HasLifecycleCallbacks]

class Validation
{
    use EntityTrait;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $table_related = null;

    #[ORM\Column]
    private array $check_applied = [];

    #[ORM\Column]
    private array $values_applied = [];


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getTableRelated(): ?int
    {
        return $this->table_related;
    }

    public function setTableRelated(int $table_related): self
    {
        $this->table_related = $table_related;

        return $this;
    }

    public function getCheckApplied(): array
    {
        return $this->check_applied;
    }

    public function setCheckApplied(array $check_applied): self
    {
        $this->check_applied = $check_applied;

        return $this;
    }

    public function getValuesApplied(): array
    {
        return $this->values_applied;
    }

    public function setValuesApplied(array $values_applied): self
    {
        $this->values_applied = $values_applied;

        return $this;
    }
}
