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
                $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>Your appointment on ' . $owner['appointment_date'] . ' at ' . $owner['appointment_time'] . ' for ' . $owner['appointment_for'] . ' has been accepted.<br>Thank you!';
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
            $update_sql = "UPDATE appointments SET status='Declined' WHERE id=$appointment_id";
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

            echo "<div class='alert alert-secondary'>Appointment archived successfully.</div>";
        }

        // Redirect to avoid form resubmission issues
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<div class='alert alert-danger'>Form data missing. Please try again.</div>";
    }
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

        .stats-card {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .stats-card div {
            text-align: center;
        }

        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
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

        .status-archived {
            background-color: gray;
            color: white;
        }

        .action-buttons button {
            margin-right: 5px;
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

        <!-- Stats Card -->
        <div class="stats-card">
            <div>
                <h5>Today's Appointments</h5>
                <h3><?php echo $today_count['total_today']; ?></h3>
            </div>
            <div>
                <h5>Pending Appointments</h5>
                <h3><?php echo $pending_count['pending']; ?></h3>
            </div>
            <div>
                <h5>Accepted Appointments</h5>
                <h3><?php echo $accepted_count['accepted']; ?></h3>
            </div>
        </div>

        <!-- Search Form -->
        <div class="mb-4">
            <input type="text" id="search" class="form-control" style="width: 300px;" placeholder="Search by owner's name or pet species">
        </div>

        <!-- Appointment Table -->
        <div class="table-wrapper">
            <table class="table table-striped" id="appointments-table">
                <thead>
                    <tr>
                        <th>Owner's Name</th>
                        <th>Email</th>
                        <th>Pet's Species</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['species']; ?></td>
                            <td><?php echo $row['appointment_date']; ?></td>
                            <td><?php echo $row['appointment_time']; ?></td>
                            <td><?php echo $row['appointment_for']; ?></td>
                            <td class="<?php echo ($row['status'] == 'Pending') ? 'status-pending' : ($row['status'] == 'Accepted' ? 'status-accepted' : ($row['status'] == 'Archived' ? 'status-archived' : 'status-declined')); ?>">
                                <?php echo $row['status']; ?>
                            </td>
                            <td><?php echo $row['comments']; ?></td>
                            <td class="action-buttons">
                                <form method="POST" action="">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                    <button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
                                    <button type="submit" name="action" value="archive" class="btn btn-secondary">Archive</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Bootstrap JS -->
    <script src="_assets/bootstrap.bundle.min.js"></script>

    <!-- Search Filter Script -->
    <script>
        document.getElementById('search').addEventListener('input', function() {
            var search = this.value.toLowerCase();
            var rows = document.querySelectorAll('#appointments-table tbody tr');
            rows.forEach(function(row) {
                var fullname = row.cells[0].textContent.toLowerCase();
                var species = row.cells[2].textContent.toLowerCase();
                if (fullname.includes(search) || species.includes(search)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>