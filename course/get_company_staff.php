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
$sql = "SELECT id_cs, CONCAT(name_staff, ' ', surname_staff, ' ___ ', salary_staff, '$ ___ ', company.name_company) AS fullname FROM company_staff
LEFT JOIN 
    company ON company_staff.company_staff = company.id_c";
$result = $conn->query($sql);

$companyStaffs = array(); // Массив для хранения данных о пассажирах

// Проверка наличия результатов и формирование списка пассажиров
if ($result->num_rows > 0) {
    // Добавление каждого пассажира в массив
    while ($row = $result->fetch_assoc()) {
        $companyStaff = array(
            'id_cs' => $row['id_cs'],
            'fullname' => $row['fullname']
        );
        array_push($companyStaffs, $companyStaff);
    }
}

// Закрытие соединения с базой данных
$conn->close();

// Возвращаем список пассажиров в формате JSON
echo json_encode($companyStaffs);
?>
