<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "ezyvet");
include 'send_mail.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update appointment status and send email
if (isset($_POST['update_status'])) {
    $appointment_id = $_POST['appointment_id'];
    $new_status = $_POST['status'];
    $email = $_POST['email'];
    $client_name = $_POST['client_name'];
    $queue_number = $_POST['queue_number'];

    // Update status in the database
    $update_query = "UPDATE appointments1 SET status = '$new_status' WHERE id = $appointment_id";
    if ($conn->query($update_query)) {
        // Send email if status is Notified
        if ($new_status == "Notified") {
            sendNotification($email, $client_name, $queue_number);
        }
        echo "<script>alert('Status updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}

// Fetch appointments
$appointments_query = "SELECT * FROM appointments1 ORDER BY appointment_date, queue_number ASC";
$appointments_result = $conn->query($appointments_query);

// Debugging: check if query returns results
if (!$appointments_result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>

        <!-- Appointments Table -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Queue Number</th>
                    <th>Client Name</th>
                    <th>Pet Details</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($appointments_result->num_rows > 0): ?>
                    <?php while ($row = $appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo isset($row['queue_number']) ? $row['queue_number'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['client_name']) ? $row['client_name'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['pet_details']) ? $row['pet_details'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['service']) ? $row['service'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['appointment_date']) ? $row['appointment_date'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['status']) ? $row['status'] : 'N/A'; ?></td>
                            <td>
                                <!-- Update Status Form -->
                                <form action="" method="post" class="d-inline">
                                    <input type="hidden" name="appointment_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                    <input type="hidden" name="client_name" value="<?php echo $row['client_name']; ?>">
                                    <input type="hidden" name="queue_number" value="<?php echo $row['queue_number']; ?>">
                                    <select name="status" class="form-select mb-2" required>
                                        <option value="">Select</option>
                                        <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                                        <option value="Notified" <?php if ($row['status'] == 'Notified') echo 'selected'; ?>>Notified</option>
                                        <option value="Completed" <?php if ($row['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                                    </select>
                                    <button type="submit" name="update_status" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No appointments found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>