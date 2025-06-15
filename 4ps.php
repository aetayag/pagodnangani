<?php
include 'db.conn.php';
$four_psQuery = "SELECT COUNT(*) as total FROM residents WHERE four_ps = 'Yes'";
$four_psCount = $conn->query($four_psQuery)->fetch_assoc()['total'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master List of 4Ps</title>
    <style>
        /* Your existing CSS here */

            body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }
    .header {
        display: flex;
        align-items: center;
        background-color: #c00000;
        color: white;
        padding: 20px 40px;
    }
    .header .logo {
        height: 60px;
        width: 60px;
        margin-right: 15px;
        border-radius: 50%;
        object-fit: cover;
    }
    .header h1 {
        font-size: 2em;
        font-weight: bold;
        font-style: italic;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .subheader {
        text-align: center;
        padding: 20px;
        position: relative;
    }
    .subheader h2 {
        margin: 0;
        font-weight: bold;
        color: #333;
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
    .statistics {
        margin: 0 20px 20px 20px;
        font-weight: bold;
        text-align: left;
    }
    table {
        width: calc(100% - 40px);
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    thead tr {
        background-color: #f2f2f2;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    th {
        font-weight: bold;
    }
    tbody tr.alt {
        background-color: #f9f9f9;
    }
    tbody tr:hover {
        background-color: #f1f1f1;
    }

    </style>
</head>
<body>
    <div class="header">
        <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
        <h1>SANGUNIANG BARANGAY II - F</h1>
    </div>

    <div class="subheader">
        <h2>MASTER LIST OF 4Ps<br>BARANGAY II - F</h2>
        <a href="data.xlsx" download="MasterList4Ps_BarangayII-F.xlsx" class="backup-button">
            <i class="fas fa-file-download"></i> Back Up File
        </a>
    </div>

    <div class="statistics">
        <p>Total 4Ps Members: <?= $four_psCount ?></p>
    </div>

    <table id="fourpsTable">
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
            <!-- Data will be injected here -->
        </tbody>
    </table>

    <script>
        fetch('4ps_process.php')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#fourpsTable tbody');
                tbody.innerHTML = '';

                data.forEach((row, index) => {
                    const tr = document.createElement('tr');
                    if (index % 2 === 1) tr.classList.add('alt');
                    tr.innerHTML = `
                        <td>${row.fourps_id}</td>
                        <td>${row.fullname}</td>
                        <td>${row.dob}</td>
                        <td>${row.pob}</td>
                        <td>${row.sex}</td>
                        <td>${row.civil_status}</td>
                        <td>${row.contact_number}</td>
                    `;
                    tbody.appendChild(tr);
                });
            })
            .catch(error => {
                console.error('Error fetching 4Ps data:', error);
            });
    </script>
</body>
</html>
