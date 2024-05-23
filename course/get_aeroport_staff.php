<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_p, CONCAT(name_passanger, ' ', surname_passanger, ' ', patronymic_passanger) AS fullname FROM passanger";
$result = $conn->query($sql);

$passangers = array(); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $passanger = array(
            'id_p' => $row['id_p'],
            'fullname' => $row['fullname']
        );
        array_push($passangers, $passanger);
    }
}

$conn->close();

echo json_encode($passangers);
?>
