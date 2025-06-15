<?php
include 'db.conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['resident_id'])) {
    $resident_id = intval($_POST['resident_id']);

    // Fetch resident data
    $res = $conn->query("SELECT * FROM residents WHERE id = $resident_id");

    if ($res && $res->num_rows > 0) {
        $data = $res->fetch_assoc();

        $full_name = $conn->real_escape_string($data['first_name'] . ' ' . $data['last_name']);
        $birthdate = $data['birthdate'];
        $sex = $data['sex'];
        $address = $conn->real_escape_string($data['address'] ?? '');
        $contact_number = $data['contact_number'] ?? '';
        $disability_type = ''; // optional or can be filled from another form field

        // Insert into pwd table
        $stmt = $conn->prepare("INSERT INTO pwd (fullname, dob, sex, pob, civil_status, contact_number) VALUES (?, ?, ?, ?, ?, ?)");
        $civil_status = $data['civil_status'] ?? '';
        $pob = $data['pob'] ?? ''; // place of birth (if applicable)

        $stmt->bind_param("ssssss", $full_name, $birthdate, $sex, $pob, $civil_status, $contact_number);

        if ($stmt->execute()) {
            echo "Resident added to PWD table successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Resident not found.";
    }

    $conn->close();
}
?>
