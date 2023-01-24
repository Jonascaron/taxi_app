<?php

session_start();

require 'database.php';
$driver = 'driver';
$employee = 'employee';

$sql = "SELECT * from users WHERE role = ? OR role = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $driver, $employee);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
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
                <li><a href="overzicht_autos.php">autos</a></li>
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
                <li><a href="overzicht_autos.php">autos</a></li>
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
                    <th>email</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>address</th>
                    <th>is active</th>
                    <th>destination_address</th>
                    <th>role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riders as $rider) : ?>
                    <tr>
                        <td><?php echo $rider["email"] ?></td>
                        <td><?php echo $rider["firstname"] ?></td>
                        <td><?php echo $rider["lastname"] ?></td>
                        <td><?php echo $rider["address"] ?></td>
                        <td><?php echo $rider["city"] ?></td>
                        <td><?php echo $rider["is_active"] ?></td>
                        <td><?php echo $rider["role"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>

</html>