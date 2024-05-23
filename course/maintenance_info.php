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
    maintenance.id_m, 
    plane.name_plane,
    model.model AS plane_model, 
    maintenance.date_maintenance, 
    maintenance.state, 
    CONCAT(aeroport_staff.name_aerostaff, ' ', aeroport_staff.surname) AS staff_name
FROM 
    maintenance
LEFT JOIN 
    plane ON maintenance.plane_maintenance = plane.id_plane
LEFT JOIN 
    model ON plane.model = model.id_model
LEFT JOIN 
    aeroport_staff ON maintenance.staff_maintenance = aeroport_staff.id_as;
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Maintenance Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Plane Name</th>
                <th>Plane Model</th>
                <th>Date</th>
                <th>State</th>
                <th>Staff</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name_plane']}</td>
                            <td>{$row['plane_model']}</td>
                            <td>{$row['date_maintenance']}</td>
                            <td>{$row['state']}</td>
                            <td>{$row['staff_name']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
