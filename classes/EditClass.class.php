<?php

class EditClass extends Dbh{

    private $numfacture;
    private $matricule;
    private $statut;
    private $montant;

    public function __construct($numf,$montant,$statut,$matricule){
        $this->numfacture=$numf;
        $this->matricule=$matricule;
        $this->montant=$montant;
        $this->statut=$statut;
    }

    public function updateFacture() {
        try {
            $sql = "UPDATE factures INNER JOIN clients ON factures.numero_client = clients.numero_client 
            SET factures.montant_total = ?, factures.statut = ? 
            WHERE factures.numero_facture = ? AND clients.matricule_utilisateur = ?";
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