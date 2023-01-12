<?php

session_start();
require 'database.php';
$sql = "INSERT INTO riders (cleint_id, status, number_of_passengers, pickup_datetime, pickup_address, pickup_city, destination_address, destination_city) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isisssss", $cleint_id, $status, $number_of_passengers, $pickup_datetime, $pickup_address, $pickup_city, $destination_address, $destination_city);

$cleint_id = $_SESSION['id'];
$status = "aangevraagd";
$number_of_passengers = $_POST['number'];
$pickup_datetime = $_POST['pickup_datetime'];
$pickup_address = $_POST['pickup_address'];
$pickup_city = $_POST['pickup_city'];
$destination_address = $_POST['destination_address'];
$destination_city = $_POST['destination_city'];
mysqli_stmt_execute($stmt);

header('location: rit_aangevraagt.php');