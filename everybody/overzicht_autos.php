<?php
session_start();

require 'database.php';
$customer = 'customer';

$sql = "SELECT * from cars";

$result = mysqli_query($conn,$sql);

$riders = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/mijn_ritten.css">
    <link rel="stylesheet" href="../css/navbar.css">

    <title>Document</title>
</head>

<body>
    <nav class="nv">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
            
            <?php if ($_SESSION['role'] == 'driver') : ?>
                <li><a href="weer.php">Weer</a></li>
                <li><a href="overzicht_klanten.php">klanten</a></li>
                <li><a href="overzicht_meedewekers.php">meedewekers</a></li>
                <li><a href="drivers/nieuwe_ritten.php">nieuwe ritten</a></li>
                <li class="dropdown">
                    <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                    <div div class="dropdown-content">
                        <a href="mijn_ritten.php">mijn ritten</a>
                        <a href="logout.php">log uit</a>
                    </div>
                </li>

            <?php elseif ($_SESSION['role'] == 'employee') : ?>
                <li><a href="weer.php">Weer</a></li>
                <li><a href="overzicht_klanten.php">klanten</a></li>
                <li><a href="overzicht_meedewekers.php">meedewekers</a></li>
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
    <section class="tabel">
        <table class="table">
            <thead>
                <tr>
                    <th>brand</th>
                    <th>model</th>
                    <th>numberplate</th>
                    <th>amount_of_seats</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riders as $rider) : ?>
                    <tr>
                        <td><?php echo $rider["brand"] ?></td>
                        <td><?php echo $rider["model"] ?></td>
                        <td><?php echo $rider["numberplate"] ?></td>
                        <td><?php echo $rider["amount_of_seats"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>

</html>