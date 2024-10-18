<?php
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
            background-color: #f7f9fc;
            color: #333;
        }

        .container {
            margin-top: 30px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
        }

        .dashboard-header h2 {
            font-weight: 600;
        }

        .dashboard-header img {
            border-radius: 50%;
        }

        .dashboard-header a {
            color: #fff;
            margin-left: 15px;
            padding: 8px 15px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dashboard-header a:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="d-flex align-items-center">
                <img src="your-image-url" alt="Dr. Ron" width="50" height="50">
                <h2>Dr. Ron</h2>
            </div>
            <div>
                <a href="feedback.php">Feedback</a>
                <a href="admin.php">Dashboard</a>
                <a href="archives.php">Archives</a>
                <a href="login.php">Log Out</a>
            </div>
        </div>

        <!-- Feedback Table -->
        <div class="table-wrapper">
            <h3>Client Feedback</h3>
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
</body>

</html>