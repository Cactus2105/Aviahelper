<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT company_staff.id_cs, company_staff.name_staff, company_staff.surname_staff, sex.sex, company_pos_list.position, company_staff.salary_staff, company_staff.date_start_staff, company.name_company
        FROM company_staff
        LEFT JOIN sex ON company_staff.sex_staff = sex.id_s
        LEFT JOIN company_pos_list ON company_staff.position_staff = company_pos_list.id_company_pos_list
        LEFT JOIN company ON company_staff.company_staff = company.id_c";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Staff Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="table-container">
    <h1>Company Staff Information</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Sex</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Date Start</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name_staff']}</td>
                            <td>{$row['surname_staff']}</td>
                            <td>{$row['sex']}</td>
                            <td>{$row['position']}</td>
                            <td>{$row['salary_staff']}</td>
                            <td>{$row['date_start_staff']}</td>
                            <td>{$row['name_company']}</td>
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
