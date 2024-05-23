<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
    flight.id_f, 
    CONCAT('№',flight.number_flight, ' ___ ', dep_aeroport.name, ' --> ', arr_aeroport.name) AS number_flight 
FROM 
    flight 
LEFT JOIN 
    aeroport AS dep_aeroport ON flight.place_departure = dep_aeroport.id_a 
LEFT JOIN 
    aeroport AS arr_aeroport ON flight.place_arrival = arr_aeroport.id_a;
";
$result = $conn->query($sql);

$flights = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $flight = array(
      'id_f' => $row['id_f'],
      'number_flight' => $row['number_flight']
    );
    array_push($flights, $flight);
  }
}

$conn->close();

echo json_encode($flights);
?>
