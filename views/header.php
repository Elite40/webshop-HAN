<header>
    <?php

    if (isset($_SESSION['loginFailedMessage'])) {
        echo '
        <div class="login-failed">
            <h3>' . $_SESSION['loginFailedMessage'] . '</h3>
        </div>
        ';

        unset($_SESSION['loginFailedMessage']);
    }

    ?>


    <div class="logo-container">
        <!-- Logo komt hier -->
        <img src="assets/img/logo-webshop-han.jpg"
             alt="">
    </div>

    <?php

    if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
        include 'loggedIn.php';
    } else {
        $_SESSION['cart_items'] = []; ?>

        <div class="login-container">
            <form action="login.php" method="POST" class="login-form">
                <legend>Login</legend>
                <div class="element-holder">
                    <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam">
                </div>
                <div class="element-holder">
                    <input type="password" name="wachtwoord" placeholder="swallaalla">
                </div>

                <div class="element-holder">
                    <input type="checkbox" class="remind-me">Onthouden
                    <a href="#">Vergeten?</a>
                    <a href="?page=registreren">Registreer</a>
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
        <?php
    }
    ?>

</header>

<nav>
    <ul class="menu">
        <li class="menu__item">
            <a href="?page=nieuws">Nieuws</a>
        </li>
        <li class="menu__item">
            <a href="?page=acties">Acties</a>
        </li>
        <li class="menu__item">
            <a href="?page=over-ons">Over ons</a>
        </li>
        <li class="menu__item">
            <a href="?page=vacatures">Vacatures</a>
        </li>
        <li class="menu__item">
            <a href="?page=webshop">Webshop</a>
            <ul>
                <li><a href="?page=webshop">Producten</a></li>
                <li><a href="?page=winkelwagen">Winkelwagen</a></li>
                <li><a href="?page=winkelwagen">Afrekenen</a></li>
            </ul>
        </li>
    </ul>
</nav>
