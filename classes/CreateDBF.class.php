<?php

//classe qui prepare l'execution de la créaction d'un utilisateur

class CreateDBF extends Dbh{
    protected function setFacture($numf, $numc, $montant, $etat, $usermtrcl) {
        try {
            // Vérifier si le client existe 
            $sql = 'SELECT numero_client FROM clients WHERE numero_client = ? AND matricule_utilisateur = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$numc, $usermtrcl]);
            $result = $stmt->fetch();
    
            if (!$result) {
                throw new Exception("Ce client n'existe pas");
            }
            // Vérifier si la facture existe déja

            $sql='SELECT numero_facture FROM factures WHERE numero_facture = ?';
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute([$numf]);
            $result = $stmt->fetch();
    
            if ($result) {
                throw new Exception("Ce numéro de facture existe déjà");
            }
            // Insérer un nouvel client
            $sql = 'INSERT INTO factures (numero_facture, numero_client, montant_total, statut) VALUES (?, ?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            if (!$stmt->execute([$numf, $numc, $montant, $etat])) {
                throw new Exception("Erreur lors de l'insertion de la facture : " . implode(", ", $stmt->errorInfo()));
            }
            
            echo "Facture enregistré avec succès !";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
    

