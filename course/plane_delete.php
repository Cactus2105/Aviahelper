<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $name_plane = $_POST["deletePlane"];
echo 'name_plane: ' .$name_plane. 'ALALLALA';
        $sql = "DELETE FROM plane WHERE id_plane = $name_plane";
        
        if ($conn->query($sql) === TRUE) {
            echo "Plane '$name_plane' has been deleted successfully!";
        } else {
            echo "Error deleting plane: " . $conn->error;
        }

$conn->close();
?>
