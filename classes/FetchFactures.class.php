<?php

class FetchFactures extends Dbh{

    public function getFacturesByPage($limit, $offset) {
        $sql = "SELECT * FROM factures LIMIT :limit OFFSET :offset";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getTotalFactures() {
        $sql = "SELECT COUNT(*) AS total FROM factures";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }
 

}