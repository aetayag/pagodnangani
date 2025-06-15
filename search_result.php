<?php
include 'db.conn.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM citizen_info WHERE id = '$id'"; // Replace 'citizen_info' with your correct table name
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Details</th></tr>"; // Update based on your actual table columns

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>"; // Update as per your column
            echo "<td>More info here...</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found for ID: $id";
    }
} else {
    echo "Please enter an ID to search.";
}
?>
