<?php
session_start(); 

if (!isset($_SESSION["matricule"])) {
    header("Location: login.php"); 
    exit();
}
require_once __DIR__ . '/class-autoload.inc.php';

if (isset($_POST["submit"])) {
    $num = $_POST['num'];
    $nom = $_POST['nom'];
    $pre = $_POST['pre'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $matricule = $_SESSION['matricule'];

    // Créez une instance de LoginCont et essayez de connecter l'utilisateur
    $loginuser = new LoginCont($uid, $pwd);
    $loginuser->loginUser();
} else {
    echo "Le formulaire n'a pas été soumis.";
}