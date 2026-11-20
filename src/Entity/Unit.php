<?php

namespace App\Entity;

use App\Repository\UnitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnitRepository::class)]
class Unit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $symbol = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $pluralName = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 12, scale: 4, nullable: true)]
    private ?string $baseFactor = null;

    #[ORM\Column]
    private ?bool $useForShopping = true;

    #[ORM\Column]
    private ?int $position = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getPluralName(): ?string
    {
        return $this->pluralName;
    }

    public function setPluralName(?string $pluralName): static
    {
        $this->pluralName = $pluralName;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getBaseFactor(): ?string
    {
        return $this->baseFactor;
    }

    public function setBaseFactor(?string $baseFactor): static
    {
        $this->baseFactor = $baseFactor;

        return $this;
    }

    public function isUseForShopping(): ?bool
    {
        return $this->useForShopping;
    }

    public function setUseForShopping(bool $useForShopping): static
    {
        $this->useForShopping = $useForShopping;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }
}
