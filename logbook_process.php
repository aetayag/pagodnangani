<?php
include 'db.conn.php';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $day = $_POST['day'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];
    $log_by = $_POST['log_by'];

    $sql = "INSERT INTO logbook (name, position, day, time_in, time_out, log_by)
            VALUES ('$name', '$position', '$day', '$time_in', '$time_out', '$log_by')";
    mysqli_query($conn, $sql);

    // Redirect back to logbook page
    header("Location: duty_logbook.php");
    exit;
}
?>
