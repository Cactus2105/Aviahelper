<?php
// Подключение к базе данных (замените параметры подключения на ваши)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Запрос к базе данных
$sql = "SELECT plane.id_plane, name_plane, model.model, plane.date, company.name_company AS company_name
        FROM plane
        LEFT JOIN company ON plane.company = company.id_c
        LEFT JOIN model ON plane.model = model.id_model";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Planes Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Date</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Вывод данных каждой строки
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name_plane']}</td>
                            <td>{$row['model']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['company_name']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
// Закрытие соединения
$conn->close();
?>
