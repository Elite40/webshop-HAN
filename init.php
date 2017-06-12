<?php
session_start();

require_once 'helpers/functions.php';
require_once 'DB.php';

try{
    $db = new DB();
}catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
