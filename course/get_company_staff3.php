<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_cs, CONCAT(name_staff, ' ', surname_staff) AS fullname FROM company_staff";
$result = $conn->query($sql);

$companyStaffs = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companyStaff = array(
            'id_cs' => $row['id_cs'],
            'fullname' => $row['fullname']
        );
        array_push($companyStaffs, $companyStaff);
    }
}

$conn->close();

echo json_encode($companyStaffs);
?>
