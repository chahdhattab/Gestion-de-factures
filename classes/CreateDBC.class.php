<?php

//classe qui prepare l'execution de la créaction d'un utilisateur

class CreateDBC extends Dbh{
    protected function setClient($num, $nom, $pre, $email, $tel, $usermtrcl) {
        try {
            // Vérifier si le client existe déjà
            $sql = 'SELECT numero_client FROM clients WHERE numero_client = ? AND matricule_utilisateur = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$num, $usermtrcl]);
            $result = $stmt->fetch();
    
            if ($result) {
                $_SESSION['error'] = 'Ce client existe déjà !';
                header("Location: ../dashboard.php?error=Numéro%20Client%20existe%20déjà!");
                exit();
            }
    
            // Insérer un nouvel client
            $sql = 'INSERT INTO clients (numero_client, matricule_utilisateur, nom, prenom, email, telephone) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute([$num, $usermtrcl, $nom, $pre, $email, $tel])) {
                $_SESSION['error'] = 'Erreur lors d`insersetion !';
                header("Location: ../dashboard.php?error=Numéro%20Client%20existe%20déjà!");
                exit();
            }
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    


}


