<?php

session_start();
require '../everybody/database.php';


$id = $_POST['hidden'];

$sql = "SELECT *, clients.firstname AS cleint, drivers.firstname AS driver, riders.id AS riders_id, cars.id AS cars_id, drivers.id AS users_id FROM `riders`
LEFT JOIN users clients ON clients.id = riders.cleint_id 
LEFT JOIN users drivers ON drivers.id = riders.driver_id
LEFT JOIN cars ON cars.id = riders.taxi_id
where riders.id = ?;";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$riders = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql2 = "UPDATE riders SET status = 'bezig' WHERE id = $id";
mysqli_query($conn, $sql2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/rit_bezig.css">

    <title>Document</title>
</head>

<body>
    <section>
        <?php foreach ($riders as $rider) : ?>
            <form action="rit_gedaan.php" method="post">
                <p><?php echo $rider['destination_address'] ?></p>
                <p><?php echo $rider['destination_city'] ?></p>
                <input type="hidden" name="hidden" value="<?php echo $rider['riders_id'] ?>">
                <input type="hidden" name="users_id" value="<?php echo $rider['users_id'] ?>">
                <input type="hidden" name="cars_id" value="<?php echo $rider['cars_id'] ?>">
                <label for="datetime">aankomst tijd</label>
                <div>
                    <input type="datetime-local" name="datetime" id="date">
                </div>
                <div>
                    <button type="submit">gedaan</button>
                </div>
            </form>
        <?php endforeach; ?>
    </section>
</body>

</html>