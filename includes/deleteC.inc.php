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
    $numclient = $_POST["numclient"];
    $matricule = $_SESSION["matricule"];

    $deletedclient = new DeleteClient($numclient,$matricule);
    $deletedclient->deleteClient();
}