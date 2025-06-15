<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master List of Voters - Barangay II-F</title>
    <!-- Link to the external CSS file -->
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<style>/* Import a Google Font */
@import url('https://fonts.googleapis.com/css2?family=Arial&display=swap');

/* --- Global Styles & Variables --- */
:root {
    --primary-color: #d9534f;
    --dark-color: #000000;
    --light-color: #fff;
    --text-color: #333;
    --border-color: #000000;
    --bg-color: #f4f4f4;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: var(--bg-color);
    color: var(--text-color);
}

.container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

/* --- Header --- */
header {
    background-color: var(--primary-color);
    color: var(--light-color);
    padding: 1rem 0;
}

.header-content {
    display: flex;
    align-items: center;
}

.barangay-seal {
    height: 50px;
    width: 50px;
    margin-right: 15px;
}

header h1 {
    font-size: 1.75rem;
    font-weight: bold;
}

/* --- Main Content --- */
main {
    padding: 2rem 20px;
}

.voters-list-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding: 0 1rem;
}

.voters-list-header h2 {
    color: var(--dark-color);
    font-weight: bold;
    text-align: center;
    line-height: 1.4;
    font-size: 1.4rem;
    flex-grow: 1; /* Allows the title to take up space and stay centered */
}

.backup-btn {
    background-color: #e0e0e0;
    color: var(--dark-color);
    border: 1px solid #b0b0b0;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.3s;
}

.backup-btn:hover {
    background-color: #d0d0d0;
}

/* --- Table Styling --- */
.table-container {
    background: var(--light-color);
    padding: 1px; /* Creates the outer border effect */
    border: 1px solid var(--border-color);
    width: 100%;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid var(--border-color);
    padding: 12px;
    text-align: left;
}

thead {
    background-color: #f2f2f2;
}

th {
    font-weight: bold;
    color: var(--dark-color);
    text-align: center;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

/* Use non-breaking space for empty cells to ensure they render with height */
td:empty::after {
    content: '\00a0';
}
</style>
<body>

    <!-- Header Section -->
    <header>
        <div class="container header-content">
            <img src="brgy2F.jpg" alt="Barangay Seal" class="barangay-seal">
            <h1>SANGGUNIANG BARANGAY II - F</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <div class="voters-list-header">
            <h2>MASTER LIST OF VOTERS<br>BARANGAY II-F</h2>
            <button class="backup-btn">
                <i class="fa-solid fa-file-arrow-up"></i> Back Up File
            </button>
        </div>

        <!-- Voters Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Place of Birth</th>
                        <th>Sex</th>
                        <th>Civil Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- This is sample row data. You would generate these rows dynamically in a real application. -->
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                     <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
