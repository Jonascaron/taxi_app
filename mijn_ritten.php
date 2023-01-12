<?php

session_start();
require 'database.php';

$id = $_SESSION['id'];

if ($_SESSION['role'] == 'customer') {
    $sql = "SELECT * ,clients.firstname AS cleint,drivers.firstname AS driver, riders.id AS riders_id FROM `riders`
    LEFT JOIN users clients ON clients.id = riders.cleint_id 
    LEFT JOIN users drivers ON drivers.id = riders.driver_id
    LEFT JOIN cars ON cars.id = riders.taxi_id
    where cleint_id = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $riders = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
if ($_SESSION['role'] == 'driver') {
    $sql = "SELECT * ,clients.firstname AS cleint,drivers.firstname AS driver FROM `riders`
    LEFT JOIN users clients ON clients.id = riders.cleint_id 
    LEFT JOIN users drivers ON drivers.id = riders.driver_id
    LEFT JOIN cars ON cars.id = riders.taxi_id
    where driver_id = ?;";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $riders = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/mijn_ritten.css">

    <title>Document</title>
</head>

<body>
    <nav class="navigation">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
            <li><a href="../taxi_app/">Home</a></li>
            <li><a href="#">Rit aanvragen</a></li>
            <li class="dropdown">
                <p class="dropbtn"><?php echo $_SESSION["firstname"] ?></p>
                <div div class="dropdown-content">
                    <a href="logout.php">Log uit</a>
                </div>
            </li>
        </ul>
    </nav>
    <section class="tabel">
        <?php
        if ($_SESSION['role'] == 'customer') {
            echo '
            <table class="table">
                <thead>
                    <tr>
                        <th>jij</th>
                        <th>driver</th>
                        <th>status</th>
                        <th>number_of_passengers</th>
                        <th>pickup_datetime</th>
                        <th>pickup_address</th>
                        <th>destination_address</th>
                        <th>totalprice</th>
                    </tr>
                </thead>
                <tbody>
            ';
                foreach ($riders as $rider) {
                    echo '
                        <tr>
                            <td>' . $rider["cleint"] . '</td>
                            <td>' . $rider["driver"] . '</td>
                            <td>' . $rider["status"] . '</td>
                            <td>' . $rider["number_of_passengers"] . '</td>
                            <td>' . $rider["pickup_datetime"] . '</td>
                            <td>' . $rider["pickup_address"] . '</td>
                            <td>' . $rider["destination_address"] . '</td>
                            <td>' . $rider["totalprice"] . '</td>
                            <td><a href="mijn_ritten_show.php?id='. $rider["riders_id"] .'">show</a></td>
                        </tr>';
                }
                echo '        
                </tbody>
            </table>';
        }
        if ($_SESSION['role'] == 'driver') {
            echo '
            <table class="table">
                <thead>
                    <tr>
                        <th>jij</th>
                        <th>cleint</th>
                        <th>status</th>
                        <th>number_of_passengers</th>
                        <th>pickup_datetime</th>
                        <th>pickup_address</th>
                        <th>destination_address</th>
                        <th>totalprice</th>
                    </tr>
                </thead>
                <tbody>
            ';
            foreach ($riders as $rider) {
                echo '
                        <tr>
                            <td>' . $rider["driver"] . '</td>
                            <td>' . $rider["cleint"] . '</td>
                            <td>' . $rider["status"] . '</td>
                            <td>' . $rider["number_of_passengers"] . '</td>
                            <td>' . $rider["pickup_datetime"] . '</td>
                            <td>' . $rider["pickup_address"] . '</td>
                            <td>' . $rider["destination_address"] . '</td>
                            <td>' . $rider["totalprice"] . '</td>
                            <td><a href="mijn_ritten_show.php?id='. $rider["riders_id"] .'">show</a></td>
                        </tr>';
            }
            echo '        
                </tbody>
            </table>';
        }
        ?>
    </section>
</body>

</html>