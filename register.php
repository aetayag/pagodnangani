<?php
include 'db.conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) && is_numeric($_POST['id']) ? intval($_POST['id']) : null;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Combine schedule data into a string
    $schedule = "";
    if (!empty($_POST['schedule_day']) && is_array($_POST['schedule_day'])) {
        $days = $_POST['schedule_day'];
        $time_ins = $_POST['schedule_time_in'];
        $time_outs = $_POST['schedule_time_out'];

        for ($i = 0; $i < count($days); $i++) {
            $d = mysqli_real_escape_string($conn, $days[$i]);
            $in = mysqli_real_escape_string($conn, $time_ins[$i]);
            $out = mysqli_real_escape_string($conn, $time_outs[$i]);

            if (!empty($d) && !empty($in) && !empty($out)) {
                $schedule .= "$d: $in - $out\n";
            }
        }
    }

    $schedule = mysqli_real_escape_string($conn, trim($schedule));

    // Check if it's an update or insert
    if ($id !== null) {
        $check = mysqli_query($conn, "SELECT id FROM officials WHERE id = $id");
        if (mysqli_num_rows($check) > 0) {
            // Update existing
            $query = "UPDATE officials SET 
                        name='$name', 
                        position='$position', 
                        contact='$contact', 
                        dob='$dob', 
                        sex='$sex', 
                        status='$status', 
                        schedule='$schedule' 
                      WHERE id=$id";
        } else {
            // Insert with specified ID
            $query = "INSERT INTO officials (id, name, position, contact, dob, sex, status, schedule) 
                      VALUES ('$id', '$name', '$position', '$contact', '$dob', '$sex', '$status', '$schedule')";
        }
    } else {
        // Insert without ID
        $query = "INSERT INTO officials (name, position, contact, dob, sex, status, schedule) 
                  VALUES ('$name', '$position', '$contact', '$dob', '$sex', '$status', '$schedule')";
    }

    // Execute and redirect
    if (mysqli_query($conn, $query)) {
        header("Location: officials.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
