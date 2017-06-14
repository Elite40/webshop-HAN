<?php

class DB
{
    private $db;

    private $results;

    private static $_instance = null;

    private $config;

    public function __construct()
    {
        require_once "Database/Config.php";

        $this->config = Config::getConfig();
    }

    public static function getInstance(){
        if(!(isset(self::$_instance))){
            self::$_instance = new DB;
        }
        return self::$_instance->connect();
    }

    /**
     * Returns the connection.
     *
     * @return PDO
     * @throws PDOException
     */
    public function connect()
    {
        try {
            return new PDO(
                sprintf(
                    'mysql:host=%s;dbname=%s;port=%s;charset=%s',
                    $this->config['host'],
                    $this->config['name'],
                    $this->config['port'],
                    $this->config['charset']
                ),
                $this->config['username'],
                $this->config['password'],
                [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
            );

        } catch (PDOException $e) {
            throw $e;
        }
    }
}