<?php

class ShoppingCart
{
    private array $products;
    private array $cart;

    public function __construct()
    {
        $this->products = [
            ['id' => 1, 'name' => "beans", 'price' => 3.50, 'amount' => 25],
            ['id' => 2, 'name' => "ceiling_fan", 'price' => 50.0, 'amount' => 25],
            ['id' => 3, 'name' => "pillow", 'price' => 14.99, 'amount' => 25],
            ['id' => 4, 'name' => "amethyst", 'price' => 1850.5, 'amount' => 25],
            ['id' => 5, 'name' => "the_one_above_all", 'price' => 42.42, 'amount' => 1],
        ];

        $this->cart = [];
    }

    public function addProduct(int $productId, int $quantity = 1): void
    {
        # Buscar produto pelo id
        $product = $this->findProduct($productId);

        if (!$product) {
            throw new Exception("Produto não encontrado!");
        }

        if ($product['amount'] < $quantity) {
            throw new Exception("Estoque insuficiente!");
        }

        # Atualizar estoque
        foreach ($this->products as &$p) {
            if ($p['id'] === $productId) {
                $p['amount'] -= $quantity;
                break;
            }
        }

        # Adicionar no carrinho
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity'] += $quantity;
        } else {
            $this->cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
            ];
        }
    }

    private function findProduct(int $id): ?array
    {
        foreach ($this->products as $p) {
            if ($p['id'] === $id) {
                return $p;
            }
        }
        return null;
    }

    public function getCart(): array
    {
        return $this->cart;
    }
}

