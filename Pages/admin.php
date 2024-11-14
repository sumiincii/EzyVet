<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

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
$sql = "SELECT a.id, o.fullname, o.email, o.phone, p.name AS pet_name, p.species, p.breed, p.color, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE (o.fullname LIKE '%$search%' 
           OR o.email LIKE '%$search%' 
           OR p.species LIKE '%$search%' 
           OR a.appointment_for LIKE '%$search%' 
           OR a.status LIKE '%$search%')
        ORDER BY a.appointment_date DESC"; // Original sorting

$result = $conn->query($sql);

// Check if the result set is empty
if ($result->num_rows == 0) {
    $noData = true; // Set a flag to indicate no data
} else {
    $noData = false; // Data exists
}

// Fetch total appointments today
$today = date("Y-m-d");
$today_sql = "SELECT COUNT(*) AS total_today FROM appointments WHERE appointment_date = '$today'";
$today_result = $conn->query($today_sql);
$today_count = $today_result ? $today_result->fetch_assoc() : ['total_today' => 0];

// Fetch pending appointments
$pending_sql = "SELECT COUNT(*) AS pending FROM appointments WHERE status = 'Pending'";
$pending_result = $conn->query($pending_sql);
$pending_count = $pending_result ? $pending_result->fetch_assoc() : ['pending' => 0];

// Fetch archived appointments
$archived_sql = "SELECT COUNT(*) AS archived FROM archived_appointments";
$archived_result = $conn->query($archived_sql);
$archived_count = $archived_result ? $archived_result->fetch_assoc() : ['archived' => 0];

// Handle button clicks for accept, decline, archive, and edit
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
        if ($action == 'accept' || $action == 'decline' || $action == 'edit') {
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

                if ($action == 'accept') {
                    $update_sql = "UPDATE appointments SET status = 'Accepted' WHERE id = $appointment_id";
                    $conn->query($update_sql);
                    $mail->Subject = 'Appointment Accepted';
                    $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>Your appointment on ' . $owner['appointment_date'] . ' at ' . date('h:i A', strtotime($owner['appointment_time'])) . ' for ' . $owner['appointment_for'] . ' has been accepted.<br>Thank you!';
                } elseif ($action == 'decline') {
                    $update_sql = "UPDATE appointments SET status = 'Declined' WHERE id = $appointment_id";
                    $conn->query($update_sql);
                    $decline_reason = isset($_POST['decline_reason']) ? $conn->real_escape_string($_POST['decline_reason']) : 'No reason provided.';
                    $mail->Subject = 'Appointment Declined';
                    $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>We regret to inform you that your appointment on ' . $owner['appointment_date'] . ' at ' . date('h:i A', strtotime($owner['appointment_time'])) . ' for ' . $owner['appointment_for'] . ' has been declined.<br>Reason: ' . $decline_reason . '<br>Thank you for your understanding.';
                } elseif ($action == 'edit') {
                    $new_date = $conn->real_escape_string($_POST['new_date']);
                    $new_time = $conn->real_escape_string($_POST['new_time']);
                    $edit_reason = $conn->real_escape_string($_POST['edit_reason']);
                    $update_sql = "UPDATE appointments SET appointment_date = '$new_date', appointment_time = '$new_time' WHERE id = $appointment_id";
                    $conn->query($update_sql);
                    $update_sql = "UPDATE appointments SET status = 'Follow-up' WHERE id = $appointment_id";
                    $conn->query($update_sql);
                    $mail->Subject = 'Appointment Follow-up';
                    $mail->Body = 'Dear ' . $owner['fullname'] . ',<br>Your appointment has been updated to ' . $new_date . ' at ' . date('h:i A', strtotime($new_time)) . '.<br>Edit Reason: ' . $edit_reason . '<br>Thank you!';
                }

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Send the email

                if ($mail->send()) {
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Appointment $action',
            text: 'Appointment $action and email sent successfully.',
            showConfirmButton: false,
            timer: 2000
        });
    </script>";
                } else {
                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Appointment $action',
            text: 'Appointment $action but email could not be sent.',
            showConfirmButton: false,
            timer: 3000
        });
    </script>";
                }
            } catch (Exception $e) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error sending email',
            text: 'Error: " . $mail->ErrorInfo . "',
            showConfirmButton: true
        });
    </script>";
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
$speciesFilter = isset($_GET['species']) ? $conn->real_escape_string($_GET['species']) : '';
$dateFilter = isset($_GET['date']) ? $conn->real_escape_string($_GET['date']) : '';
//base sql query
$sql = "SELECT a.id, 
           o.fullname, 
           o.email, 
           o.phone, 
           p.name AS pet_name, 
           p.species, 
           p.breed, 
           p.color, 
           a.appointment_date, 
           a.appointment_time, 
           a.status, 
           a.appointment_for, 
           a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE (o.fullname LIKE '%$search%' 
           OR p.name LIKE '%$search%' 
           OR o.email LIKE '%$search%' 
           OR o.phone LIKE '%$search%' 
           OR p.species LIKE '%$search%' 
           OR p.breed LIKE '%$search%' 
           OR p.color LIKE '%$search%' 
           OR a.appointment_date LIKE '%$search%' 
           OR a.appointment_time LIKE '%$search%' 
           OR a.appointment_for LIKE '%$search%' 
           OR a.status LIKE '%$search%' 
           OR a.comments LIKE '%$search%')";
// Add species filter if selected
if ($speciesFilter) {
    $sql .= " AND p.species = '$speciesFilter'";
}

// Add date filter if provided
if ($dateFilter) {
    $sql .= " AND a.appointment_date = '$dateFilter'";
}

// Order by appointment date
$sql .= " ORDER BY a.appointment_date DESC";

// Execute the query
$result = $conn->query($sql)


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet Admin</title>
    <link rel="stylesheet" href="css/admins.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="_assets/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            max-width: 230px;
            background-color: #8b61c2;
            color: #fff;
            height: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            background-color: #5ce1e6;
            transform: scale(1.05);
        }

        .sidebar a img.sidebar-icon {
            width: 20px;
            height: auto;
            margin-right: 10px;
        }

        .sidebar .logo {
            display: block;
            margin: 0 auto 20px;
            width: 45%;
            height: auto;
            border-radius: 100px;
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
        <a href="logout.php"><img src="icons/logout.png" alt="Log Out" class="sidebar-icon"> <strong>Log Out</strong></a>
    </div>

    <div class="main-content">
        <div class="container">
            <img src="images/taglogo.png" alt="EzyVet Logo" class="welcome-logo">
            <div class="welcome-section mb-4">
                <h1>Welcome to EzyVet Dashboard</h1>
                <p>Your one-stop solution for managing pet appointments efficiently.</p>
            </div>

            <div>
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
                        <h5>Archived Appointments</h5>
                        <h3><?php echo $archived_count['archived']; ?></h3>
                    </div>
                </div>
            </div>

            <!-- Search and Filter Form -->
            <div class="mb-4">
                <form method="GET" action="" class="d-flex align-items-center">
                    <div class="input-group me-2" style="flex-grow: 1;">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search by owner's name or pet species" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>

                    <label for="speciesFilter" class="me-2"> Filter by Species:</label>
                    <select id="speciesFilter" name="species" class="form-control me-2" style="width: auto;">
                        <option value="">All</option>
                        <option value="Dog" <?php echo (isset($_GET['species']) && $_GET['species'] == 'Dog') ? 'selected' : ''; ?>>Dog</option>
                        <option value="Cat" <?php echo (isset($_GET['species']) && $_GET['species'] == 'Cat') ? 'selected' : ''; ?>>Cat</option>
                        <option value="Others" <?php echo (isset($_GET['species']) && $_GET['species'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                    </select>

                    <label for="dateFilter" class="me-2">Filter by Date:</label>
                    <input type="date" id="dateFilter" name="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>" class="form-control me-2" style="width: auto;">

                    <button type="submit" class="filter-button">Filter</button>
                </form>
            </div>


            <div class="table-wrapper">
                <table class="table table-striped" id="appointments-table">
                    <thead>
                        <tr>
                            <th>Owner's Name</th>
                            <th>Pet's Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Pet's Species</th>
                            <th>Breed</th>
                            <th>Color</th>
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
                                <td><?php echo $row['pet_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['species']; ?></td>
                                <td><?php echo $row['breed']; ?></td>
                                <td><?php echo $row['color']; ?></td>
                                <td><?php echo $row['appointment_date']; ?></td>
                                <td><?php echo date('h:i A', strtotime($row['appointment_time'])); ?></td>
                                <td><?php echo $row['appointment_for']; ?></td>
                                <td class="<?php echo ($row['status'] == 'Pending') ? 'status-pending' : ($row['status'] == 'Accepted' ? 'status-accepted' : ($row['status'] == 'Archived' ? 'status-archived' : 'status-declined')); ?>">
                                    <?php echo $row['status']; ?>
                                </td>
                                <td><?php echo $row['comments']; ?></td>
                                <td class="action-buttons">
                                    <form method="POST" action="" onsubmit="return confirmAction(this.action.value);">
                                        <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="action" value="accept" class="btn btn-success">Accept</button>
                                        <button type="button" class="btn btn-danger" onclick="openDeclinePopup(<?php echo $row['id']; ?>)">Decline</button>
                                        <button type="submit" name="action" value="archive" class="btn btn-dark">Archive</button>
                                        <button style="font-size: 12px;" type="button" class="btn btn-warning" onclick="openEditPopup(<?php echo $row['id']; ?>, '<?php echo $row['appointment_date']; ?>', '<?php echo $row['appointment_time']; ?>')">Follow-up</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Decline Reason Popup -->
    <div class="overlay" id="overlay" style="display:none;">
        <div class="popup" id="popup">
            <h2>Decline Reason</h2>
            <textarea id="declineReason" placeholder="Type the reason for declining..." class="decline-textarea"></textarea>
            <div class="popup-buttons">
                <button id="sendDeclineReason" class="btn btn-danger">Send</button>
                <button class="close-popup btn btn-secondary" onclick="closeDeclinePopup()">Close</button>
            </div>
        </div>
    </div>

    <!-- Edit Appointment Popup -->
    <div class="overlay" id="editOverlay" style="display:none;">
        <div class="popup" id="editPopup">
            <h2>Follow- Appointment</h2>
            <input type="date" id="editDate" class="form-control" placeholder="New Date">
            <input type="time" id="editTime" class="form-control" placeholder="New Time">
            <textarea id="editReason" placeholder="Follow up information..." class="form-control" style="margin-top: 10px;"></textarea>
            <div class="popup-buttons">
                <button id="saveEdit" class="btn btn-warning">Save & Send</button>
                <button class="close-popup btn btn-secondary" onclick="closeEditPopup()" class="">Close</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="_assets/bootstrap.bundle.min.js"></script>
    <script>
        let currentAppointmentId;

        function openDeclinePopup(appointmentId) {
            currentAppointmentId = appointmentId;
            document.getElementById('overlay').style.display = 'block';
        }

        function closeDeclinePopup() {
            document.getElementById('overlay').style.display = 'none';
        }

        document.getElementById('sendDeclineReason').addEventListener('click', function() {
            const declineReason = document.getElementById('declineReason').value;
            if (declineReason) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';

                const appointmentIdInput = document.createElement('input');
                appointmentIdInput.type = 'hidden';
                appointmentIdInput.name = 'appointment_id';
                appointmentIdInput.value = currentAppointmentId;

                const actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = 'action';
                actionInput.value = 'decline';

                const reasonInput = document.createElement('input');
                reasonInput.type = 'hidden';
                reasonInput.name = 'decline_reason';
                reasonInput.value = declineReason;

                form.appendChild(appointmentIdInput);
                form.appendChild(actionInput);
                form.appendChild(reasonInput);

                document.body.appendChild(form);
                form.submit();
            } else {
                alert('Please provide a reason for declining the appointment.');
            }
        });

        let currentEditAppointmentId;

        function openEditPopup(appointmentId, currentDate, currentTime) {
            currentEditAppointmentId = appointmentId;
            document.getElementById('editDate').value = currentDate;
            document.getElementById('editTime').value = currentTime;
            document.getElementById('editOverlay').style.display = 'block';
        }

        function closeEditPopup() {
            document.getElementById('editOverlay').style.display = 'none';
        }

        document.getElementById('saveEdit').addEventListener('click', function() {
            const newDate = document.getElementById('editDate').value;
            const newTime = document.getElementById('editTime').value;
            const editReason = document.getElementById('editReason').value;

            if (newDate && newTime && editReason) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';

                const appointmentIdInput = document.createElement('input');
                appointmentIdInput.type = 'hidden';
                appointmentIdInput.name = 'appointment_id';
                appointmentIdInput.value = currentEditAppointmentId;

                const actionInput = document.createElement('input');
                actionInput.type = 'hidden';
                actionInput.name = 'action';
                actionInput.value = 'edit';

                const dateInput = document.createElement('input');
                dateInput.type = 'hidden';
                dateInput.name = 'new_date';
                dateInput.value = newDate;

                const timeInput = document.createElement('input');
                timeInput.type = 'hidden';
                timeInput.name = 'new_time';
                timeInput.value = newTime;

                const reasonInput = document.createElement('input');
                reasonInput.type = 'hidden';
                reasonInput.name = 'edit_reason';
                reasonInput.value = editReason;

                form.appendChild(appointmentIdInput);
                form.appendChild(actionInput);
                form.appendChild(dateInput);
                form.appendChild(timeInput);
                form.appendChild(reasonInput);

                document.body.appendChild(form);
                form.submit();
            } else {
                alert('Please provide both date, time, and a reason for Follow-up.');
            }
        });

        function confirmAction(action) {
            return confirm("Are you sure you want to accept" + action + " this appointment?");
        }
    </script>
    <!-- Search Filter Script -->
    <script>
        // Search Filter Script
        document.getElementById('search').addEventListener('input', function() {
            var search = this.value.toLowerCase();
            var rows = document.querySelectorAll('#appointments-table tbody tr');
            rows.forEach(function(row) {
                var fullname = row.cells[0].textContent.toLowerCase();
                var petName = row.cells[1].textContent.toLowerCase();
                var email = row.cells[2].textContent.toLowerCase();
                var phone = row.cells[3].textContent.toLowerCase();
                var species = row.cells[4].textContent.toLowerCase();
                var breed = row.cells[5].textContent.toLowerCase();
                var color = row.cells[6].textContent.toLowerCase();
                var date = row.cells[7].textContent.toLowerCase();
                var time = row.cells[8].textContent.toLowerCase();
                var purpose = row.cells[9].textContent.toLowerCase();
                var status = row.cells[10].textContent.toLowerCase();
                var comments = row.cells[11].textContent.toLowerCase();

                if (fullname.includes(search) || petName.includes(search) || email.includes(search) || phone.includes(search) || species.includes(search) || breed.includes(search) || color.includes(search) || date.includes(search) || time.includes(search) || purpose.includes(search) || status.includes(search) || comments.includes(search)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>