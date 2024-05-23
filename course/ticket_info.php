<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ticket.id_t, ticket.number_ticket, ticket.seat_ticket, ticket.price_ticket, CONCAT(passanger.name_passanger, ' ', passanger.surname_passanger) AS fullname, flight.number_flight AS flight_number
        FROM ticket
        LEFT JOIN passanger ON ticket.passanger_ticket = passanger.id_p
        LEFT JOIN flight ON ticket.flight_ticket = flight.id_f";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Ticket Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Number</th>
                <th>Seat</th>
                <th>Price</th>
                <th>Passenger</th>
                <th>Flight Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['number_ticket']}</td>
                            <td>{$row['seat_ticket']}</td>
                            <td>{$row['price_ticket']}</td>
                            <td>{$row['fullname']}</td>
                            <td>{$row['flight_number']}</td>
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
