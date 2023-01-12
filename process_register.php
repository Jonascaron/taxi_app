<?php

require 'database.php';

$sql = "INSERT INTO users (email, password, firstname, lastname, address, city, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssssss", $email, $password, $firstname, $lastname, $address, $city, $role);

// set parameters and execute
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$role = 'customer';
mysqli_stmt_execute($stmt);

echo "Inserted successfully";
mysqli_close($conn);
header('Location: login.php');