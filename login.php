<?php
session_start();

require_once 'User.php';
require_once 'Database/DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['gebruikersnaam']) || !isset($_POST['wachtwoord'])) {
        echo "Vul de verplichte velden in";
        return;
    }

    $user = new User();

    try {
        $username = $_POST['gebruikersnaam'];
        $password = $_POST['wachtwoord'];

        $user->login($username, $password);
    } catch (PDOException $e) {
        echo "Failed while trying to login:<br>" . $e->getMessage();
    }
}

