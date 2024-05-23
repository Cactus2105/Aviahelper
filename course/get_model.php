<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_model, model FROM model";
$result = $conn->query($sql);

$models = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $model = array(
      'id_model' => $row['id_model'],
      'model' => $row['model']
    );
    array_push($models, $model);
  }
}

$conn->close();

echo json_encode($models);
?>
