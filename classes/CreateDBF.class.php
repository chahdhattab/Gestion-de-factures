<?php

//classe qui prepare l'execution de la créaction d'un utilisateur

class CreateDBC extends Dbh{
    protected function setFacture($num, $numc, $pre, $email, $tel, $usermtrcl) {
        try {
            // Vérifier si le client existe déjà
            $sql = 'SELECT numero_client FROM clients WHERE numero_client = ? AND matricule_utilisateur = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$num, $usermtrcl]);
            $result = $stmt->fetch();
    
            if ($result) {
                throw new Exception("Client existe déjà");
            }
    
            // Insérer un nouvel client
            $sql = 'INSERT INTO clients (numero_client, matricule_utilisateur, nom, prenom, email, telephone) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute([$num, $usermtrcl, $nom, $pre, $email, $tel])) {
                throw new Exception("Erreur lors de l'insertion du client : " . implode(", ", $stmt->errorInfo()));
            }
            
            echo "Client enregistré avec succès !";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    


}