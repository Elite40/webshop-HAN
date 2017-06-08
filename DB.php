<?php

class DB
{
    public $db;

    private $results;

    private static $_instance = null;

    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(isset(self::$_instance))) {
            self::$_instance = new DB();
        }

        return self::$_instance;
    }

    public function connectToDb()
    {
        try {
            $this->db = new PDO(
                sprintf(
                    'mysql:host=%s;dbname=%s;port=%s;charset=%s',
                    config('mysql', 'host'),
                    config('mysql', 'name'),
                    config('mysql', 'port'),
                    config('mysql', 'charset')
                ),
                config('mysql', 'username'),
                config('mysql', 'password')
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}