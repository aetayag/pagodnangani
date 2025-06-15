<?php
include 'db.conn.php';

?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>SANGUNIANG BARANGAY II - F</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: white;
    margin: 0;
    padding: 0;
  }

  header {
    background-color: #d32f2f;
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
  }

  .logo {
    width: 50px;
    height: 50px;
    object-fit: cover;
  }

  header h1 {
    color: white;
    font-weight: 800;
    font-style: italic;
    font-size: 1.5rem;
    margin-left: 1rem;
    user-select: none;
  }

  main {
    max: width 45%;
    height: 25%; 
    margin: 2rem auto;
    padding: 0 1rem;
    text-align: center;
  }

  main h2 {
    font-weight: 800;
    font-size: 1rem;
    line-height: 1.5rem;
    color: black;
    margin-bottom: 0.5rem;
  }

  .backup-button {
    background-color: #e5e7eb;
    color: #1f2937;
    font-size: 0.75rem;
    border-radius: 0.25rem;
    padding: 0.35rem 0.75rem;
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    border: none;
    cursor: pointer;
  }

  .backup-button i {
    font-size: 0.85rem;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.8rem;
    margin-top: 1rem;
    border: 1px solid black;
  }

  th, td {
    border: 1px solid black;
    padding: 0.5rem;
    text-align: center;
  }

  thead th {
    background-color: #f3f4f6;
    font-weight: bold;
  }

  tbody tr:nth-child(odd) {
    background-color: #f3f4f6;
  }

  .flex {
    display: flex;
  }

  .justify-end {
    justify-content: flex-end;
  }

  .mt-2 {
    margin-top: 0.5rem;
  }

  @media (max-width: 640px) {
    header h1 {
      font-size: 1.1rem;
    }

    .logo {
      width: 40px;
      height: 40px;
    }

    table, thead, tbody, th, td {
      font-size: 0.7rem;
    }
  }
</style>

</head>
<body>
  <header>
    <img
    <div class="header">
        <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
        <h1>SANGUNIANG BARANGAY II - F</h1>
    </div>
    <h1>SANGUNIANG BARANGAY II - F</h1>
  </header>
  <main>
    <h2>
      MASTER LIST OF VOTERS<br />
      BARANGAY II- F
    </h2>
    <div class="flex justify-end mt-2">
      <button class="backup-button" type="button">
        <i class="fas fa-file-upload"></i> Back Up File
      </button>
    </div>
    <div style="overflow-x:auto;">
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
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
          <tr><td></td><td></td><td></td><td></td><td></td></tr>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>