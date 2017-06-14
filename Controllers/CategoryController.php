<?php

class CategoryController
{
    private $db;

    private $table = 'categorie';

    public $categories = [];

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

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