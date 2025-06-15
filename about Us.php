
<?php
include 'db.conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sangguniang Barangay II-F | Resident Information System</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<style>

    /* Import a Google Font for better typography */
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

/* --- Global Styles & Variables --- */
:root {
    --primary-color: #d9534f; /* A shade of red from the seal */
    --secondary-color: #f7f7f7;
    --dark-color: #333;
    --light-color: #fff;
    --text-color: #555;
    --border-color: #ddd;
    --star-color: #fdd835; /* Yellow for stars */
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Roboto', sans-serif;
    line-height: 1.6;
    background-color: var(--secondary-color);
    color: var(--text-color);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* --- Header --- */
header {
    background-color: var(--primary-color);
    color: var(--light-color);
    padding: 1rem 0;
    border-bottom: 4px solid darken(var(--primary-color), 10%);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.header-content {
    display: flex;
    align-items: center;
}

.barangay-seal {
    height: 50px;
    width: 50px;
    margin-right: 15px;
}

header h1 {
    font-size: 1.75rem;
    font-weight: 700;
    font-style: italic;
}

/* --- Main Content --- */
main {
    padding: 2rem 20px;
}

/* --- Card Styling --- */
.card {
    background: var(--light-color);
    border-radius: 8px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border: 1px solid var(--border-color);
}

.card h2 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1.8rem;
}

.card h3 {
    color: var(--dark-color);
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--primary-color);
    font-size: 1.5rem;
}

.card h4 {
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
}

.card h4 i {
    color: var(--primary-color);
    margin-right: 10px;
    font-size: 1.2rem;
}

.card p {
    margin-bottom: 1rem;
}

/* --- Features Section --- */
.features-title {
    margin-top: 2rem;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.feature-item ul {
    list-style: none;
    padding-left: 5px;
}

.feature-item li {
    margin-bottom: 0.5rem;
    padding-left: 10px;
    position: relative;
}

/* --- Feedback & Contact Forms --- */
.feedback-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feedback-textarea {
    width: 100%;
    padding: 12px;
    font-family: 'Roboto', sans-serif;
    font-size: 1rem;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    resize: vertical;
    transition: border-color 0.3s;
}

.feedback-textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

.submit-btn {
    align-self: flex-end;
    background-color: var(--primary-color);
    color: var(--light-color);
    border: none;
    padding: 12px 25px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 500;
    transition: background-color 0.3s, transform 0.2s;
}

.submit-btn:hover {
    background-color: #b74642; /* Darker shade of primary */
    transform: translateY(-2px);
}

/* --- Star Rating --- */
.star-rating {
    display: flex;
    gap: 8px;
    font-size: 2rem;
    cursor: pointer;
    color: #ccc;
}

.star-rating .fa-solid {
    color: var(--star-color);
}

/* --- Footer --- */
footer {
    background-color: var(--dark-color);
    color: var(--light-color);
    text-align: center;
    padding: 1.5rem 0;
    margin-top: 2rem;
}

/* --- Modal --- */
.modal {
    display: none; 
    position: fixed; 
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 30px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 8px;
    text-align: center;
    position: relative;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.close-btn {
    color: #aaa;
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
}


/* --- Responsive Design --- */
@media (max-width: 768px) {
    header h1 {
        font-size: 1.25rem;
    }
    .barangay-seal {
        height: 40px;
        width: 40px;
    }
    .card {
        padding: 1.5rem;
    }
    .card h2 {
        font-size: 1.5rem;
    }
    .card h3 {
        font-size: 1.3rem;
    }
}

</style>
<body>

    <!-- Header Section -->
    <header>
        <div class="container header-content">
            <img src="brgy2F.jpg" alt="Barangay Seal" class="barangay-seal">
            <h1>SANGGUNIANG BARANGAY II - F</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- About and Features Section -->
        <section class="card">
            <h2>Barangay II-F Resident Information System</h2>
            <p>This digital platform was created to help Barangay II-F accurately monitor, record, and manage all resident and official data. Instead of relying solely on city or municipal lists, the system gives the barangay full control over its own database — updated regularly by authorized personnel.</p>
            <p>Whether the resident is a voter, a boarder, a senior, or a child — they are included. Every official’s role, category, and duty hours are also tracked. With this system, local governance becomes faster, more organized, and fully paperless.</p>
            
            <h3 class="features-title">Key Features</h3>
            <div class="features-grid">
                <!-- Resident Registration -->
                <div class="feature-item">
                    <h4><i class="fa-solid fa-user-pen"></i> Resident Registration Module</h4>
                    <ul>
                        <li>Records full personal data: name, birth info, sex, status, religion, education, contact, occupation.</li>
                        <li>Tracks voter status, PWD flag, senior status, and whether the resident is renting or staying long-term.</li>
                        <li>Includes emergency contacts and parent details.</li>
                    </ul>
                </div>
                <!-- Household Tracking -->
                <div class="feature-item">
                    <h4><i class="fa-solid fa-house-user"></i> Household Tracking</h4>
                    <ul>
                        <li>Links residents into households based on address.</li>
                        <li>Supports shared or complex addresses (e.g., boarding houses, apartments).</li>
                        <li>Each household can be reviewed and managed as a unit.</li>
                    </ul>
                </div>
                 <!-- Officials Management -->
                <div class="feature-item">
                    <h4><i class="fa-solid fa-user-tie"></i> Barangay Officials Management</h4>
                    <ul>
                        <li>Add, edit, and view officials.</li>
                        <li>Classify each official as Elected, Appointed, or Barangay Worker.</li>
                        <li>Record contact info, position, date of duty, sex, and birthdate.</li>
                    </ul>
                </div>
                <!-- Duty Log Book -->
                <div class="feature-item">
                    <h4><i class="fa-solid fa-book"></i> Duty Log Book for Officials</h4>
                    <ul>
                        <li>Officials record duty attendance via digital logbook.</li>
                        <li>Tracks time-in, time-out, and duty notes.</li>
                        <li>Replaces physical attendance books.</li>
                    </ul>
                </div>
                <!-- Dashboard and Reports -->
                <div class="feature-item">
                    <h4><i class="fa-solid fa-chart-line"></i> Dashboard and Reports</h4>
                    <ul>
                        <li>Displays real-time population statistics.</li>
                        <li>Future option to generate printable or exportable reports.</li>
                    </ul>
                </div>
                <!-- System Functions -->
                <div class="feature-item">
                    <h4><i class="fa-solid fa-cogs"></i> System Functions</h4>
                    <ul>
                        <li>✅ Add, edit, and delete resident records</li>
                        <li>✅ Add, classify, and manage barangay officials</li>
                        <li>✅ Record duty schedules and logs</li>
                        <li>✅ Filter/search residents</li>
                        <li>✅ View dashboard statistics</li>
                        <li>🔜 Future: Export or print reports</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Tell Us What You Think Section -->
        <section class="card">
            <h3>Tell Us What You Think</h3>
            <p>Any feedback is appreciated and helps us improve the system.</p>
            <div class="feedback-form">
                <textarea id="general-feedback-text" class="feedback-textarea" placeholder="Your thoughts..." rows="4"></textarea>
                <button id="general-feedback-btn" class="submit-btn">Submit Feedback</button>
            </div>
        </section>

        <!-- Help Us Improve Section -->
        <section class="card">
            <h3>Help Us Improve - Rate Your Experience</h3>
            <p>Please rate your experience and provide feedback below.</p>
            <div class="feedback-form">
                <div class="star-rating" id="star-rating-container">
                    <i class="fa-regular fa-star" data-value="1"></i>
                    <i class="fa-regular fa-star" data-value="2"></i>
                    <i class="fa-regular fa-star" data-value="3"></i>
                    <i class="fa-regular fa-star" data-value="4"></i>
                    <i class="fa-regular fa-star" data-value="5"></i>
                </div>
                <textarea id="rating-feedback-text" class="feedback-textarea" placeholder="Tell us more about your experience..." rows="4"></textarea>
                <button id="rating-submit-btn" class="submit-btn">Submit Feedback</button>
            </div>
        </section>
        
        <!-- Contact Developer Section -->
        <section class="card">
            <h3>Contact Developer</h3>
            <p>For support or inquiries, please use the form below.</p>
            <div class="feedback-form">
                <textarea id="contact-text" class="feedback-textarea" placeholder="Your message..." rows="4"></textarea>
                <button id="contact-submit-btn" class="submit-btn">Submit Message</button>
            </div>
        </section>

    </main>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Sangguniang Barangay II-F. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Modal for Submission Confirmation -->
    <div id="feedback-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>

    <!-- Link to the external JavaScript file -->
    <script src="script.js"></script>
</body>
</html>
