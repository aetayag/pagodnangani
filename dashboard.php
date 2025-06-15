<?php
include 'db.conn.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Instead of try-catch (MySQLi doesn't throw exceptions by default)
// you check for errors manually

// Total population
$result = $conn->query("SELECT COUNT(*) AS total FROM residents");
if (!$result) { die("Query failed: " . $conn->error); }
$total_population = $result->fetch_assoc()['total'];
$result->free();

// Total voters
$result = $conn->query("SELECT COUNT(*) AS voters FROM residents WHERE voters = 'Yes'");
if (!$result) { die("Query failed: " . $conn->error); }
$total_voters = $result->fetch_assoc()['voters'];
$result->free();

// Total non-voters
$result = $conn->query("SELECT COUNT(*) AS non_voters FROM residents WHERE voters = 'No'");
if (!$result) { die("Query failed: " . $conn->error); }
$total_non_voters = $result->fetch_assoc()['non_voters'];
$result->free();

// Male count
$result = $conn->query("SELECT COUNT(*) AS male FROM residents WHERE sex = 'Male'");
if (!$result) { die("Query failed: " . $conn->error); }
$male_count = $result->fetch_assoc()['male'];
$result->free();

// Female count
$result = $conn->query("SELECT COUNT(*) AS female FROM residents WHERE sex = 'Female'");
if (!$result) { die("Query failed: " . $conn->error); }
$female_count = $result->fetch_assoc()['female'];
$result->free();

// Civil status counts
$result = $conn->query("SELECT civil_status, COUNT(*) AS count FROM residents GROUP BY civil_status");
if (!$result) { die("Query failed: " . $conn->error); }
$civil_status_counts = [];
while ($row = $result->fetch_assoc()) {
    $civil_status_counts[$row['civil_status']] = $row['count'];
}
$result->free();

// Total households
$result = $conn->query("SELECT COUNT(DISTINCT CONCAT(house_no, '-', purok)) AS households FROM residents");
if (!$result) { die("Query failed: " . $conn->error); }
$total_households = $result->fetch_assoc()['households'];
$result->free();

// Output JSON
echo json_encode([
    'total_population' => $total_population,
    'total_voters' => $total_voters,
    'total_non_voters' => $total_non_voters,
    'male' => $male_count,
    'female' => $female_count,
    'civil_status' => $civil_status_counts,
    'total_households' => $total_households
]);
?>
