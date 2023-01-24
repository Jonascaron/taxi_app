<?php

session_start();
require '../everybody/database.php';


$datetime = $_POST['datetime'];
$id = $_POST['hidden'];
$users_id = $_POST['users_id'];
$cars_id = $_POST['cars_id'];
$status = 'gedaan';

$sql = "UPDATE riders SET status = '$status', destination_datetime = '$datetime' WHERE id = $id";
$sql2 = "UPDATE users SET is_bezig = 0 WHERE id = $users_id";
$sql3 = "UPDATE cars SET in_bezit = 0 WHERE id = $cars_id";

mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);

if (mysqli_query($conn, $sql3)) {
    header("location: nieuwe_ritten.php");
}