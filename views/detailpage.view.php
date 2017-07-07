<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Controllers/ProductController.php';
require_once 'Controllers/CategoryController.php';
require_once 'Controllers/CartController.php';
require_once 'Product.php';

$productNumber = (isset($_GET['product']) ? (int)$_GET['product'] : null);

$productController = new ProductController();
$categoryController = new CategoryController();
$cartController = new CartController();

if (null == $productNumber) {
    die("No product to view");
}

/** @var Product $product */
$product = $productController->getProductByProductNumber($productNumber);

$recommendations = $productController->getRecommendedItems($productNumber);

if (isset($_POST['add-to-cart'])) {
    if ($productController->checkStock($_POST['add-to-cart'])) {
        $cartController->addToCart($productController->getProductByProductNumber($_POST['add-to-cart']));
    }
}

?>


<div class="product-pagina-container">

    <a href="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/webshop-HAN/index.php?page=webshop'; ?>" class="shop-button">Terug</a>

    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo $product->AFBEELDING_GROOT ?>"
                 alt="">
        </div>

        <div class="product-information">
            <h2><?php echo $product->PRODUCTNAAM; ?></h2>

            <div class="price">
                <h3>€ <?php echo $product->PRIJS; ?></h3>
            </div>

            <div class="description">
                <p>
                    <?php echo $product->OMSCHRIJVING; ?>
                </p>
                <?php

                if ($product->VOORRAAD == null || (int)$product->VOORRAAD == 0) {
                    echo '<span class="out-of-stock">Niet meer op voorraad</span>';
                } else {
                    echo '<span class="in-stock">Op voorraad: <b>' . $product->VOORRAAD . '</b></span>';
                }
                ?>

            </div>

            <div class="order-amount">
                <?php

                if (!isset($product->VOORRAAD) || $product->VOORRAAD <= 0 || $cartController->checkProductCount($product) >= $product->VOORRAAD) {
                    echo '<span class="out-of-stock">Uitverkocht</span>';
                }else {
                    echo '
                <label>Aantal</label>
                <select class="select-wrapper" name="amount">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                </select>
                <form method="POST">';

                        $button = '<button class="shop-button" type="submit" name="add-to-cart" formmethod="post"
                                    value="'. $product->PRODUCTNUMMER . '">
                                <img src="/webshop-HAN/assets/img/shopping-cart-large.png" alt="in winkelwagen">
                            </button>';
                        echo $button;
                        echo '</form>';
                    }
                    ?>

            </div>
        </div><!-- Einde product-information div -->

    </div> <!-- Einde product-container -->

    <?php
    if (count($recommendations) > 0) {
        echo '<div class="recommendation-wrapper">';
        echo '<h2>Aanbevolen producten</h2>';
        echo '<div class="recommended-products">';

        /** @var Product $recommendation */
        foreach ($recommendations as $recommendation) {
            echo '<div class="product-item">';
            ?>
            <div class="product-image-holder">
                <img src="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/webshop-HAN/' . $recommendation->AFBEELDING_KLEIN; ?>"
                     alt="">
            </div>
            <div class="product-title-container">
                <h2 class="product-item--title"><?php echo $recommendation->PRODUCTNAAM ?></h2>
            </div>
            <div class="product-item--information">
                <h3>€ <?php echo $recommendation->PRIJS ?></h3>
                <form method="POST">

                    <?php

                    if (!isset($recommendation->VOORRAAD) || $recommendation->VOORRAAD <= 0 || $cartController->checkProductCount($recommendation) >= $recommendation->VOORRAAD) {
                        echo '<span class="out-of-stock">Uitverkocht</span>';
                    }else {
                        $button = '<button class="shop-button" type="submit" name="add-to-cart" formmethod="post"
                                    value="'. $product->PRODUCTNUMMER . '">
                                <img src="/webshop-HAN/assets/img/shopping-cart-large.png" alt="in winkelwagen">
                            </button>';
                        echo $button;
                    }
                    ?>

                    <a class="more-info-button"
                       href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['PHP_SELF'] . '?page=detailpage&product=' . $recommendation->PRODUCTNUMMER ?>">Meer
                        Info</a>
                </form>
                <!--<a href="#" class="shop-button to-shoppingcart-btn">In winkelwagen</a>-->
            </div>

            <?php

            echo '</div>';
            echo '</div>';
        }
    }
    ?>
</div>

