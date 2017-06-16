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

    }

    public function emptyCart() {

    }
}