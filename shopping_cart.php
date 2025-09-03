<?php

class ShoppingCart
{
    private array $products;
    private array $cart;

    public function __construct()
    {
        $this->products = [
            ['id' => 1, 'name' => "beans", 'price' => 3.50, 'amount' => 25],
            ['id' => 2, 'name' => "cealing_fan", 'price' => 50.00, 'amount' => 25],
            ['id' => 3, 'name' => "pillow", 'price' => 14.99, 'amount' => 25],
            ['id' => 4, 'name' => "amethyst", 'price' => 1850.50, 'amount' => 25],
            ['id' => 5, 'name' => "the_one_above_all", 'price' => 42.42, 'amount' => 1],
        ];
    }

    $this->cart = [];

    public function addProduct (int $productId, int $quantity = 1): void
    {
        $product = $this->findProduct(productId);

        if (!$product){
            throw new Exception("Produto não encontrado")
        }

       if ($product['amount'] < $quantity) {
           throw new Exception("Estoque insuficiente!");
       }

    }
}
