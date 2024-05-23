<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_as, CONCAT(name_aerostaff, ' ', surname, ' ___ ', salary, '$ ___ ', aeroport.name) AS fullname FROM aeroport_staff
LEFT JOIN 
    aeroport ON aeroport_staff.aeroport = aeroport.id_a";
$result = $conn->query($sql);

$aeroportStaffs = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $aeroportStaff = array(
            'id_as' => $row['id_as'],
            'fullname' => $row['fullname']
        );
        array_push($aeroportStaffs, $aeroportStaff);
    }
}

$conn->close();

echo json_encode($aeroportStaffs);
?>
