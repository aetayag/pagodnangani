<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monitoring_system"; // your one and only database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query your tables
$result_residents = $conn->query("SELECT * FROM residents");
$result_admin = $conn->query("SELECT * FROM admin_account");
$result_logbook = $conn->query("SELECT * FROM logbook");

// Optional: check if queries succeeded
if (!$result_residents) {
    die("Query failed (residents): " . $conn->error);
}
if (!$result_admin) {
    die("Query failed (admin_account): " . $conn->error);
}
if (!$result_logbook) {
    die("Query failed (logbook): " . $conn->error);
}



// Total population
$total_population = 0;
$result = $conn->query("SELECT COUNT(*) AS total FROM residents");
if ($result) {
    $row = $result->fetch_assoc();
    $total_population = $row['total'];
    $result->free();
} else {
    die("Query failed (total_population): " . $conn->error);
}

// Total voters (voters = 'Yes')
$total_voters = 0;
$result = $conn->query("SELECT COUNT(*) AS voters FROM residents WHERE voters = 'Yes'");
if ($result) {
    $row = $result->fetch_assoc();
    $total_voters = $row['voters'];
    $result->free();
} else {
    die("Query failed (total_voters): " . $conn->error);
}

// Total non-voters (voters = 'No')
$total_non_voters = 0;
$result = $conn->query("SELECT COUNT(*) AS non_voters FROM residents WHERE voters = 'No'");
if ($result) {
    $row = $result->fetch_assoc();
    $total_non_voters = $row['non_voters'];
    $result->free();
} else {
    die("Query failed (total_non_voters): " . $conn->error);
}

// Male count
$male_count = 0;
$result = $conn->query("SELECT COUNT(*) AS male FROM residents WHERE sex = 'Male'");
if ($result) {
    $row = $result->fetch_assoc();
    $male_count = $row['male'];
    $result->free();
} else {
    die("Query failed (male_count): " . $conn->error);
}

// Female count
$female_count = 0;
$result = $conn->query("SELECT COUNT(*) AS female FROM residents WHERE sex = 'Female'");
if ($result) {
    $row = $result->fetch_assoc();
    $female_count = $row['female'];
    $result->free();
} else {
    die("Query failed (female_count): " . $conn->error);
}

// Civil status counts
$civil_status_counts = [];
$result = $conn->query("SELECT civil_status, COUNT(*) AS count FROM residents GROUP BY civil_status");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $civil_status_counts[$row['civil_status']] = $row['count'];
    }
    $result->free();
} else {
    die("Query failed (civil_status_counts): " . $conn->error);
}

// Total households (unique house_no and purok)
// Count residents
$homeowner_count = 0;
$result = $conn->query("SELECT COUNT(*) AS homeowner FROM residents WHERE resident_type = 'homeowner'");
if ($result) {
    $row = $result->fetch_assoc();
    $resident_count = $row['homeowner'];
    $result->free();
} else {
    die("Query failed (homeowner_count): " . $conn->error);
}

// Count renters
$renters_count = 0;
$result = $conn->query("SELECT COUNT(*) AS renters FROM residents WHERE resident_type = 'renter'");
if ($result) {
    $row = $result->fetch_assoc();
    $renters_count = $row['renters'];
    $result->free();
} else {
    die("Query failed (renters_count): " . $conn->error);
}

?>

