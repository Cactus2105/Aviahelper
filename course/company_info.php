<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT company.id_c, company.name_company, company.date_company, company.country_company, company.phone_company, company.gmail_company 
FROM company 
INNER JOIN country ON company.country_company = country.id_country
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Companies Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Gmail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name_company']}</td>
                            <td>{$row['date_company']}</td>
                            <td>{$row['country_company']}</td>
                            <td>{$row['phone_company']}</td>
                            <td>{$row['gmail_company']}</td>
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
