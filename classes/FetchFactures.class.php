<?php

class FetchFactures extends Dbh {

    public function getFacturesByPage($limit, $offset, $matricule_utilisateur) {
        $sql = "SELECT f.* FROM factures f
                JOIN clients c ON f.numero_client = c.numero_client
                WHERE c.matricule_utilisateur = :matricule_utilisateur
                LIMIT :limit OFFSET :offset";
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
}
