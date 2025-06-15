<?php
session_start();
include 'db.conn.php';

// Redirect if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: inbox.php");
    exit();
}

$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin_account WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SANGUNIANG BARANGAY II - F</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

 .side-panel {
      width: 200px; /* Adjust width as needed */
      background-color: #efefef;
      border-right: 1px solid #ccc;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .side-panel a {
      text-decoration: none;
      color: #333;
      padding: 10px;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .side-panel a:hover {
      background:rgb(47, 66, 211);
      color: white;
    }


    .toggle-btn {
      position: absolute;
      top: 10px;
      right: -15px;
      width: 30px;
      height: 30px;
      background-color: #d32f2f;
      color: white;
      border-radius: 50%;
      text-align: center;
      line-height: 30px;
      cursor: pointer;
      font-weight: bold;
    }

    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      background-color: #fff;
      transition: margin-left 0.3s;
    }

    .header {
      background-color: #d32f2f;
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 28px;
    }

    .header img {
      height: 60px;
      margin-right: 15px;
    }

    .content-wrapper {
      display: flex;
      flex: 1;
    }

    .table-section {
      flex: 2;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      box-shadow: 0 2px 4px rgba(206, 196, 196, 0.63);
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #f5f5f5;
    }

    tr {
      border-bottom: 1px solid #ddd;
    }

    tr:last-child {
      border-bottom: none;
    }

    td small {
      display: block;
      color: #666;
    }

    .actions {
      display: flex;
      gap: 10px;
    }

    .actions input[type="checkbox"] {
      transform: scale(1.2);
    }

    .actions .delete {
      cursor: pointer;
    }

    .profile-panel {
      width: 280px;
      background-color: #eee;
      padding: 20px;
      border-left: 1px solid #ccc;
    }

    .profile-pic {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-pic div {
      font-size: 60px;
      margin-bottom: 10px;
    }

    .profile-pic h2 {
      font-size: 20px;
      margin-bottom: 5px;
    }

    .profile-pic span {
      font-size: 14px;
      color: gray;
    }

    .profile-details {
      margin-top: 30px;
    }

    .profile-details h3 {
      margin-bottom: 10px;
    }

    .profile-details input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: none;
      border-bottom: 1px solid #aaa;
      background: transparent;
    }

    .add-user {
      display: flex;
      align-items: center;
      gap: 5px;
      margin-top: 10px;
      font-weight: bold;
      cursor: pointer;
    }

    .logout {
      margin-top: 40px;
      color: #333;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>
      <div class="side-panel">
            <a href="admin_management.php">Dashboard</a>
            <a href="inbox.php">Inbox</a>
            <a href="request_history.php">Request History</a>

    </div>

  <div class="main-content" id="main">
    <div class="header">
      <img src="brgy2F.jpg" alt="Logo" />
      SANGUNIANG BARANGAY II - F
    </div>

    <div class="content-wrapper">
      <div class="table-section">
        <table>
          <thead>
            <tr>
              <th>Requesting</th>
              <th>Date Request</th>
              <th>Purpose</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <strong>#GS-2245</strong><br/>
                <small>Tebang Repers</small>
              </td>
              <td>
                Sunday, Oct 24, 2020<br/>
                <small>08:29 AM</small>
              </td>
              <td>
                Update on Profile of<br/>
                <small>Arvin Esteron</small>
              </td>
              <td>Pending</td>
              <td class="actions">
                <input type="checkbox" />
                <span class="delete">🗑️</span>
              </td>
            </tr>
            <tr>
              <td>
                <strong>#GS-2245</strong><br/>
                <small>Tebang Repers</small>
              </td>
              <td>
                Sunday, Oct 24, 2020<br/>
                <small>08:50 AM</small>
              </td>
              <td>
                Register<br/>
                <small>Aaron Esteron</small>
              </td>
              <td>Pending</td>
              <td class="actions">
                <input type="checkbox" />
                <span class="delete">🗑️</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="profile-panel">
        <div class="profile-pic">
          <div>👤</div>
          <h2>Ae</h2>
          <span>Admin</span><br/>
          <small>Edit Profile</small>
        </div>
        <div class="profile-details">
          <h3>Profile Details:</h3>
<input type="text" value="<?= htmlspecialchars($admin['fullname']) ?>" readonly />
<input type="email" value="<?= htmlspecialchars($admin['email']) ?>" readonly />
<input type="text" value="<?= htmlspecialchars($admin['contact_number']) ?>" readonly />

          <div class="add-user">Add User ➕</div>
          <div class="logout">Log out</div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('collapsed');
    }
  </script>
</body>
</html>
