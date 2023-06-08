<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <main class="container mx-auto">
        <h1 class="text-center mb-3">Lista di Hotel</h1>
            
            <form action="index.php" method="get">
                <span>Filtra gli hotel con parcheggio:</span>
                <input type="radio" name="filter" id="si" value="si">
                <label for="si">Si</label>

                <input type="radio" name="filter" id="no" value="no">
                <label for="no">No</label>

                <span class="ms-5">Inserisci la valutazione minima dell'Hotel</span>
                <input class="col-1" type="number" name="voto" id="">

                <button class="ms-5" type="submit">Cerca</button>
            </form>

            <?php 
                $filter = $_GET["filter"];
                $voto = $_GET["voto"];
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Parcheggio</th>
                        <th>Voto</th>
                        <th>Distanza dal centro</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($hotels as $hotel) { 
                        if ($filter == "si" && $hotel["parking"] != true) {
                           $hotel = null;
                        }
                        
                        if ($hotel["vote"] < $voto) {
                            $hotel = null;
                        }
                    ?>
                        <tr>

                        <?php foreach ($hotel as $hotelFeature) { ?>
                            <td> <?php echo $hotelFeature ?> </td>
                        <?php } ?>

                        </tr>
                    <?php } ?>

                </tbody>
            </table>
    </main>
</body>
</html>