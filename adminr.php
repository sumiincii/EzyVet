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
        WHERE o.fullname LIKE '%$search%' 
           OR o.email LIKE '%$search%' 
           OR p.species LIKE '%$search%' 
           OR a.appointment_for LIKE '%$search%' 
           OR a.status LIKE '%$search%'
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

<?php
// Start output buffering
ob_start();

// Include database connection
include 'connection.php';

// Initialize search query and filter variables
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$statusFilter = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';
$dateFilter = isset($_GET['date']) ? $conn->real_escape_string($_GET['date']) : '';
$timeFilter = isset($_GET['time']) ? $conn->real_escape_string($_GET['time']) : '';

// Base SQL query
$sql = "SELECT a.id, o.fullname, o.email, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE (o.fullname LIKE '%$search%' 
           OR o.email LIKE '%$search%' 
           OR p.species LIKE '%$search%' 
           OR a.appointment_for LIKE '%$search%' 
           OR a.status LIKE '%$search%')";

// Add status filter if selected
if ($statusFilter) {
    $sql .= " AND a.status = '$statusFilter'";
}

// Add date filter if provided
if ($dateFilter) {
    $sql .= " AND a.appointment_date = '$dateFilter'";
}

$sql .= " ORDER BY a.appointment_date ASC";

// Execute the query
$result = $conn->query($sql);
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

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

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

        .sidebar {
            width: 250px;
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
            padding: 10px;
            text-align: center;
        }

        .stats-card {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            /* White background */
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Added shadow */
        }

        .stats-card div {
            text-align: center;
        }

        .stats-card h5 {
            font-size: 16px;
            /* Adjusted font size */
            color: #555;
            /* Darker text for better contrast */
            /* font-weight: bold; */
            /* Make the text bold */
        }

        .stats-card h3 {
            font-size: 36px;
            /* Increased font size for numbers */
            color: #8b61c2;
            /* Color for numbers */
            margin: 0;
            /* Remove default margin */
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

        .input-group {
            max-width: 400px;
            /* Limit the width of the search bar */
            margin: 0 0 0 0;
            /* Center the search bar */
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

        .filter-button {
            background-color: #8b61c2;
            /* Main color */
            color: white;
            /* Text color */
            border: none;
            /* No border */
            border-radius: 5px;
            /* Rounded corners */
            padding: 10px 20px;
            /* Padding for size */
            font-size: 16px;
            /* Font size */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s, transform 0.3s;
            /* Smooth transition */
        }

        .filter-button:hover {
            background-color: #5ce1e6;
            /* Lighter color on hover */
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }

        .filter-button:focus {
            outline: none;
            /* Remove default outline */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            /* Add shadow on focus */
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

        /* Style for the search input field */
        .input-group input[type="text"] {
            padding: 10px;
            /* Add padding */
            border: 1px solid #ccc;
            /* Light border */
            border-radius: 5px;
            /* Rounded corners */
            transition: border-color 0.3s;
            /* Smooth transition for border color */
        }

        /* Change border color on focus */
        .input-group input[type="text"]:focus {
            border-color: #8b61c2;
            /* Change border color to match theme */
            outline: none;
            /* Remove default outline */
        }

        /* Style for the search button */
        .input-group button {
            background-color: #8b61c2;
            /* Main color */
            color: white;
            /* Text color */
            border: none;
            /* No border */
            border-radius: 5px;
            /* Rounded corners */
            padding: 10px 20px;
            /* Padding for size */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s, transform 0.3s;
            /* Smooth transition */
        }

        /* Change background color on hover */
        .input-group button:hover {
            background-color: #5ce1e6;
            /* Lighter color on hover */
        }

        /* Change background color on focus */
        .input-group button:focus {
            outline: none;
            /* Remove default outline */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            /* Add shadow on focus */
        }
    </style>
</head>

<body>
    <!-- sidebar -->
    <div class="sidebar">
        <img src="images/main-logo.png" alt="EzyVet Logo" class="logo">
        <h3><strong>EzyVet Dashboard</strong></h3>
        <a href="adminr.php"><img src="icons/dash.png" alt="Dashboard" class="sidebar-icon"> <strong>Dashboard</strong></a>
        <a href="archives.php"><img src="icons/archive.png" alt="Archives" class="sidebar-icon"> <strong>Archives</strong></a>
        <a href="feedback.php"><img src="icons/feedback.png" alt="Feedback" class="sidebar-icon"> <strong>Feedbacks</strong></a>
        <a href="login.php"><img src="icons/logout.png" alt="Log Out" class="sidebar-icon"> <strong>Log Out</strong></a>
    </div>

    <div class="main-content">
        <div class="container">
            <!-- Additional Content -->
            <img src="images/taglogo.png" alt="EzyVet Logo" class="welcome-logo">
            <div class="welcome-section mb-4">
                <h1>Welcome to EzyVet Dashboard</h1>
                <p>Your one-stop solution for managing pet appointments efficiently.</p>
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

            <!-- Search and Filter Form -->
            <div class="mb-4">
                <form method="GET" action="" class="d-flex align-items-center">
                    <div class="input-group me-2" style="flex-grow: 1;">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search by owner's name or pet species" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>

                    <label for="statusFilter" class="me-2">Filter by Status:</label>
                    <select id="statusFilter" name="status" class="form-control me-2" style="width: auto;">
                        <option value="">All</option>
                        <option value="Pending" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Accepted" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Accepted') ? 'selected' : ''; ?>>Accepted</option>
                        <option value="Declined" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Declined') ? 'selected' : ''; ?>>Declined</option>
                        <!-- Removed Archived option -->
                    </select>

                    <label for="dateFilter" class="me-2">Filter by Date:</label>
                    <input type="date" id="dateFilter" name="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>" class="form-control me-2" style="width: auto;">

                    <button type="submit" class="filter-button">Filter</button>
                </form>
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
                var email = row.cells[1].textContent.toLowerCase();
                var species = row.cells[2].textContent.toLowerCase();
                var purpose = row.cells[5].textContent.toLowerCase();
                var status = row.cells[6].textContent.toLowerCase();

                if (fullname.includes(search) || email.includes(search) || species.includes(search) || purpose.includes(search) || status.includes(search)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>