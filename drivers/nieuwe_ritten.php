<?php

session_start();
require '../everybody/database.php';

$status = 'aangevraagd';
$driver_id = $_SESSION['id'];

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
    <link rel="stylesheet" href="../css/nieuwe_ritten.css">

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
                    <a href="../everybody/mijn_ritten.php">mijn ritten</a>
                    <a href="../everybody/logout.php">log uit</a>
                </div>
            </li>
        </ul>
    </nav>
    <section>
        <?php if ($riders == NULL) {
            echo '<p class="p">er zijn geen ritten voor u</p>';
        } ?>
        <?php foreach ($riders as $rider) : ?>
            <form action="rit_bezig.php" method="post">
                <p><?php echo $rider['cleint'] ?></p>
                <p><?php echo $rider['pickup_datetime'] ?></p>
                <p><?php echo $rider['pickup_address'] ?></p>
                <p><?php echo $rider['pickup_city'] ?></p>
                <p><?php echo $rider['number_of_passengers'] ?></p>
                <input type="hidden" name="hidden" value="<?php echo $rider['riders_id'] ?>">
                <button type="submit">bezig</button>
            </form>
        <?php endforeach; ?>
    </section>
</body>

</html>