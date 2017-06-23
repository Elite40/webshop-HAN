<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../Controllers/ProductController.php';
require '../../Controllers/CategoryController.php';
require '../../Controllers/CartController.php';
require '../../helpers/functions.php';

$productController = new ProductController();
$categoryController = new CategoryController();
$cartController = new CartController();

$item = (isset($_GET['item']) ? $_GET['item'] : null);

if ($item == null) {
    header('Location:'. $_SERVER['HTTP_REFERER']);
}

$itemDeleted = $productController->destroyItem($item);

if ($itemDeleted != null || $itemDeleted == true) {
    $_SESSION['item_deleted'] = 'Product is verwijderd';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else {
    $_SESSION['error'] = 'Product kon niet verwijderd worden. Er ging iets mis';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}