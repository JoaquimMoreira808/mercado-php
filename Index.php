<?php

require_once __DIR__ . '/src/Inventory.php';
require_once __DIR__ . '/src/ShoppingCart.php';
require_once __DIR__ . '/src/Discount.php';

$inventory = new Inventory();
$cart = new ShoppingCart($inventory);

echo "<h2>=== Available Products ===</h2>";
foreach ($inventory->getProducts() as $product) {
    echo "ID: {$product['id']}<br>";
    echo "Name: {$product['name']}<br>";
    echo "Price: $" . number_format($product['price'], 2, '.', '') . "<br>";
    echo "Stock: {$product['amount']}<br><hr>";
}

echo "<h2>=== Case 1: Add valid product ===</h2>";
try {
    $cart->addProduct(1, 2);
    foreach ($cart->listCart() as $item) {
        echo "Product: {$item['name']} | Quantity: {$item['quantity']} | ";
        echo "Subtotal: $" . number_format($item['subtotal'], 2, '.', '') . "<br>";
    }
    echo "<strong>Updated Stock:</strong><br>";
    foreach ($inventory->getProducts() as $product) {
        echo "ID: {$product['id']} | Name: {$product['name']} | Stock: {$product['amount']}<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<h2>=== Case 2: Add beyond stock ===</h2>";
try {
    $cart->addProduct(3, 5555);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    echo "<strong>Stock remains:</strong><br>";
    foreach ($inventory->getProducts() as $product) {
        echo "ID: {$product['id']} | Name: {$product['name']} | Stock: {$product['amount']}<br>";
    }
}

echo "<h2>=== Case 3: Remove product from cart ===</h2>";
try {
    $cart->removeProduct(1);
    foreach ($cart->listCart() as $item) {
        echo "Product: {$item['name']} | Quantity: {$item['quantity']}<br>";
    }
    echo "<strong>Updated Stock:</strong><br>";
    foreach ($inventory->getProducts() as $product) {
        echo "ID: {$product['id']} | Name: {$product['name']} | Stock: {$product['amount']}<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<h2>=== Case 4: Apply discount coupon ===</h2>";
try {
    $cart->addProduct(2, 1);
    foreach ($cart->listCart() as $item) {
        echo "Product: {$item['name']} | Quantity: {$item['quantity']} | ";
        echo "Subtotal: $" . number_format($item['subtotal'], 2, '.', '') . "<br>";
    }
    $total = $cart->calculateTotal('DISCOUNT10');
    echo "<strong>Total with discount: $" . number_format($total, 2, '.', '') . "</strong><br>";
    echo "<strong>Updated Stock:</strong><br>";
    foreach ($inventory->getProducts() as $product) {
        echo "ID: {$product['id']} | Name: {$product['name']} | Stock: {$product['amount']}<br>";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}
