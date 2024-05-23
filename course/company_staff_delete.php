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

        $name_staff = $_POST["deleteCompanyStaff"];
        // Выполняем SQL-запрос для удаления аэропорта с указанным именем
        $sql = "DELETE FROM company_staff WHERE id_cs = $name_staff";
        
        if ($conn->query($sql) === TRUE) {
            echo "Company staff'$name_staff' has been deleted successfully!";
        } else {
            echo "Error deleting company staff: " . $conn->error;
        }

// Закрытие соединения с базой данных
$conn->close();
?>
