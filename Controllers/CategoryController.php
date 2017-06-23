<?php

class CategoryController
{
    /** @var PDO  */
    private $db;

    /** @var string  */
    private $table = 'categorie';

    /** @var array  */
    public $categories = [];

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * Returns all categories.
     * @return array
     */
    public function getAllCategories()
    {
        $stmt = $this->db->prepare("select * from " . $this->table);

        if (!$stmt->execute()) {
            die("Failure occured. See " . __FUNCTION__);
        }

        while ($cats = $stmt->fetch()) {
            $this->categories[] = $cats["CATEGORIENAAM"];
        }

        return $this->categories;
    }
}