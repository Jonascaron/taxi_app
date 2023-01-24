<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">

    <title>home</title>
</head>

<body>
    <nav class="nv">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
            <?php if (!isset($_SESSION['logedin'])) : ?>
                <li><a href="everybody/weer.php">Weer</a></li>
                <li><a href="everybody/login.php">login</a></li>

            <?php elseif ($_SESSION['role'] == 'customer') : ?>
                <li><a href="everybody/weer.php">Weer</a></li>
                <li><a href="customer/rit_aanvragen.php">Rit aanvragen</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="everybody/mijn_ritten.php">mijn ritten</a>
                        <a href="everybody/logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'driver') : ?>
                <li><a href="everybody/weer.php">Weer</a></li>
                <li><a href="everybody/overzicht_klanten.php">klanten</a></li>
                <li><a href="everybody/overzicht_meedewekers.php">meedewekers</a></li>
                <li><a href="drivers/nieuwe_ritten.php">nieuwe ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="everybody/mijn_ritten.php">mijn ritten</a>
                        <a href="everybody/logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'employee') : ?>
                <li><a href="everybody/weer.php">Weer</a></li>
                <li><a href="everybody/overzicht_klanten.php">klanten</a></li>
                <li><a href="everybody/overzicht_meedewekers.php">meedewekers</a></li>
                <li><a href="everybody/overzicht_autos.php">autos</a></li>
                <li><a href="employee/aangevraagde_ritten.php">aangevraagde ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="everybody/logout.php">log uit</a>
                    </div>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
    <section>
        <div>
            <h1>welkom bij dit taxi bedrijf</h1>
        </div>
    </section>
</body>

</html>