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

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
            /* Add this line for light font */
            background-color: #f7f9fc;
            color: #333;
            display: flex;
        }

        .container {
            padding: 20px;
        }

        .sidebar {
            width: 210px;
            /* background-color: #5ce1e6; */
            background-color: #8b61c2;
            /* Changed to a deeper blue */
            color: #fff;
            height: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            /* Added shadow for depth */
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            /* Increased font size */
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s, padding 0.3s;
            /* border-radius: 2px; */
            /* Rounded corners */
        }

        .sidebar a:hover {
            background-color: #5ce1e6;
            /* Darker shade on hover */
            padding-left: 25px;
            /* Slight padding change on hover */
        }

        .main-content {
            flex-grow: 1;
            padding: 29px;
            text-align: center;
        }

        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            /* Light border for the table wrapper */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Added shadow */
        }

        .sidebar .logo {
            display: block;
            margin: 0 auto 20px;
            /* Center the logo and add margin below */
            width: 45%;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 100px;
        }

        .welcome-section {
            text-align: center;
            /* Center the text */
            background-color: #e9ecef;
            /* Light background color */
            padding: 20px;
            /* Padding around the content */
            border-radius: 8px;
            /* Rounded corners */
        }

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

        .sidebar a {
            display: flex;
            /* Use flexbox for alignment */
            align-items: center;
            /* Center items vertically */
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s, padding 0.3s;
        }

        .sidebar a img.sidebar-icon {
            width: 20px;
            /* Adjust icon size as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-right: 10px;
            /* Space between icon and text */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <img src="images/main-logo.png" alt="EzyVet Logo" class="logo">
        <h3><strong>EzyVet Dashboard</strong></h3>
        <a href="admin.php"><img src="icons/dash.png" alt="Dashboard" class="sidebar-icon"> <strong>Dashboard</strong></a>
        <a href="archives.php"><img src="icons/archive.png" alt="Archives" class="sidebar-icon"> <strong>Archives</strong></a>
        <a href="feedback.php"><img src="icons/feedback.png" alt="Feedback" class="sidebar-icon"> <strong>Feedbacks</strong></a>
        <a href="login.php"><img src="icons/logout.png" alt="Log Out" class="sidebar-icon"> <strong>Log Out</strong></a>
    </div>

    <div class="main-content">
        <img src="images/taglogo.png" alt="EzyVet Logo" class="welcome-logo">
        <div class="container">
            <!-- Feedback Table -->
            <div class="table-wrapper">
                <!-- <h3>Client Feedback</h3> -->
                <table class="table table-striped">
                    <thead>
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