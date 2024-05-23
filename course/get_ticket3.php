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
    ticket.id_t, 
    CONCAT(ticket.number_ticket, ' ___ ', passanger.name_passanger, ' ', passanger.surname_passanger, ', ', ticket.seat_ticket) AS number_ticket
FROM 
    ticket 
LEFT JOIN 
    passanger ON ticket.passanger_ticket = passanger.id_p";

$result = $conn->query($sql);

$tickets = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $ticket = array(
      'id_t' => $row['id_t'],
      'number_ticket' => $row['number_ticket']
    );
    array_push($tickets, $ticket);
  }
}

$conn->close();

echo json_encode($tickets);
?>
