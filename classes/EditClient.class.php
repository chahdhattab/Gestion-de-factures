<?php

class EditClient extends Dbh{

    private $numclient;
    private $matricule;
    private $nomc;
    private $prenomc;
    private $email;
    private $tel;


    public function __construct($numc,$nomc,$prenomc,$email,$tel,$matricule){
        $this->numclient=$numc;
        $this->matricule=$matricule;
        $this->nomc=$nomc;
        $this->prenomc=$prenomc;
        $this->email=$email;
        $this->tel=$tel;
    }

    public function updateClient() {
        try {
            $sql = "UPDATE client SET nom = ?, prenom = ? , telephone = ? , email = ? 
            WHERE numero_client = ? AND matricule_utilisateur = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->nomc, $this->montantp, $this->prenomc, $this->tel, $this->email, $this->numclient, $this->matricule]);
            $_SESSION['message'] = 'Client modifiée !';
            header("Location: ../clients.php?message=Client%20modifiée !");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $_SESSION['error'] = 'Erreur lors de modification !';
            header("Location: ../clients.php?Erreur !");
        }
    }


}