<?php
include('header.php');
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

    // Get the current queue number for the selected service and date
    $query = "SELECT MAX(queue_number) AS last_queue FROM appointments1 WHERE service = '$service' AND appointment_date = '$appointment_date'";
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
    <link rel="stylesheet" href="appointment.css">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Appointment Booking</title>
</head>

<body>
    <div class="container1 container-fluid p-0 d-flex">
        <div class="row g-0">
            <div class="col-12">
                <img src="images/booknow1.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>
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

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta soluta necessitatibus eius earum alias repellendus corrupti voluptate saepe repudiandae. Quam natus maiores ea sint doloribus, in incidunt tenetur veniam eum perferendis tempora fugit soluta labore voluptas id. Amet, harum quasi, quas, dolores labore veniam corrupti quis facere rem facilis eveniet odio. Eum in distinctio odio inventore nihil tempora numquam, praesentium beatae magnam sed consequatur, laboriosam voluptatem incidunt cumque placeat ex error et provident fugiat iusto, ab alias fuga eos. Quam eligendi ad sequi harum adipisci, quo, illo optio nulla quidem labore possimus maiores distinctio. Temporibus labore fugit debitis molestiae dolore. Dicta laboriosam nemo, nisi molestias nostrum sunt accusantium doloremque a ipsum culpa natus odio impedit voluptatum nobis dolorem mollitia eum, enim, ducimus perferendis! Illum veniam dolorum, sunt dolore molestias ipsa, voluptates, similique quibusdam vel fugit iure reprehenderit ullam! Beatae, aliquam. Dolorum obcaecati voluptas maiores nesciunt dignissimos ratione beatae qui, porro optio suscipit amet quos non est eius ea deserunt saepe odio, nobis corporis sunt libero recusandae molestias? Cum reiciendis architecto nisi animi officia perferendis adipisci, quae ducimus optio eligendi reprehenderit, odio tempora repellat, neque dolor quaerat nam saepe amet quibusdam voluptatem eum! Maiores eius maxime quos pariatur, ducimus aspernatur, itaque doloremque soluta, ex perferendis excepturi dolorem? Dolorem ullam laborum ex, quas ea eius. Excepturi illum quos magnam dolores, perferendis soluta animi itaque ex recusandae ad non vel commodi pariatur, sunt nam error culpa doloribus ratione maxime voluptatum! Atque vitae accusantium provident iusto exercitationem deserunt explicabo expedita fugiat in perspiciatis. Ab suscipit consectetur totam expedita quasi ad excepturi et accusamus, vel repellendus unde. Ipsam, officiis explicabo quaerat pariatur alias veniam dolorum praesentium voluptates aliquam excepturi aliquid culpa, omnis, temporibus a! Voluptatum ipsum earum ullam consequatur animi aspernatur, cupiditate nisi aperiam porro ab, eligendi maxime veritatis ipsam totam velit perspiciatis. Reprehenderit, corrupti.</p>
</body>

</html>