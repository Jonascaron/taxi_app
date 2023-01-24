<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/rit_aanvragen.css">

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
    <form action="process_rit_aanvragen.php" method="post">
        <div>
            <label for="number">aantal passagiers</label>
        </div>
        <div>
            <input type="number" name="number" id="" value="1" min="1" max="8">
        </div>
        <div>
            <label for="pickup_datetime">tijd van ophaalen</label>
        </div>
        <div>
            <input type="datetime-local" name="pickup_datetime" id="">
        </div>
        <div>
            <input type="text" name="pickup_address" id="" placeholder="Ophaaladres">
        </div>
        <div>
            <input type="text" name="pickup_city" id="" placeholder="ophaal stad">
        </div>
        <div>
            <input type="text" name="destination_address" id="" placeholder="bestemmingsadres">
        </div>
        <div>
            <input type="text" name="destination_city" id="" placeholder="Bestemming stad">
        </div>
        <div>
            <button type="submit">submit</button>
        </div>
    </form>
</body>

</html>