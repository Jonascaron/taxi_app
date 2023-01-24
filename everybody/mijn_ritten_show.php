<?php
session_start();
require 'database.php';

$id = $_GET['id'];

$sql = "SELECT * ,clients.firstname AS cleint,drivers.firstname AS driver, riders.id AS riders_id FROM `riders`
LEFT JOIN users clients ON clients.id = riders.cleint_id 
LEFT JOIN users drivers ON drivers.id = riders.driver_id
LEFT JOIN cars ON cars.id = riders.taxi_id
where riders.id = ?;";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/card.css">

    <title>Document</title>
</head>

<body>
    <section>
        <div class="card text-bg-warning mb-3" style="width: 18rem;">
            <div class="card-body">
                <?php if ($_SESSION['role'] == 'customer') {
                    foreach ($riders as $rider) {
                        echo '
                        <p class="card-text">jij: ' . $rider['cleint'] . ' </p>
                        <p class="card-text">taxi_id: ' . $rider['taxi_id'] . '</p>
                        <p class="card-text">driver: ' . $rider['driver'] . '</p>
                        <p class="card-text">status: ' . $rider['status'] . '</p>
                        <p class="card-text">number_of_passengers: ' . $rider['number_of_passengers'] . '</p>
                        <p class="card-text">pickup_datetime: ' . $rider['pickup_datetime'] . '</p>
                        <p class="card-text">pickup_address: ' . $rider['pickup_address'] . '</p>
                        <p class="card-text">pickup_city: ' . $rider['pickup_city'] . '</p>
                        <p class="card-text">destination_datetime: ' . $rider['destination_datetime'] . '</p>
                        <p class="card-text">destination_address: ' . $rider['destination_address'] . '</p>
                        <p class="card-text">destination_city: ' . $rider['destination_city'] . '</p>
                        <p class="card-text">driven_distance: ' . $rider['driven_distance'] . '</p>
                        <p class="card-text">totalprice: ' . $rider['totalprice'] . '</p>
                        <a href="mijn_ritten.php" class="btn btn-danger">ga terug</a>
                        ';
                    }
                } ?>
                <?php if ($_SESSION['role'] == 'driver') {
                    foreach ($riders as $rider) {
                        echo '
                        <p class="card-text">jij: ' . $rider['driver'] . ' </p>
                        <p class="card-text">taxi_id: ' . $rider['taxi_id'] . '</p>
                        <p class="card-text">cleint: ' . $rider['cleint'] . '</p>
                        <p class="card-text">status: ' . $rider['status'] . '</p>
                        <p class="card-text">number_of_passengers: ' . $rider['number_of_passengers'] . '</p>
                        <p class="card-text">pickup_datetime: ' . $rider['pickup_datetime'] . '</p>
                        <p class="card-text">pickup_address: ' . $rider['pickup_address'] . '</p>
                        <p class="card-text">pickup_city: ' . $rider['pickup_city'] . '</p>
                        <p class="card-text">destination_datetime: ' . $rider['destination_datetime'] . '</p>
                        <p class="card-text">destination_address: ' . $rider['destination_address'] . '</p>
                        <p class="card-text">destination_city: ' . $rider['destination_city'] . '</p>
                        <p class="card-text">driven_distance: ' . $rider['driven_distance'] . '</p>
                        <p class="card-text">totalprice: ' . $rider['totalprice'] . '</p>
                        <a href="mijn_ritten.php" class="btn btn-danger">ga terug</a>
                        ';
                    }
                } ?>
            </div>
        </div>
    </section>
</body>

</html>