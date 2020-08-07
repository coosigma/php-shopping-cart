<?php

declare(strict_types=1);

namespace App;

class Cart
{
    protected $products;
    function __construct($products)
    {
        $this->products = $products;
    }
    // Get Product list
    public function listProducts(): array
    {
        return array_map(function (&$product) {
            $product['price'] = number_format((float)$product['price'], 2, '.', '');
            return $product;
        }, $this->products);
    }
    // Get Cart list
    public function listCart(): array
    {
        $cart = $this->getCart();
        $products = $this->products;
        $subtotal = 0;
        $cartInfo = array_map(function ($quantity, $id) use ($products, &$subtotal) {
            $product = $products[$id];
            $total = $product["price"] * $quantity;
            $subtotal += $total;
            return ["id" => $id, "name" => $product["name"], "price" => number_format((float)$product['price'], 2, '.', ''), "quantity" => $quantity, "total" => number_format((float)$total, 2, '.', '')];
        }, $cart, array_keys($cart));
        return ['subtotal' => number_format((float)$subtotal, 2, '.', ''), 'cartInfo' => $cartInfo];
    }
    // get cart object from cookie
    public function getCart()
    {
        return array_key_exists("cart", $_COOKIE) ? json_decode($_COOKIE["cart"], true) :  [];
    }
    // store cart into cookie
    public function store($cart)
    {
        setcookie("cart", json_encode($cart), time() + 3600, "/");
    }
    // add 1 product into cart
    public function add($productId)
    {
        $cart = $this->getCart();
        if (array_key_exists($productId, $cart)) {
            $cart[$productId]++;
        } else {
            $cart[$productId] = 1;
        }
        $this->store($cart);
    }
    // remove product from cart
    public function remove($productId)
    {
        $cart = $this->getCart();
        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
        }
        $this->store($cart);
    }
}
