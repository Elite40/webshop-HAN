<?php
session_start();

require_once 'Database/DB.php';

try {
    $db = new DB();
    if (!isset($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = [];
    }

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
