<?php
session_start();
include 'db.conn.php';

// Fetch admin data
$admin_id = $_SESSION['user_id'] ?? null;
$admin_data = [
  'username' => '',
  'first_name' => '',
  'last_name' => '',
  'email' => '',
  'contact_number' => ''
];

if ($admin_id) {
  $stmt = $conn->prepare("SELECT * FROM admin_account WHERE username = ?");
  $stmt->bind_param("s", $admin_id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $admin_data = $result->fetch_assoc();
  }
  $stmt->close();
}

// Population stats
$total_population = $conn->query("SELECT COUNT(*) FROM residents")->fetch_row()[0];
$total_voters = $conn->query("SELECT COUNT(*) FROM residents WHERE voters = 'Yes'")->fetch_row()[0];
$total_non_voters = $conn->query("SELECT COUNT(*) FROM residents WHERE voters = 'No'")->fetch_row()[0];
$total_renters = $conn->query("SELECT COUNT(*) FROM residents WHERE resident_type = 'Renter'")->fetch_row()[0];
$households = $conn->query("SELECT COUNT(DISTINCT house_no) FROM residents")->fetch_row()[0];
$male_count = $conn->query("SELECT COUNT(*) FROM residents WHERE sex = 'Male'")->fetch_row()[0];
$female_count = $conn->query("SELECT COUNT(*) FROM residents WHERE sex = 'Female'")->fetch_row()[0];

// Civil status distribution
$result = $conn->query("SELECT civil_status, COUNT(*) AS count FROM residents GROUP BY civil_status");
$civil_status_counts = [];
while ($row = $result->fetch_assoc()) {
  $civil_status_counts[$row['civil_status']] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Barangay Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
    body { background: #f7f7f7; color: #333; }

    header {
      background-color: #d32f2f;
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
    }

    .logo img { width: 60px; height: 60px; margin-right: 15px; }

    header h1 { font-size: 28px; font-weight: bold; }

    .subtitle { font-size: 18px; text-align: center; color: #666; margin-top: -10px; }

    .main-wrapper {
      display: flex;
      height: 200vh;
      padding: 60px;
      gap: 20px;
      background: #f7f7f7;
    }

    .dashboard-container {
      flex: 3;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px #ccc;
    }

    .cards {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .card {
      background: #e0e0e0;
      padding: 20px;
      text-align: center;
      border-radius: 8px;
      font-size: 24px;
      flex: 1;
    }

    .card span { font-size: 14px; color: #555; }

    .charts {
      display: flex;
      gap: 20px;
      margin-top: 10px;
    }

    .chart {
      background: #ddd;
      padding: 10px;
      flex: 1;
      border-radius: 8px;
      text-align: center;
    }

    .side-panel {
      width: 200px;
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
      background: rgb(47, 66, 211);
      color: white;
    }

    .profile {
      flex: 1;
      background: #efefef;
      padding: 30px;
      border-radius: 8px;
      border-left: 1px solid #ccc;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .user-icon {
      font-size: 50px;
      margin-bottom: 10px;
      text-align: center;
    }

    .profile h3, .role { text-align: center; }
    .role { color: gray; margin-bottom: 10px; }

    .profile-details {
      display: flex;
      flex-direction: column;
      width: 100%;
    }

    .profile-details label {
      margin-top: 10px;
      font-size: 14px;
      font-weight: bold;
      color: #000;
    }

    .profile-details span {
      margin-bottom: 8px;
      font-size: 14px;
      color: #333;
    }

    .add-user {
      margin-top: 15px;
      padding: 8px;
      width: 100%;
      background-color: #d32f2f;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .logout {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #d32f2f;
      text-decoration: none;
    }

    canvas {
      width: 100% !important;
      height: 180px !important;
      max-height: 180px;
    }
  </style>
</head>

<body>
  <header>
    <div class="logo"><img src="brgy2F.jpg" alt="Barangay Logo"></div>
    <h1>SANGUNIANG BARANGAY II - F</h1>
  </header>

  <main class="main-wrapper">
    <section class="dashboard-summary">
      <h2>BARANGAY DASHBOARD</h2>
      <p class="subtitle">As of This Month</p>

      <div class="side-panel">
        <a href="inbox.php">Inbox</a>
        <a href="request_history.php">Request History</a>
      </div>

      <section class="dashboard-container">
        <div class="cards">
          <div class="card"><?= $total_population ?><br><span>Total Population</span></div>
          <div class="card"><?= $total_voters ?><br><span>Registered Voters</span></div>
          <div class="card"><?= $total_renters ?><br><span>Renters</span></div>
          <div class="card"><?= $total_non_voters ?><br><span>Non Voters</span></div>
          <div class="card"><?= $households ?><br><span>Total Households</span></div>
        </div>

        <section class="charts">
          <div class="chart">
            <h3>Marital Status</h3>
            <canvas id="maritalChart"></canvas>
          </div>
          <div class="chart">
            <h3>Voters Participation</h3>
            <canvas id="voterChart"></canvas>
          </div>
          <div class="chart">
            <h3>Gender Distribution</h3>
            <canvas id="genderChart"></canvas>
          </div>
        </section>
      </section>
    </section>

    <div class="profile">
      <div class="user-icon">👤</div>
      <h3><?= htmlspecialchars($admin_data['username']) ?></h3>
      <p class="role">Admin</p>
      <a href="#">Edit Profile</a>

      <div class="profile-details">
        <label>Full Name</label>
        <span><?= htmlspecialchars($admin_data['first_name'] . ' ' . $admin_data['last_name']) ?></span>

        <label>Email Address</label>
        <span><?= htmlspecialchars($admin_data['email']) ?></span>

        <label>Contact Number</label>
        <span><?= htmlspecialchars($admin_data['contact_number']) ?></span>
      </div>

      <button class="add-user">Add User ➕</button>
      <a href="logout.php" class="logout">Log out</a>
    </div>
  </main>

  <script>
    const chartData = {
      voters: {
        yes: <?= $total_voters ?>,
        no: <?= $total_non_voters ?>
      },
      gender: {
        male: <?= $male_count ?>,
        female: <?= $female_count ?>
      },
      civil_status: <?= json_encode($civil_status_counts) ?>
    };
  </script>

  <script>
    new Chart(document.getElementById("voterChart"), {
      type: 'bar',
      data: {
        labels: ['Voters', 'Non Voters'],
        datasets: [{
          label: 'Population',
          data: [chartData.voters.yes, chartData.voters.no],
          backgroundColor: ['#4caf50', '#f44336']
        }]
      },
      options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    new Chart(document.getElementById("genderChart"), {
      type: 'doughnut',
      data: {
        labels: ['Male', 'Female'],
        datasets: [{
          data: [chartData.gender.male, chartData.gender.female],
          backgroundColor: ['#2196f3', '#e91e63']
        }]
      }
    });

    new Chart(document.getElementById("maritalChart"), {
      type: 'pie',
      data: {
        labels: Object.keys(chartData.civil_status),
        datasets: [{
          data: Object.values(chartData.civil_status),
          backgroundColor: ['#ff9800', '#9c27b0', '#3f51b5', '#00bcd4', '#795548', '#607d8b']
        }]
      }
    });
  </script>
</body>
</html>
