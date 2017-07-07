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

$item = (isset($_GET['item']) ? $_GET['item'] : null);

if ($item == null) {
    header('Location:' . $_SERVER['HTTP_REFERER']);
}

/** @var Product $product */
$product = $productController->getProductByProductNumber($item);
$categories = $categoryController->getAllCategories();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update-item'])) {
        $productNaam = $_POST['product-name'];
        $omschrijving = $_POST['product-omschrijving'];
        $categorie = $_POST['product-categorie'];
        $prijs = $_POST['product-price'];
        $voorraad = $_POST['product-voorraad'];

        if (!empty($productNaam) &&
            !empty($omschrijving) &&
            !empty($categorie) &&
            !empty($prijs) &&
            !empty($voorraad)
        ) {

            $values = [
                'productnaam' => $productNaam,
                'omschrijving' => $omschrijving,
                'categorie' => $categorie,
                'prijs' => $prijs,
                'voorraad' => $voorraad,
            ];

            if ($productController->updateItem($item, $values)) {
                $_SESSION['item-updated'] = "Item is geüpdatet";
            }
        }
    }
}

?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Wijzig product</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="../../assets/css/master.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/ad.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/winkelwagen.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/admin.css" type="text/css">
    </head>
    <body>

    <div class="wrapper">
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
            if (isset($_SESSION['item-updated'])) {
                echo '<div class="flash-message success">';
                echo '<h3>' . $_SESSION['item-updated'] . '</h3>';
                echo '</div>';
            }
            ?>
            <h1><?php echo $product->PRODUCTNAAM ?></h1>

            <form action="#" method="POST">
                <div class="element-holder">
                    Naam:
                    <input type="text" name="product-name" placeholder="Productnaam"
                           value="<?php echo $product->PRODUCTNAAM ?>">
                </div>
                <div class="element-holder">
                    Omschrijving
                    <textarea name="product-omschrijving" placeholder="Product omschrijving" class="omschrijving-edit">

                    <?php echo $product->OMSCHRIJVING; ?>

                </textarea>
                </div>

                <div class="element-holder">Categorie
                    <select name="product-categorie" id="category-selector">
                        <?php

                        foreach ($categories as $category) {
                            if ($category == $product->CATEGORIE) {
                                echo "<option selected>" . $category . "</option>";
                            } else {
                                echo "<option>" . $category . "</option>";
                            }
                        }

                        ?>
                    </select>
                </div>

                <div class="element-holder">Prijs:
                    <input type="text" name="product-price" value="<?php echo $product->PRIJS; ?>">
                </div>

                <div class="element-holder">
                    Voorraad:
                    <input type="text" name="product-voorraad" value="<?php echo $product->VOORRAAD; ?>">
                </div>

                <div class="submit-btn-wrapper">
                    <input type="submit" value="Opslaan" class="save-btn" name="update-item">
                </div>

            </form>
        </div>
    </div>
    </body>
    </html>

<?php

unset($_SESSION['item-updated']);
