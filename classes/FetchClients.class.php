<?php

class FetchClients extends Dbh {
    public function getClientsByPage($limit, $offset, $matricule_utilisateur) {
        $sql = 'SELECT * FROM clients WHERE matricule_utilisateur = :matricule_utilisateur LIMIT :limit OFFSET :offset';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotalClients($matricule_utilisateur) {
        $sql = "SELECT COUNT(*) AS total FROM clients WHERE matricule_utilisateur = :matricule_utilisateur";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function getLastClient($matricule_utilisateur) {
        $sql = "SELECT * FROM clients WHERE matricule_utilisateur = :matricule_utilisateur
                ORDER BY date_creation DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':matricule_utilisateur', $matricule_utilisateur, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
}
