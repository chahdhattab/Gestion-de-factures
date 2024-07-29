<?php

class DeleteFacture extends Dbh{


    private $numfacture;
    private $numclient;
    private $matricule;

    public function __construct($numf,$matricule){
        $this->numfacture=$numf;
        $this->matricule=$matricule;
    }
    


    public function deleteFacture() {
        try {
            $sql = 'DELETE f FROM factures f JOIN clients c ON f.numero_client = c.numero_client WHERE c.matricule_utilisateur = ? AND f.numero_facture = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->matricule, $this->numfacture]);
            $_SESSION['message'] = 'Facture supprimée !';
            header("Location: ../factures.php?message=Facture%20supprimée !");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $_SESSION['error'] = 'Erreur lors de suppression !';
            header("Location: ../factures.php?Erreur !");
        }
    }

  
    
}