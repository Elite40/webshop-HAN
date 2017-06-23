<?php

class User
{

    /** @var array Invalid form fields */
    private $errors = [];

    /** @var  PDO */
    private $db;

    /**
     * User constructor.
     *
     */
    function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * Authenticates the user.
     *
     * @param $username
     * @param $password
     * @param string $redirectTo
     */
    public function login($username, $password, $redirectTo = '')
    {
        try {
            $stmt = $this->db->prepare(
                "select * from GEBRUIKER where GEBRUIKERSNAAM=:gebruikersnaam and WACHTWOORD=:wachtwoord LIMIT 1"
            );
            $stmt->bindParam("gebruikersnaam", $username, PDO::PARAM_STR);
            $stmt->bindParam("wachtwoord", $password, PDO::PARAM_STR);

            $stmt->execute();

            $user = $stmt->fetchObject();

            if ($user === false) {
                $_SESSION['loginFailedMessage'] = 'Geen geldige gebruikersnaam en wachtwoord combinatie';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

            if (count($user) > 0) {
                $_SESSION['user'] = $user;

                //Redirects back to the place where he came from
                if (empty($redirectTo)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                } else {

                    //Redirect to the specified page
                    header('Location: http://localhost/webshop-HAN/index.php?page=' . $redirectTo);
                }

                $_SESSION['cart_items'] = [];
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param array $form Contains the data of the form.
     */
    public function registerUser($form = [])
    {
        if (!$this->validateFields($form)) {
            $_SESSION['form-error'] = $this->errors;
            return;
        }

        if ($this->userAlreadyExists($form['username'])) {
            $_SESSION['user-already-exists'] = 'De opgegeven gebruikersnaam bestaat al';
            return;
        }

        try {
            $stmt = $this->db->prepare(
                "insert into GEBRUIKER (GEBRUIKERSNAAM, VOORNAAM, TUSSENVOEGSEL, ACHTERNAAM, STRAATNAAM, HUISNUMMER, POSTCODE, WOONPLAATS, EMAIL, SEXE, WACHTWOORD) 
                           values(:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :straatnaam, :huisnummer, :postcode, :woonplaats, :email, :sexe, :wachtwoord)"
            );
            $stmt->bindParam("gebruikersnaam", $form['username']);
            $stmt->bindParam("voornaam", $form['voornaam']);
            $stmt->bindParam("tussenvoegsel", $form['tussenv']);
            $stmt->bindParam("achternaam", $form['achternaam']);
            $stmt->bindParam("straatnaam", $form['straatnaam']);
            $stmt->bindParam("huisnummer", $form['huisnummer']);
            $stmt->bindParam("postcode", $form['postcode']);
            $stmt->bindParam("woonplaats", $form['plaats']);
            $stmt->bindParam("email", $form['email']);
            $stmt->bindParam("sexe", $form['aanhef']);
            $stmt->bindParam("wachtwoord", $form['password']);

            $stmt->execute();

            $this->login($form['username'], $form['password']);
            if ($_SESSION['user'] === true) {
                $destination = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
                header('Location: http://' . $destination);
            }

        } catch (PDOException $e) {
            throw $e;
        }
    }

    private function userAlreadyExists($username)
    {
        $stmt = $this->db->prepare("select * from GEBRUIKER where GEBRUIKERSNAAM=:username LIMIT 1");
        $stmt->bindParam("username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        }

        if (count($result) > 0) {
            //User exists
            return true;
        }
    }

    /**
     * Validates the registration form.
     *
     * @param $form
     * @return bool Returns true when all fields are valid
     */
    private function validateFields($form)
    {
        $error = [];

        if (!$form['username']) {
            $error['username'] = "Geef een gebruikersnaam op";
        }
        if (!$_POST['password']) {
            $error['password'] = "Geef een wachtwoord op.";
        } else {
            if ($_POST['password'] != $_POST['repeat-password']) {
                $error['password-not-matched'] = "Wachtwoorden komen niet overeen";
            }
        }

        if (!$form['voornaam']) {
            $error['voornaam'] = "Verplichte veld";
        }
        if (!$form['achternaam']) {
            $error['achternaam'] = "Verplichte veld.";
        }

        if (!$form['email']) {
            $error['email'] = "Verplichte veld.";
        }
        if (!$form['straatnaam']) {
            $error['straatnaam'] = "Verplichte veld.";
        }

        if (!$form['huisnummer']) {
            $error['huisnummer'] = "Verplichte veld.";
        }
        if (!$form['postcode']) {
            $error['postcode'] = "Verplichte veld.";
        }

        if (!$form['plaats']) {
            $error['plaats'] = "Verplichte veld.";
        }
        if (!$form['telefoon']) {
            $error['telefoon'] = "Verplichte veld.";
        }
        if (count($error) > 0) {
            $this->errors = $error;

            return false;
        }

        return true;
    }
}