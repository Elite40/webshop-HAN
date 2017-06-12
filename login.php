<?php
session_start();
// Turn on error reporting:
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'User.php';
require_once 'DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['gebruikersnaam']) || !isset($_POST['wachtwoord'])) {
        echo "Vul de verplichte velden in";
        return;
    }

    $db = new DB();

    $user = new User($db);

    try {
        $username = $_POST['gebruikersnaam'];
        $password = $_POST['wachtwoord'];

        $user->login($username, $password);
    }catch(PDOException $e) {
        echo "Failed while trying to login:<br>" . $e->getMessage();
    }
}

