<?php

class ProductController
{
    private $db;

    private $table = 'product';

    /** @var array */
    private $products = [];

    function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * @return array Contains all products
     */
    public function getAllProducts()
    {
        $stmt = $this->db->prepare("select * from " . $this->table);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');

        if (!$stmt->execute()) {
            die("Failed trying to fetch the products");
        }

        $this->products = [];

        while ($results = $stmt->fetch()) {
            $this->products[] = $results;
        }

        return $this->products;
    }

    /**
     * Returns all products for a specific category\
     *
     * @param $category
     * @return array
     */
    public function getProductsByCategory($category)
    {
        $stmt = $this->db->prepare("select * from " .$this->table . " where CATEGORIE=:cat");
        $stmt->bindParam(":cat", $category);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');

        if (!$stmt->execute()) {
            die("Failure occured. See method: <i>" . __FUNCTION__ . "()</i>");
        }

        if ($stmt->fetch()) {
            $this->products = [];
            while ($products = $stmt->fetch()) {
                $this->products[] = $products;
            }
        }else {
            die("Error occured at: " . __FUNCTION__);
        }

        return $this->products;

    }

    public function getProductByProductNumber($productNumber) {
        $stmt = $this->db->prepare("select * from " .$this->table . " where PRODUCTNUMMER=:productnummer");
        $stmt->bindParam(":productnummer", $productNumber, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            die("Failure occured. see method: <i>" . __FUNCTION__ . "()</i>");
        }

        $product = $stmt->fetchObject();
        return $product;
    }
}