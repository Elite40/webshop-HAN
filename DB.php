<?php

class DB
{
    private $db;

    private $results;

    private static $_instance = null;

    private $config;

    public function __construct()
    {
        require_once "Settings/config.php";

        $this->config = Config::getConfig();

        $this->connectToDb();
    }

    public function getDbInstance() {
        if ($this->db instanceof PDO) {
            return $this->db;
        }
    }

    /**
     * @throws PDOException
     */
    public function connectToDb()
    {
        try {
            $this->db = new PDO(
                sprintf(
                    'mysql:host=%s;dbname=%s;port=%s;charset=%s',
                    $this->config['host'],
                    $this->config['name'],
                    $this->config['port'],
                    $this->config['charset']
                ),
                $this->config['username'],
                $this->config['password']
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}