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

    /** @var  PDO */
    private $db;

    /**
     * User constructor.
     * @param $db DB
     */
    function __construct($db)
    {
        $this->db = $db->getDbInstance();
    }

    /**
     * Logs the user in.
     * @param $username
     * @param $password
     * @throws PDOException
     */
    public function login($username, $password)
    {

        try {
            $stmt = $this->db->prepare("select * from GEBRUIKER where GEBRUIKERSNAAM=:gebruikersnaam and WACHTWOORD=:wachtwoord LIMIT 1");
            $stmt->bindParam("gebruikersnaam", $username, PDO::PARAM_STR);
            $stmt->bindParam("wachtwoord", $password, PDO::PARAM_STR);

            $stmt->execute();

            $user = $stmt->fetchObject();

            if (count($user) > 0) {
                $_SESSION['user'] = $user;

                //Redirects back to the place where he came from
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "<div id='login-warning'>Inloggen mislukt, gebruikersnaam of wachtwoord is verkeerd..</div>";
            }

        } catch (PDOException $e) {
            throw $e;
        }

    }

    /**
     * @param array $data Contains the data of the form.
     */
    public function registerUser($data = []) {

    }




}