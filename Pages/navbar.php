<?php
include 'connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch the current settings
$sql = "SELECT navbar_color FROM settings WHERE id=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$navbar_color = $row['navbar_color'];


?>
<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container">
        <img src="images/mainlogo.png" alt="Logo" class="logo"> <!-- Add logo here -->
        <a class="navbar-brand" href="#">EzyVet Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="report.php">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Custom Navbar Styles */
    .custom-navbar {
        /* background-color: #000; */
        background-color: <?php echo htmlspecialchars($navbar_color); ?>;
        /* Change to black */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .custom-navbar .navbar-brand {
        color: #ffffff;
        /* Brand text color */
        font-weight: bold;
        /* Make brand text bold */
    }

    .custom-navbar .navbar-nav .nav-link {
        color: #ffffff;
        /* Default link color */
        transition: color 0.3s ease, text-shadow 0.3s ease;
        /* Smooth transition for color and text shadow */
        padding: 10px 15px;
        /* Add padding for better click area */
    }

    .custom-navbar .navbar-nav .nav-link:hover {
        color: #ffd700;
        /* Change text color on hover */
        text-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
        /* Subtle glow effect */
        background-color: transparent;
        /* No background color on hover */
    }

    .custom-navbar .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
        /* Toggler border color */
    }

    .logo {
        height: 60px;
        /* Adjust logo height */
        margin-right: 10px;
        /* Space between logo and brand name */
        border-radius: 5px;
    }
</style>