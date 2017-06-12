<?php

class User
{
    private $voornaam;

    private $tussenvoegsel;

    private $achternaam;

    private $straatnaam;

    private $huisnummer;

    private $postcode;

    private $woonplaats;

    private $email;

    private $geslacht;

    /** @var array Invalid form fields */
    private $errors = [];

    /** @var  PDO */
    private $db;

    /**
     * User constructor.
     *
     * @param $db DB
     */
    function __construct($db)
    {
        $this->db = $db->getDbInstance();
    }

    /**
     * Logs the user in.
     *
     * @param $username
     * @param $password
     * @throws PDOException
     */
    public function login($username, $password)
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
                header('Location: ' . $_SERVER['HTTP_REFERER']);
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

        //TODO::Save the new user
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