<header>
    <?php

    if (isset($_SESSION['loginFailedMessage'])) {
        echo '
        <div class="login-failed">
            <h3>'. $_SESSION['loginFailedMessage'] . '</h3>
        </div>
        ';

        unset($_SESSION['loginFailedMessage']);
    }

    ?>


    <div class="logo-container">
        <!-- Logo komt hier -->
        <img src="http://norsktilhengerutleie.info/wp-content/uploads/2010/09/your-logo-here-aalesund1.png" alt="">
    </div>

    <?php

    if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
        include 'loggedIn.php';
    } else { ?>

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
                        <input type="checkbox">Onthouden
                        <a href="#">Vergeten?</a>
                        <a href="#">Registreer</a>
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
            <?php
    }
    ?>

</header>

<?php require_once 'menu.php'; ?>
