<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio L02 - php-hotels</title>
</head>
<body>
    <h1>Hotel List:</h1>
    <?php


    // import dei dati da un altro file
    require_once 'hotels-list.php';

    $counter = 1;

    foreach ( $hotels as $hotel ) {
        
        echo "<strong>$counter) " . $hotel['name'] . "</strong>";
        echo "<br>";

        foreach ( $hotel as $key => $value) {
            echo $key . ": " . $value ;
            echo "<br>";
        }

        echo "<br>";
        $counter++;
    }

    ?>
</body>
</html>