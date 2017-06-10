<?php
include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = mysqli_real_escape_string($db,$_POST['GEBRUIKERSNAAM']);
      $password = mysqli_real_escape_string($db,$_POST['WACHTWOORD']);

      $sql = "SELECT GEBRUIKERSNAAM FROM GEBRUIKER WHERE GEBRUIKERSNAAM = '$username' and WACHTWOORD = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("username");
         $_SESSION['GEBRUIKERSNAAM'] = $username;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
