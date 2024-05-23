<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$name_aerostaff = $_POST['name_aerostaff'];
$surname = $_POST['surname'];
$sex = $_POST['sex'];
$position = $_POST['airport_pos_list'];
$salary = $_POST['salary'];
$date_start = $_POST['date_start'];
$aeroport = $_POST['aeroport_staff_aeroport'];

// Вывод значений полей для проверки
echo "Name Aerostaff: " . $name_aerostaff . "<br>";
echo "Surname: " . $surname . "<br>";
echo "Sex: " . $sex . "<br>";
echo "Position: " . $position . "<br>";
echo "Salary: " . $salary . "<br>";
echo "Date Start: " . $date_start . "<br>";
echo "Aeroport: " . $aeroport . "<br>";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Подготовка SQL запроса для вставки данных в таблицу "aeroport_staff"
$sql = "INSERT INTO aeroport_staff (name_aerostaff, surname , sex, position, salary, date_start, aeroport) VALUES ('$name_aerostaff', '$surname', $sex, $position, $salary, '$date_start', $aeroport)";

// Выполнение SQL запроса
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения
$conn->close();
?>
