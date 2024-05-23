<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_a, name FROM aeroport";
$result = $conn->query($sql);

$aeroports = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $name = array(
      'id_a' => $row['id_a'],
      'name' => $row['name']
    );
    array_push($aeroports, $name);
  }
}

$conn->close();

echo json_encode($aeroports);
?>
