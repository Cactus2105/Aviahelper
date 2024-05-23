<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$name_staff = $_POST['name_staff'];
$surname_staff = $_POST['surname_staff'];
$sex_staff = $_POST['sex_staff'];
$company_pos_list = $_POST['company_pos_list'];
$salary_staff = $_POST['salary_staff'];
$date_start_staff = $_POST['date_start_staff'];
$company_staff_company = $_POST['company_staff_company'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO company_staff (name_staff, surname_staff , sex_staff, position_staff, salary_staff, date_start_staff, company_staff) VALUES ('$name_staff', '$surname_staff', $sex_staff, $company_pos_list, $salary_staff, '$date_start_staff', $company_staff_company)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
