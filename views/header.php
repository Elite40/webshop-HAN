<header>
    <div class="logo-container">
        <!-- Logo komt hier -->
        <img src="http://norsktilhengerutleie.info/wp-content/uploads/2010/09/your-logo-here-aalesund1.png" alt="">
    </div>

        <?php
        var_dump($_SESSION['GEBRUIKER']);
        if (isset($_SESSION['GEBRUIKER']) {
          echo "ingelogd bitchesesesess";
        }
        ?>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <legend>Login</legend>
            <div class="element-holder">
                <input type="text" name="username" placeholder="Gebruikersnaam">
            </div>
            <div class="element-holder">
                <input type="password" name="password" placeholder="swallaalla">
            </div>

            <div class="element-holder">
                <input type="checkbox">Onthouden
                <a href="#">Vergeten?</a>
                <a href="#">Registreer</a>
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</header>

<?php require_once 'menu.php';?>
