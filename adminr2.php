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
            sendEmail($mail, $owner, 'Appointment Accepted', 'Your appointment has been accepted.');
        } elseif ($action == 'decline') {
            $update_sql = "UPDATE appointments SET status='Declined' WHERE id=$appointment_id";
            $conn->query($update_sql);
            sendEmail($mail, $owner, 'Appointment Declined', 'Your appointment has been declined.');
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

// Function to send email
function sendEmail($mail, $owner, $subject, $message)
{
    global $conn; // Access the connection variable
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
        $mail->Subject = $subject;
        $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>' . $message . '<br>Thank you!';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        // Send the email
        if ($mail->send()) {
            echo "<div class='alert alert-success'>$subject and email sent successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>$subject but email could not be sent.</div>";
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error sending email: " . $mail->ErrorInfo . "</div>";
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

        .btn {
            margin: 5px;
        }

        .alert {
            margin-top: 20px;
        }

        .search-container {
            margin-bottom: 20px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .stats-card {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center">Appointment Management</h2>

        <div class="stats-card">
            <div>
                <h3><?php echo $today_count['total_today']; ?></h3>
                <p>Total Appointments Today</p>
            </div>
            <div>
                <h3><?php echo $pending_count['pending']; ?></h3>
                <p>Pending Appointments</p>
            </div>
            <div>
                <h3><?php echo $accepted_count['accepted']; ?></h3>
                <p>Accepted Appointments</p>
            </div>
        </div>

        <div class="search-container">
            <input type="text" id="search" class="form-control" placeholder="Search by Owner Name or Pet Species" value="<?php echo $search; ?>">
        </div>

        <div class="table-wrapper">
            <table class="table table-striped" id="appointmentsTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Owner Name</th>
                        <th>Email</th>
                        <th>Pet Species</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['fullname']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['species']}</td>
                            <td>{$row['appointment_date']}</td>
                            <td>{$row['appointment_time']}</td>
                            <td class='status-{$row['status']}'>" . ucfirst($row['status']) . "</td>
                            <td>{$row['comments']}</td>
                            <td>
                                <form method='POST' class='d-inline'>
                                    <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                    <button type='submit' name='action' value='accept' class='btn btn-success'>Accept</button>
                                    <button type='submit' name='action' value='decline' class='btn btn-danger'>Decline</button>
                                    <button type='submit' name='action' value='archive' class='btn btn-secondary'>Archive</button>
                                </form>
                            </td>
                        </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>No appointments found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="_assets/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var searchValue = $(this).val();
                $.ajax({
                    url: '', // Use the same file to handle AJAX request
                    type: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        // Update the table with the response
                        $('#appointmentsTable tbody').html($(response).find('#appointmentsTable tbody').html());
                    }
                });
            });
        });
    </script>
</body>

</html>