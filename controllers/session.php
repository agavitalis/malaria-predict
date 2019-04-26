<?php
//start your session
session_start();
if(isset($_SESSION["email"])){

    $email = $_SESSION["email"];
    //$admin = $_SESSION["email"];

}

if(isset($_SESSION["admin"])){

   // $email = $_SESSION["email"];
    $admin = $_SESSION["admin"];

}