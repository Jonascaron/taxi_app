<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/weer.css">

    <title>Document</title>
</head>
<body>
    <nav class="nv">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
            <?php if (!isset($_SESSION['logedin'])) : ?>
                <li><a href="../index.php">Home</a></li>
                <li><a href="login.php">login</a></li>

            <?php elseif ($_SESSION['role'] == 'customer') : ?>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../customer/rit_aanvragen.php">Rit aanvragen</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="mijn_ritten.php">mijn ritten</a>
                        <a href="logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'driver') : ?>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../drivers/nieuwe_ritten.php">nieuwe ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="mijn_ritten.php">mijn ritten</a>
                        <a href="logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'employee') : ?>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../employee/aangevraagde_ritten.php">aangevraagde ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="logout.php">log uit</a>
                    </div>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
    <section>
        <div class="Zoek_box">
            <input type="text" name="" id="zoek_veld">
            <button id="zoek_knop">button</button>
            <div id="resultaat"></div>
        </div>
        <div>
            <h1>weer in <span id="span_plaats">?</span></h1>
            <p>temperatuur: <span id="span_temp">?</span></p>
            <p>weer: <span id="span_weer">?</span></p>
            <p>opgehaald op: <span id="span_ophaal">?</span></p>
        </div>
    </section>
    <script src="weer.js"></script>
</body>
</html>