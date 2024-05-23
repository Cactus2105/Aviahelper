<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

    $plane_maintenance = $_POST['plane_maintenance'];
    $date_maintenance = $_POST['date_maintenance'];
    $state = $_POST['state'];
    $staff_maintenance = $_POST['staff_maintenance'];
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        $maintenance_sql = "INSERT INTO maintenance (plane_maintenance, date_maintenance, state, staff_maintenance) VALUES ('$plane_maintenance', '$date_maintenance', '$state', '$staff_maintenance')";

        if ($conn->query($maintenance_sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $maintenance_sql . "<br>" . $conn->error;
        }
    $conn->close();
?>
