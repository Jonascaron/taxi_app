<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/navbar.css">

    <title>home</title>
</head>
<body>
    <nav class="navigation">
        <div class="logo">
            <p class="logo_text">Geel & van anaarb</p>
        </div>
        <ul>
        <?php if(!isset($_SESSION['logedin'])){ 
            echo '
            <li><a href="#">Home</a></li>
            <li><a href="#">Home</a></li> 
            <li><a href="login.php">login</a></li>
            ';
        }
        else{
            if($_SESSION['role'] == 'customer'){
                echo '
                <li><a href="rit_aanvragen.php">Rit aanvragen</a></li>
                <li class="dropdown">
                    <p class="dropbtn">'.$_SESSION["firstname"].'</p>
                    <div div class="dropdown-content">
                        <a href="mijn_ritten.php">mijn ritten</a>
                        <a href="logout.php">log uit</a>
                    </div>
                </li>
                ';
            }
            if($_SESSION['role'] == 'driver'){
                
            }
            if($_SESSION['role'] == 'employee'){
                
            }
        }
        ?>
        </ul>
    </nav>
</body>
</html>