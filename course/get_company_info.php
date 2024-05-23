<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aviahelper";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
    company_staff.id_cs,  
    CONCAT(sex.sex, ' ', company_pos_list.position, ' ', company_staff.salary_staff, ' ', company_staff.date_start_staff, ' ', company.name_company) AS staff_info
FROM 
    company_staff
LEFT JOIN 
    sex ON company_staff.sex_staff = sex.id_s
LEFT JOIN 
    company_pos_list ON company_staff.position_staff = company_pos_list.id_company_pos_list
LEFT JOIN 
    company ON company_staff.company_staff = company.id_c

";
$result = $conn->query($sql);

$companyStaffsInfo = array(); 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companyStaffInfo = array(
            'id_cs' => $row['id_cs'],
            'fullname' => $row['fullname']
        );
        array_push($companyStaffsInfo, $companyStaffInfo);
    }
}

$conn->close();

echo json_encode($companyStaffsInfo);
?>
