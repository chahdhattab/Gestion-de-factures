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
                <div class="factures">
                    <img src="images/fully-payed.png" alt="logo" style="width:30px;">
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
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------fin : factures payées------------>
                <div class="factures1">
                    <img src="images/partially.png" alt="logo" style="width:30px;">
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
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------fin : factures patiellement payées------------>
                <div class="factures2">
                    <img src="images/not-payed.png" alt="logo" style="width:30px;">
                    <div class="middle">
                        <div class="left">
                            <h3>Factures Non Payées</h3>
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
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------fin : factures non payées------------>
            </div>
        </main>
        <aside class="hola">

        </aside>
    </div>
</body>
</html>