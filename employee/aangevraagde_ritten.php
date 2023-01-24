<?php

session_start();
require '../everybody/database.php';

$status = 'aangevraagd';
$driver_id = 0;

$sql = "SELECT *, clients.firstname AS cleint, drivers.firstname AS driver, riders.id AS riders_id FROM `riders`
LEFT JOIN users clients ON clients.id = riders.cleint_id 
LEFT JOIN users drivers ON drivers.id = riders.driver_id
LEFT JOIN cars ON cars.id = riders.taxi_id
where status = ? AND driver_id = ?;";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "si", $status, $driver_id);
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

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/aangevraagde_ritten.css">

    <title>Document</title>
</head>

<body>
    <nav class="nv">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../everybody/weer.php">Weer</a></li>
            <li><a href="../everybody/overzicht_klanten.php">klanten</a></li>
            <li><a href="../everybody/overzicht_meedewekers.php">meedewekers</a></li>
            <li><a href="../everybody/overzicht_autos.php">autos</a></li>
            <li class="dropdown">
                <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                <div div class="dropdown-content">
                    <a href="../everybody/logout.php">log uit</a>
                </div>
            </li>
        </ul>
    </nav>
    <section class="tabel">  
        <table class="table">
            <thead>
                <tr>
                    <th>cleint</th>
                    <th>status</th>
                    <th>number_of_passengers</th>
                    <th>pickup_datetime</th>
                    <th>pickup_address</th>
                    <th>destination_address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riders as $rider) : ?>
                    <tr>
                        <td><?php echo $rider["cleint"] ?></td>
                        <td><?php echo $rider["status"] ?></td>
                        <td><?php echo $rider["number_of_passengers"] ?></td>
                        <td><?php echo $rider["pickup_datetime"] ?></td>
                        <td><?php echo $rider["pickup_address"] ?></td>
                        <td><?php echo $rider["destination_address"] ?></td>
                        <td><a href="bevestigen.php?id=<?php echo $rider["riders_id"] ?>">bevestigen</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>

</html>