<?php

class Config
{

    public static $config = [
        'host' => 'localhost',
        'port' => '8889',
        'name' => 'webshop',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8'
    ];


    public static function getConfig()
    {
        return self::$config;
    }
}

