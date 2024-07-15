<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>

    <form action=".php" method="post">
        <div class="login-box">
            <div class="login-header">
                <header>Bienvenue! </header>
                <div class="label2"> veuillez vous connecter</div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="id" id="id" placeholder="ID" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" id="password" placeholder="Mot de passe" autocomplete="off" required><br><br><br>
            </div>
            <div class="login-submit">
                <button type ="submit "class="login-btn" id="submit">Se connecter</button>
                
            </div>
        </div>
    </form>





</body>
</html>