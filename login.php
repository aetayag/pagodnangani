<?php include 'db.conn.php'; ?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <title>Barangay Information System - Login</title>
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

    <div class="login_container">
        <form method="POST" id="loginForm" action="login_process.php">
            <div class="form-container active" id="login">
                <h1 class="login-title">Login</h1>
                
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <a href="#">Forgot Password?</a>

                <div class="buttons">
                    <button type="submit" class="login">Login</button>
                </div>

                <a href="registration.php">Register an Account</a> 
            </div>
        </form>
    </div>

    <div class="img">
        <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
    </div>


    <script src="script.js"></script>
</body>

</html>
