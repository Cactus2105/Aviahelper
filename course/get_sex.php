<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_s, sex FROM sex";
$result = $conn->query($sql);

$sexes = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $sex = array(
      'id_s' => $row['id_s'],
      'sex' => $row['sex']
    );
    array_push($sexes, $sex);
  }
}

$conn->close();

echo json_encode($sexes);
?>
