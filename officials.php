<?php
include 'db.conn.php';

// Check for edit mode
$edit_data = null;
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $edit_result = mysqli_query($conn, "SELECT * FROM officials WHERE id = $edit_id");
    $edit_data = mysqli_fetch_assoc($edit_result);
}

// Get all officials
$result = mysqli_query($conn, "SELECT * FROM officials ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sangguniang Barangay II-F</title>
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background: #f4f4f4; margin: 0; 
        }
        header {
        display: flex; 
        align-items: center; 
        background: #d32f2f; color: #fff; padding: 15px 20px; 
        }

        .logo {
        height: 70px; margin-right: 15px; 
        }
        .header-title { 
        font-size: 30px; 
        font-weight: bold; 
        align-items: center;
        }
        .sub-header { 
        text-align: center; 
        margin: 20px 0; 
        font-size: 22px; 
        font-weight: bold; 
        }
        form, table { 
        width: 90%; margin: 0 auto; 
        background: white; 
        padding: 20px; 
        border-radius: 8px;
        }
        input, select, button { 
        padding: 10px; width: 100%; 
        }
        table { 
        border-collapse: collapse; 
        margin-top: 20px; 
        }
        th, td { 
        padding: 10px; 
        border: 1px solid #ccc; 
        text-align: center; 
        }
        th { 
        background: #888; 
        color: white; 
        }
        .form-row { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr); 
        gap: 10px; 
        margin-bottom: 20px; }

        /* Schedule popup styles */
        .schedule-container { position: relative; }
        .schedule-popup {
            display: none;
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 500px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            z-index: 10;
            top: 45px;
        }

        .schedule-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr auto;
            gap: 10px;
            margin-bottom: 8px;
        }

        .btn-add-row {
            margin-top: 10px;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            text-align: right;
        }

        .btn-remove {
            background: #e53935;
            color: white;
            border: none;
            padding: 5px 8px;
            cursor: pointer;
            border-radius: 4px;
        }

        .save-button {
            background: #d32f2f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            float: right;
        }
    </style>
</head>
<body>

<header>
    <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
    <h1 class="header-title">Sangguniang Barangay II-F</h1>
</header>

<h2 class="sub-header"><?= $edit_data ? 'Edit Official' : 'Add New Official' ?></h2>

<form method="POST" action="register.php">
    <?php if ($edit_data): ?>
        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
    <?php endif; ?>

    <div class="form-row">
        <input type="text" name="id" placeholder="ID" value="<?= $edit_data['id'] ?? '' ?>" required>
        <input type="text" name="name" placeholder="Name" value="<?= $edit_data['name'] ?? '' ?>" required>
        <input type="text" name="position" placeholder="Position" value="<?= $edit_data['position'] ?? '' ?>" required>
    </div>

    <div class="form-row">
        <input type="text" name="contact" placeholder="Contact" value="<?= $edit_data['contact'] ?? '' ?>" required>
        <input type="date" name="dob" placeholder="Date of Birth" value="<?= $edit_data['dob'] ?? '' ?>" required>
        <select name="sex" required>
            <option value="" disabled <?= empty($edit_data['sex']) ? 'selected' : '' ?>>Select Sex</option>
            <option value="Male" <?= (isset($edit_data['sex']) && $edit_data['sex'] == 'Male') ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= (isset($edit_data['sex']) && $edit_data['sex'] == 'Female') ? 'selected' : '' ?>>Female</option>
        </select>
    </div>

    <div class="form-row">
        <select name="status" required>
            <option value="" disabled <?= empty($edit_data['status']) ? 'selected' : '' ?>>Select Status</option>
            <option value="Elected Officials" <?= (isset($edit_data['status']) && $edit_data['status'] == 'Elected Officials') ? 'selected' : '' ?>>Elected Officials</option>
            <option value="Appointed Officials" <?= (isset($edit_data['status']) && $edit_data['status'] == 'Appointed Officials') ? 'selected' : '' ?>>Appointed Officials</option>
            <option value="Brgy Worker" <?= (isset($edit_data['status']) && $edit_data['status'] == 'Brgy Worker') ? 'selected' : '' ?>>Brgy Worker</option>
        </select>

        <!-- Schedule trigger + popup -->
        <div class="schedule-container">
            <input type="text" id="schedule-trigger" placeholder="Set Schedule" readonly onclick="toggleSchedulePopup()" />
            <div class="schedule-popup" id="schedule-popup">
                <div id="schedule-entries">
                    <div class="schedule-row">

                        
        <select name="Day" required>
            <option value="" disabled <?= empty($edit_data['day']) ? 'selected' : '' ?>>Select Day</option>
            <option value="Monday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Monday') ? 'selected' : '' ?>>Monday</option>
            <option value="Tuesday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Tuesday') ? 'selected' : '' ?>>Tuesday</option>
            <option value="Wednesday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Wednesday') ? 'selected' : '' ?>>Wednesday</option>
            <option value="Thursday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Thursday') ? 'selected' : '' ?>>Thursday</option>
            <option value="Friday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Friday') ? 'selected' : '' ?>>Friday</option>
            <option value="Saturday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Saturday') ? 'selected' : '' ?>>Saturday</option>
            <option value="Sunday" <?= (isset($edit_data['day']) && $edit_data['day'] == 'Sunday') ? 'selected' : '' ?>>Sunday</option> 
        </select>
        
                        <input type="text" name="schedule_time_in[]" placeholder="Time In">
                        <input type="text" name="schedule_time_out[]" placeholder="Time Out">
                        <button type="button" class="btn-remove" onclick="removeRow(this)">❌</button>
                    </div>
                </div>
                <div class="btn-add-row" onclick="addScheduleRow()">Add more ➕</div>
            </div>
        </div>

        <div></div> <!-- spacer column -->
    </div>

    <button type="submit" class="save-button" onclick="return confirm('Save Schedule?')">Save</button>
</form>

<h2 class="sub-header">List of Officials</h2>

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
            <th>Schedule</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['position']) ?></td>
            <td><?= htmlspecialchars($row['contact']) ?></td>
            <td><?= htmlspecialchars($row['dob']) ?></td>
            <td><?= htmlspecialchars($row['sex']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['schedule'])) ?></td>
            <td>
<td>
    <a href="officials.php?edit_id=<?= $row['id'] ?>">
        <img src="edit.jpg" alt="Edit" width="20" height="20">
    </a>
    <a href="officials_process.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('Delete this official?')">
        <img src="delete.jpg" alt="Delete" width="20" height="20">
    </a>
</td>

        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<script>
    function toggleSchedulePopup() {
        const popup = document.getElementById("schedule-popup");
        popup.style.display = popup.style.display === "block" ? "none" : "block";
    }

    function addScheduleRow() {
        const container = document.getElementById("schedule-entries");
        const div = document.createElement("div");
        div.className = "schedule-row";
        div.innerHTML = `
            <input type="text" name="schedule_day[]" placeholder="Day" />
            <input type="text" name="schedule_time_in[]" placeholder="Time In" />
            <input type="text" name="schedule_time_out[]" placeholder="Time Out" />
            <button type="button" class="btn-remove" onclick="removeRow(this)">❌</button>
        `;
        container.appendChild(div);
    }

    function removeRow(btn) {
        btn.parentElement.remove();
    }

    document.addEventListener("click", function(event) {
        const popup = document.getElementById("schedule-popup");
        const trigger = document.getElementById("schedule-trigger");
        if (!popup.contains(event.target) && event.target !== trigger) {
            popup.style.display = "none";
        }
    });
</script>

</body>
</html>
