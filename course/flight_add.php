<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

        $number_flight = $_POST['number_flight'];
        $date_departure = $_POST['date_departure'];
        $date_arrival = $_POST['date_arrival'];
        $place_departure = $_POST['place_departure'];
        $place_arrival = $_POST['place_arrival'];
        $plane_flight = $_POST['plane_flight'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO flight (number_flight, date_departure, date_arrival, place_departure, place_arrival, plane_flight) VALUES ('$number_flight', '$date_departure', '$date_arrival', '$place_departure', '$place_arrival', $plane_flight)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>
