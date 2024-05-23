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

        $name_aerostaff = $_POST["deleteAeroportStaff"];
        // Выполняем SQL-запрос для удаления аэропорта с указанным именем
        $sql = "DELETE FROM aeroport_staff WHERE id_as = $name_aerostaff";
        
        if ($conn->query($sql) === TRUE) {
            echo "Aeroport staff'$name_aerostaff' has been deleted successfully!";
        } else {
            echo "Error deleting aeroport: " . $conn->error;
        }

// Закрытие соединения с базой данных
$conn->close();
?>
