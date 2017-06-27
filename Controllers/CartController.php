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

    public function removeFromCart($product, $checkout)
    {
        if ($checkout) {
            $this->editStock($product);
        }
        foreach ($this->getCart() as $index => $v) {
            foreach ($this->getCart()[$index] as $key => $value) {
                if ($key === "PRODUCTNUMMER" && $value == $product->PRODUCTNUMMER) {
                    unset($_SESSION['cart_items'][$index]);
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
            $this->removeFromCart($product, true);
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

    public function editStock($product) {
        $count = array_count_values(array_column($this->getCart(), 'PRODUCTNUMMER'))[$product->PRODUCTNUMMER];
        $stmt = $this->db->prepare("UPDATE product 
              SET VOORRAAD=:voorraad 
              WHERE PRODUCTNUMMER=:productnummer");

        $stmt->bindValue(':voorraad', (int)$product->VOORRAAD - (int)$count);
        $stmt->bindValue(':productnummer', $product->PRODUCTNUMMER);

        return ($stmt->execute());
    }
}