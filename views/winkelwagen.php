<?php
/**
 * Created by PhpStorm.
 * User: tiesbaltissen
 * Date: 16-06-17
 * Time: 12:14
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Controllers/CartController.php';
require_once 'Controllers/ProductController.php';
require_once 'helpers/functions.php';
require_once 'Product.php';

$cartController = new CartController();
$productController = new ProductController();
$cart = array_map("unserialize", array_unique(array_map("serialize", $cartController->getCart())));

if (isset($_POST['remove-from-cart'])) {
    $cartController->removeFromCart($productController->getProductByProductNumber($_POST['remove-from-cart']));
    $cart = array_map("unserialize", array_unique(array_map("serialize", $cartController->getCart())));
}

if (isset($_POST['checkout-cart'])) {
    $cart = array();
    $cartController->emptyCart();
}

?>

<div class="winkelwagen-pagina-container">
    <div class="main-section">
        <table>
        <?php
            foreach ($cart as $product) {
               ?>
                <tr>
                    <td class="image"><img src="<?php echo 'http://localhost:8888/webshop-HAN/' . $product->AFBEELDING_KLEIN; ?>" width="80" height="50" alt=""></td>
                    <td class="product-name"><?php echo $product->PRODUCTNAAM ?></td>
                    <td class="product-amount">Aantal: <?php echo array_count_values(array_column($cartController->getCart(), 'PRODUCTNUMMER'))[$product->PRODUCTNUMMER]?></td>
                    <td class="product-subtotal">Prijs: €<?php echo array_count_values(array_column($cartController->getCart(), 'PRODUCTNUMMER'))[$product->PRODUCTNUMMER] * $product->PRIJS ?></td>
                    <td><form method="POST"><button class="remove-from-ww-btn" type="submit" name="remove-from-cart" value=<?php echo $product->PRODUCTNUMMER ?>>Verwijderen?</button></form></td>
                </tr>
                <?php
            }
        ?>
        </table>


    </div>

    <div>
        <div class="subtotal-container">
            Subtotaal: €<?php echo $cartController->getSubTotal()?>
            <form method="POST"><button class="checkout-button" type="submit" name="checkout-cart" value='true' >Afrekenen</button></form>
        </div>
    </div>

</div>
