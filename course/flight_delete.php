<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root"; // Замените на ваше имя пользователя
$password = ""; // Замените на ваш пароль
$dbname = "aviahelper"; // Замените на имя вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

        $number_flight = $_POST["deleteFlight"];
echo 'number_flight: ' .$number_flight. 'ALALLALA';
        // Выполняем SQL-запрос для удаления аэропорта с указанным именем
        $sql = "DELETE FROM plane WHERE number_fligh = $number_flight";
        
        if ($conn->query($sql) === TRUE) {
            echo "Plane '$number_flight' has been deleted successfully!";
        } else {
            echo "Error deleting flight: " . $conn->error;
        }

// Закрытие соединения с базой данных
$conn->close();
?>
