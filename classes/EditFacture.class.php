<?php

class EditFacture extends Dbh{

    private $numfacture;
    private $matricule;
    private $statut;
    private $montanttotal;
    private $montantp;

    public function __construct($numf,$montantp,$montanttotal,$statut,$matricule){
        $this->numfacture=$numf;
        $this->matricule=$matricule;
        $this->montantp=$montantp;
        $this->montanttotal=$montanttotal;
        $this->statut=$statut;
    }

    public function updateFacture() {
        try {
            $sql = "UPDATE factures INNER JOIN clients ON factures.numero_client = clients.numero_client 
            SET factures.montant_total = ?, factures.montant_payé = ? ,factures.statut = ? 
            WHERE factures.numero_facture = ? AND clients.matricule_utilisateur = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->montanttotal, $this->montantp, $this->statut, $this->numfacture, $this->matricule]);
            $_SESSION['message'] = 'Facture modifiée !';
            header("Location: ../factures.php?message=Facture%20modifiée !");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            $_SESSION['error'] = 'Erreur lors de modification !';
            header("Location: ../factures.php?Erreur !");
        }
    }


}