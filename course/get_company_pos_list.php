<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_company_pos_list, position FROM company_pos_list";
$result = $conn->query($sql);

$positions = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $positions[] = array(
      'id_company_pos_list' => $row['id_company_pos_list'],
      'position' => $row['position']
    );
  }
}

echo json_encode($positions);

$conn->close();
?>
