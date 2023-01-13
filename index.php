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

    <title>home</title>
</head>

<body>
    <nav class="navigation">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
            <?php if (!isset($_SESSION['logedin'])) : ?>

                <li><a href="#">Home</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="login.php">login</a></li>

            <?php elseif ($_SESSION['role'] == 'customer') : ?>

                <li><a href="rit_aanvragen.php">Rit aanvragen</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="mijn_ritten.php">mijn ritten</a>
                        <a href="logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'driver') : ?>



                <li><a href="nieuweritten.php">nieuwe ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="mijn_ritten.php">mijn ritten</a>
                        <a href="logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'employee') : ?>


                <li><a href="aangevraagde_ritten.php">aangevraagde ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="logout.php">log uit</a>
                    </div>
                </li>

            <?php endif; ?>

        </ul>
    </nav>
</body>

</html>