<?php

class CreateFacture extends CreateDBF{
    private $numf;
    private $numc;
    private $montant;
    private $matricule_utilisateur;
    private $etat;

    public function __construct($numf,$numc,$montant,$matricule,$etat){
        $this->numf=$numf;
        $this->numc=$numc;
        $this->montant=$montant;
        $this->matricule_utilisateur=$matricule;
        $this->etat=$etat;
    }

    public function emptyInput() {
        if (empty($this->numf) || empty($this->numc) || empty($this->montant) || empty($this->etat)) {
            return false; 
        } else {
            return true; 
        }
    }

    public function validnumber($input) {
        return is_numeric($input);
    }

    public function createNewFacture(){
        // Affichage des détails de la facture pour vérifier si la méthode est appelée
        /*
        echo "NumFacture: " . $this->numf . "<br>";
        echo "NnumClient: " . $this->numc . "<br>";
        echo "Montant: " . $this->montant . "<br>";
        echo "État: " . $this->etat . "<br>";
        echo "Utilisateur: " . $this->matricule_utilisateur . "<br>";
        */

        // Vérification des entrées

        $factureCree = false;

        if (!$this->emptyInput()) {
            $_SESSION['error'] = 'Remplissez tout les champs !';
            header("location: ../dashboard.php?error=Remplissez tout les champs ");
            exit();
        }
        if(!$this->validnumber($this->montant) || !$this->validnumber($this->numc)){
            $_SESSION['error'] = 'Numéro invalide!';
            header("location: ../dashboard.php?error=Numéro invalide");
            exit();
        }

        $factureCree = true;

        $this->setFacture($this->numf, $this->numc, $this->montant, $this->etat, $this->matricule_utilisateur);

    
        if ($factureCree) {
            $_SESSION['message'] = 'Facture enregistrée avec succès!';
            header("Location: ../dashboard.php?message=Facture%20enregistrée%20avec%20succès.");
        }
    
    }


    





}