<?php

class Login extends Dbh {
    protected function getUser($uid, $pwd) {
        try {
            $sql = 'SELECT * FROM utilisateurs WHERE matricule = ?';
            $stmt = $this->connect()->prepare($sql);
            
            // Exécution de la requête
            if (!$stmt->execute([$uid])) {
                throw new Exception("Erreur lors de l'exécution de la requête SQL.");
            }

            // Vérification du nombre de résultats
            if ($stmt->rowCount() == 0) {
                throw new Exception("Utilisateur non trouvé.");
            }

            // Récupération des données utilisateur
            $user = $stmt->fetch();
            
            // Comparaison du mot de passe en clair
            if (password_verify($pwd, $user["mot_de_passe"])) {
                session_start();
                $_SESSION["username"] = htmlspecialchars($user["prenom"]);  // Stocker le prénom dans la session
                header("Location: ../dashboard.php");
                exit();
            } else {
                $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
                echo $hashedPassword."<br>".$user["mot_de_passe"];
            }
        } catch (Exception $e) {
            // Gestion des erreurs et redirection
            $errorMessage = $e->getMessage();
            header("Location: ../index.php?error=" . urlencode($errorMessage));
            exit();
        }
    }
}



