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

if (isset($_POST["submit"])){
    $numfacture = $_POST["numfacture"];
    $matricule = $_SESSION["matricule"];

    $deletedfacture = new Delete($numfacture,$matricule);
    $deletedfacture->deleteFacture();
}