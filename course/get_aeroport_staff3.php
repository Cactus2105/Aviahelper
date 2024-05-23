<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root"; // Ваше имя пользователя
$password = ""; // Ваш пароль
$dbname = "aviahelper"; // Имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос для извлечения данных о пассажирах
$sql = "SELECT id_as, CONCAT(name_aerostaff, ' ', surname) AS fullname FROM aeroport_staff";
$result = $conn->query($sql);

$aeroportStaffs = array(); // Массив для хранения данных о пассажирах

// Проверка наличия результатов и формирование списка пассажиров
if ($result->num_rows > 0) {
    // Добавление каждого пассажира в массив
    while ($row = $result->fetch_assoc()) {
        $aeroportStaff = array(
            'id_as' => $row['id_as'],
            'fullname' => $row['fullname']
        );
        array_push($aeroportStaffs, $aeroportStaff);
    }
}

// Закрытие соединения с базой данных
$conn->close();

// Возвращаем список пассажиров в формате JSON
echo json_encode($aeroportStaffs);
?>
