<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Log Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Light gray background */
        }

        header {
            background-color: red; /* Red background */
            color: white; /* White text */
            padding: 20px 0;
            text-align: center;
            position: relative;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .logo {
            width: 70px; /* Adjust logo size */
            margin-bottom: 10px; /* Space below logo */
        }

        h1 {
            margin: 0;
            font-size: 36px; /* Larger font size */
            font-weight: bold; /* Bold text */
            text-transform: uppercase; /* All caps */
        }

        .main {
            padding: 20px;
        }

        .search-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center; /* Center align input and button */
        }

        .backup-btn {
            background-color: #007BFF; /* Blue background */
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px; /* Rounded corners */
        }

        .search-input {
            padding: 10px;
            width: 220px; /* Wider search input */
            border: 1px solid #ccc;
            border-radius: 5px; /* Rounded corners */
            margin-left: 10px; /* Space between button and input */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: white; /* White background for tables */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow around tables */
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px; /* Slightly larger padding */
            text-align: left;
        }

        th {
            background-color: #f4f4f4; /* Light gray header */
            font-weight: bold; /* Bold table header */
        }

        h2 {
            text-align: center; /* Centered heading */
            margin: 20px 0; /* Spacing above and below */
        }

        h3 {
            margin-top: 40px; /* Spacing above the months section */
            text-align: left; /* Left align title for months */
        }
    </style>
</head>

<body>
    <header>
        <div class="header-content">
            <img src="your-logo.png" alt="Logo" class="logo">
            <h1>SANGUNIANANG BARANGAY II - F</h1>
        </div>
    </header>

    <main class="main">
        <div class="search-section">
            <button class="backup-btn">Back Up File</button>
            <input type="text" placeholder="Search..." class="search-input">
        </div>

        <h2>History Log Book</h2>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Day</th>
                    <th>Time-In</th>
                    <th>Time-Out</th>
                    <th>Log By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ae</td>
                    <td>Brgy Tanod</td>
                    <td>Monday</td>
                    <td>8:00 AM</td>
                    <td>8:00 PM</td>
                    <td>Antoneth</td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>

        <h3>Months of May</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Day</th>
                    <th>Time-In</th>
                    <th>Time-Out</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ae</td>
                    <td>Brgy Tanod</td>
                    <td>Monday</td>
                    <td>8:00 AM</td>
                    <td>8:00 PM</td>
                </tr>
                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </main>
</body>

</html>
