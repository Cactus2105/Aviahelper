<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
function getStaffMaintenanceReport($conn, $start_date, $end_date) {
    $stmt = $conn->prepare("CALL staff_maintenance_report(?, ?)");
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<h1>Staff Maintenance Report from $start_date to $end_date</h1>";
    echo "<table border='1'>
            <tr>
                <th>Staff ID</th>
                <th>Full Name</th>
                <th>Maintenance Count</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_as']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['maintenance_count']}</td>
              </tr>";
    }
    echo "</table>";
    $stmt->close();
}
getStaffMaintenanceReport($conn, '2024-01-01', '2024-12-31');

$conn->close();
?>
