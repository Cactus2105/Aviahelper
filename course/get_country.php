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

// Запрос для извлечения списка стран
$sql = "SELECT id_country, country FROM country";
$result = $conn->query($sql);

$countries = array();

// Проверка наличия результатов и формирование списка стран
if ($result->num_rows > 0) {
  // Добавление каждой страны в массив
  while($row = $result->fetch_assoc()) {
    $country = array(
      'id_country' => $row['id_country'],
      'country' => $row['country']
    );
    array_push($countries, $country);
  }
}

// Закрытие соединения с базой данных
$conn->close();

// Возвращаем список стран в формате JSON
echo json_encode($countries);
?>
