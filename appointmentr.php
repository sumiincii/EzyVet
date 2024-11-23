<?php
$conn = new mysqli("localhost", "root", "", "ezyvet");
include 'send_mail.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_name = $_POST['client_name'];
    $email = $_POST['email'];
    $pet_details = $_POST['pet_details'];
    $service = $_POST['service'];
    $appointment_date = $_POST['appointment_date'];

    // Get the current queue number for the selected service
    $query = "SELECT MAX(queue_number) AS last_queue FROM appointments1 WHERE service = '$service' AND DATE(created_at) = CURDATE()";
    $result = $conn->query($query);
    $last_queue = $result->fetch_assoc()['last_queue'] ?? 0;

    // Assign the next queue number
    $queue_number = $last_queue + 1;

    // Insert the appointment into the database
    $stmt = $conn->prepare("INSERT INTO appointments1 (client_name, email, pet_details, service, appointment_date, queue_number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $client_name, $email, $pet_details, $service, $appointment_date, $queue_number);

    if ($stmt->execute()) {
        echo "Your appointment is confirmed! Your queue number is $queue_number.";

        // Send confirmation email
        // include 'send_mail.php';
        sendConfirmationEmail(
            $email,
            $client_name,
            $queue_number,
            $service
        );
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    <!-- Add this to your form to display the current queue -->
    <p>Your Queue Number for Selected Date: <span id="current_queue">0</span></p>
    <h1>Book an Appointment</h1>
    <form method="POST">
        <label for="client_name">Name:</label>
        <input type="text" name="client_name" id="client_name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="pet_details">Pet Details:</label>
        <textarea name="pet_details" id="pet_details" required></textarea><br>

        <label for="service">Service:</label>
        <select name="service" id="service" required>
            <option value="Grooming">Grooming</option>
            <option value="Vaccination">Vaccination</option>
            <option value="Checkup">Checkup</option>
        </select><br>

        <label for="appointment_date">Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" required><br>

        <button type="submit">Book Appointment</button>
    </form>
</body>

</html>