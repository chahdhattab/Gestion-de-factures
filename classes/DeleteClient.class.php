<?php

class DeleteClient extends Dbh {

    private $numeroClient;
    private $matriculeUtilisateur;



    public function __construct($numeroClient, $matriculeUtilisateur) {
        $this->numeroClient = $numeroClient;
        $this->matriculeUtilisateur = $matriculeUtilisateur;
    }

    

    public function deleteClient() {
        try {
            
            $sql = 'DELETE FROM factures WHERE numero_client = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->numeroClient]);

            
            $sql = 'DELETE FROM clients WHERE numero_client = ? AND matricule_utilisateur = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$this->numeroClient, $this->matriculeUtilisateur]);


            $_SESSION['message'] = 'Client et ses factures supprimés !';
            header("Location: ../clients.php?message=Client%20et%20ses%20factures%20supprimés !");
            exit();

        } catch (PDOException $e) {
            // Gérer les erreurs spécifiques à PDO
            echo "Error: " . $e->getMessage();
            $_SESSION['error'] = 'Erreur lors de la suppression du client !';
            header("Location: ../clients.php?Erreur !");
            exit(); // Toujours utiliser exit() après header() pour éviter une exécution supplémentaire
        } catch (Exception $e) {
            // Gérer les autres types d'exceptions
            echo "Error: " . $e->getMessage();
            $_SESSION['error'] = 'Erreur lors de la suppression !';
            header("Location: ../clients.php?Erreur !");
            exit(); // Toujours utiliser exit() après header() pour éviter une exécution supplémentaire
        }
    }
}
?>
