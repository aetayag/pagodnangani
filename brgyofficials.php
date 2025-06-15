



<?php
include 'db.conn.php';

// Define the valid statuses to filter
$statuses = ['Appointed Officials', 'Elected Officials', 'Brgy Worker'];

// Function to fetch from officials table based on status
function fetchOfficialsByStatus($conn, $status) {
    $stmt = $conn->prepare("SELECT id, name, position, contact, dob, sex, status FROM officials WHERE status = ?");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Insert into brgyofficials table only if not already existing
function insertIntoBrgyOfficials($conn, $official) {
    $check = $conn->prepare("SELECT id FROM brgyofficials WHERE id = ?");
    $check->bind_param("i", $official['id']);
    $check->execute();
    $check_result = $check->get_result();

    if ($check_result->num_rows === 0) {
        $stmt = $conn->prepare("INSERT INTO brgyofficials (id, name, position, contact, dob, sex, status, created_at, updated_at)
                                VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("issssss",
            $official['id'],
            $official['name'],
            $official['position'],
            $official['contact'],
            $official['dob'],
            $official['sex'],
            $official['status']
        );
        $stmt->execute();
        $stmt->close();
    }
    $check->close();
}

// Store all fetched data
$officials_by_status = [];

foreach ($statuses as $status) {
    $officials = fetchOfficialsByStatus($conn, $status);
    foreach ($officials as $official) {
        insertIntoBrgyOfficials($conn, $official);
    }
    $officials_by_status[$status] = $officials;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sangguniang Barangay II-F Officials</title>
    <style>
 body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
        }
        header {
            background-color: #d32f2f;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        header img {
            position: absolute;
            left: 20px;
            top: 10px;
            height: 60px;
        }
        .container {
            padding: 30px;
        }
        h2, h3 {
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #efefef;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            color: #d32f2f;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
            <h1 class="header-title">Sanguniang Barangay II-F</h1>
            <div class="spacer"></div>
        </header>
    </div>

<?php foreach ($statuses as $status): ?>
    <h2><?= htmlspecialchars($status) ?></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Contact</th>
                <th>Date of Birth</th>
                <th>Sex</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($officials_by_status[$status])): ?>
                <tr><td colspan="7">No <?= htmlspecialchars($status) ?> found.</td></tr>
            <?php else: ?>
                <?php foreach ($officials_by_status[$status] as $official): ?>
                    <tr>
                        <td><?= htmlspecialchars($official['id']) ?></td>
                        <td><?= htmlspecialchars($official['name']) ?></td>
                        <td><?= htmlspecialchars($official['position']) ?></td>
                        <td><?= htmlspecialchars($official['contact']) ?></td>
                        <td><?= htmlspecialchars($official['dob']) ?></td>
                        <td><?= htmlspecialchars($official['sex']) ?></td>
                        <td><?= htmlspecialchars($official['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endforeach; ?>

</body>
</html>
