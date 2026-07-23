<?php
    // import hotels data 
    require_once __DIR__ . '/hotels-list.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio L02 - php-hotels</title>

    <!--- Bootstrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header Class="p-4">
    <h1>Discover Hotels nearby PHPdale</h1>
</header>
<main class="p-4">
    <section class="hotels-table">

    
    <?php

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
    </section>
    
    <!--- Bootstrap Script --->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</main>

</body>
</html>