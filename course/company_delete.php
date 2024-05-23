<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $name_company = $_POST["deleteCompany"];
echo 'name_company: ' .$name_company. 'ALALLALA';
        $sql = "DELETE FROM company WHERE id_c = $name_company";
        
        if ($conn->query($sql) === TRUE) {
            echo "Company '$name_company' has been deleted successfully!";
        } else {
            echo "Error deleting company: " . $conn->error;
        }

$conn->close();
?>
