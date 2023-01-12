<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="process_rit_aanvragen.php" method="post">
        <div>
            <label for="number">aantal passagiers</label>
            <input type="number" name="number" id="" value="1" min="1" max="8">
        </div>
        <div>
            <label for="pickup_datetime">tijd van ophaalen</label>
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