<?php
include 'db.conn.php';

// Function to calculate user-friendly time difference
function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    // Calculate weeks separately (safe scope)
    $weeks = floor($diff->d / 7);
    $diff->d -= $weeks * 7;

    // Build array with actual values
    $string = [];

    if ($diff->y) $string['y'] = $diff->y . ' year' . ($diff->y > 1 ? 's' : '');
    if ($diff->m) $string['m'] = $diff->m . ' month' . ($diff->m > 1 ? 's' : '');
    if ($weeks)   $string['w'] = $weeks . ' week' . ($weeks > 1 ? 's' : '');
    if ($diff->d) $string['d'] = $diff->d . ' day' . ($diff->d > 1 ? 's' : '');
    if ($diff->h) $string['h'] = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '');
    if ($diff->i) $string['i'] = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '');
    if ($diff->s && !$string) $string['s'] = $diff->s . ' second' . ($diff->s > 1 ? 's' : '');

    if (!$full) $string = array_slice($string, 0, 1,);
    
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


// CORRECTED: This query FETCHES the 3 most recently updated residents.
// The ALTER TABLE command that caused the error has been removed.
$recent_sql = "SELECT id, fullname, last_updated FROM residents ORDER BY last_updated DESC LIMIT 3";
$recent_result = $conn->query($recent_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barangay II-F</title>
    <link rel="stylesheet" href="style.css"> <script>
    document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".menu-button");

        buttons.forEach(button => {
            // This event listener handles the click for all menu buttons
            button.addEventListener("click", function (e) {
                // For buttons that are simple links, we let them navigate
                if (button.getAttribute('data-href')) {
                    window.location.href = button.getAttribute('data-href');
                    return;
                }

                const parent = button.parentElement;
                const submenu = parent.querySelector(".submenu");

                // Close all other submenus
                document.querySelectorAll(".submenu").forEach(menu => {
                    if (menu !== submenu) {
                        menu.style.display = "none";
                    }
                });

                // Toggle current submenu if it exists
                if (submenu) {
                    submenu.style.display = submenu.style.display === "block" ? "none" : "block";
                }
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener("click", function (e) {
            if (!e.target.closest(".menu-group")) {
                document.querySelectorAll(".submenu").forEach(menu => {
                    menu.style.display = "none";
                });
            }
        });
    });
    </script>
    <style>
        /* Your existing styles are fine. You can move this block to your style.css file for better organization. */
.recents-container {
    display: flex;
    gap: 20%;
    justify-content: flex-start;
    flex-wrap: nowrap;
    padding-left: 20px;
    overflow-x: auto;
    width: 100%;
    
}


        /* Each recent card */
        .recent-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 80px;
            width: 30%;
            text-decoration: none;
            color: inherit;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            flex-direction: column;
        }
        
        .recent-card:hover {
            transform: translateY(-5px);
;
        }
        .recent-card .preview-image {
            width: 100%;
            height: auto;
            border: 1px solid #eee;
            border-radius: 4px;
        }
        .recent-card-path {
            font-size: 0.8em;
            color: #666;
            margin-top: 10px;
        }
        .recent-card-info {
            font-size: 0.9em;
            color: #333;
        }
        .recent-card-info strong {
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .recent-card-time {
            font-size: 0.8em;
            color: #888;
            margin-top: 5px;
        }
        .recents-title {
            font-size: 1.5em;
            color: #333;
            margin-left: 20px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="index">
    <div class="taas-container">
        <header>
            <img src="brgy2F.jpg" alt="Barangay Logo" class="logo">
            <h1 class="header-title">Sanguniang Barangay II-F</h1>
            <div class="spacer"></div>
        </header>
    </div>

    <main>
        <section class="menu-section">
            <div class="menu-group">
                <button class="menu-button">Citizen Record</button>
                <div class="submenu">
                    <ul>
                        <li><a href="citizen_list.php">Citizen List</a></li>
                        <li><a href="voters.php">Voters</a></li>
                        <li><a href="senior.php">Senior</a></li>
                        <li><a href="pwd.php">PWD</a></li>
                        <li><a href="4ps.php">4Ps</a></li>
                    </ul>
                </div>
            </div>

            <div class="menu-group">
                <button class="menu-button" data-href="brgyofficials.php">Barangay Officials</button>
            </div>

            <div class="menu-group">
                 <button class="menu-button">Duty Log Book</button>
                <div class="submenu">
                    <ul>
                        <li><a href="duty_logbook.php">Log Book</a></li>
                        <li><a href="historylog.php">History Log</a></li>
                        <li><a href="officials.php">Register Officials</a></li>
                        <li><a href="calendar.php">Calendar</a></li>
                    </ul>
                </div>
            </div>

            <div class="menu-group">
                 <button class="menu-button">Settings</button>
                <div class="submenu">
                    <ul>
                        <li><a href="brgy_profile.php">Brgy Profile</a></li>
                        <li><a href="admin_management.php">Admin Management</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <h3 class="recents-title"><span class="icon">🕒</span> Recents</h3>
        
        <div class="recents-container">
            <?php if ($recent_result && $recent_result->num_rows > 0): ?>
                <?php while ($row = $recent_result->fetch_assoc()): ?>
                    <a href="personalInfo.php?id=<?= $row['id'] ?>" class="recent-card">
                        <img src="form_preview_placeholder.png" alt="Form Preview" class="preview-image">
                        <p class="recent-card-path">Citizen Record > Citizen List > Personal info...</p>
                        <div class="recent-card-info">
                            <strong><?= htmlspecialchars($row['fullname']) ?></strong>
                        </div>
                        <p class="recent-card-time">
                            <span class="icon">🔄</span> Updated <?= time_ago($row['last_updated']) ?>
                        </p>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No recent activity found.</p>
            <?php endif; ?>
        </div>

        <div class="def-container">
            <div class="feedback-links">
                <span>Rate Your Experience</span><br>
                <span>Tell Us What You Think</span><br>
                <span>Help Us Improve</span><br>
                <span>Contact Developer Support</span><br>
                <span>About Us</span>
            </div>
            <a href="about Us.php">
                <img src="iconngani.png" alt="Help Icon" class="help-icon">
            </a>
        </div>
    </main> </body>
</html>