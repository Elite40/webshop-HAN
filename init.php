<?php
session_start();

require_once 'cgi-bin/config.php';
require_once 'functions.php';
require_once 'DB.php';

$db = new DB();
try{
    $db->connectToDb();
}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
