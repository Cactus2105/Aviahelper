<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT flight.id_f, flight.number_flight, flight.date_departure, flight.date_arrival, 
               flight.place_departure, flight.place_arrival, aeroport_departure.name AS departure_name, 
               aeroport_arrival.name AS arrival_name, plane.name_plane, model.model
        FROM flight
        LEFT JOIN aeroport AS aeroport_departure ON flight.place_departure = aeroport_departure.id_a
        LEFT JOIN aeroport AS aeroport_arrival ON flight.place_arrival = aeroport_arrival.id_a
        LEFT JOIN plane ON flight.plane_flight = plane.id_plane
        LEFT JOIN model ON plane.model = model.id_model";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Flight Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Number</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Departure Place</th>
                <th>Arrival Place</th>
                <th>Plane Name</th>
                <th>Plane Model</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['number_flight']}</td>
                            <td>{$row['date_departure']}</td>
                            <td>{$row['date_arrival']}</td>
                            <td>{$row['departure_name']}</td>
                            <td>{$row['arrival_name']}</td>
                            <td>{$row['name_plane']}</td>
                            <td>{$row['model']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No results found</td></tr>";
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
