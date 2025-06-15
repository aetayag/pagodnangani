<?php
include 'db.conn.php';
header('Content-Type: application/json');

$sql = "
    SELECT 
        id AS fourps_id,
        fullname,
        dob,
        pob,
        sex,
        civil_status,
        contact_number
    FROM residents
    WHERE four_ps = 'Yes'
    ORDER BY id ASC
";

$result = $conn->query($sql);
$data = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
