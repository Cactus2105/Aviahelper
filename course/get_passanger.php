<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT flight.id_f, flight.number_flight FROM flight";
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
