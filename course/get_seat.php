<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$flight_ticket = $_GET['flight_ticket'];

$sql = "SELECT seat_ticket FROM ticket WHERE flight_ticket = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $flight_ticket);
$stmt->execute();
$result = $stmt->get_result();

$seats = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    array_push($seats, $row['seat_ticket']);
  }
}

$conn->close();

echo json_encode($seats);
?>
