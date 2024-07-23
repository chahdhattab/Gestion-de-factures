<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'Dbh.class.php';  

try {

    $dbh = new Dbh();
    $conn = $dbh->connect();

    $sql = 'SELECT matricule, mot_de_passe FROM utilisateurs';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    while ($user = $stmt->fetch()) {
        $matricule = $user['matricule'];
        $mot_de_passe = $user['mot_de_passe'];

        $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $updateSql = 'UPDATE utilisateurs SET mot_de_passe = ? WHERE matricule = ?';
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->execute([$hashedPassword, $matricule]);

        echo "Mot de passe mis à jour pour l'utilisateur avec matricule : $matricule<br>";
    }

    echo "Tous les mots de passe ont été hashés avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
