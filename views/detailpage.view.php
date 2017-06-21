<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Controllers/ProductController.php';
require_once 'Controllers/CategoryController.php';
require_once 'Controllers/CartController.php';
require_once 'helpers/functions.php';
require_once 'Product.php';

$productNumber = (isset($_GET['product']) ? (int) $_GET['product'] : null);

$productController = new ProductController();
$categoryController = new CategoryController();
$cartController = new CartController();

if (null == $productNumber) {
    die("No product to view");
}

/** @var Product $product */
$product = $productController->getProductByProductNumber($productNumber);

?>


<div class="product-pagina-container">

    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="shop-button">Terug</a>

    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo $product->AFBEELDING_GROOT ?>"
                 alt="">
        </div>

        <div class="product-information">
            <h2><?php echo $product->PRODUCTNAAM; ?></h2>

            <div class="price">
                <h3>€ <?php echo $product->PRIJS;?></h3>
            </div>

            <div class="description">
                <p>
                    <?php echo $product->OMSCHRIJVING; ?>
                </p>
                <?php
                if ($product->VOORRAAD == null) {
                    echo '<span class="out-of-stock">Niet meer op voorraad</span>';
                }else {
                    echo '<span class="in-stock">Op voorraad: <b>'. $product->VOORRAAD .'</b></span>';
                }
                ?>

            </div>

            <div class="order-amount <?php $x = (!isset($product->VOORRAAD) ? 'disabled' : ''); echo $x;?>">
                <label>Aantal</label>
                <select class="select-wrapper" name="amount">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="1">5</option>
                </select>
                <a href="#" class="shop-button">Toevoegen aan winkelwagen</a>
            </div>

        </div><!-- Einde product-information div -->

    </div>

    <div class="recommendation-wrapper">

        <div class="recommended-item">
            <img src="http://www.auto-uitlaat.nl/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/1/2/1220_1.png"
                 alt="">
            <h2 class="recommended-item--title">Mooie uitlaat</h2>
            <div class="recommended-item--information">
                <h3>€100,00</h3>
                <a href="#" class="shop-button">In winkelwagen</a>
            </div>
        </div>

        <div class="recommended-item">
            <img src="http://www.auto-uitlaat.nl/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/1/2/1219_1.png"
                 alt="">
            <h2 class="recommended-item--title">Nog een mooie uitlaat</h2>
            <div class="recommended-item--information">
                <h3>€100,00</h3>
                <a href="#" class="shop-button">In winkelwagen</a>
            </div>
        </div>

        <div class="recommended-item">
            <img src="http://www.auto-uitlaat.nl/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/1/2/1219_1.png"
                 alt="">
            <h2 class="recommended-item--title">Coole uitlaat!</h2>
            <div class="recommended-item--information">
                <h3 class="product-price">€100,00</h3>
                <a href="#" class="shop-button">In winkelwagen</a>
            </div>
        </div>

    </div>

</div>

