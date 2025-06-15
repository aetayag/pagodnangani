<?php
include 'db.conn.php';

// Fetch POST data safely
$id = $_POST['id'] ?? null;

$fullname = $_POST['fullname'] ?? '';
$dob = $_POST['dob'] ?? '';
$pob = $_POST['pob'] ?? '';
$sex = $_POST['sex'] ?? '';
$civil_status = $_POST['civil_status'] ?? '';
$nationality = $_POST['nationality'] ?? '';
$religion = $_POST['religion'] ?? '';
$contact_number = $_POST['contact_number'] ?? '';
$house_no = $_POST['house_no'] ?? '';
$barangay = $_POST['barangay'] ?? '';
$municipality = $_POST['municipality'] ?? '';
$province = $_POST['province'] ?? '';
$length_of_stay = $_POST['length_of_stay'] ?? '';
$occupation = $_POST['occupation'] ?? '';
$place_of_work = $_POST['place_of_work'] ?? '';
$education = $_POST['education'] ?? '';
$father_name = $_POST['father_name'] ?? '';
$father_occupation = $_POST['father_occupation'] ?? '';
$father_contact = $_POST['father_contact'] ?? '';
$mother_name = $_POST['mother_name'] ?? '';
$mother_occupation = $_POST['mother_occupation'] ?? '';
$mother_contact = $_POST['mother_contact'] ?? '';
$emergency_name = $_POST['emergency_name'] ?? '';
$emergency_relationship = $_POST['emergency_relationship'] ?? '';
$emergency_contact = $_POST['emergency_contact'] ?? '';
$email_address = $_POST['email_address'] ?? '';
$voters = $_POST['voters'] ?? 'No';
$pwd = $_POST['pwd'] ?? 'No';
$four_ps = $_POST['four_ps'] ?? 'No';  // ✅ correct now
$senior = $_POST['senior'] ?? 'No';
$household_name = $_POST['household_name'] ?? '';
$age_member = $_POST['age_member'] ?? null;
$sex_householdmember = $_POST['sex_householdmember'] ?? '';
$civil_status_member = $_POST['civil_status_member'] ?? '';
$occupation_member = $_POST['occupation_member'] ?? '';
$education_attain = $_POST['education_attain'] ?? '';
$place_of_work_or_school = $_POST['place_of_work_or_school'] ?? '';
$resident_type = $_POST['resident_type'] ?? 'HomeOwner';
$fourps_id = $_POST['fourps_id'] ?? 'No'; 
$pwd_id = $_POST['pwd_id'] ?? 'No'; 
$senior_id = $_POST['senior_id'] ?? 'No'; 
$voters_id = $_POST['voters_id'] ?? 'No';



if (!empty($id)) {
    // UPDATE existing record
    $stmt = $conn->prepare("
        UPDATE residents SET
            fullname=?, dob=?, pob=?, sex=?, civil_status=?, nationality=?, religion=?, contact_number=?,
            house_no=?, barangay=?, municipality=?, province=?, length_of_stay=?, occupation=?, place_of_work=?, education=?,
            father_name=?, father_occupation=?, father_contact=?,
            mother_name=?, mother_occupation=?, mother_contact=?,
            emergency_name=?, emergency_relationship=?, emergency_contact=?,
            email_address=?, voters=?, pwd=?, senior=?,
            household_name=?, age_member=?, sex_householdmember=?, civil_status_member=?, 
            occupation_member=?, education_attain=?, place_of_work_or_school=?, resident_type=?, four_ps=?
            pwd_id=?, senior_id=?, voters_id=?, fourps_id=?
        WHERE id=?
    ");

    $stmt->bind_param(
        "sssssssssssssssssssssssssssssisissssssissss",
        $fullname,
        $dob,
        $pob,
        $sex,
        $civil_status,
        $nationality,
        $religion,
        $contact_number,
        $house_no,
        $barangay,
        $municipality,
        $province,
        $length_of_stay,
        $occupation,
        $place_of_work,
        $education,
        $father_name,
        $father_occupation,
        $father_contact,
        $mother_name,
        $mother_occupation,
        $mother_contact,
        $emergency_name,
        $emergency_relationship,
        $emergency_contact,
        $email_address,
        $voters,
        $pwd,
        $senior,
        $household_name,
        $age_member,
        $sex_householdmember,
        $civil_status_member,
        $occupation_member,
        $education_attain,
        $place_of_work_or_school,
        $resident_type,
        $four_ps,
        $fourps_id,
        $pwd_id,
        $senior_id,
        $voters_id,
        $id
    );
} else {
    // INSERT new record
    $stmt = $conn->prepare("
    INSERT INTO residents (
        fullname, dob, pob, sex, civil_status, nationality, religion, contact_number,
        house_no, barangay, municipality, province, length_of_stay, occupation, place_of_work, education,
        father_name, father_occupation, father_contact,
        mother_name, mother_occupation, mother_contact,
        emergency_name, emergency_relationship, emergency_contact,
        email_address, voters, pwd, senior,
        household_name, age_member, sex_householdmember, civil_status_member,
        occupation_member, education_attain, place_of_work_or_school, resident_type, four_ps,
        fourps_id, pwd_id, senior_id, voters_id
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sssssssssssssssssssssssssssssisissssssssss",
    $fullname,
    $dob,
    $pob,
    $sex,
    $civil_status,
    $nationality,
    $religion,
    $contact_number,
    $house_no,
    $barangay,
    $municipality,
    $province,
    $length_of_stay,
    $occupation,
    $place_of_work,
    $education,
    $father_name,
    $father_occupation,
    $father_contact,
    $mother_name,
    $mother_occupation,
    $mother_contact,
    $emergency_name,
    $emergency_relationship,
    $emergency_contact,
    $email_address,
    $voters,
    $pwd,
    $senior,
    $household_name,
    $age_member,
    $sex_householdmember,
    $civil_status_member,
    $occupation_member,
    $education_attain,
    $place_of_work_or_school,
    $resident_type,
    $four_ps,
    $fourps_id,
    $pwd_id,
    $senior_id,
    $voters_id
);


}

if ($stmt->execute()) {
    header("Location: citizen_list.php");
    exit;
} else {
    echo "Database Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
