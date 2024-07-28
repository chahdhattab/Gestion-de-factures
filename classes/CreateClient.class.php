<?php

class CreateClient extends CreateDBC {
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

        /*
        echo "NumClient: " . $this->numC . "<br>";
        echo "NomClient: " . $this->nomC . "<br>";
        echo "PrenomClient: " . $this->prenomC . "<br>";
        echo "EmailClient: " . $this->emailC . "<br>";
        echo "Utilisateur: " . $this->matricule_utilisateur . "<br>";
        */

        $ClientCree = false;

        // Vérification des entrées
        if (!$this->emptyInput()) {
            $_SESSION['error'] = 'Remplissez tout les champs !';
            header("location: ../dashboard.php?error=Remplissez tout les champs ");
            exit();
        }
        if (!$this->validfullname()) {
            $_SESSION['error'] = 'Nom ou Prénom invalide!';
            header("location: ../dashboard.php?error=Nom ou prénom invalide");
            exit();
        }
        if (!$this->validEmail()) {
            $_SESSION['error'] = 'Email invalide!';
            header("location: ../dashboard.php?error=Email invalide");
            exit();
        }
        if (!$this->validNumber()) {
            $_SESSION['error'] = 'Numéro invalide!';
            header("location: ../dashboard.php?error=Numéro invalide");
            exit();
        }

        // Si aucune erreur, affichage d'un message de succès
        
        $ClientCree = true;
        
        $this->setClient($this->numC, $this->nomC, $this->prenomC, $this->emailC, $this->telC, $this->matricule_utilisateur);
        
        if ($ClientCree) {
            $_SESSION['message'] = 'Client enregistrée avec succès!';
            header("Location: ../dashboard.php?message=Client%20enregistrée%20avec%20succès.");
        }

    }
}

