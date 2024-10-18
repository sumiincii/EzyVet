<?php
// Start output buffering
ob_start();

// Include database connection
include 'connection.php';

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Initialize search query
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Fetch appointments data with search functionality
$sql = "SELECT a.id, o.fullname, o.email, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE o.fullname LIKE '%$search%' OR p.species LIKE '%$search%'
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
    if (isset($_POST['appointment_id']) && isset($_POST['action'])) {
        $appointment_id = $conn->real_escape_string($_POST['appointment_id']);
        $action = $conn->real_escape_string($_POST['action']);

        // Fetch the owner's email for sending notifications
        $owner_email_sql = "SELECT o.email, o.fullname, a.appointment_date, a.appointment_time, a.appointment_for 
                            FROM appointments a
                            JOIN owners o ON a.owner_id = o.id
                            WHERE a.id = $appointment_id";
        $owner_result = $conn->query($owner_email_sql);
        $owner = $owner_result->fetch_assoc();

        // Check for action type
        if ($action == 'accept') {
            $update_sql = "UPDATE appointments SET status='Accepted' WHERE id=$appointment_id";
            $conn->query($update_sql);

            // Send email notification using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ezyvet.neust@gmail.com'; // your gmail
                $mail->Password = 'gjyk hyze xust szfv'; // app password
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('ezyvet.neust@gmail.com', 'EzyVet');
                $mail->addAddress($owner['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Appointment Accepted';
                $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>Your appointment on ' . $owner['appointment_date '] . ' at ' . $owner['appointment_time'] . ' for ' . $owner['appointment_for'] . ' has been accepted.<br>Thank you!';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                // Send the email
                if ($mail->send()) {
                    echo "<div class='alert alert-success'>Appointment accepted and email sent successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Appointment accepted but email could not be sent.</div>";
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Error sending email: " . $mail->ErrorInfo . "</div>";
            }
        } elseif ($action == 'decline') {
            $update_sql = "UPDATE appointments SET status ='Declined' WHERE id=$appointment_id";
            $conn->query($update_sql);

            // Send email notification using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ezyvet.neust@gmail.com'; // your gmail
                $mail->Password = 'gjyk hyze xust szfv'; // app password
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mail->setFrom('ezyvet.neust@gmail.com', 'EzyVet');
                $mail->addAddress($owner['email']);
                $mail->isHTML(true);
                $mail->Subject = 'Appointment Declined';
                $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>Your appointment on ' . $owner['appointment_date'] . ' at ' . $owner['appointment_time'] . ' for ' . $owner['appointment_for'] . ' has been declined.<br>Thank you!';
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                // Send the email
                if ($mail->send()) {
                    echo "<div class='alert alert-success'>Appointment declined and email sent successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Appointment declined but email could not be sent.</div>";
                }
            } catch (Exception $e) {
                echo "<div class='alert alert-danger'>Error sending email: " . $mail->ErrorInfo . "</div>";
            }
        } elseif ($action == 'archive') {
            $update_sql = "UPDATE appointments SET status='Archived' WHERE id=$appointment_id";
            $conn->query($update_sql);
            echo "<div class='alert alert-success'>Appointment archived successfully.</div>";
        }
    }
}

// Close database connection
$conn->close();

// End output buffering
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzyVet Admin Dashboard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_assets/bootstrap.min.css">

    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar-header img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 15px;
        }

        .sidebar-menu a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar-menu a i {
            margin-right: 10px;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
        }

        .dashboard-header {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .stats-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .stats-card h5 {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stats-card h3 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .table-wrapper {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table thead {
            background-color: #3498db;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .status-pending {
            background-color: #f39c12;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .status-declined {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .status-approved {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="https://via.placeholder.com/80" alt="Logo">
                <h4>EzyVet Admin</h4>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="users.php"><i class="fas fa-user"></i> Users</a></li>
                <li><a href="pets.php"><i class="fas fa-paw"></i> Pets</a></li>
                <li><a href="appointments.php"><i class="fas fa-calendar"></i> Appointments</a></li>
                <li><a href="archived_appointments.php"><i class="fas fa-archive"></i> Archived Appointments</a></li>
                <li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="dashboard-header">
                <h2>Welcome to EzyVet Admin Dashboard</h2>
                <p>Manage your veterinary clinic with ease.</p>
                <form>
                    <input type="search" name="search" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-card">
                        <h5>Total Appointments Today</h5>
                        <h3><?php echo $today_count['total_today']; ?></h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h5>Pending Appointments</h5>
                        <h3><?php echo $pending_count['pending']; ?></h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h5>Accepted Appointments</h5>
                        <h3><?php echo $accepted_count['accepted']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pet Name</th>
                            <th>Owner Name</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['species']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['appointment_date']; ?></td>
                                <td><?php echo $row['appointment_time']; ?></td>
                                <td>
                                    <?php
                                    if ($row['status'] == 'Pending') {
                                        echo "<span class='status-pending'>Pending</span>";
                                    } elseif ($row['status'] == 'Accepted') {
                                        echo "<span class='status-approved'>Accepted</span>";
                                    } elseif ($row['status'] == 'Declined') {
                                        echo "<span class='status-declined'>Declined</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                        <button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
                                        <button type="submit" name="action" value="archive" class="btn btn-secondary">Archive</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="_assets/bootstrap.min.js"></script>
</body>

</html>