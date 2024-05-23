<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

        $name_plane = $_POST['name_plane'];
        $model = $_POST['model'];
        $date = $_POST['date'];
        $company = $_POST['company'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO plane (name_plane, model, date, company) VALUES ('$name_plane', '$model', '$date', '$company')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>
