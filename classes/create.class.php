<?php

//classe qui prepare l'execution de la créaction d'un utilisateur

class createDB extends Dbh{
    protected function setClient($num,$nom,$pre,$email,$tel,$usermtrcl) {
        try {
            // Vérifier si 
            $sql = 'SELECT numero_client FROM clients WHERE numero_client = ? AND matricule_utilisateur = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$num,$usermtrcl]);
            $result = $stmt->fetch();

            if ($result) {
                throw new Exception("Client existe déja");
            }

            // Insérer un nouvel client 

            $sql = 'INSERT INTO clients (numero_client, matricule_utilisateur, nom, prenom, email, telephone) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$num,$usermtrcl,$nom,$pre,$email,$tel]);
            
            echo "Client registré en succès !";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}


class createClient extends createDB{
    private $numC;
    private $nomC;
    private $prenomC;
    private $emailC;
    private $telC;
    private $matricule_utilisateur;

    public function __construct($num,$nom,$pre,$email,$tel,$matricule){
        $this->numC=$num;
        $this->nomC=$nom;
        $this->prenomC=$pre;
        $this->emailC=$email;
        $this->telC=$tel;
        $this->matricule_utilisateur=$matricule;
    }

    public function emptyInput(){
        if (empty($this->numC) || empty($this->nomC) || empty($this->prenomC) || empty($this->emailC) || empty($this->telC)) {
            $result = false; 
        } else {
            $result = true; 
        }
        return $result;
    }
    
    function isAllUppercase($string) {
        // Vérifie que la chaîne est entièrement en majuscules
        return preg_match("/^[A-Z]+$/", $string);
    }
    
    private function isProperCase($string) {
        // Vérifie que la première lettre est en majuscule et le reste en minuscules
        return preg_match("/^[A-Z][a-z]*$/", $string);
    }

    private function validfullname() {
        if(isAllUppercase($this->nomC) && isProperCase($this->prenomC)){
            $result = true; 
        } else {
            $result = false; 
        }
        return $result;
    }

    private function validEmail() {
        if (filter_var($this->emailC, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function validNumber() {
        // Vérifie que le numéro est constitué exactement de 5 chiffres
        if(preg_match("/^\d{5}$/", $this->numC)){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }

    public function createNewClient(){
        echo "NumClient: " . $this->numC . "<br>";
        echo "NomClient: " . $this->nomC . "<br>";
        echo "PrenomClient: " . $this->prenomC . "<br>";
        echo "EmailClient: " . $this->emailC . "<br>";
        echo "Utilisateur: " . $this->matricule_utilisateur . "<br>";

        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if ($this->validfullname() == false) {
            header("location: ../index.php?error=invalidname");
            exit();
        }
        if ($this->validEmail() == false) {
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if ($this->validNumber() == false) {
            header("location: ../index.php?error=invalidNum");
            exit();
        }
        $this->setClient($this->numC,$this->nomC,$this->prenomC,$this->emailC,$this->telC,$this->matricule_utilisateur);
    }

}