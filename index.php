<?php
    // import hotels data 
    require_once __DIR__ . '/hotels-list.php';

    // checking if any parameter has been set with the form at submit
    // this one for parking

    $parking = $_GET['parking'] ??  'all'; // THIS IS CALLED NULL COALESCING OPERATOR
                                           // if key = null a default value is assigned
    // save filtered list based on request parameters

    $filteredHotels = null;

    if ( $parking !== 'all' ) {
        // SE FILTRO PARKING === SI
        if ( $parking === 'yes')
            // devo esaminare ciascun hotel con foreach
            foreach ( $hotels as $hotel ) {
                // SE il valore parking === true allora lo aggiungo alla filtered list
                    if ( $hotel['parking'] ) {
                        $filteredHotels[] = $hotel;
                    } else {
                    // ALTRIMENTI lo salto con continue
                    continue;
                    }    
                }
        // SE FILTRO PARKING ==== NO
        if ( $parking === 'no' ) {
            // devo esaminare ciascun hotel con foreach
            foreach ( $hotels as $hotel ) {
                // SE il valore parking === false allora lo aggiungo alla filtered list
                if ( !$hotel['parking'] ) {
                    $filteredHotels[] = $hotel;
                // ALTRIMENTI lo salto con continue 
                } else {
                    continue;
                }
            }
        }
    }

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
    <!--- form for handling filters -->
    <section class="form p-4">
        <!--- keep in mind GET as form method is vital here!!! --->
        <form method="get" action="index.php">
        <div class="select-wrapper">
            <!--- parking select -->
            <div class="parking-select-wrapper p-3">
                <label for="parking-select" class="py-2">Parking</label>
                <select class="form-select" id="parking-select" name="parking">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="all" selected>Show all</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Refine</button>
        </form>
    </section>
    <section class="hotels-table">
    <table class="table table-info table-hover border border-secondary">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Rating</th>
            <th scope="col">Description</th>
            <th scope="col">Parking</th>
            <th scope="col">Distance to Center</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // add variable to memo which hotel list is to be used
                $selectedHotels = ($parking === 'all') ? $hotels : $filteredHotels;
                $counter = 1;

                foreach ( $selectedHotels as $hotel) {
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