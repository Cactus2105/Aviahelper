<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $name = $_POST["deleteAeroport"];
        $sql = "DELETE FROM aeroport WHERE id_a = $name";
        
        if ($conn->query($sql) === TRUE) {
            echo "Aeroport has been deleted successfully!";
        } else {
            echo "Error deleting aeroport: " . $conn->error;
        }

$conn->close();
?>
