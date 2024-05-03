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
$parking = isset($_GET['parking']) && $_GET['parking'] === '1' ? true : false;
$vote = intval($_GET['vote'] ?? '');
$hotelsFiltered = $hotels;
if ($parking || $vote !== 0) {
    $hotelsFiltered = [];
    foreach ($hotels as $hotel) {
        if ($vote !== 0 && $parking) {
            $hotel['vote'] === $vote && $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($parking) {
            $hotel['parking'] ? $hotelsFiltered[] = $hotel : null;
        } elseif ($vote !== 0 ) {
            $hotel['vote'] === $vote ? $hotelsFiltered[] = $hotel : null;
        };
    };
};
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
    <div class="container mt-3">
        <form method="get">
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input me-2" id="parking" type="checkbox" name="parking" value="1" aria-label="Checkbox for following text input" <?php echo $parking ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="parking">Con parcheggio</label>     
                </div>
                <select class="form-select" name="vote">
                    <option value="0" <?php echo $vote === 0 ? 'selected' : ''; ?>>Seleziona un voto</option>
                    <option value="1" <?php echo $vote === 1 ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo $vote === 2 ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo $vote === 3 ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo $vote === 4 ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo $vote === 5 ? 'selected' : ''; ?>>5</option>
                </select>
            </div>
            <div class="input-group justify-content-center mb-3">
                <button class="btn btn-warning" type="submit">Filtra</button>
            </div>
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