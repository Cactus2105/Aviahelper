<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

    $name_passanger = $_POST['name_passanger'];
    $surname_passanger = $_POST['surname_passanger'];
    $patronymic_passanger = $_POST['patronymic_passanger'];
    $sex_passanger = $_POST['sex_passanger'];
    $dob = $_POST['dob'];   
    $country_passanger = $_POST['country_passanger'];
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        $sql = "INSERT INTO passanger (name_passanger, surname_passanger, patronymic_passanger, sex_passanger, dob, country_passanger) 
                    VALUES ('$name_passanger', '$surname_passanger', '$patronymic_passanger', '$sex_passanger',
                    '$dob',
                    '$country_passanger')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    $conn->close();
?>
