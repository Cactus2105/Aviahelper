<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

        $name_company = $_POST['name_company'];
        $date_company = $_POST['date_company'];
        $country_company = $_POST['country_company'];
        $phone_company = $_POST['phone_company'];
        $gmail_company = $_POST['gmail_company'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO company (name_company, date_company, country_company, phone_company, gmail_company) VALUES ('$name_company', '$date_company', '$country_company', '$phone_company', '$gmail_company')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
?>
