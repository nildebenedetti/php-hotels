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
    <table class="table table-info table-hover border border-secondary">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Description</th>
            <th scope="col">Parking</th>
            <th scope="col">Distance to Center</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $counter = 1;

                foreach ( $hotels as $hotel) {
                // adapt value for table notation
                $isParking = $hotel['parking'] ? 'yes' : 'no';

                    echo "<tr>
                    <td>" . $counter . "</td>
                    <td>" . $hotel['name'] . "</td>
                    <td>" . $hotel['vote'] ."/5" . "</td>
                    <td>" . $hotel['description'] . "</td>
                    <td>" . $isParking . "</td>
                    <td>" . $hotel['distance_to_center'] . "km" . "</td>
                    </tr>";
                    
                    $counter++;
                }

            ?>


        </tbody>

    </table>
    </section>
    
    <!--- Bootstrap Script --->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</main>

</body>
</html>