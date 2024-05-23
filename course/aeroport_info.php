<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT aeroport.id_a, aeroport.name, aeroport.city, country.country, aeroport.phone, aeroport.gmail
        FROM aeroport
        INNER JOIN country ON aeroport.country = country.id_country";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Airport Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['city']}</td>
                            <td>{$row['country']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['gmail']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No results found</td></tr>";
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
