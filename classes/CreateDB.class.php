<?php

//classe qui prepare l'execution de la créaction d'un utilisateur

class CreateDB extends Dbh{
    protected function setClient($num,$nom,$pre,$email,$tel,$usermtrcl) {
        try {
            // Vérifier si 
            $sql = 'SELECT numero_client FROM clients WHERE numero_client = ? AND matricule_utilisateur = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$num,$usermtrcl]);
            $result = $stmt->fetch();

            if ($result) {
                throw new Exception("Client existe déja");
            }

            // Insérer un nouvel client 

            $sql = 'INSERT INTO clients (numero_client, matricule_utilisateur, nom, prenom, email, telephone) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$num,$usermtrcl,$nom,$pre,$email,$tel]);
            
            echo "Client registré en succès !";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}


