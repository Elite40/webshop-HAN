<?php

/**
 * Created by PhpStorm.
 * User: tiesbaltissen
 * Date: 16-06-17
 * Time: 12:03
 */
class CartController
{
    private $db;

    function __construct() {
        $this->db = DB::getInstance();
    }

    public function getCart() {
        if (isset($_SESSION['cart_items'])) {
            return $_SESSION['cart_items'];
        }
        return [];
    }

    public function addToCart($product) {
        array_push($_SESSION['cart_items'], $product);
    }

    public function removeFromCart($product) {
        foreach ($this->getCart() as $k =>$v) {
            foreach ($this->getCart()[$k] as $key => $value) {
                if ($key === "PRODUCTNUMMER" && $value == $product->PRODUCTNUMMER) {
                    unset($_SESSION['cart_items'][$k]);
                }
            }
        }
    }

    public function emptyCart() {
        foreach ($this->getCart() as $product) {
            $this->removeFromCart($product);
        }
    }

    public function getSubTotal() {
        $subtotal = 0.0;
        foreach ($this->getCart() as $product) {
            $subtotal += $product->PRIJS;
        }
        return $subtotal;
    }
}