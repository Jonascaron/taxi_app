<?php

session_start();
require '../everybody/database.php';
$sql = "INSERT INTO riders (cleint_id, status, number_of_passengers, pickup_datetime, pickup_address, pickup_city, destination_address, destination_city, driven_distance, totalprice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isisssssii", $cleint_id, $status, $number_of_passengers, $pickup_datetime, $pickup_address, $pickup_city, $destination_address, $destination_city, $driven_distance, $totalprice);

$cleint_id = $_SESSION['id'];
$status = "aangevraagd";
$number_of_passengers = $_POST['number'];
$pickup_datetime = $_POST['pickup_datetime'];
$pickup_address = $_POST['pickup_address'];
$pickup_city = $_POST['pickup_city'];
$destination_address = $_POST['destination_address'];
$destination_city = $_POST['destination_city'];
$driven_distance = 5;
if ($_POST['number'] < 5) {
    $totalprice = 13;
} else {
    $totalprice = 22.38;
}
mysqli_stmt_execute($stmt);

header('location: rit_aangevraagt.php');
