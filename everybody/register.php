<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <p class="title">register</p>
        <form action="process_register.php" method="POST" class="form">
            <div class="input-group">
                <input type="firstname" placeholder="Voornaam" name="firstname" required>
            </div>
            <div class="input-group">
                <input type="lastname" placeholder="Achternaam" name="lastname" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Wachtwoord" name="password" required>
            </div>
            <div class="input-group">
                <input type="address" placeholder="address" name="address" required>
            </div>
            <div class="input-group">
                <input type="city" placeholder="city" name="city" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Registreren</button>
            </div>
            <p class="login-register-text">Heb je een account? <a href="login.php">log hier in.</a></p>
        </form>
    </div>
</body>
</html>