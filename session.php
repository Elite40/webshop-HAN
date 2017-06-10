<?php
include('config.php');
   session_start();

   $user_check = $_SESSION['GEBRUIKER'];

   $ses_sql = mysqli_query($db,"select GEBRUIKERSNAAM from GEBRUIKER where GEBRUIKERSNAAM = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['GEBRUIKERSNAAM'];

   /**if(!isset($_SESSION['GEBRUIKER'])){
      header("location:login.php");
   }*/
 ?>
