<?php
include 'db.conn.php';
include 'fetch_resident.php';

$is_edit_mode = false;
$resident_data = [];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $is_edit_mode = true;
    $id = $_GET['id'];
    $resident_data = getResidentById($conn, $id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Barangay Information System_Citizen and Household Module</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    
</style>

<body class="brgy-body">
    <div class="brgy-container">
        <header class="brgy-header">
            <div class="brgy-header-left">
                <img src="spc.jpg" alt="Spc logo" class="brgy-logo">
            </div>

            <div class="brgy-header-center">
                <p>Republic of the Philippines</p>
                <p>Department of the Interior and Local Government</p>
                <p>San Pablo City, Brgy. San Gabriel</p>


            </div>

            <div class="brgy-header-right">
                <img src="brgy2F.jpg" alt="Barangay Logo" class="brgy-logo">
            </div>
        </header>

        <h2 class="brgy-form-title">BARANGAY RESIDENT INFORMATION SHEET</h2>
        <p class="subtitle">Personal Information</p>


        <form action="personalInfo_process.php" method="post">
            <?php if ($is_edit_mode): ?>
                <input type="hidden" name="id" value="<?= $id ?>">
            <?php endif; ?>

            <section class="brgy-section brgy-personal-info">
                <div class="brgy-profile-image-placeholder" onclick="document.getElementById('profileUpload').click();">
                    <span>Click to upload</span>
                    <input type="file" id="profileUpload" accept="image/*" onchange="previewProfile(event)">
                </div>



                <div class="brgy-info-grid">
                    <p><strong>Full Name:</strong>
                        <input type="text" name="fullname" value="<?= htmlspecialchars($resident_data['fullname'] ?? '') ?>" required>
                    </p>
                    <p><strong>Date of Birth:</strong>
                        <input type="date" name="dob" value="<?= htmlspecialchars($resident_data['dob'] ?? '') ?>" required>
                    </p>
                    <p><strong>Place of Birth:</strong>
                        <input type="text" name="pob" value="<?= htmlspecialchars($resident_data['pob'] ?? '') ?>" required>
                    </p>

                    <p><strong>Sex:</strong>
                        <select name="sex" required>
                            <option value="">--Select--</option>
                            <option value="Female" <?= ($resident_data['sex'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                            <option value="Male" <?= ($resident_data['sex'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
                            <option value="Other" <?= ($resident_data['sex'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </p>

                    <p><strong>Civil Status:</strong>
                        <select name="civil_status" required>
                            <option value="">--Select--</option>
                            <option value="Single" <?= ($resident_data['civil_status'] ?? '') === 'Single' ? 'selected' : '' ?>>Single</option>
                            <option value="Married" <?= ($resident_data['civil_status'] ?? '') === 'Married' ? 'selected' : '' ?>>Married</option>
                            <option value="Widowed" <?= ($resident_data['civil_status'] ?? '') === 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                            <option value="Separated" <?= ($resident_data['civil_status'] ?? '') === 'Separated' ? 'selected' : '' ?>>Separated</option>
                            <option value="Other" <?= ($resident_data['civil_status'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </p>

                    <p><strong>Nationality:</strong>
                        <input type="text" name="nationality" value="<?= htmlspecialchars($resident_data['nationality'] ?? '') ?>" required>
                    </p>

                    <p><strong>Religion:</strong>
                        <input type="text" name="religion" value="<?= htmlspecialchars($resident_data['religion'] ?? '') ?>" required>
                    </p>

                    <p><strong>Contact Number:</strong>
                        <input type="text" name="contact_number" value="<?= htmlspecialchars($resident_data['contact_number'] ?? '') ?>" required>
                    </p>

                    <p><strong>Email Address (optional):</strong>
                        <input type="email" name="email_address" value="<?= htmlspecialchars($resident_data['email_address'] ?? '') ?>">
                    </p>

<p><strong>Voter?:</strong>
    <select name="voters" required>
        <option value="">--Select--</option>
        <option value="Yes" <?= ($resident_data['voters'] ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
        <option value="No" <?= ($resident_data['voters'] ?? '') === 'No' ? 'selected' : '' ?>>No</option>
    </select>
</p>

            <p><strong>If Yes, Voter ID:</strong>
                    <input type="text" name="voters_id" value="<?= htmlspecialchars($resident_data['voters_id'] ?? '') ?>">
            </p>



<p><strong>Senior?:</strong>
    <select name="senior" required>
        <option value="">--Select--</option>
        <option value="Yes" <?= ($resident_data['senior'] ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
        <option value="No" <?= ($resident_data['senior'] ?? '') === 'No' ? 'selected' : '' ?>>No</option>
    </select>
</p>
            <p><strong>If Yes, Senior ID:</strong>
                    <input type="text" name="senior_id" value="<?= htmlspecialchars($resident_data['senior_id'] ?? '') ?>">
            </p>

<p><strong>PWD?:</strong>
    <select name="pwd" required>
        <option value="">--Select--</option>
        <option value="Yes" <?= ($resident_data['pwd'] ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
        <option value="No" <?= ($resident_data['pwd'] ?? '') === 'No' ? 'selected' : '' ?>>No</option>
    </select>
</p>

            <p><strong>If  Yes, Pwd  ID:</strong>
                    <input type="text" name="pwd_id" value="<?= htmlspecialchars($resident_data['pwd_id'] ?? '') ?>">
            </p>

            <p><strong>4ps:</strong>
                    <select name="four_ps" required>
                    <option value="">--Select--</option>
                    <option value="Yes" <?= ($resident_data['four_ps'] ?? '') === 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="No" <?= ($resident_data['four_ps'] ?? '') === 'No' ? 'selected' : '' ?>>No</option>
                </select>
            </p>

            <p><strong>If 4ps ID:</strong>
                    <input type="text" name="fourps_id" value="<?= htmlspecialchars($resident_data['fourps_id'] ?? '') ?>">
            </p>









                </div>
            </section>

            <section class="brgy-section brgy-home-address">
                <h3>Home Address</h3>
                <div class="brgy-info-grid-single">
                    <p><strong>House No.:</strong>
                        <input type="text" name="house_no" value="<?= htmlspecialchars($resident_data['house_no'] ?? '') ?>" required>
                    </p>
                    <p><strong>Barangay:</strong>
                        <input type="text" name="barangay" value="<?= htmlspecialchars($resident_data['barangay'] ?? '') ?>" required>
                    </p>
                    <p><strong>Municipality/City:</strong>
                        <input type="text" name="municipality" value="<?= htmlspecialchars($resident_data['municipality'] ?? '') ?>" required>
                    </p>
                    <p><strong>Province:</strong>
                        <input type="text" name="province" value="<?= htmlspecialchars($resident_data['province'] ?? '') ?>" required>
                    </p>

                    <p><strong>Resident Type:</strong>
                        <select name="resident_type" required>
                            <option value="">--Select--</option>
                            <option value="HomeOwner" <?= ($resident_data['resident_type'] ?? '') === 'HomeOwner' ? 'selected' : '' ?>>HomeOwner</option>
                            <option value="Renters" <?= ($resident_data['resident_type'] ?? '') === 'Renters' ? 'selected' : '' ?>>Renters</option>
                        </select>
                    </p>

                    <p><strong>If not Resident Length of Stay in Barangay:</strong>
                        <input type="text" name="length_of_stay" value="<?= htmlspecialchars($resident_data['length_of_stay'] ?? '') ?>" required>
                    </p>
                    <p><strong>Occupation:</strong>
                        <input type="text" name="occupation" value="<?= htmlspecialchars($resident_data['occupation'] ?? '') ?>" required>
                    </p>
                    <p><strong>Place of Work/School:</strong>
                        <input type="text" name="place_of_work" value="<?= htmlspecialchars($resident_data['place_of_work'] ?? '') ?>" required>
                    </p>
                    <p><strong>Highest Education Attainment:</strong>
                        <input type="text" name="education" value="<?= htmlspecialchars($resident_data['education'] ?? '') ?>" required>
                    </p>
                </div>
            </section>

            <section class="brgy-section brgy-parents-info">
                <h5>Parents Information</h5>
                <div class="brgy-info-grid-double">
                    <div>
                        <p><strong>Father's Name:</strong>
                            <input type="text" name="father_name" value="<?= htmlspecialchars($resident_data['father_name'] ?? '') ?>" required>
                        </p>
                        <p><strong>Occupation:</strong>
                            <input type="text" name="father_occupation" value="<?= htmlspecialchars($resident_data['father_occupation'] ?? '') ?>" required>
                        </p>
                        <p><strong>Contact Number:</strong>
                            <input type="text" name="father_contact" value="<?= htmlspecialchars($resident_data['father_contact'] ?? '') ?>" required>
                        </p>
                    </div>
                    <div>
                        <p><strong>Mother's Name (Maiden Name):</strong>
                            <input type="text" name="mother_name" value="<?= htmlspecialchars($resident_data['mother_name'] ?? '') ?>" required>
                        </p>
                        <p><strong>Occupation:</strong>
                            <input type="text" name="mother_occupation" value="<?= htmlspecialchars($resident_data['mother_occupation'] ?? '') ?>" required>
                        </p>
                        <p><strong>Contact Number:</strong>
                            <input type="text" name="mother_contact" value="<?= htmlspecialchars($resident_data['mother_contact'] ?? '') ?>" required>
                        </p>
                    </div>
                </div>
            </section>

            <section class="brgy-section brgy-emergency-contact">
                <h5>Emergency Contact</h5>
                <div class="brgy-info-grid-single">
                    <p><strong>Name:</strong>
                        <input type="text" name="emergency_name" value="<?= htmlspecialchars($resident_data['emergency_name'] ?? '') ?>" required>
                    </p>
                    <p><strong>Relationship:</strong>
                        <input type="text" name="emergency_relationship" value="<?= htmlspecialchars($resident_data['emergency_relationship'] ?? '') ?>" required>
                    </p>
                    <p><strong>Contact Number:</strong>
                        <input type="text" name="emergency_contact" value="<?= htmlspecialchars($resident_data['emergency_contact'] ?? '') ?>" required>
                    </p>
                </div>
            </section>

            <section class="brgy-section brgy-household-members">
                <h4>Household Member</h4>
                <div class="brgy-info-grid-single">
                    <p><strong>Household Name:</strong>
                        <input type="text" name="household_name" value="<?= htmlspecialchars($resident_data['household_name'] ?? '') ?>" required>
                    </p>
                    <p><strong>Age:</strong>
                        <input type="number" name="age_member" value="<?= htmlspecialchars($resident_data['age_member'] ?? '') ?>" required>
                    </p>
                    <p><strong>Sex:</strong>
                        <select name="sex_householdmember" required>
                            <option value="">--Select--</option>
                            <option value="Female" <?= ($resident_data['sex_householdmember'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                            <option value="Male" <?= ($resident_data['sex_householdmember'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
                            <option value="Other" <?= ($resident_data['sex_householdmember'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </p>
                    <p><strong>Civil Status:</strong>
                        <select name="civil_status_member" required>
                            <option value="">--Select--</option>
                            <option value="Single" <?= ($resident_data['civil_status_member'] ?? '') === 'Single' ? 'selected' : '' ?>>Single</option>
                            <option value="Married" <?= ($resident_data['civil_status_member'] ?? '') === 'Married' ? 'selected' : '' ?>>Married</option>
                            <option value="Widowed" <?= ($resident_data['civil_status_member'] ?? '') === 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                            <option value="Separated" <?= ($resident_data['civil_status_member'] ?? '') === 'Separated' ? 'selected' : '' ?>>Separated</option>
                            <option value="Other" <?= ($resident_data['civil_status_member'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </p>
                    <p><strong>Occupation:</strong>
                        <input type="text" name="occupation_member" value="<?= htmlspecialchars($resident_data['occupation_member'] ?? '') ?>" required>
                    </p>
                    <p><strong>Education Attainment:</strong>
                        <input type="text" name="education_attain" value="<?= htmlspecialchars($resident_data['education_attain'] ?? '') ?>" required>
                    </p>
                    <p><strong>Place of Work or School:</strong>
                        <input type="text" name="place_of_work_or_school" value="<?= htmlspecialchars($resident_data['place_of_work_or_school'] ?? '') ?>" required>
                    </p>
                </div>
            </section>

            <!-- Buttons -->
            <div class="buttons" style="margin-top: 20px;">
                <button type="submit" onclick="return confirm('Save this record?')">Save</button>
                <?php if ($is_edit_mode): ?>
                    <button type="button" onclick="if(confirm('Delete this record?')) { window.location.href='delete.php?id=<?= $id ?>'; }">Delete</button>
                <?php endif; ?>
                <button type="button" onclick="window.location.href='citizen_list.php'">Cancel</button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>