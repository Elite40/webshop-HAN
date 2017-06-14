<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Controllers/ProductController.php';
require_once 'Controllers/CategoryController.php';
require_once 'helpers/functions.php';
require_once 'Product.php';

$cat = (isset($_GET['cat']) ? $_GET['cat'] : null);

$productController = new ProductController();
$categoryController = new CategoryController();

$products = $productController->getAllProducts();
$categories = $categoryController->getAllCategories();

if ($cat !== null) {
    $products = [];
    $products = $productController->getProductsByCategory($cat);
}

?>

<div class="producten-container">

    <div class="search-wrapper">
        <input type="text" name="search-term" placeholder="Zoektermen ingeven">
        <a href="#" class="search-button">Zoeken</a>
    </div>

    <div class="amount-of-results">
        1367 Producten | Toon
        <select class="" name="amount-to-show">
            <option value="20" selected>20</option>
            <option value="20">40</option>
            <option value="20">60</option>
            <option value="20">80</option>
        </select>
    </div>


    <div class="main-section">

        <div class="browse-category">
            <ul>
                <?php
                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        $categoryParameter = array_merge($_GET, array("cat" => $category));
                        echo '<li>';
                        echo '<a href="?'. http_build_query($categoryParameter) .'">'. $category . '</a>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>

        <div class="products">
            <?php
            /** @var Product $product */
            foreach ($products as $product) {
                ?>
            <div class="product-item">
                <div class="product-image-holder">
                    <img src="<?php echo 'http://localhost/webshop-HAN/' . $product->AFBEELDING_KLEIN; ?>" alt="">
                </div>
                <div class="product-title-container">
                    <h2 class="product-item--title"><?php echo $product->PRODUCTNAAM ?></h2>
                </div>
                <div class="product-item--information">
                    <h3>€ <?php echo $product->PRIJS ?></h3>
                    <a href="#" class="shop-button to-shoppingcart-btn">In winkelwagen</a>
                </div>


            </div>
            <?php
            }

            ?>

        </div>

<!--       <div class="recommendation-wrapper">-->
<!---->
<!--                  <div class="recommended-item">-->
<!--                    <img src="http://www.auto-uitlaat.nl/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/1/2/1220_1.png" alt="">-->
<!--                    <h2 class="recommended-item--title">Mooie uitlaat</h2>-->
<!--                    <div class="recommended-item--information">-->
<!--                      <h3>€100,00</h3>-->
<!--                      <a href="#" class="shop-button">In winkelwagen</a>-->
<!--                    </div>-->
<!--                  </div>-->
<!---->
<!--                  <div class="recommended-item">-->
<!--                    <img src="http://www.auto-uitlaat.nl/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/1/2/1219_1.png" alt="">-->
<!--                    <h2 class="recommended-item--title">Nog een mooie uitlaat</h2>-->
<!--                    <div class="recommended-item--information">-->
<!--                      <h3>€100,00</h3>-->
<!--                      <a href="#" class="shop-button">In winkelwagen</a>-->
<!--                    </div>-->
<!--                  </div>-->
<!---->
<!--                  <div class="recommended-item">-->
<!--                    <img src="http://www.auto-uitlaat.nl/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/1/2/1219_1.png" alt="">-->
<!--                    <h2 class="recommended-item--title">Coole uitlaat!</h2>-->
<!--                    <div class="recommended-item--information">-->
<!--                      <h3 class="product-price">€100,00</h3>-->
<!--                      <a href="#" class="shop-button">In winkelwagen</a>-->
<!--                    </div>-->
<!--                  </div>-->
<!--       </div>-->

    </div>

</div>