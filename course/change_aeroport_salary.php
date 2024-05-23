<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_as = $_POST['fullname_changeAeroportSalary'];
    $newSalary = $_POST['newAeroportSalary']; 
    echo 'Salary: ' . $newSalary . '<br>';
    echo 'ID: ' . $id_as . '<br>';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE aeroport_staff SET salary = '$newSalary' WHERE id_as = '$id_as'";

    if ($conn->query($sql) === TRUE) {
        echo "Salary updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
