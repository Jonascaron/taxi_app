<?php

session_start();
require '../everybody/database.php';

$id = $_GET['id'];
$role = 'driver';
$is_bezig = 0;
$in_bezit = 0;

$sql = "SELECT *, clients.firstname AS cleint, drivers.firstname AS driver, riders.id AS riders_id FROM `riders`
LEFT JOIN users clients ON clients.id = riders.cleint_id 
LEFT JOIN users drivers ON drivers.id = riders.driver_id
LEFT JOIN cars ON cars.id = riders.taxi_id
where riders.id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$riders = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql2 = "SELECT * FROM cars WHERE in_bezit = ?";

$stmt2 = mysqli_prepare($conn, $sql2);
mysqli_stmt_bind_param($stmt2, "i", $in_bezit);
mysqli_stmt_execute($stmt2);
$result2 = mysqli_stmt_get_result($stmt2);
$cars = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$sql3 = "SELECT * FROM users WHERE role = ? AND is_bezig = ?";

$stmt3 = mysqli_prepare($conn, $sql3);
mysqli_stmt_bind_param($stmt3, "si", $role, $is_bezig);
mysqli_stmt_execute($stmt3);
$result3 = mysqli_stmt_get_result($stmt3);
$drivers = mysqli_fetch_all($result3, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bevestigen.css">

    <title>Document</title>
</head>

<body>
    <section>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <div class="form">
        <form action="process_bevestigen.php" method="post">
            <div>
                <?php foreach ($riders as $rider) : ?>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                <?php endforeach; ?>
            </div>
            <div>
                <select id="select" name="car">
                    <option value="" disabled selected> kies een auto</option>
                    <?php foreach ($cars as $car) : ?>
                        <option value="<?php echo $car['id'] ?>">brand: <?php echo $car['brand'] ?> model: <?php echo $car['model'] ?> seats: <?php echo $car['amount_of_seats'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <select id="select" name="driver">
                    <option value="" disabled selected> kies een driver</option>
                    <?php foreach ($drivers as $driver) : ?>
                        <option value="<?php echo $driver['id'] ?>">naam: <?php echo $driver['firstname'] ?> <?php echo $driver['lastname'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit">submit</button>
            </div>
        </form>
    </div>
</body>

</html>