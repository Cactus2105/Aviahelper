<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $number_ticket = $_POST["deleteTicket"];
echo 'number_ticket: ' .$number_ticket. 'ALALLALA';
        $sql = "DELETE FROM ticket WHERE id_t = $number_ticket";
        
        if ($conn->query($sql) === TRUE) {
            echo "Ticket '$number_ticket' has been deleted successfully!";
        } else {
            echo "Error deleting ticket: " . $conn->error;
        }

$conn->close();
?>
