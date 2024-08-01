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
    $numf = $_POST['numf'];
    $numc = $_POST['numc'];
    $montant = $_POST['montant'];
    $montantp = $_POST['montantpayé'];
    $etat = $_POST['etat'];
    $matricule = $_SESSION["matricule"];

    // Créez une instance de LoginCont et essayez de connecter l'utilisateur
    $createclient = new CreateFacture($numf,$numc,$montant,$montantp,$matricule,$etat);
    $createclient->createNewFacture();
}


