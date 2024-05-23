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
    passanger.id_p, 
    CONCAT(passanger.name_passanger, ' ', passanger.surname_passanger) AS name_passanger
FROM 
    passanger";

$result = $conn->query($sql);

$passangers = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $passanger = array(
      'id_p' => $row['id_p'],
      'name_passanger' => $row['name_passanger']
    );
    array_push($passangers, $passanger);
  }
}

$conn->close();

echo json_encode($passangers);
?>
