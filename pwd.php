<?php
include 'db.conn.php';

// ✅ Statistics Counts
$pwdCountQuery = "SELECT COUNT(*) as total FROM residents WHERE pwd = 'Yes'";
$pwdCount = $conn->query($pwdCountQuery)->fetch_assoc()['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master List of 4ps</title>
</head>
<style> body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Header Styles */
.header {
    display: flex;
    align-items: center;
    background-color: #c00000; /* A strong red color */
    color: white;
    padding: 20px 40px;
}

.header .logo {
    height: 60px;
  width: 60px; /* Ensure it's square */
  margin-right: 15px;
  border-radius: 50%; /* Makes it round */
  object-fit: cover;  /* Ensures image fills the circle nicely */
}

.header h1 {
  font-size: 2em;
  color: white;
  font-weight: bold;
  font-style: italic;
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* Subheader Styles */
.subheader {
    text-align: center;
    padding: 20px;
    position: relative; /* Needed for positioning the button */
}

.subheader h2 {
    margin: 0;
    font-weight: bold;
    color: #333;
    text-align: center;
}

.backup-button {
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
    background-color: #e7e6e6;
    color: #333;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
}

.backup-button i {
    margin-right: 5px;
}

.backup-button:hover {
    background-color: #dcdcdc;
}

/* Statistics Section */
.statistics {
    margin: 0 20px 20px 20px;
    font-weight: bold;
    text-align: left;
}

/* Table Styles */
table {
    width: calc(100% - 40px); /* Full width with some margin */
    margin: 0 auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

thead tr {
    background-color: #f2f2f2; /* Light grey for header */
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    font-weight: bold;
}

/* Alternating Row Color */
tbody tr.alt {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}


</style>
<body>
    <div class="header">
        <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
        <h1>SANGUNIANG BARANGAY II - F</h1>
    </div>

    <div class="subheader">
        <h2>MASTER LIST OF 4ps<br>BARANGAY II - F</h2>
  <a href="data.xlsx" download="MasterList4ps_BarangayII-F.xlsx" class="backup-button" title="Download Excel Backup File">
    <i class="fas fa-file-download"></i> Back Up File
</a>
    </div>

    <div class="statistics" style="margin: 0 20px 20px 20px; font-weight: bold;">
        <p>Total PWD: <?= $pwdCount ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Place of Birth</th>
                <th>Sex</th>
                <th>Civil Status</th>
                <th>Contact Number</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // ✅ Main Table Data Fetch for 4ps only
        $sql = "SELECT pwd_id, fullname, dob, pob, sex, civil_status, contact_number FROM residents WHERE pwd= 'Yes' ORDER BY id ASC";
        $result = $conn->query($sql);
        $row_count = 0;

        while ($row = $result->fetch_assoc()):
            $alt = ($row_count % 2 == 1) ? 'class="alt"' : '';
        ?>
            <tr <?= $alt ?>>
                <td><?= htmlspecialchars($row['pwd_id']) ?></td>
                <td><?= htmlspecialchars($row['fullname']) ?></td>
                <td><?= htmlspecialchars($row['dob']) ?></td>
                <td><?= htmlspecialchars($row['pob']) ?></td>
                <td><?= htmlspecialchars($row['sex']) ?></td>
                <td><?= htmlspecialchars($row['civil_status']) ?></td>
                <td><?= htmlspecialchars($row['contact_number']) ?></td>
            </tr>
        <?php
            $row_count++;
        endwhile;
        ?>
        </tbody>
    </table>
</body>
</html>