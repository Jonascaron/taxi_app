<?php

require '../everybody/database.php';

$id = $_POST['id'];
$taxi_id = $_POST['car'];
$driver_id = $_POST['driver'];

$sql = "UPDATE riders SET taxi_id = $taxi_id, driver_id = $driver_id WHERE id = $id";
$sql2 = "UPDATE users SET is_bezig = 1 WHERE id = $driver_id";
$sql3 = "UPDATE cars SET in_bezit = 1 WHERE id = $taxi_id";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);

if (mysqli_query($conn, $sql3)) {
    header("location: aangevraagde_ritten.php");
}
