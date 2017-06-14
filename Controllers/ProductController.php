<?php

class ProductController
{
    private $db;

    private $table = 'product';

    /** @var array  */
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
        $query = sprintf("select * from %s", $this->table);
        $stmt = $this->db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');

        if (!$stmt->execute()) {
            die("Failed trying to fetch the products");
        }

        while ($results = $stmt->fetch()) {
            $this->products[] = $results;
        }

        return $this->products;

    }
}