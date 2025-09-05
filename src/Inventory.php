<?php

declare(strict_types=1);

class Inventory
{
    private array $products;

    public function __construct()
    {
        $this->products = [
            1 => ['id' => 1, 'name' => "beans", 'price' => 3.50, 'amount' => 25],
            2 => ['id' => 2, 'name' => "ceiling_fan", 'price' => 50.0, 'amount' => 25],
            3 => ['id' => 3, 'name' => "pillow", 'price' => 14.99, 'amount' => 25],
            4 => ['id' => 4, 'name' => "amethyst", 'price' => 1850.5, 'amount' => 25],
            5 => ['id' => 5, 'name' => "the_one_above_all", 'price' => 42.42, 'amount' => 1],
        ];
    }

    public function findProduct(int $id): ?array
    {
        return $this->products[$id] ?? null;
    }

    public function decreaseStock(int $id, int $quantity): void
    {
        if (!isset($this->products[$id])) {
            throw new Exception('Product not found');
        }

        if ($this->products[$id]['amount'] < $quantity) {
            throw new Exception('Insufficient stock');
        }

        $this->products[$id]['amount'] -= $quantity;
    }

    public function increaseStock(int $id, int $quantity): void
    {
        if (!isset($this->products[$id])) {
            throw new Exception('Product not found');
        }

        $this->products[$id]['amount'] += $quantity;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}

//01100101 01100001 01110011 01110100 01100101 01110010