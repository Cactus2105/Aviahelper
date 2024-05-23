<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $name_passanger = $_POST["deletePassanger"];
echo 'name_passanger: ' .$name_passanger. 'ALALLALA';
        $sql = "DELETE FROM passanger WHERE id_p = $name_passanger";
        
        if ($conn->query($sql) === TRUE) {
            echo "Passanger '$name_passanger' has been deleted successfully!";
        } else {
            echo "Error deleting passanger: " . $conn->error;
        }

$conn->close();
?>
