<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}
include 'connection.php';

// Fetch feedback data
$feedback_sql = "SELECT * FROM feedback ORDER BY submitted_at DESC";
$feedback_result = $conn->query($feedback_sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet Feedback</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_assets/bootstrap.min.css">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Styles -->
    <style>
        .welcome-logo {
            margin: -65px 15px;
            /* Adjust margin as needed */
            width: 600px;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
            /* margin-right: 15px; */
            /* Space between logo and text */
            vertical-align: middle;
            /* Aligns the logo with text */
        }

        /* Custom Navbar Styles */
        .custom-navbar {
            background-color: #000;
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

        .taglogo {
            height: 200px;
            width: auto;
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <img src="images/mainlogo.png" alt="Logo" class="logo"> <!-- Add logo here -->
            <a class="navbar-brand" href="#">EzyVet Feedback Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Dashboard</a> <!-- New Dashboard link -->
                    </li>
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

    <div class="main-content">
        <img src="images/taglogo.png" alt="EzyVet Logo" class="welcome-logo">
        <div class="container">
            <!-- Feedback Table -->
            <div class="table-wrapper">
                <!-- <h3>Client Feedback</h3> -->
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($feedback = $feedback_result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $feedback['name']; ?></td>
                                <td><?= $feedback['email']; ?></td>
                                <td><?= $feedback['message']; ?></td>
                                <td><?= $feedback['submitted_at']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap JavaScript -->
        <script src="_assets/bootstrap.min.js"></script>
    </div>

</body>

</html>