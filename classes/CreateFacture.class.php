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
        echo "NumFacture: " . $this->numf . "<br>";
        echo "NnumClient: " . $this->numc . "<br>";
        echo "Montant: " . $this->montant . "<br>";
        echo "État: " . $this->etat . "<br>";
        echo "Utilisateur: " . $this->matricule_utilisateur . "<br>";

        // Vérification des entrées

        if (!$this->emptyInput()) {
            echo "Erreur: Champ(s) vide(s)<br>";
            // Remplacer `header()` par un simple `echo` pour déboguer
            // header("location: ../index.php?error=emptyInput");
            // exit();
        }
        if(!$this->validnumber($this->montant) || !$this->validnumber($this->numc)){
            echo "Erreur: Numéro invalide<br>";
            // header("location: ../index.php?error=invalidNum");
            // exit();
        }

        $this->setFacture($this->numf, $this->numc, $this->montant, $this->etat, $this->matricule_utilisateur);
        $_SESSION['message'] = 'Facture bien enregistré!';
        echo "facture enregistré !";
    
    }


    





}