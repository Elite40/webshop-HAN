<div class="logged-in-container">

    <form action="/webshop-HAN/logout.php" method="post">
        <label>Welkom, <?php echo $_SESSION['user']->GEBRUIKERSNAAM; ?> </label>

        <input type="submit" value="Uitloggen">
    </form>
    Winkelwagen <img src="/webshop-HAN/assets/img/shopping-cart.png"><span class="shoppingcart-amount"> ( <?php echo count($_SESSION['cart_items']);?>)</span>
</div>