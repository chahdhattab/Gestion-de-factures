<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class FetchFactures extends Dbh {

    public function getFacturesByPage($limit, $offset, $matricule_utilisateur) {
        $sql = "SELECT f.numero_facture, f.numero_client, f.date_creation, f.montant_total , f.montant_payé, f.statut, c.nom AS client_nom, c.prenom AS client_prenom, c.email AS client_email, c.telephone AS client_telephone FROM factures f JOIN clients c ON f.numero_client = c.numero_client WHERE c.matricule_utilisateur = :matricule_utilisateur LIMIT :limit OFFSET :offset ";
       
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalFactures($matricule_utilisateur) {
        $sql = "SELECT COUNT(*) AS total FROM factures f
                JOIN clients c ON f.numero_client = c.numero_client
                WHERE c.matricule_utilisateur = :matricule_utilisateur";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function getLatestFactures($matricule_utilisateur) {
        $sql = "SELECT f.* FROM factures f
                JOIN clients c ON f.numero_client = c.numero_client
                WHERE c.matricule_utilisateur = :matricule_utilisateur
                ORDER BY f.date_creation DESC LIMIT 6";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalPayedFactures($matricule_utilisateur){
        $sql = "SELECT COUNT(*) AS totalpayed FROM factures f JOIN clients c ON f.numero_client = c.numero_client WHERE f.statut = 'payée' AND c.matricule_utilisateur = :matricule_utilisateur";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch()['totalpayed'];
    }
    

    public function getTotalParPayedFactures($matricule_utilisateur){
        $sql = "SELECT COUNT(*) AS totalparpayed FROM factures f JOIN clients c ON f.numero_client = c.numero_client WHERE f.statut = 'partiellement_payée' AND c.matricule_utilisateur = :matricule_utilisateur";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch()['totalparpayed'];
    }

    public function getTotalUnPayedFactures($matricule_utilisateur){
        $sql = "SELECT COUNT(*) AS totalunpayed FROM factures f JOIN clients c ON f.numero_client = c.numero_client WHERE f.statut = 'non_payée' AND c.matricule_utilisateur = :matricule_utilisateur";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch()['totalunpayed'];
    }

    public function getLastFacture($matricule_utilisateur) {
        $sql = "SELECT f.numero_facture, f.date_creation, f.montant_total, f.statut, 
                       c.nom AS client_nom, c.prenom AS client_prenom
                FROM factures f
                JOIN clients c ON f.numero_client = c.numero_client
                WHERE c.matricule_utilisateur = :matricule_utilisateur
                ORDER BY f.date_creation DESC LIMIT 2";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    
}


