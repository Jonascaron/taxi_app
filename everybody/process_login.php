<?php

require 'database.php';

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = ? AND password = ?"; 
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $password); 
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$user = mysqli_fetch_assoc($result); 

if ($result->num_rows == 0) {
    header('Location: login.php?error=Deze gebruiker bestaat niet.');
} else {
    session_start();
    $_SESSION["logedin"] = true;
    $_SESSION["id"] = $user["id"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["firstname"] = $user["firstname"];
    $_SESSION["lastname"] = $user["lastname"];
    $_SESSION["role"] = $user["role"];
    header('Location: ../index.php');
}

?>