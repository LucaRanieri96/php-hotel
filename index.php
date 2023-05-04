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

function filterHotelsByParking($hotels, $parking)
{

  $filteredHotels = [];

  foreach ($hotels as $hotel) {

    if ($hotel['parking']) {
      $filteredHotels[] = $hotel;
    }
  }
  return $filteredHotels;
}
function filterHotelsByVote($hotels, $vote)
{
  $filteredHotels = [];

  foreach ($hotels as $hotel) {
    if ($hotel['vote'] >= $vote) {
      $filteredHotels[] = $hotel;
    }
  }

  return $filteredHotels;
}

if ($_GET["parking"]) {
  $filteredHotels = filterHotelsByParking($hotels, $_GET['parking']);
} else {
  $filteredHotels = $hotels;
}
;

if ($_GET["vote"] && isset($filteredHotels)) {
  $filteredHotels = filterHotelsByVote($filteredHotels, $_GET['vote']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotels</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <h1 class="text-center mt-4">FILTRO PER HOTEL</h1>
  <p class="text-center mb-4">Filtro un'array di hotel per parcheggio, voto o entrambi</p>
<div class="container">
  <form method="GET" class="d-flex">
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="parking" name="parking" value="true">
      <label class="form-check-label check" for="parking">Filtro per parcheggio</label>
    </div>
    <div class="mb-3 form-check">
      <input class="number" type="number" id="vote" name="vote" min="0" max="5">
      <label class="form-check-label" for="vote">Filtro per voto</label>
    </div>
    <button type="submit" class="btn btn-warning">FILTRA</button>
  </form>


  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Parking</th>
        <th scope="col">Vote</th>
        <th scope="col">Distance to Center</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($filteredHotels as $hotel): ?>
        <tr>
          <td>
            <?php echo $hotel['name']; ?>
          </td>
          <td>
            <?php echo $hotel['description']; ?>
          </td>
          <td>
            <?php echo $hotel['parking'] ? "true" : "false"; ?>
          </td>
          <td>
            <?php echo $hotel['vote']; ?>
          </td>
          <td>
            <?php echo $hotel['distance_to_center']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</body>

</html>