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

// Запрос для извлечения списка полов
$sql = "SELECT id_c, name_country FROM company";
$result = $conn->query($sql);

$companies = array();

// Проверка наличия результатов и формирование списка полов
if ($result->num_rows > 0) {
  // Добавление каждого пола в массив
  while($row = $result->fetch_assoc()) {
    $name = array(
      'id_c' => $row['id_c'],
      'name_country' => $row['name_country']
    );
    array_push($companies, $name_company);
  }
}

// Закрытие соединения с базой данных
$conn->close();

// Возвращаем список полов в формате JSON
echo json_encode($aeroports);
?>
