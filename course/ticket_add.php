<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number_ticket = $_POST['number_ticket'];
    $price_ticket = $_POST['price_ticket'];
    $passanger_ticket = $_POST['passanger_ticket'];
    $flight_ticket = $_POST['flight_ticket'];
    $seat_ticket = $_POST['seat_ticket'];

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO ticket (number_ticket, seat_ticket, price_ticket, passanger_ticket, flight_ticket) 
            VALUES ('$number_ticket', '$seat_ticket', '$price_ticket', '$passanger_ticket', '$flight_ticket')";

    echo "SQL Query: " . $sql . "<br>";

    if ($conn->query($sql) === TRUE) {
        echo "New ticket created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
