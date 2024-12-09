<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}
include 'connection.php';
include 'send_mail.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch current appointments for each service
$current_appointments_query = "
    SELECT service, id, client_name, queue_number 
    FROM appointments1 
    WHERE status NOT IN ('Completed', 'Canceled') 
    AND queue_number = 1"; // Assuming queue_number = 1 indicates the current appointment being served

$current_appointments_result = $conn->query($current_appointments_query);
$current_appointments = [];
while ($row = $current_appointments_result->fetch_assoc()) {
    $current_appointments[$row['service']] = $row; // Store current appointment by service
}
// Handle status update
if (isset($_POST['status'])) {
    $appointment_id = $_POST['appointment_id'];
    $new_status = $_POST['status']; // Get the status from the button clicked
    $email = $_POST['email'];
    $client_name = $_POST['client_name'];
    $queue_number = $_POST['queue_number'];

    // Fetch the service and appointment date for the appointment being updated
    $appointment_query = "SELECT service, appointment_date FROM appointments1 WHERE id = $appointment_id";
    $appointment_result = $conn->query($appointment_query);
    $appointment_data = $appointment_result->fetch_assoc();
    $service = $appointment_data['service']; // Define the $service variable here
    $appointment_date = $appointment_data['appointment_date'];

    // Update status in the database
    $update_query = "UPDATE appointments1 SET status = '$new_status' WHERE id = $appointment_id";
    if ($conn->query($update_query)) {
        // Notify other clients only if the status is "Completed"
        if ($new_status == "Completed") {
            // Remove the completed appointment from the current appointments
            $update_query = "UPDATE appointments1 SET status = 'Completed' WHERE id = $appointment_id";
            $conn->query($update_query);

            // Check for the next appointment in the queue
            $next_appointment_query = "SELECT id FROM appointments1 WHERE service = '$service' AND status NOT IN ('Completed', 'Canceled') ORDER BY queue_number ASC LIMIT 1";
            $next_appointment_result = $conn->query($next_appointment_query);

            if ($next_appointment_result->num_rows > 0) {
                $next_appointment_row = $next_appointment_result->fetch_assoc();
                $next_appointment_id = $next_appointment_row['id'];

                // Update the status of the next appointment to indicate it's being served
                // $update_next_query = "UPDATE appointments1 SET status = 'In Service' WHERE id = $next_appointment_id";
                // $conn->query($update_next_query);
            }
            // Update queue numbers for other appointments on the same date and service
            $appointment_query = "SELECT service, appointment_date FROM appointments1 WHERE id = $appointment_id";
            $appointment_result = $conn->query($appointment_query);
            $appointment_data = $appointment_result->fetch_assoc();
            $service = $appointment_data['service'];
            $appointment_date = $appointment_data['appointment_date'];

            // Reduce queue numbers for other clients
            $update_queue_query = "UPDATE appointments1 SET queue_number = queue_number - 1 WHERE service = '$service' AND appointment_date = '$appointment_date' AND queue_number > 0";
            $conn->query($update_queue_query);

            // Send notifications to clients
            $notification_query = "SELECT email, client_name, queue_number FROM appointments1 WHERE service = '$service' AND appointment_date = '$appointment_date' AND queue_number > 0";
            $notification_result = $conn->query($notification_query);
            while ($row = $notification_result->fetch_assoc()) {
                sendNotification($row['email'], $row['client_name'], $row['queue_number']);
            }
        } elseif ($new_status == "Notified") {
            // Send notifications to clients when status is "Notified"
            $notification_query = "SELECT email, client_name, queue_number FROM appointments1 WHERE id = $appointment_id";
            $notification_result = $conn->query($notification_query);
            if ($notification_result->num_rows > 0) {
                $row = $notification_result->fetch_assoc();
                sendNotification($row['email'], $row['client_name'], $row['queue_number']);
            }
        } elseif ($new_status == "Canceled") {
            // Update the status of the canceled appointment
            $update_query = "UPDATE appointments1 SET status = 'Canceled' WHERE id = $appointment_id";
            $conn->query($update_query);

            // Check for the next appointment in the queue
            $next_appointment_query = "SELECT id FROM appointments1 WHERE service = '$service' AND status NOT IN ('Completed', 'Canceled') ORDER BY queue_number ASC LIMIT 1";
            $next_appointment_result = $conn->query($next_appointment_query);

            if ($next_appointment_result->num_rows > 0) {
                $next_appointment_row = $next_appointment_result->fetch_assoc();
                $next_appointment_id = $next_appointment_row['id'];

                // // Update the status of the next appointment to indicate it's being served
                // $update_next_query = "UPDATE appointments1 SET status = 'In Service' WHERE id = $next_appointment_id";
                // $conn->query($update_next_query);
            }
            $cancel_reason = "Your appointment has been canceled."; // You can customize this message
            sendCancellationNotification($email, $client_name, $cancel_reason);

            // Get the service and appointment date for the canceled appointment
            $appointment_query = "SELECT service, appointment_date, queue_number FROM appointments1 WHERE id = $appointment_id";
            $appointment_result = $conn->query($appointment_query);
            $appointment_data = $appointment_result->fetch_assoc();
            $service = $appointment_data['service'];
            $appointment_date = $appointment_data['appointment_date'];
            $canceled_queue_number = $appointment_data['queue_number']; // Get the queue number of the canceled appointment

            // Reduce queue numbers for other clients below the canceled appointment
            $update_queue_query = "UPDATE appointments1 SET queue_number = queue_number - 1 
                           WHERE service = '$service' 
                           AND appointment_date = '$appointment_date' 
                           AND queue_number > $canceled_queue_number";
            $conn->query($update_queue_query);

            // Send notifications to clients
            $notification_query = "SELECT email, client_name, queue_number FROM appointments1 WHERE service = '$service' AND appointment_date = '$appointment_date' AND queue_number > 0";
            $notification_result = $conn->query($notification_query);
            while ($row = $notification_result->fetch_assoc()) {
                sendNotification($row['email'], $row['client_name'], $row['queue_number']);
            }
        }
        echo "<script>alert('Status updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}

// Fetch appointments for each service (excluding completed and canceled ones)
$grooming_appointments_query = "SELECT * FROM appointments1 WHERE service = 'Grooming' AND status NOT IN ('Completed', 'Canceled') ORDER BY appointment_date, queue_number ASC";
$vaccination_appointments_query = "SELECT * FROM appointments1 WHERE service = 'Vaccination' AND status NOT IN ('Completed', 'Canceled') ORDER BY appointment_date, queue_number ASC";
$checkup_appointments_query = "SELECT * FROM appointments1 WHERE service = 'Checkup' AND status NOT IN ('Completed', 'Canceled') ORDER BY appointment_date, queue_number ASC";

$grooming_appointments_result = $conn->query($grooming_appointments_query);
$vaccination_appointments_result = $conn->query($vaccination_appointments_query);
$checkup_appointments_result = $conn->query($checkup_appointments_query);
// Handle adding walk-in appointment
if (isset($_POST['add_walkin'])) {
    $client_name = $_POST['client_name'];
    $email = $_POST['email'];
    $pet_details = $_POST['pet_details'];
    $service = $_POST['service'];
    $appointment_date = $_POST['appointment_date'];
    $status = 'Walk-in';

    // Fetch the maximum queue number for the given date and service
    $queue_query = "SELECT MAX(queue_number) as max_queue FROM appointments1 WHERE appointment_date = '$appointment_date' AND service = '$service'";
    $queue_result = $conn->query($queue_query);
    $queue_row = $queue_result->fetch_assoc();
    $queue_number = ($queue_row['max_queue'] ?? 0) + 1; // Increment the max queue number by 1

    // Insert the walk-in appointment into the database
    $stmt = $conn->prepare("INSERT INTO appointments1 (client_name, email, pet_details, service, appointment_date, queue_number, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $client_name, $email, $pet_details, $service, $appointment_date, $queue_number, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Walk-in appointment added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding walk-in appointment: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href=""> -->
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom Navbar Styles */
        .custom-navbar {
            background-color: #000;
            /* Change to black */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-navbar .navbar-brand {
            color: #ffffff;
            /* Brand text color */
            font-weight: bold;
            /* Make brand text bold */
        }

        .custom-navbar .navbar-nav .nav-link {
            color: #ffffff;
            /* Default link color */
            transition: color 0.3s ease, text-shadow 0.3s ease;
            /* Smooth transition for color and text shadow */
            padding: 10px 15px;
            /* Add padding for better click area */
        }

        .custom-navbar .navbar-nav .nav-link:hover {
            color: #ffd700;
            /* Change text color on hover */
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            /* Subtle glow effect */
            background-color: transparent;
            /* No background color on hover */
        }

        .custom-navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
            /* Toggler border color */
        }


        .logo {
            height: 60px;
            /* Adjust logo height */
            margin-right: 10px;
            /* Space between logo and brand name */
            border-radius: 5px;
        }

        .taglogo {
            height: 200px;
            width: auto;
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <img src="images/mainlogo.png" alt="Logo" class="logo"> <!-- Add logo here -->
            <a class="navbar-brand" href="#">EzyVet Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <img src="images/taglogo.png" alt="Logo" class="taglogo"> <!-- Add logo here -->
        <!-- <h1 class="text-center mb-4">Admin Dashboard</h1> -->

        <h2>Current Appointments</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Service</th>
                    <th>Client Name</th>
                    <th>Queue Number</th>
                    <th>Actions</th> <!-- Add Actions column -->
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($current_appointments)): ?>
                    <?php foreach ($current_appointments as $appointment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($appointment['service'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($appointment['client_name'] ?? ''); ?></td>
                            <td><?php echo htmlspecialchars($appointment['queue_number'] ?? ''); ?></td>
                            <td class="text-center">
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="appointment_id" value="<?php echo htmlspecialchars($appointment['id'] ?? ''); ?>">
                                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($appointment['email'] ?? ''); ?>">
                                    <input type="hidden" name="client_name" value="<?php echo htmlspecialchars($appointment['client_name'] ?? ''); ?>">
                                    <input type="hidden" name="queue_number" value="<?php echo htmlspecialchars($appointment['queue_number'] ?? ''); ?>">
                                    <button type="submit" name="status" value="Notified" class="btn btn-info btn-sm">Notify</button>
                                    <button type="submit" name="status" value="Completed" class="btn btn-success btn-sm">Complete</button>
                                    <button type="submit" name="status" value="Canceled" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No current appointments found.</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>














        <!-- Search Input -->
        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="Search appointments...">
        </div>

        <!-- Grooming Appointments Table -->
        <h2>Grooming Appointments</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Queue Number</th>
                    <th>Client Name</th>
                    <th>Pet Details</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="groomingAppointmentsTable">
                <?php if ($grooming_appointments_result->num_rows > 0): ?>
                    <?php while ($row = $grooming_appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo isset($row['queue_number']) ? $row['queue_number'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['client_name']) ? $row['client_name'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['pet_details']) ? $row['pet_details'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['appointment_date']) ? $row['appointment_date'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['status']) ? $row['status'] : 'N/A'; ?></td>
                            <td class="text-center">
                                <!-- Update Status Form -->
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="client_name" value="<?php echo $row['client_name']; ?>">
                                    <input type="hidden" name="queue_number" value="<?php echo $row['queue_number']; ?>">
                                    <!-- <button type="submit" name="status" value="Pending" class="btn btn-warning btn-sm">Set Pending</button> -->
                                    <button type="submit" name="status" value="Notified" class="btn btn-info btn-sm">Notify</button>
                                    <button type="submit" name="status" value="Completed" class="btn btn-success btn-sm">Complete</button>
                                    <button type="submit" name="status" value="Canceled" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No grooming appointments found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Vaccination Appointments Table -->
        <h2>Vaccination Appointments</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Queue Number</th>
                    <th>Client Name</th>
                    <th>Pet Details</th>
                    <th>Date</th>
                    <th>Status </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="vaccinationAppointmentsTable">
                <?php if ($vaccination_appointments_result->num_rows > 0): ?>
                    <?php while ($row = $vaccination_appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo isset($row['queue_number']) ? $row['queue_number'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['client_name']) ? $row['client_name'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['pet_details']) ? $row['pet_details'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['appointment_date']) ? $row['appointment_date'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['status']) ? $row['status'] : 'N/A'; ?></td>
                            <td class="text-center">
                                <!-- Update Status Form -->
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="client_name" value="<?php echo $row['client_name']; ?>">
                                    <input type="hidden" name="queue_number" value="<?php echo $row['queue_number']; ?>">
                                    <!-- <button type="submit" name="status" value="Pending" class="btn btn-warning btn-sm">Set Pending</button> -->
                                    <button type="submit" name="status" value="Notified" class="btn btn-info btn-sm">Notify</button>
                                    <button type="submit" name="status" value="Completed" class="btn btn-success btn-sm">Complete</button>
                                    <button type="submit" name="status" value="Canceled" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No vaccination appointments found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Checkup Appointments Table -->
        <h2>Checkup Appointments</h2>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Queue Number</th>
                    <th>Client Name</th>
                    <th>Pet Details</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="checkupAppointmentsTable">
                <?php if ($checkup_appointments_result->num_rows > 0): ?>
                    <?php while ($row = $checkup_appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo isset($row['queue_number']) ? $row['queue_number'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['client_name']) ? $row['client_name'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['pet_details']) ? $row['pet_details'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['appointment_date']) ? $row['appointment_date'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['status']) ? $row['status'] : 'N/A'; ?></td>
                            <td class="text-center">
                                <!-- Update Status Form -->
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="client_name" value="<?php echo $row['client_name']; ?>">
                                    <input type="hidden" name="queue_number" value="<?php echo $row['queue_number']; ?>">
                                    <!-- <button type="submit" name="status" value="Pending" class="btn btn-warning btn-sm">Set Pending</button> -->
                                    <button type="submit" name="status" value="Notified" class="btn btn-info btn-sm">Notify</button>
                                    <button type="submit" name="status" value="Completed" class="btn btn-success btn-sm">Complete</button>
                                    <button type="submit" name="status" value="Canceled" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No checkup appointments found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

    <div class="container contaier-fluid">
        <div class="mb-4">
            <h2>Add Walk-in Appointment</h2>
            <form action="" method="post" class="mb-3">
                <div class="mb-3">
                    <label for="client_name" class="form-label">Client Name:</label>
                    <input type="text" name="client_name" id="client_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pet_details" class="form-label">Pet Details:</label>
                    <textarea name="pet_details" id="pet_details" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="service" class="form-label">Service:</label>
                    <select name="service" id="service" class="form-select" required>
                        <option value="" disabled selected>Select a Service</option>
                        <option value="Grooming">Grooming</option>
                        <option value="Vaccination">Vaccination</option>
                        <option value="Checkup">Checkup</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="appointment_date" class="form-label">Date:</label>
                    <input type="date" name="appointment_date" id="appointment_date" class="form-control" required onchange="checkDate()">
                </div>


                <script>
                    // Set the minimum date to today when the document is ready
                    document.addEventListener('DOMContentLoaded', function() {
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                        var yyyy = today.getFullYear();
                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById('appointment_date').setAttribute('min', today);
                    });

                    function checkDate() {
                        var selectedDate = new Date(document.getElementById('appointment_date').value);
                        var day = selectedDate.getDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

                        if (day === 0) { // If the selected day is Sunday
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Date',
                                text: 'You cannot select a Sunday. Please choose another date.',
                            });
                            document.getElementById('appointment_date').value = ''; // Clear the input
                        }
                    }
                </script>
                <p> Queue Number for Selected Date: <span id="current_queue" style="color: red;">0</span></p>
                <button type="submit" name="add_walkin" class="btn btn-success">Add Walk-in Appointment</button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#appointment_date, #service').change(function() {
                var appointmentDate = $('#appointment_date').val();
                var service = $('#service').val();

                if (appointmentDate && service) {
                    $.ajax({
                        url: 'get_queue_number.php', // Create this file to handle the request
                        type: 'POST',
                        data: {
                            appointment_date: appointmentDate,
                            service: service
                        },
                        success: function(data) {
                            $('#current_queue').text(data);
                        }
                    });
                }
            });
        });
    </script>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function checkDate() {
            const dateInput = document.getElementById('appointment_date');
            const selectedDate = new Date(dateInput.value);
            const dayOfWeek = selectedDate.getUTCDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

            if (dayOfWeek === 0) { // If the selected day is Sunday
                Swal.fire({
                    title: 'Invalid Date!',
                    text: "Sundays are not available for appointments. Please select another date.",
                    icon: 'warning',
                    confirmButtonText: 'Okay'
                });
                dateInput.value = ""; // Clear the input
            }
        }
    </script>

    <!-- Search Functionality Script -->
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#groomingAppointmentsTable tr, #vaccinationAppointmentsTable tr, #checkupAppointmentsTable tr').filter(function() {
                    $(this).toggle(
                        $(this).children('td').text().toLowerCase().indexOf(value) > -1
                    );
                });
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>