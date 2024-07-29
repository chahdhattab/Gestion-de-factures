<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'dbh.class.php';
include 'FetchFactures.class.php';

$factureObj = new FetchFactures();
$lastFacture = $factureObj->getLastFacture('H9I0J1K2');

echo $lastFacture['numero_facture'].' '.$lastFacture['client_prenom'];