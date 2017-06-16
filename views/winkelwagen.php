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
require_once 'helpers/functions.php';
require_once 'Product.php';

$cart = (isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array());
$cartController = new CartController();

?>

<div class="winkelwagen-pagina-container">
    <div class="main-section">
        <table>
        <?php
            foreach ($cart as $product) {
               ?>
                <tr>
                    <td><img src="<?php echo 'http://localhost:8888/webshop-HAN/' . $product->AFBEELDING_KLEIN; ?>" alt=""></td>
                    <td><?php echo $product->PRODUCTNAAM ?></td>
                </tr>
                <?php
            }
        ?>
        </table>
    </div>
</div>
