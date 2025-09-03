<?php

class ShoppingCart
{
    public array $products;
    public array $cart;

    public function __construct()
    {
        $this->products = [
            ['id' => 1, 'name' => "beans", 'price' => 3.50, 'amout' => 25],
            ['id' => 2, 'name' => "cealing_fan", 'price' => 50.0, 'amout' => 25],
            ['id' => 3, 'name' => "pillow", 'price' => 14.99, 'amout' => 25],
            ['id' => 4, 'name' => "amethyst", 'price' => 1850.5, 'amout' => 25],
            ['id' => 5, 'name' => "the_one_above_all", 'price' => 42.42, 'amout' => 1],
        ];
    }

    public function addProduct(string $product)
    {
        ($this->cart)[] = ($product);
    }
}
