<?php

class ProductController
{
    /** @var PDO */
    private $db;

    /** @var string */
    private $table = 'product';

    /** @var string */
    private $tableRecommandation = 'product_gerelateerd_product';

    /** @var array */
    private $products = [];

    function __construct()
    {
        require_once __DIR__ . "/../Database/DB.php";

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
        $query = ($category == 'Alles') ? "select * from " . $this->table : "select * from " . $this->table . " where CATEGORIE=:cat";
        $stmt = $this->db->prepare($query);
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
        } else {
            die("Error occured at: " . __FUNCTION__);
        }

        return $this->products;
    }

    /** Finds products by name
     *
     * @param $name
     * @return array
     */
    public function getProductsByName($name)
    {
        $name = '%' . $name . '%';
        $stmt = $this->db->prepare('select * from ' . $this->table . ' where PRODUCTNAAM LIKE :productnaam');
        $stmt->bindParam(":productnaam", $name, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');

        if (!$stmt->execute()) {
            die("Failure occured. See method: <i>" . __FUNCTION__ . "()</i>");
        }

        if ($stmt->fetch()) {
            $this->products = [];
            while ($products = $stmt->fetch()) {
                $this->products[] = $products;
            }
        } else {
            return [];
        }

        return $this->products;
    }

    /**
     * Finds a product by its product number
     *
     * @param $productNumber
     * @return mixed
     */
    public function getProductByProductNumber($productNumber)
    {
        $stmt = $this->db->prepare("select * from " . $this->table . " where PRODUCTNUMMER=:productnummer");
        $stmt->bindParam(":productnummer", $productNumber, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            die("Failure occured. see method: <i>" . __FUNCTION__ . "()</i>");
        }

        $product = $stmt->fetchObject();

        return $product;
    }

    /**
     * Checks the stock for a specific product.
     *
     * @param $productNumber
     * @return bool
     */
    public function checkStock($productNumber)
    {
        $product = $this->getProductByProductNumber($productNumber);
        if ($product->VOORRAAD !== null && $product->VOORRAAD > 0) {
            return true;
        }

        return false;
    }

    /**
     * Returns the recommended items based on the given productnumber.
     * @param $productNumber
     * @return array
     */
    public function getRecommendedItems($productNumber)
    {
        if (!is_int($productNumber)) {
            die("Not an integer");
        }
        $stmt = $this->db->prepare(
            'SELECT PRODUCTNUMMER_GERELATEERD_PRODUCT FROM ' . $this->tableRecommandation . ' where PRODUCTNUMMER = :productnumber'
        );
        $stmt->bindParam(':productnumber', $productNumber);
        $stmt->execute();

        if (!$stmt->execute()) {
            die("Failure occured. see method: <i>" . __FUNCTION__ . "()</i>");
        }

        $productNumbers = [];
        $recommendedProducts = [];

        while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productNumbers[] = (int)$results['PRODUCTNUMMER_GERELATEERD_PRODUCT'];
        }

        for ($index = 0; $index < count($productNumbers); $index++) {
            $recommendedProducts[] = $this->getProductByProductNumber($productNumbers[$index]);
        }

        return $recommendedProducts;
    }

    /**
     * Destroys the item from the database
     * @param $productNumber
     * @return bool
     */
    public function destroyItem($productNumber)
    {
        $sql = "DELETE FROM `product` WHERE `PRODUCTNUMMER` = :productnummer";

        $statement = $this->db->prepare($sql);
        $statement->bindParam(":productnummer", $productNumber, PDO::PARAM_STR);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Updates the product item
     * @param $item
     * @param $values
     * @return bool
     */
    public function updateItem($item, $values)
    {
        $stmt = $this->db->prepare("UPDATE product SET 
                 PRODUCTNAAM =:productnaam,
                 OMSCHRIJVING =:omschrijving, 
                 PRIJS =:prijs, 
                 CATEGORIE =:categorie, 
                 VOORRAAD =:voorraad
                 WHERE PRODUCTNUMMER=:productnummer");

        $stmt->bindValue(':productnaam', $values['productnaam']);
        $stmt->bindValue(':omschrijving', $values['omschrijving']);
        $stmt->bindValue(':prijs', $values['prijs']);
        $stmt->bindValue(':categorie', $values['categorie']);
        $stmt->bindValue(':voorraad', $values['voorraad']);
        $stmt->bindValue(':productnummer', $item);

        return ($stmt->execute());
    }
}