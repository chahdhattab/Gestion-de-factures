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
                <a href="index.php">
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
                        <th>ID</th>
                        <th>Client</th>
                        <th>Date de création</th>
                        <th>Montant</th>
                        <th>État du Paiement</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>256374</td>
                            <td>HATTAB Mohammed</td>
                            <td>12-07-2024</td>
                            <td>2750 DH</td>
                            <td class="success">Payée</td>
                            <td><a href="#"><img src="images/information.png" alt="info" style="width: 20px;"></a></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>

                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>FILALI Amine</td>
                            <td>07-03-2024</td>
                            <td>1290 DH</td>
                            <td class="warning">Partiellement Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        <tr>
                            <td>256374</td>
                            <td>HATTAB Mohammed</td>
                            <td>12-07-2024</td>
                            <td>2750 DH</td>
                            <td class="success">Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>FILALI Amine</td>
                            <td>07-03-2024</td>
                            <td>1290 DH</td>
                            <td class="danger">Non Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>FILALI Amine</td>
                            <td>07-03-2024</td>
                            <td>1290 DH</td>
                            <td class="warning">Partiellement Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>HATTAB Mohammed</td>
                            <td>12-07-2024</td>
                            <td>2750 DH</td>
                            <td class="success">Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>HATTAB Mohammed</td>
                            <td>12-07-2024</td>
                            <td>2750 DH</td>
                            <td class="success">Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>HATTAB Mohammed</td>
                            <td>12-07-2024</td>
                            <td>2750 DH</td>
                            <td class="danger">Non Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>FILALI Amine</td>
                            <td>07-03-2024</td>
                            <td>1290 DH</td>
                            <td class="warning">Partiellement Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>FILALI Amine</td>
                            <td>07-03-2024</td>
                            <td>1290 DH</td>
                            <td class="danger">Non Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>FILALI Amine</td>
                            <td>07-03-2024</td>
                            <td>1290 DH</td>
                            <td class="success">Payée</td>
                            <td><img src="images/information.png" alt="info" style="width: 20px;"></td>
                            <td><img src="images/pencil.png" alt="editer" style="width: 20px;"></td>
                            <td><img src="images/delete.png" alt="supprimer" style="width: 20px;"></td>
                            <td><img src="images/import.png" alt="importer" style="width: 20px;"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="bottom-list">
                <div class="pagination">
                    <button id="prevBtn" onclick="prevPage()">Précent</button>
                    <span id="pageNum">1</span>
                    <button id="nextBtn" onclick="nextPage()">Next</button>
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
        </main>
    </div>  
</body>
</html>

        