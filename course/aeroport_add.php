<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

        $name = $_POST['name'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $gmail = $_POST['gmail'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO aeroport (name, city, country, phone, gmail) VALUES ('$name', '$city', '$country', '$phone', '$gmail')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>
