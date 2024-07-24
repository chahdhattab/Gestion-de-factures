<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/class-autoload.inc.php';

// Vérifiez si le formulaire est soumis
if (isset($_POST["submit"])) {
    $uid = $_POST["uid"];
    $pwd = $_POST["password"];

    // Créez une instance de LoginCont et essayez de connecter l'utilisateur
    $loginuser = new LoginCont($uid, $pwd);
    $loginuser->loginUser();
} else {
    echo "Le formulaire n'a pas été soumis.";
}



