<?php
session_start(); // Démarrer la session pour accéder aux variables de session

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

require 'classes/Dbh.class.php';
require 'classes/FetchFactures.class.php';

$factureObj = new FetchFactures();

// Paramètres de pagination
$limit = 11;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Récupérer les factures avec pagination
$factures = $factureObj->getFacturesByPage($limit, $offset, $_SESSION["matricule"]);

// Récupérer le nombre total de factures
$totalFactures = $factureObj->getTotalFactures($_SESSION["matricule"]);
$totalPages = ceil($totalFactures / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="css/factures.css">
</head>
<body>
    <div class="container"> 
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="images/Sqli-logo.webp" alt="Logo" >
                </div>
                <div class="close" >
                    <img src="images/close.png" alt="Logo" style="width:15px;">
                </div>
            </div>
     <!-------------------------side-bar----------------------------->
            <div class="sidebar" >
                <a href="dashboard.php" >
                    <img src="images/dashboard.png" alt="Logo" style="width:30px;">
                    <h3>Dashboard</h3>
                </a>
                <a href="#" >
                    <img src="images/loupe.png" alt="Logo" style="width:30px;">
                    <h3>Recherche</h3>
                </a>
                <a href="factures.php" class="active">
                    <img src="images/invoice.png" alt="Logo" style="width:30px;">
                    <h3>Factures</h3>
                </a>
                <a href="clients.php" >
                    <img src="images/customer.png" alt="Logo" style="width:30px;">
                    <h3>Clients</h3>
                </a>
                <a href="login.php">
                    <img src="images/logout.png" alt="Logo" style="width:30px;">
                    <h3>Déconnexion</h3>
                </a>
            </div>
        </aside>
        <!---------------------------fin: sidebar-------------------------->
        <main>
            <h1>Factures</h1>
                <div class="top-list">
                    <h2>Liste des factures</h2>
                    <div class="search-facture">
                        <h2 class="primary">Rechercher : </h2>
                        <input type="search" name="search-facture" id="search-facture" class="search" placeholder="ID facture, Client, État...">
                    </div>
                </div>


                <div class="factures-table">
                    <table>
                        <thead>
                            <th>N° Facture</th>
                            <th>N° Client</th>
                            <th>Date de création</th>
                            <th>Montant</th>
                            <th>État du Paiement</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($factures as $facture) {
                                
                                $etatClass = '';
                                if ($facture['statut'] == 'payée') {
                                    $etatClass = 'success';
                                } elseif ($facture['statut'] == 'partiellement_payée') {
                                    $etatClass = 'warning';
                                } elseif ($facture['statut'] == 'non_payée') {
                                    $etatClass = 'danger';
                                }

                                echo "<tr>";
                                echo "<td>{$facture['numero_facture']}</td>";
                                echo "<td>{$facture['numero_client']}</td>";
                                echo "<td>{$facture['date_creation']}</td>";
                                echo "<td>{$facture['montant_total']} DH</td>";
                                echo "<td class='{$etatClass}'>{$facture['statut']}</td>";
                                echo "<td><a href='#'><img src='images/information.png' alt='info' style='width: 20px;'></a></td>";
                                echo "<td><img src='images/pencil.png' alt='editer' style='width: 20px;'></td>";
                                echo "<td><img src='images/delete.png' alt='supprimer' style='width: 20px;'></td>";
                                echo "<td><img src='images/import.png' alt='importer' style='width: 20px;'></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="bottom-list">
                    <div class="pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?= $page - 1 ?>" id="prevBtn">Précédent</a>
                        <?php endif; ?>
                        <span id="pageNum"><?= $page ?></span>
                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?= $page + 1 ?>" id="nextBtn">Suivant</a>
                        <?php endif; ?>
                    </div>
                    <div class="add-export">
                        <a href="#" class="add-facture">
                            <img src="images/invoice-6.png" alt="ajouter" style="width: 30px;">
                            <h2>Ajoutez une Facture +</h2>
                        </a>
                        <a href="#" class="export">
                            <img src="images/export.png" alt="export" style="width: 30px;">
                            <h2>Exportez ^</h2>
                        </a>
                    </div>
                </div>
                <div class="add-facture-form" >
                    <img src="images/cancel-2.png" alt="fermer" class="closeF" name="closeF" id="closeF" style="width:25px;"><br>
                    <h2>Ajouter une facture :</h2><br>
                    <form action="includes/create-facture.inc.php" method="post">
                        <label for="numf">Numéro de la Facture :</label>
                        <input type="text" id="numf" name="numf" required>
                        
                        <label for="numc">Numéro du Client :</label>
                        <input type="text" id="numc" name="numc" required>
                        
                        <label for="montant">Montant Total :</label>
                        <input type="text" id="montant" name="montant" required>
                        
                        <label for="etat">État de facture :</label><br>
                        <select id="etat" name="etat" required>
                            <option value="" disabled selected>--sélectionner l'état--</option>
                            <option value="payée">payée</option>
                            <option value="partiellement_payée">partiellement_payée</option>
                            <option value="non_payée">non_payée</option>
                        </select><br><br>

                        <button type="submit" id="submit" name="submit">Ajouter la facture</button>
                    </form>
                </div>
            
        </main>
    </div>  
    <script src="javascript/factures.js"></script>
</body>
</html>

        