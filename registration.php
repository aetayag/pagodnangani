<?php
include 'db.conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Save to DB (id and password only)
    $sql = "INSERT INTO user_account (id, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $id, $password);

    if ($stmt->execute()) {
        // Store other form data in session
        $_SESSION['id'] = $id;
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['position'] = $_POST['position'];
        $_SESSION['phone'] = $_POST['phone'];
        $_SESSION['email'] = $_POST['email'];

        header("Location: admin_management.php");
        exit();
    } else {
        echo "Registration failed: " . $stmt->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title>Barangay Information System - Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
.container {
    background-color: rgb(241, 51, 51);
    color: white;
    font-size: 24px;
    width: 100%;
    padding: 20px;
}

header {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo {
    width: 60px;
    margin-left: 30px;
    height: auto;
}

.img {
    text-align: center;
    margin: 20px 0;
    padding: 40px 0;
}

.img .logo {
    width: 30%;
    opacity: 40;
    height: auto;
    position: fixed; 
    top: 150px;
    transform: translateX(-50%); 
    border-radius: 10px;
    z-index: -1;
}

.login_container {
    background-color: #ffffff7c;
    width: 40%;
    min-height: 80vh;
    padding: 20px;
    border: 1px solid #ccc;
    text-align: center;
    box-sizing: border-box;
    float: left;
}

.login-title {
    font-family: 'Irish Grover', cursive;
    font-size: 36px;
    color: #000000;
    font-weight: bold;
    margin-bottom: 20px;
}

input {
    display: block;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #aaa;
    border-radius: 10px;
}

.name-row {
    display: flex;
    gap: 10px;
}

.name-row input {
    flex: 1;
}

.buttons {
    margin-top: 10px;
}

button {
    padding: 10px 15px;
    background-color: rgb(241, 51, 51);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: rgb(200, 40, 40);
}

.created_container {
    background-color: #3D33D5;
    padding: 20px;
    position: fixed;
    width: 100%;
    text-align: center;
    font-size: 14px;
    font-style: italic;
    color: #444;
    bottom: 0;
}
</style>

<body>

    <div class="container">
        <header>
            <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
            <h1 class="header-title">Sanguniang Barangay II-F</h1>
        </header>
    </div>

    <div class="login_container">
        <form method="POST" action="register_process.php">
            <h1 class="login-title">Registration</h1>
            
            <input type="text" name="id" placeholder="I.D" required />

            <div class="name-row">
                <input type="text" name="first_name" placeholder="First Name" required />
                <input type="text" name="last_name" placeholder="Last Name" required />
            </div>

            <input type="text" name="username" placeholder="*User Name" required />
            <input type="text" name="position" placeholder="*Position" required />
            <input type="tel" name="contact" placeholder="*Contact Number" required />
            <input type="email" name="email" placeholder="*Email" required />
            <input type="password" name="password" placeholder="*Password" required />
            <input type="password" name="confirm_password" placeholder="*Confirm Password" required />

            <div class="buttons">
                <button type="reset">Cancel</button>
                <button type="submit">Register Now</button>
            </div>
        </form>
    </div>

    <div class="img"> 
        <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
    </div>

    <div class="created_container">
        <p>Created By</p>
        <p><strong>IS Group</strong></p>
    </div>

</body>
</html>
