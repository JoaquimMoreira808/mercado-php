<?php

declare(strict_types=1);

require_once __DIR__ . '/Inventory.php';
require_once __DIR__ . '/Discount.php';

class ShoppingCart
{
    private Inventory $inventory;
    private array $cart = [];
    private float $total = 0.0;

    public function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function addProduct(int $productId, int $quantity = 1): void
    {
        $product = $this->inventory->findProduct($productId);
        if (!$product) {
            throw new Exception('Product not found');
        }

        $this->inventory->decreaseStock($productId, $quantity);

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += $quantity;
        } else {
            $this->cart[$productId] = [
                'product_id' => $productId,
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
            ];
        }
    }

    public function removeProduct(int $productId): void
    {
        if (!isset($this->cart[$productId])) {
            throw new Exception('Product not in cart');
        }

        $quantity = $this->cart[$productId]['quantity'];
        unset($this->cart[$productId]);

        $this->inventory->increaseStock($productId, $quantity);
    }

    public function listCart(): array
    {
        $items = [];
        foreach ($this->cart as $item) {
            $item['subtotal'] = $item['price'] * $item['quantity'];
            $items[] = $item;
        }

        return $items;
    }

    public function calculateTotal(?string $coupon = null): float
    {
        $total = 0.0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $total = Discount::apply($total, $coupon);
        $this->total = $total;

        return $total;
    }

    public function getTotal(): float
    {
        return $this->total;
    }
}


//01100101 01100111 01100111 00100001