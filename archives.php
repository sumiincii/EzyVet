<?php
// Start output buffering
ob_start();

// Database connection
include 'connection.php';

// Fetch archived appointments data
$sql = "SELECT a.id, o.fullname, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM archived_appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        ORDER BY a.appointment_date ASC";

$result = $conn->query($sql);

// End output buffering and flush output
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet Archives</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_assets/bootstrap.min.css">

    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

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
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table td {
            word-wrap: break-word;
            max-width: 150px;
            /* Adjust as needed */
            white-space: normal;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Modal Styling */
        .modal-header {
            background-color: #007bff;
            color: #fff;
        }

        .modal-footer .btn-secondary {
            background-color: #343a40;
            border-color: #343a40;
        }

        /* Media Queries for Mobile */
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }
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
                <a href="admin.php">Dashboard</a>
                <a href="#">Archives</a>
                <a href="#">Log Out</a>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Owner Name</th>
                        <th>Pet Species</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th>Purpose</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['fullname']}</td>";
                            echo "<td>{$row['species']}</td>";
                            echo "<td>{$row['appointment_date']}</td>";
                            echo "<td>{$row['appointment_time']}</td>";
                            echo "<td>{$row['status']}</td>";
                            echo "<td>{$row['appointment_for']}</td>";
                            echo "<td>{$row['comments']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No archived appointments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (Include if needed) -->
    <script src="_assets/bootstrap.bundle.min.js"></script>
</body>

</html>