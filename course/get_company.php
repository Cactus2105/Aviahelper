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

// Запрос для извлечения списка компаний
$sql = "SELECT id_c, name_company FROM company";
$result = $conn->query($sql);

$companies = array();

// Проверка наличия результатов и формирование списка компаний
if ($result->num_rows > 0) {
  // Добавление каждой компании в массив
  while($row = $result->fetch_assoc()) {
    $company = array(
      'id_c' => $row['id_c'],
      'name_company' => $row['name_company']
    );
    array_push($companies, $company);
  }
}

// Закрытие соединения с базой данных
$conn->close();

// Возвращаем список компаний в формате JSON
echo json_encode($companies);
?>
