<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard-style.css">
    <title>Dashboard</title>
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
                <a href="#" class="active">
                    <img src="images/dashboard.png" alt="Logo" style="width:30px;">
                    <h3>Dashboard</h3>
                </a>
                <a href="#" >
                    <img src="images/loupe.png" alt="Logo" style="width:30px;">
                    <h3>Recherche</h3>
                </a>
                <a href="#">
                    <img src="images/invoice.png" alt="Logo" style="width:30px;">
                    <h3>Factures</h3>
                </a>
                <a href="#">
                    <img src="images/customer.png" alt="Logo" style="width:30px;">
                    <h3>Clients</h3>
                </a>
                <a href="#">
                    <img src="images/money.png" alt="Logo" style="width:30px;">
                    <h3>Paiements</h3>
                </a>
                <a href="#">
                    <img src="images/logout.png" alt="Logo" style="width:30px;">
                    <h3>Déconnexion</h3>
                </a>
            </div>
            
        </aside>
<!-------------------insights--------------------->
        <main>
            <h1>Dashboard</h1>
            <div class="insights">
                <div class="factures-payées">
                    <img src="images/fully-payed.png" alt="logo" style="width:35px;">
                    <div class="middle">
                        <div class="left">
                            <h3>Factures Payées</h3>
                            <h1>302</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
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
                            <h1>302</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>63%</p>
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
                            <h1>302</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r='36'></circle>
                            </svg>
                            <div class="number">
                                <p>51%</p>
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
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>256374</td>
                            <td>Mohammed HATTAB</td>
                            <td>3570 DH</td>
                            <td class="warning">Payée</td>
                            <td class="primary">Détails</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Amine FILALI</td>
                            <td>380 DH</td>
                            <td class="warning">Non Payée</td>
                            <td class="primary">Détails</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Ayoub YACOUBI</td>
                            <td>570 DH</td>
                            <td class="warning">Payée</td>
                            <td class="primary">Détails</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Meryem SADKI</td>
                            <td>940 DH</td>
                            <td class="warning">Partiellement Payée</td>
                            <td class="primary">Détails</td>
                        </tr>
                        <tr>
                            <td>256374</td>
                            <td>Aya KADIRI</td>
                            <td>800 DH</td>
                            <td class="warning">Non Payée</td>
                            <td class="primary">Détails</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Afficher Tout</a>
            </div>





        </main>
        <aside class="hola">

        </aside>
    </div>
</body>
</html>