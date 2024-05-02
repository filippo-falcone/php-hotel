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
$parking = $_GET['parking'] ?? '';
$vote = $_GET['vote'] ?? '';
var_dump($vote);
$hotelsFiltered = $hotels;
if ($parking === 'on' || $vote !== '') {
    $hotelsFiltered = [];
    foreach ($hotels as $hotel) {
        if ($vote === 'first' && $parking === 'on') {
            $hotel['vote'] === 1 && $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'second' && $parking === 'on') {
            $hotel['vote'] === 2 && $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'third' && $parking === 'on') {
            $hotel['vote'] === 3 && $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'fourth' && $parking === 'on') {
            $hotel['vote'] === 4 && $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'fifth' && $parking === 'on') {
            $hotel['vote'] === 5 && $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($parking === 'on') {
            $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'first' ) {
            $hotel['vote'] === 1 ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'second') {
            $hotel['vote'] === 2 ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'third') {
            $hotel['vote'] === 3 ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'fourth') {
            $hotel['vote'] === 4 ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote === 'fifth') {
            $hotel['vote'] === 5 ? $hotelsFiltered[] = $hotel : null;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- /Bootstrap CSS -->
</head>
<body>
    <div class="container">
        <form method="get">
            <label for="parking">Hotel con il parcheggio</label>
            <input type="checkbox" name="parking" id="parking">
            <select name="vote">
                <option value="">Seleziona un voto</option>
                <option value="first">1</option>
                <option value="second">2</option>
                <option value="third">3</option>
                <option value="fourth">4</option>
                <option value="fifth">5</option>
            </select>
            <button class="btn btn-warning" type="submit">Filtra</button>
        </form>
        <table class="table border">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hotelsFiltered as $key => $hotel) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo ($hotel['parking']) ? 'Si' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>