<?php

namespace App\Entity;

use App\Repository\RecipeIngredientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: RecipeIngredientRepository::class)]
class RecipeIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'recipeIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Recipe $recipe = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredient $ingredient = null;

    #[ORM\Column(options: ['default' => 0])]
    private ?int $position = 0;

    #[ORM\ManyToOne(inversedBy: 'recipeIngredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?IngredientGroup $ingredientGroup = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $quantity1 = null;

    #[ORM\ManyToOne]
    private ?Unit $unit1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $quantity2 = null;

    #[ORM\ManyToOne]
    private ?Unit $unit2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $note = null;

    #[ORM\Column(options: ['default' => true])]
    private ?bool $scalable = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): static
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): static
    {
        $this->ingredient = $ingredient;

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

    public function getIngredientGroup(): ?IngredientGroup
    {
        return $this->ingredientGroup;
    }

    public function setIngredientGroup(?IngredientGroup $ingredientGroup): static
    {
        $this->ingredientGroup = $ingredientGroup;
        $this->recipe = $ingredientGroup?->getRecipe();

        return $this;
    }

    public function getQuantity1(): ?string
    {
        return $this->quantity1;
    }

    public function setQuantity1(?string $quantity1): static
    {
        $this->quantity1 = $quantity1;

        return $this;
    }

    public function getUnit1(): ?Unit
    {
        return $this->unit1;
    }

    public function setUnit1(?Unit $unit1): static
    {
        $this->unit1 = $unit1;

        return $this;
    }

    public function getQuantity2(): ?string
    {
        return $this->quantity2;
    }

    public function setQuantity2(?string $quantity2): static
    {
        $this->quantity2 = $quantity2;

        return $this;
    }

    public function getUnit2(): ?Unit
    {
        return $this->unit2;
    }

    public function setUnit2(?Unit $unit2): static
    {
        $this->unit2 = $unit2;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function isScalable(): ?bool
    {
        return $this->scalable;
    }

    public function setScalable(bool $scalable): static
    {
        $this->scalable = $scalable;

        return $this;
    }

    #[Assert\Callback]
    public function validateSameRecipe(ExecutionContextInterface $context): void
    {
        if ($this->ingredientGroup && $this->recipe
            && $this->ingredientGroup->getRecipe() !== $this->recipe) {
            $context->buildViolation('Le groupe doit appartenir à la même recette.')
                ->atPath('ingredientGroup')
                ->addViolation();
        }
    }
}
