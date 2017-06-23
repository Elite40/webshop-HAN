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

$products = $productController->getAllProducts();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Winkelwagen</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../../assets/css/master.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/ad.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/winkelwagen.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/admin.css" type="text/css">
</head>
<body>

<div class="wrapper admin-wrapper">
    <nav>
        <ul class="menu">
            <li class="menu__item">
                <a href="/webshop-HAN/index.php">Ga naar website</a>
            </li>
            <li class="menu__item">
                <a href="/webshop-HAN/views/admin/beheer.php">Alle producten</a>
            </li>
        </ul>
    </nav>

<div class="winkelwagen-wrapper">

    <?php
    if (isset($_SESSION['item_deleted'])) {
        echo '<div class="flash-message success">';
        echo '<h3>' . $_SESSION['item_deleted'] . '</h3>';
        echo '</div>';
    }else if(isset($_SESSION['error'])) {
        echo '<div class="flash-message error">';
        echo '<h3>' . $_SESSION['error'] . '</h3>';
        echo '</div>';
    }
    ?>

    <h1>Alle producten</h1>
    <table>
        <thead>
        <tr>
            <th>Afbeelding</th>
            <th>Productnaam</th>
            <th>Prijs</th>
            <th>Acties</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /** @var Product $product */
        foreach ($products as $product) {

            echo '<td class="product-afbeelding">
                <img src="http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/webshop-HAN/'. $product['AFBEELDING_KLEIN'] .'" alt="">
            </td>
            <td>' . $product['PRODUCTNAAM'] . '</td>
            <td>€'. $product['PRIJS'] .'</td>

            <td>
                <a href="/webshop-HAN/views/admin/edit.php?" class="edit-item-btn">Wijzig item</a>
                <a href="/webshop-HAN/views/admin/destroy.php?item='.$product['PRODUCTNUMMER'].'" class="remove-item-btn">Verwijder item</a>
            </td>';

            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

</div>
</div>
</body>
</html>

<?php

unset($_SESSION['error']);
unset($_SESSION['item_deleted']);