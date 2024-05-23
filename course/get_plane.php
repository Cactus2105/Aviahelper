<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT plane.id_plane, plane.name_plane FROM plane";
$result = $conn->query($sql);

$planes = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $plane = array(
      'id_plane' => $row['id_plane'],
      'name_plane' => $row['name_plane']
    );
    array_push($planes, $plane);
  }
}

$conn->close();

echo json_encode($planes);
?>
