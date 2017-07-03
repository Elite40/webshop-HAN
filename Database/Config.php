<?php
class Config
{
    public static $config = [
        'host' => 'localhost',
        'port' => '3306',
        'name' => 'webshop',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ];
    public static function getConfig()
    {
        return self::$config;
    }
}

