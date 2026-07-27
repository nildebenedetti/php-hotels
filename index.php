<?php
    // import hotels data 
    require_once __DIR__ . '/hotels-list.php';

    // checking if any parameter has been set with the form at submit
    // this one for parking 
    $parking = $_GET['parking'] ??  'all'; // THIS IS CALLED NULL COALESCING OPERATOR
    
    // if key = null a default value is assigned
    $minScore = $_GET['rating'] ?? 'all';

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
        <div class="select-wrapper d-flex align-items-caseline">
            <!--- parking select -->
            <div class="parking-select-wrapper p-3">
                <label for="parking-select" class="py-2">Parking</label>
                <select class="form-select" id="parking-select" name="parking">
                    <option value="yes" 
                    <?php echo $parking === "yes" ? "selected" :  "";  ?>
                        >Yes</option>
                    <option value="no"
                    <?php echo $parking === "no" ? "selected" :  "";  ?>
                    >No</option>
                    <option value="all" 
                    <?php echo $parking === "all" ? "selected" :  "";  ?>
                    >Show all</option>
                </select>
            </div>
            <!--- star rating select -->
            <div class="parking-select-wrapper p-3">
                <label for="parking-select" class="py-2">Min Rating</label>
                <select class="form-select" id="rating-select" name="rating">
                    <option value="1" 
                    <?php echo $minScore === "1" ? "selected" :  "";  ?>
                        > 1</option>
                    <option value="2"
                    <?php echo $minScore === "2" ? "selected" :  "";  ?>
                    >2</option>
                    <option value="3"
                    <?php echo $minScore === "3" ? "selected" :  "";  ?>
                    >3</option>
                    <option value="4"
                    <?php echo $minScore === "4" ? "selected" :  "";  ?>
                    >4</option>
                    <option value="5"
                    <?php echo  $minScore === "5" ? "selected" :  "";  ?>
                    >5</option>
                    <option value="all"
                    <?php echo  $minScore === "all" ? "selected" :  "";  ?>
                    >Show all</option>
                </select>
            </div>
            <div class="btn-container d-flex align-items-center pt-3">
                <button type="submit" class="btn btn-dark">Refine</button>
            </div>   
        </div>

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
                $counter = 1;
                foreach ( $hotels as $hotel ) {
                // define if hotel has parking
                $isParking = $hotel['parking'] ? 'yes' : 'no';
                // block 1 - parking filter
                // if the parking is not set as all options AND is not null
                if ( $parking !== 'all' && $parking !== null ) {
                        // then check if parking is different from chosen value
                        if (  $isParking !== $parking ) {
                            // if yes, exit the loop - it won't be added to the list
                            continue;
                        }
                    }
                // block 2 - min rating
                // if the vote is not set as all options and not null
                if ( $minScore !== 'all' && $minScore !== null ) {
                        // then check if the vote is < minRating of select
                        if ( $hotel['vote'] < $minScore ) {           
                            // in case is under min acceptable value, exit the circle
                            continue;
                            }
                }?>
                    <tr>
                        <td><?php echo $counter ?></td>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['vote'] . "/5" ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $isParking ?></td>
                        <td><?php echo $hotel['distance_to_center'] . "km" ?></td>
                    </tr>
                    
                
                <?php 
                $counter++;
                }
                ?>
        </tbody>
    </table>
    </section>
</main>
    <!--- Bootstrap Script --->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>