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
$sql = "SELECT passanger.id_p, 
               passanger.surname_passanger, 
               passanger.name_passanger, 
               passanger.patronymic_passanger, 
               CASE 
                 WHEN passanger.patronymic_passanger = '-' THEN CONCAT(passanger.surname_passanger, ' ', passanger.name_passanger)
                 ELSE CONCAT(passanger.surname_passanger, ' ', passanger.name_passanger, ' ', passanger.patronymic_passanger)
               END AS full_name,
               sex.sex, 
               passanger.dob, 
               country.country
        FROM passanger
        LEFT JOIN sex ON passanger.sex_passanger = sex.id_s
        LEFT JOIN country ON passanger.country_passanger = country.id_country";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Passenger Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Вывод данных каждой строки
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['full_name']}</td>
                            <td>{$row['sex']}</td>
                            <td>{$row['dob']}</td>
                            <td>{$row['country']}</td>
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
