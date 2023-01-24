<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/login.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <p class="title">login</p>
        <form action="process_login.php" method="POST" class="form">
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Wachtwoord" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Inloggen</button>
            </div>
            <p class="login-register-text">Geen account? <a href="register.php">Registreer hier.</a></p>
        </form>
    </div>
</body>
</html>