<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_airport_pos_list, position FROM airport_pos_list";
$result = $conn->query($sql);

$positions = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $position = array(
      'id_airport_pos_list' => $row['id_airport_pos_list'],
      'position' => $row['position']
    );
    array_push($positions, $position);
  }
}

$conn->close();

echo json_encode($positions);
?>
