<?php
// Start output buffering
ob_start();

// Database connection
include 'connection.php';

// Fetch appointments data
$sql = "SELECT a.id, o.fullname, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        ORDER BY a.appointment_date ASC";

$result = $conn->query($sql);

// Fetch total appointments today
$today = date("Y-m-d");
$today_sql = "SELECT COUNT(*) AS total_today FROM appointments WHERE appointment_date = '$today'";
$today_result = $conn->query($today_sql);
$today_count = $today_result->fetch_assoc();

// Fetch pending appointments
$pending_sql = "SELECT COUNT(*) AS pending FROM appointments WHERE status = 'Pending'";
$pending_result = $conn->query($pending_sql);
$pending_count = $pending_result->fetch_assoc();

// Fetch accepted appointments (formerly confirmed)
$accepted_sql = "SELECT COUNT(*) AS accepted FROM appointments WHERE status = 'Accepted'";
$accepted_result = $conn->query($accepted_sql);
$accepted_count = $accepted_result->fetch_assoc();

// Handle button clicks for accept, decline, and archive
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $conn->real_escape_string($_POST['appointment_id']);
    $action = $conn->real_escape_string($_POST['action']);

    if ($action == 'accept') {
        $update_sql = "UPDATE appointments SET status='Accepted' WHERE id=$appointment_id";
    } elseif ($action == 'decline') {
        $update_sql = "UPDATE appointments SET status='Declined' WHERE id=$appointment_id";
    } elseif ($action == 'archive') {
        // Fetch the appointment details
        $fetch_sql = "SELECT id, owner_id, pet_id, appointment_date, appointment_time, status, appointment_for, comments 
                      FROM appointments WHERE id=$appointment_id";
        $fetch_result = $conn->query($fetch_sql);
        $appointment = $fetch_result->fetch_assoc();

        // Insert into archived_appointments
        $insert_sql = "INSERT INTO archived_appointments (id, owner_id, pet_id, appointment_date, appointment_time, status, appointment_for, comments)
                       VALUES ('{$appointment['id']}', '{$appointment['owner_id']}', '{$appointment['pet_id']}', '{$appointment['appointment_date']}', '{$appointment['appointment_time']}', '{$appointment['status']}', '{$appointment['appointment_for']}', '{$appointment['comments']}')";
        $conn->query($insert_sql);

        // Delete from appointments
        $delete_sql = "DELETE FROM appointments WHERE id=$appointment_id";
        $conn->query($delete_sql);
    } else {
        echo "<div class='alert alert-danger'>Invalid action.</div>";
        exit();
    }

    if ($conn->affected_rows > 0) {
        echo "<div class='alert alert-success'>Appointment updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating appointment: " . $conn->error . "</div>";
    }

    // Redirect to avoid form resubmission issues
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// End output buffering and flush output
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet Admin</title>

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

        .stats-card {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .stats-card div {
            text-align: center;
        }

        .stats-card h5 {
            font-weight: 600;
            margin-bottom: 10px;
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

        .status-pending {
            background-color: orange;
            color: white;
        }

        .status-declined {
            background-color: red;
            color: white;
        }

        .status-accepted {
            background-color: green;
            color: white;
        }

        .action-buttons button {
            margin-right: 5px;
            transition: all 0.3s;
        }

        .action-buttons button:hover {
            transform: scale(1.05);
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
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
            .stats-card {
                flex-direction: column;
            }

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
                <a href="#">Dashboard</a>
                <a href="archives.php">Archives</a>
                <a href="#">Log Out</a>
            </div>
        </div>

        <!-- Stats Card -->
        <div class="stats-card">
            <div>
                <h5>Total Appointments Today</h5>
                <p><?php echo isset($today_count['total_today']) ? $today_count['total_today'] : 'N/A'; ?></p>
            </div>
            <div>
                <h5>Pending Appointments</h5>
                <p><?php echo isset($pending_count['pending']) ? $pending_count['pending'] : 'N/A'; ?></p>
            </div>
            <div>
                <h5>Accepted Appointments</h5>
                <p><?php echo isset($accepted_count['accepted']) ? $accepted_count['accepted'] : 'N/A'; ?></p>
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
                        <th>For</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Determine the status class
                            $status_class = '';
                            if ($row['status'] == 'Pending') {
                                $status_class = 'status-pending';
                            } elseif ($row['status'] == 'Declined') {
                                $status_class = 'status-declined';
                            } elseif ($row['status'] == 'Accepted') {
                                $status_class = 'status-accepted';
                            }

                            echo "<tr>";
                            echo "<td>{$row['fullname']}</td>";
                            echo "<td>{$row['species']}</td>";
                            echo "<td>{$row['appointment_date']}</td>";
                            echo "<td>{$row['appointment_time']}</td>";
                            echo "<td class='{$status_class}'>{$row['status']}</td>";
                            echo "<td>{$row['appointment_for']}</td>";
                            echo "<td>{$row['comments']}</td>";
                            echo "<td class='action-buttons'>
                                    <form method='post' class='d-inline'>
                                        <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                        <button type='submit' name='action' value='accept' class='btn btn-success'>Accept</button>
                                    </form>
                                    <form method='post' class='d-inline'>
                                        <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                        <button type='submit' name='action' value='decline' class='btn btn-danger'>Decline</button>
                                    </form>
                                    <form method='post' class='d-inline'>
                                        <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                        <button type='submit' name='action' value='archive' class='btn btn-secondary'>Archive</button>
                                    </form>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No appointments found.</td></tr>";
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