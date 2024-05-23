<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cs = $_POST['fullname_changeCompanySalary'];
    $newSalary = $_POST['newCompanySalary']; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE company_staff SET salary_staff = '$newSalary' WHERE id_cs = '$id_cs'";

    if ($conn->query($sql) === TRUE) {
        echo "Salary updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
