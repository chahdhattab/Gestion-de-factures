<?php

class CreateClient extends CreateDB {
    private $numC;
    private $nomC;
    private $prenomC;
    private $emailC;
    private $telC;
    private $matricule_utilisateur;

    public function __construct($num, $nom, $pre, $email, $tel, $matricule) {
        $this->numC = $num;
        $this->nomC = $nom;
        $this->prenomC = $pre;
        $this->emailC = $email;
        $this->telC = $tel;
        $this->matricule_utilisateur = $matricule;
    }

    public function emptyInput() {
        if (empty($this->numC) || empty($this->nomC) || empty($this->prenomC) || empty($this->emailC) || empty($this->telC)) {
            return false; 
        } else {
            return true; 
        }
    }
    
    public function isAllUppercase($string) {
        return preg_match("/^[A-Z]+$/", $string);
    }
    
    public function isProperCase($string) {
        return preg_match("/^[A-Z][a-z]*$/", $string);
    }

    public function validfullname() {
        return $this->isAllUppercase($this->nomC) && $this->isProperCase($this->prenomC);
    }

    public function validEmail() {
        return filter_var($this->emailC, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validNumber() {
        return preg_match("/^\d{5}$/", $this->numC);
    }

    public function createNewClient() {
        // Affichage des détails du client pour vérifier si la méthode est appelée
        echo "NumClient: " . $this->numC . "<br>";
        echo "NomClient: " . $this->nomC . "<br>";
        echo "PrenomClient: " . $this->prenomC . "<br>";
        echo "EmailClient: " . $this->emailC . "<br>";
        echo "Utilisateur: " . $this->matricule_utilisateur . "<br>";

        // Vérification des entrées
        if (!$this->emptyInput()) {
            echo "Erreur: Champ(s) vide(s)<br>";
            // Remplacer `header()` par un simple `echo` pour déboguer
            // header("location: ../index.php?error=emptyInput");
            // exit();
        }
        if (!$this->validfullname()) {
            echo "Erreur: Nom ou prénom invalide<br>";
            // header("location: ../index.php?error=invalidname");
            // exit();
        }
        if (!$this->validEmail()) {
            echo "Erreur: Email invalide<br>";
            // header("location: ../index.php?error=invalidEmail");
            // exit();
        }
        if (!$this->validNumber()) {
            echo "Erreur: Numéro invalide<br>";
            // header("location: ../index.php?error=invalidNum");
            // exit();
        }

        // Si aucune erreur, affichage d'un message de succès
        $_SESSION['message'] = "Client bien enregistré";
        $this->setClient($this->numC, $this->nomC, $this->prenomC, $this->emailC, $this->telC, $this->matricule_utilisateur);
    }
}

