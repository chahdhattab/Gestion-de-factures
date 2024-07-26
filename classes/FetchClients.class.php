<?php

class FetchClients extends Dbh{
    public function getClientsByPage($limit, $offset){
        $sql='SELECT * FROM clients LIMIT :limit OFFSET :offset';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getTotalClients() {
        $sql = "SELECT COUNT(*) AS total FROM clients";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }


}