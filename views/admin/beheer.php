<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../Controllers/ProductController.php';
require '../../Controllers/CategoryController.php';
require '../../Controllers/CartController.php';

$productController = new ProductController();
$categoryController = new CategoryController();
$cartController = new CartController();

$products = $productController->getAllProducts();

?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Beheer producten</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="../../assets/css/master.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/ad.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/winkelwagen.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/admin.css" type="text/css">
    </head>
    <body>

    <div class="wrapper">
        <h1 style="color: #E0510F;">Beheeromgeving</h1>
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
            } else if (isset($_SESSION['error'])) {
                echo '<div class="flash-message error">';
                echo '<h3>' . $_SESSION['error'] . '</h3>';
                echo '</div>';
            }
            ?>

            <h2>Alle producten</h2>
            <table>
                <thead>
                <tr>
                    <th>Afbeelding</th>
                    <th>Productnaam</th>
                    <th>Voorraad</th>
                    <th>Prijs</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var Product $product */
                foreach ($products as $product) {
                    echo "<tr>";
                    echo '<td class="product-afbeelding">
                            <img src="http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/webshop-HAN/' . $product['AFBEELDING_KLEIN'] . '" alt="">
                        </td>
                        <td>' . $product['PRODUCTNAAM'] . '</td>
                        <td>' . (is_null($product['VOORRAAD']) ? 0 : $product['VOORRAAD']) . '</td>
                        <td>€' . $product['PRIJS'] . '</td>
            
                        <td>
                            <a href="/webshop-HAN/views/admin/edit.php?item=' . $product['PRODUCTNUMMER'] . '" class="edit-item-btn">Wijzig item</a>
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