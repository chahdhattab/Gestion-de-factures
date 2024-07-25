<?php
session_start(); // Démarrer la session pour accéder aux variables de session

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard-style.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
        if(isset($_SESSION["message"]) && isset($_GET['message'])){
            echo '<p class="message-succ" id="message-display">'.htmlspecialchars($_SESSION["message"]).'</p>';
        }?>
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
                <a href="dashboard.php" class="active">
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
                <a href="clients.php">
                    <img src="images/customer.png" alt="Logo" style="width:30px;">
                    <h3>Clients</h3>
                </a>
                <a href="index.php">
                    <img src="images/logout.png" alt="Logo" style="width:30px;">
                    <h3>Déconnexion</h3>
                </a>
            </div>
            
        </aside>
<!------------------------main------------------------------------>
        <!-------------------insights--------------------->
        
        <main>
            
            <h1>Dashboard</h1>
            <div class="insights">
                
                <div class="factures-payées">
                    <img src="images/fully-payed.png" alt="logo" style="width:35px;">
                    <div class="middle">
                        <div class="left">
                            <h3>Factures Payées</h3>
                            <h1>137</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>41%</p>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-------------fin : factures payées------------>
                <div class="factures-part-payées">
                    <img src="images/partially.png" alt="logo" style="width:35px;">
                    <div class="middle">
                        <div class="left">
                            <h3>Factures Partiellement Payées</h3>
                            <h1>97</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>35%</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-------------fin : factures patiellement payées------------>
                <div class="factures-nn-payées">
                    <img src="images/not-payed.png" alt="logo" style="width:35px;">
                    <div class="middle">
                        <div class="left">
                            <h3>Factures <br>Non <br>Payées</h3>
                            <h1>63</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>24%</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-------------fin : factures non payées------------>
            </div>
            <!---------------fin : insights------------------------------>

            <div class="recent-factures">
                <h2>Dernières Factures</h2>
                <table>
                    <thead>
                        <th>N° Facture</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date de création</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>256374</td>
                            <td>Mohammed HATTAB</td>
                            <td>3570 DH</td>
                            <td class="success">Payée</td>
                            <td class="primary">24/07/2024</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Amine FILALI</td>
                            <td>380 DH</td>
                            <td class="danger">Non Payée</td>
                            <td class="primary">16/07/2024</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Ayoub YACOUBI</td>
                            <td>570 DH</td>
                            <td class="success">Payée</td>
                            <td class="primary">10/07/2024</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Meryem SADKI</td>
                            <td>940 DH</td>
                            <td class="warning">Partiellement Payée</td>
                            <td class="primary">02/07/2024</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Aya KADIRI</td>
                            <td>800 DH</td>
                            <td class="danger">Non Payée</td>
                            <td class="primary">30/06/2024</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Ayman AKILI</td>
                            <td>380 DH</td>
                            <td class="success">Payée</td>
                            <td class="primary">25/06/2024</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Ayman AKILI</td>
                            <td>380 DH</td>
                            <td class="warning"> Partiellement Payée</td>
                            <td class="primary">25/06/2024</td>
                        </tr>
                        
                    </tbody>
                </table>
                <a href="factures.php">Afficher Tout</a>
            </div>
        </main>
    <!--------------------------Fin: Main---------------------------->
    
        <div class="right">
            <div class="top">
                <button class="menu-btn">
                    <img src="images/menu-btn.png" style="width:40px; background: white;" alt="menu" >
                </button>
                <div class="profile">
                    <div class="info">
                        <p style="font-size:15px">Bienvenue , <b class="primary" style="font-size:15px">
                            <?php echo htmlspecialchars($_SESSION["username"]); ?> <!-- Affichage du prénom de l'utilisateur -->
                        </b></p>
                        <small class="text-muted" >Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/user-3.png" alt="user">
                    </div>
                </div>
            </div>
            <!--------------Fin: Top Right----------->
            <div class="recent-updates">
                <h2>Les dernières mises à jour</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="images/invoice-4.png" alt="icon"> 
                        </div>
                        <div class="message">
                            <p><b class="primary">Nouvelle facture créée: </b><br> Facture #67953 pour Client: Mohammed HATTAB, le 29/07/2024, montant total de 6080 DH</p>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="images/reputation.png" alt="icon"> 
                        </div>
                        <div class="message">
                            <p><b class="primary">Nouveau client ajouté: </b><br> Client Amine Rahaoui, ajouté le 28/07/2024.</p>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="images/invoice-4.png" alt="icon"> 
                        </div>
                        <div class="message">
                            <p><b class="primary">Nouvelle facture créée: </b><br> Facture #67952 pour Cliente: Aya AALOU, le 25/07/2024, montant total de 250 DH</p>
                        </div>
                    </div>
                </div>
            </div>

            <!------------------------------fin: updates--------------------------->
            


            <!------------------------Ajouter: facture-client----------------------->
            <div class="add">
                <a href="#" class="item-client">
                    <img src="images/add-client.png" style="width:40px;" alt="icon">
                    <h2>Ajoutez un Client :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                    <div class="add-client-form">
                        <!-------------ajouter un client---------------->
                        <img src="images/cancel-2.png" alt="fermer" class="close" name="close" id="close" style="width:25px;"><br>
                        <h2>Ajouter un client :</h2><br>
                        <form action="includes/create-client.inc.php" method="post">
                            <label for="num">Numéro de Client :</label>
                            <input type="text" id="num" name="num" required>
                            
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" required>
                            
                            <label for="pre">Prénom :</label>
                            <input type="text" id="pre" name="pre" required>
                            
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>
                            
                            <label for="tel">Téléphone :</label>
                            <input type="text" id="tel" name="tel" required><br><br>
                            
                            <button type="submit" id="submit" name="submit">Ajouter le Client</button>  
                        </form>
                    </div>
                </a>
                <a href="#" class="item-facture">
                    <img src="images/add-facture.png" style="width:40px;" alt="icon">
                    <h2>Ajoutez une facture :</h2>
                    <!-------------ajouter une facture---------------->
                </a>
            </div>
        </div>
        <!-------------------------------Fin : right side---------------------------------->
    </div>
    
    <script src="javascript/dashboard-script.js"></script>
</body>
</html>