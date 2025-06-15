<?php
include 'db.conn.php';

$query = mysqli_query($conn, "SELECT * FROM officials ORDER BY name ASC");

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Barangay Officials Weekly Schedule</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }
    header {
      background-color: #d32f2f;
      color: white;
      padding: 20px;
      display: flex;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    header img {
      height: 70px;
      margin-right: 20px;
    }
    header h1 {
      font-size: 2em;
      font-weight: bold;
      margin: 0;
    }
    .title {
      text-align: center;
      padding: 20px;
      font-size: 1.8em;
      font-weight: bold;
      color: #333;
    }
    table {
      width: 95%;
      margin: 0 auto 30px auto;
      border-collapse: collapse;
      background-color: white;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
      font-size: 0.95em;
    }
    th {
      background-color: #f44336;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f4f4f4;
    }
    td:first-child, th:first-child {
      width: 18%;
    }
    td:nth-child(2), th:nth-child(2) {
      width: 10%;
    }
    td:nth-child(3), th:nth-child(3) {
      width: 15%;
    }
    td:nth-child(n+4), th:nth-child(n+4) {
      width: calc(57% / 7);
    }
    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      thead {
        display: none;
      }
      tr {
        margin-bottom: 15px;
        background: white;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 10px;
      }
      td {
        text-align: left;
        padding: 10px 10px;
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
      }
      td::before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        color: #333;
        margin-bottom: 4px;
      }
    }
  </style>
</head>
<body>

  <header>
    <img src="brgy2F.jpg" alt="Barangay Seal" />
    <h1>SANGUNIANG BARANGAY II - F</h1>
  </header>

  <div class="title">Officials Weekly Schedule</div>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>ID</th>
        <th>Position</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($query)): ?>
        <?php
          // Initialize default empty schedule
          $parsed_schedule = array_fill_keys($days, 'OFF');

          // Parse stored schedule string
          $lines = explode("\n", $row['schedule']);
          foreach ($lines as $line) {
              if (preg_match('/^(\w+):\s*(.+)$/', trim($line), $matches)) {
                  $day = ucfirst(strtolower($matches[1]));
                  if (in_array($day, $days)) {
                      $parsed_schedule[$day] = $matches[2];
                  }
              }
          }
        ?>
        <tr>
          <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
          <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
          <td data-label="Position"><?= htmlspecialchars($row['position']) ?></td>
          <?php foreach ($days as $day): ?>
            <td data-label="<?= $day ?>"><?= htmlspecialchars($parsed_schedule[$day]) ?></td>
          <?php endforeach; ?>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

</body>
</html>
