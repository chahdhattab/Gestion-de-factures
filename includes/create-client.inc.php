<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    $matricule = $_SESSION["matricule"];

    // Créez une instance de LoginCont et essayez de connecter l'utilisateur
    $createclient = new CreateClient($num,$nom,$pre,$email,$tel,$matricule);
    $createclient->createNewClient();
    echo"success !";
} else {
    echo "Le formulaire n'a pas été soumis.";
}
