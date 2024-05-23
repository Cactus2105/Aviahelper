<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT aeroport_staff.id_as, 
               aeroport_staff.name_aerostaff, 
               aeroport_staff.surname, 
               sex.sex, 
               airport_pos_list.position, 
               aeroport_staff.salary, 
               aeroport_staff.date_start, 
               aeroport.name AS aeroport_name
        FROM aeroport_staff
        LEFT JOIN sex ON aeroport_staff.sex = sex.id_s
        LEFT JOIN airport_pos_list ON aeroport_staff.position = airport_pos_list.id_airport_pos_list
        LEFT JOIN aeroport ON aeroport_staff.aeroport = aeroport.id_a";


$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Staff Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Airport Staff Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Sex</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Start Date</th>
                <th>Airport</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name_aerostaff']}</td>
                            <td>{$row['surname']}</td>
                            <td>{$row['sex']}</td>
                            <td>{$row['position']}</td>
                            <td>{$row['salary']}</td>
                            <td>{$row['date_start']}</td>
                            <td>{$row['aeroport_name']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
