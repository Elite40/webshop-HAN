<?php

class CartController
{
    private $db;

    function __construct()
    {
        $this->db = DB::getInstance();
    }

    /** Returns the session cart_items.  */
    public function getCart()
    {
        if (isset($_SESSION['cart_items'])) {
            return $_SESSION['cart_items'];
        }
        return [];
    }

    /**
     * Adds the product to the shoppingcart.
     * @param $product
     */
    public function addToCart($product)
    {
        array_push($_SESSION['cart_items'], $product);
    }

    public function removeFromCart($product)
    {
        foreach ($this->getCart() as $k => $v) {
            foreach ($this->getCart()[$k] as $key => $value) {
                if ($key === "PRODUCTNUMMER" && $value == $product->PRODUCTNUMMER) {
                    unset($_SESSION['cart_items'][$k]);
                }
            }
        }
    }

    /**
     * Empties the shopping cart.
     */
    public function emptyCart()
    {
        foreach ($this->getCart() as $product) {
            $this->removeFromCart($product);
        }
    }

    /**
     * Returns the subtotal of the products in the shoppingcart.
     * @return float
     */
    public function getSubTotal()
    {
        $subtotal = 0.0;
        foreach ($this->getCart() as $product) {
            $subtotal += $product->PRIJS;
        }
        return $subtotal;
    }
}