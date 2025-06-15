<?php
include 'db.conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Book</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            display: flex;
            align-items: center;
            background-color: #d32f2f;
            color: white;
            padding: 15px 20px;
        }

        .logo {
            height: 70px;
            margin-right: 15px;
        }

        .header-title {
            font-size: 26px;
            font-weight: bold;
        }

        .sub-header {
            text-align: center;
            margin: 20px 0;
            font-size: 22px;
            font-weight: bold;
        }

        table {
            width: 95%;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 16px;
        }

        thead {
            background-color: #ddd;
            font-weight: bold;
        }

        .button_add {
            display: inline-block;
            padding: 12px 24px;
            background-color: #1976d2;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }

        .button_add:hover {
            background-color: #1565c0;
        }

        .input-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin: 20px 0;
        }

        .input-row input {
            padding: 10px;
            width: 180px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .input-row button {
            padding: 10px 20px;
            font-size: 14px;
        }

        .action-icons img {
            margin: 0 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
            <h1 class="header-title">SANGGUNIANG BARANGAY II-F</h1>
        </header>
    </div>

    <div class="sub-header">
        <h2>Log Book</h2>
    </div>

    <!-- Input Form -->
    <form method="POST" action="logbook_process.php">
        <div class="input-row">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="position" placeholder="Position" required>
            <input type="text" name="day" placeholder="Day" required>
            <input type="text" name="time_in" placeholder="Time In" required>
            <input type="text" name="time_out" placeholder="Time Out" required>
            <input type="text" name="log_by" placeholder="Log By" required>
            <button class="button_add" type="submit" name="save">Add Entry ⊕</button>
        </div>
    </form>

    <!-- Table -->
    <table id="citizenTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Position</th>
                <th>Day</th>
                <th>Time-In</th>
                <th>Time-Out</th>
                <th>Log By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM logbook ORDER BY id DESC";
            $result = mysqli_query($conn, $sql);
            $num = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$num}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['position']}</td>
                        <td>{$row['day']}</td>
                        <td>{$row['time_in']}</td>
                        <td>{$row['time_out']}</td>
                        <td>{$row['log_by']}</td>
                        <td class='action-icons'>
                            <a href='duty_logbook.php?edit_id={$row['id']}'>
                                <img src='edit.jpg' alt='Edit' width='20' height='20'>
                            </a>
                            <a href='duty_logbook.php?delete_id={$row['id']}' onclick=\"return confirm('Delete this entry?')\">
                                <img src='delete.jpg' alt='Delete' width='20' height='20'>
                            </a>
                        </td>
                    </tr>";
                $num++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
