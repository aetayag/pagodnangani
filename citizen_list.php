<?php
include 'db.conn.php';
$sql = "SELECT * FROM residents ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container">
    <header>
      <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
      <h1 class="header-title">Sanguniang Barangay II-F</h1>
      <div class="spacer"></div>
    </header>
  </div>

  <div class="sub-header">
    <h2>CITIZEN LIST<br>BARANGAY II - F</h2>
  </div>

  <!-- Search Form -->
  <form onsubmit="event.preventDefault(); filterTable();" class="searchbar">
    <input type="text" id="searchName" placeholder="Search by Name" />
    <button type="submit">Search</button>
  </form>

  <div class="file_button">
    <button class="backup-button">📁 Back Up File</button>
  </div>

  <!-- Table -->
  <table id="citizenTable">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Place of Birth</th>
        <th>Sex</th>
        <th>Civil Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $counter = 1;
      while ($row = $result->fetch_assoc()):
      ?>
        <tr onclick="openResidentForm(<?= $row['id'] ?>)" style="cursor:pointer;">
          <td><?= $counter++ ?></td>
          <td><?= htmlspecialchars($row['fullname']) ?></td>
          <td><?= htmlspecialchars($row['dob']) ?></td>
          <td><?= htmlspecialchars($row['pob']) ?></td>
          <td><?= htmlspecialchars($row['sex']) ?></td>
          <td><?= htmlspecialchars($row['civil_status']) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>



  <!-- Modal -->
  <div id="detailsModal" style="display:none; position:fixed; top:20%; left:30%; background:#fff; border:1px solid #444; padding:20px; box-shadow:0 0 10px rgba(0,0,0,0.5); z-index:1000;">
    <span id="closeModal" style="float:right; cursor:pointer; font-size:18px;">✖</span>
    <h3>Citizen Details</h3>
    <p><strong>Name:</strong> <span id="modalName"></span></p>
    <p><strong>Date of Birth:</strong> <span id="modalDOB"></span></p>
    <p><strong>Place of Birth:</strong> <span id="modalPOB"></span></p>
    <p><strong>Sex:</strong> <span id="modalSex"></span></p>
    <p><strong>Civil Status:</strong> <span id="modalStatus"></span></p>
  </div>

  <div style="text-align: right;">
    <a href="personalInfo.php" class="button_add">Add more ⊕</a>
  </div>


  <tr onclick="openResidentForm(<?= $row['id'] ?>)" style="cursor:pointer;"></tr>
  <script src="script.js"></script>

</body>

</html>