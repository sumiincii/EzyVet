<?php
// Start output buffering
ob_start();

// Database connection
include 'connection.php';

// Fetch appointments data
$sql = "SELECT a.id, o.fullname, p.species, a.appointment_date, a.appointment_time, a.status 
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

// Handle button clicks for accept and decline
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $action = $_POST['action'];

    if ($action == 'accept') {
        $update_sql = "UPDATE appointments SET status='Accepted' WHERE id=$appointment_id";
    } elseif ($action == 'decline') {
        $update_sql = "UPDATE appointments SET status='Declined' WHERE id=$appointment_id";
    }

    if ($conn->query($update_sql) === TRUE) {
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

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
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
                <p><?php echo $today_count['total_today']; ?></p>
            </div>
            <div>
                <h5>Pending Appointments</h5>
                <p><?php echo $pending_count['pending']; ?></p>
            </div>
            <div>
                <h5>Accepted Appointments</h5>
                <p><?php echo $accepted_count['accepted']; ?></p>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="table-wrapper">
            <h4>Scheduled Appointments</h4>
            <input class="form-control mb-3" id="search" type="text" placeholder="Search...">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Pet Owner</th>
                        <th>Species</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="appointmentTable">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["fullname"] . "</td>";
                            echo "<td>" . $row["species"] . "</td>";
                            echo "<td>" . date("m/d/Y", strtotime($row["appointment_date"])) . "</td>";
                            echo "<td>" . date("h:i A", strtotime($row["appointment_time"])) . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td class='action-buttons'>
                                    <form method='POST' style='display:inline;'>
                                        <input type='hidden' name='appointment_id' value='" . $row["id"] . "'>
                                        <button type='submit' name='action' value='accept' class='btn btn-success btn-sm'>Accept</button>
                                    </form>
                                    <form method='POST' style='display:inline;'>
                                        <input type='hidden' name='appointment_id' value='" . $row["id"] . "'>
                                        <button type='submit' name='action' value='decline' class='btn btn-danger btn-sm'>Decline</button>
                                    </form>
                                    <button class='btn btn-dark btn-sm' data-toggle='modal' data-target='#archiveModal'>Archive</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No appointments found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="_assets/bootstrap.bundle.min.js"></script>

    <!-- Search Functionality -->
    <script>
        document.getElementById("search").addEventListener("keyup", function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll("#appointmentTable tr");

            rows.forEach(function(row) {
                var isMatch = false;
                row.querySelectorAll("td").forEach(function(cell) {
                    if (cell.textContent.toLowerCase().includes(value)) {
                        isMatch = true;
                    }
                });

                if (isMatch) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>