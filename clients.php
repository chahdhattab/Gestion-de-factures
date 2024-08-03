<?php
session_start(); // Démarrer la session pour accéder aux variables de session

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION["username"]) || !isset($_SESSION["matricule"])) {
    header("Location: login.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}
require 'classes/Dbh.class.php';
require 'classes/FetchClients.class.php';


$clientsObj=new FetchClients();

$limit=11;
$page=isset($_GET['page'])?(int)$_GET['page'] : 1;
$offset=($page - 1) * $limit;

$clients=$clientsObj->getClientsByPage($limit, $offset, $_SESSION["matricule"]);

$totalClients = $clientsObj->getTotalClients($_SESSION["matricule"]);
$totalPages = ceil($totalClients / $limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="css/clients.css">
</head>
<body>
    <?php
        if(isset($_GET['message'])){
            echo '<p class="message-succ" id="message-display">'.htmlspecialchars($_GET["message"]).'</p>';
        }
        if(isset($_GET['error'])){
            echo '<p class="message-fail" id="message-display1">'.htmlspecialchars($_GET["error"]).'</p>';
        }
    ?>
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
                <a href="factures.php">
                    <img src="images/invoice.png" alt="Logo" style="width:30px;">
                    <h3>Factures</h3>
                </a>
                <a href="clients.php" class="active">
                    <img src="images/customer.png" alt="Logo" style="width:30px;">
                    <h3>Clients</h3>
                </a>
                <a href="login.php">
                    <img src="images/logout.png" alt="Logo" style="width:30px;">
                    <h3>Déconnexion</h3>
                </a>
            </div>
        </aside>
        <main>
            <h1>Clients</h1>
            <div class="top-list">
                <h2>Liste des clients</h2>
                <div class="search-client">
                    <h2 class="primary">Rechercher : </h2>
                    <input type="search" name="search-client" id="search-client" class="search" placeholder="Nom Prénom, ID...">
                </div>
            </div>
            <div class="clients-table">
                <table>
                    <thead>
                        <th>N° Client</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>N° Téléphone</th>
                        <th>Date de création</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($clients as $client) {

                                echo "<tr data-numclient='{$client['numero_client']}' data-nom='{$client['nom']}' data-prenom='{$client['prenom']}' data-telephone='{$client['telephone']}' data-email='{$client['email']}'>";
                                echo "<td>{$client['numero_client']}</td>";
                                echo "<td>{$client['nom']}</td>";
                                echo "<td>{$client['prenom']}</td>";
                                echo "<td>{$client['email']} </td>";
                                echo "<td>{$client['telephone']} </td>";
                                echo "<td>{$client['date_creation']} </td>";
                                echo "<td><img src='images/pencil.png' alt='editer' style='width: 20px;cursor: pointer;' class='edit-client' data-numclient='{$client['numero_client']}'></td>";
                                echo "<td><img src='images/delete.png' alt='supprimer' style='width: 20px;cursor: pointer;' class='delete-client' data-numclient='{$client['numero_client']}'></td>";
                                echo "</tr>";
                            }
                            ?>
                    </tbody>
                </table>
                <p id="no-results" style="display: none; text-align: center; margin-top:3rem;font-size: 20px;">Aucun résultat trouvé</p>
            </div>

            <div class="supp">
                <form action="includes/deleteC.inc.php" method="post">
                    <input type="hidden" name="numclient" id="numclient">
                    <input type="hidden" name="matricule" id="matricule">
                    <p style="color:white;">Vous voulez supprimer ce client ?</p>
                    <div class="btn">
                        <button type="button" class="closeD" id="closeButton">Annuler</button>
                        <button type="submit" name="submit">Supprimer</button>
                    </div>
                </form>
            </div>

            <div class="edit">
                    <form action="includes/editC.inc.php" method="post">
                        <p style="color:white; font-size:30px; font-weight:600; text-align:center">Modifier :</p><br>
                        <input type="hidden" name="numclient" id="editNumclient">
                        <input type="hidden" name="matricule" id="editMatricule">
                        <div>
                            <label for="editNom">Nom :</label>
                            <input type="text" name="nom" id="editNom">
                        </div>
                        <div>
                            <label for="editPrenom">Prénom :</label>
                            <input type="text" name="prenom" id="editPrenom">
                        </div>
                        <div>
                            <label for="editEmail">Email :</label>
                            <input type="email" name="email" id="editEmail">
                        </div>
                        <div>
                            <label for="editTel">Email :</label>
                            <input type="text" name="tel" id="editTel">
                        </div>
                        
                        <div class="btn">
                            <button class="closeE" name="closeE" id="closeEditButton">Annuler</button>
                            <button type="submit" name="submit">Modifier</button>
                        </div>
                    </form>
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
                    <a href="#" class="add-client">
                        <img src="images/add-client.png" alt="ajouter" style="width: 30px;">
                        <h2>Ajoutez un Client +</h2>
                    </a>
                    <a href="#" class="export">
                        <img src="images/export.png" alt="export" style="width: 30px;">
                        <h2>Exportez ^</h2>
                    </a>
                </div>
            </div>
            <div class="add-client-form">
                        <!-------------ajouter un client---------------->
                <img src="images/cancel-2.png" alt="fermer" class="close" name="close" id="close" style="width:25px;"><br>
                <h2>Ajouter un client :</h2><br>
                    <form action="includes/create-client.inc.php" method="post">
                            <label for="num">Numéro du Client :</label>
                            <input type="text" id="num" name="num" required>
                            
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" required>
                            
                            <label for="pre">Prénom :</label>
                            <input type="text" id="pre" name="pre" required>
                            
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                            
                            <label for="tel">Téléphone :</label>
                            <input type="text" id="tel" name="tel" required><br>
                            
                            <button type="submit" id="submit" name="submit">Ajouter le Client</button>  
                    </form>
                </div>
            
        </main>
    </div>
    <script src="javascript/clients.js"></script>
    
</body>
</html>