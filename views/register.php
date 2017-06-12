<?php
session_start();

require_once 'User.php';
require_once 'DB.php';
$db = new DB();

$error = [];

//Form submitted
if (isset($_POST['registreren'])) {

    //To remind the input fields
    $_SESSION['username'] = $_POST['username'];

    $user = new User($db);
    try {
        $user->registerUser($_POST);
    } catch (Exception $e) {
        //Handle exception
    }
}

?>

    <h1>Registreren</h1>
    <h3>Vul uw gegevens in</h3>
    <div class="registratie-wrapper">
        <form method="POST" action="">
            <div class="accountgegevens">
                <h3>Accountgegevens:</h3>
                <div class="form-element">
                    <label for="Gebruikersnaam">Gebruikersnaam
                        <span>*</span>
                    </label>
                    <?php
                    if (isset($_SESSION['form-error']['username'])) {
                        echo '<input type="text" placeholder="Gebruikersnaam" name="username" class="error-input-field" value="' . $_SESSION['username'] . '"/>';
                        echo '<span class="form-invalid-message">' . $_SESSION['form-error']['username'] . '</span>';
                    } else {
                        echo '<input type="text" placeholder="Gebruikersnaam" name="username" value="' . $_SESSION['username'] . '"/>';
                    }
                    ?>


                </div>
                <div class="form-element">
                    <label for="Gebruikersnaam">Wachtwoord
                        <span>*</span>
                    </label>
                    <?php
                    if (isset($_SESSION['form-error']['password'])) {
                        echo '<input type="password" placeholder="Wachtwoord" name="password" class="error-input-field"/>';
                        echo '<span class="form-invalid-message">' . $_SESSION['form-error']['password'] . '</span>';
                    } else {
                        echo '<input type="password" placeholder="Wachtwoord" name="password"/>';
                    }
                    ?>

                </div>
                <div class="form-element">
                    <label for="Gebruikersnaam">Herhaal wachtwoord
                        <span>*</span>
                    </label>
                    <?php
                    if (isset($_SESSION['form-error']['password-not-matched'])) {
                        echo '<input type="text" placeholder="Herhaal wachtwoord" name="repeat-password" class="error-input-field"/>';
                        echo '<span class="form-invalid-message">' . $_SESSION['form-error']['password-not-matched'] . '</span>';
                    } else {
                        echo '<input type="password" placeholder="Herhaal wachtwoord" name="repeat-password"/>';
                    }
                    ?>
                </div>
            </div>
            <div class="factuuradres">
                <h3>Factuuradres:</h3>
                <div class="one-row">
                    <div class="form-element">
                        <label for="aanhef">Aanhef
                            <span>*</span>
                        </label>
                        <select name="aanhef" id="aanhef-dropdown">
                            <option value="dhr">Dhr.</option>
                            <option value="dhr">Mvr.</option>
                        </select>
                    </div>
                    <div class="form-element">
                        <label for="Voornaam">Voornaam
                            <span>*</span>
                        </label>
                        <?php
                        if (isset($_SESSION['form-error']['voornaam'])) {
                            echo '<input type="text" placeholder="Voornaam" name="voornaam" class="error-input-field"/>';
                            echo '<span class="form-invalid-message">' . $_SESSION['form-error']['voornaam'] . '</span>';
                        } else {
                            echo '<input type="text" name="voornaam" placeholder="Voornaam"/>';
                        }
                        ?>
                    </div>
                    <div class="form-element">
                        <label for="Tussenv">Tussenv.
                        </label>
                        <input type="text" name="tussenv" placeholder="Tussenvoegsels"/>
                    </div>
                    <div class="form-element">
                        <label for="Achternaam">Achternaam
                            <span>*</span>
                        </label>
                        <?php
                        if (isset($_SESSION['form-error']['achternaam'])) {
                            echo '<input type="text" placeholder="Achternaam" name="achternaam" class="error-input-field"/>';
                            echo '<span class="form-invalid-message">' . $_SESSION['form-error']['achternaam'] . '</span>';
                        } else {
                            echo '<input type="text" name="achternaam" placeholder="Achternaam"/>';
                        }
                        ?>
                    </div>
                </div>
                <!-- einde one-row -->
                <div class="form-element">
                    <label for="Emailadres">Emailadres
                        <span>*</span>
                    </label>
                    <?php
                    if (isset($_SESSION['form-error']['email'])) {
                        echo '<input type="email" placeholder="Email adres" name="email" class="error-input-field"/>';
                        echo '<span class="form-invalid-message">' . $_SESSION['form-error']['email'] . '</span>';
                    } else {
                        echo '<input type="email" name="email" class="l-input" placeholder="Email adres"/>';
                    }
                    ?>
                </div>
                <div class="one-row">
                    <div class="form-element">
                        <label>Straatnaam
                            <span>*</span>
                        </label>
                        <?php
                        if (isset($_SESSION['form-error']['straatnaam'])) {
                            echo '<input type="text" placeholder="Straatnaam" name="straatnaam" class="error-input-field"/>';
                            echo '<span class="form-invalid-message">' . $_SESSION['form-error']['straatnaam'] . '</span>';
                        } else {
                            echo '<input type="text" name="straatnaam" class="l-input" placeholder="Straatnaam"/>';
                        }
                        ?>
                    </div>
                    <div class="form-element huisnummer">
                        <label>Huisnummer
                            <span>*</span>
                        </label>
                        <?php
                        if (isset($_SESSION['form-error']['huisnummer'])) {
                            echo '<input type="text" placeholder="" name="huisnummer" class="error-input-field"/>';
//                            echo '<span class="form-invalid-message">' . $_SESSION['form-error']['huisnummer'] . '</span>';
                        } else {
                            echo '<input type="text" name="huisnummer" class="s-input"/>';
                        }
                        ?>
                    </div>
                </div>
                <div class="one-row">
                    <div class="form-element">
                        <label>Postcode
                            <span>*</span>
                        </label>
                        <?php
                        if (isset($_SESSION['form-error']['postcode'])) {
                            echo '<input type="text" placeholder="postcode" name="postcode" class="error-input-field"/>';
                            echo '<span class="form-invalid-message">' . $_SESSION['form-error']['postcode'] . '</span>';
                        } else {
                            echo '<input type="text" name="postcode" placeholder="postcode"/>';
                        }
                        ?>
                    </div>
                    <div class="form-element ">
                        <label>Plaatsnaam
                            <span>*</span>
                        </label>
                        <?php
                        if (isset($_SESSION['form-error']['plaats'])) {
                            echo '<input type="text" placeholder="Plaats" name="plaats" class="error-input-field"/>';
                            echo '<span class="form-invalid-message">' . $_SESSION['form-error']['plaats'] . '</span>';
                        } else {
                            echo '<input type="text" name="plaats" class="l-input" placeholder="Plaats"/>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-element ">
                    <label>Telefoon
                        <span>*</span>
                    </label>
                    <?php
                    if (isset($_SESSION['form-error']['telefoon'])) {
                        echo '<input type="text" placeholder="Telefoon" name="telefoon" class="error-input-field"/>';
                        echo '<span class="form-invalid-message">' . $_SESSION['form-error']['telefoon'] . '</span>';
                    } else {
                        echo '<input type="text" name="telefoon" placeholder="Telefoon"/>';
                    }
                    ?>
                </div>

                <div class="submit-btn-wrapper">
                    <input type="submit" value="Opslaan" class="save-btn" name="registreren">
                </div>

            </div>
            <!-- einde factuuradres -->

        </form>

    </div>

<?php
//Destroying form errors
unset($_SESSION['form-error']);

?>