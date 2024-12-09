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
    $captcha_response = $_POST['g-recaptcha-response'];

    // Verify CAPTCHA
    $secret_key = '6Le383YqAAAAAHyNmno3WI0t-PYiH_uZzoZ5A5rm'; // Replace with your secret key
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$captcha_response");
    $response_keys = json_decode($response, true);

    if (intval($response_keys["success"]) !== 1) {
        echo "Please complete the CAPTCHA.";
    } else {
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
            echo "Your appointment is confirmed! Your queue number is $queue_number. Please check your email for the confirmation details.";
            echo "<script>Swal.fire('Success!', 'Appointment request submitted successfully!  Your queue number is $queue_number.', 'success');</script>";

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Appointment Booking</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->

    <style>
        body {
            background-image: url(images/bg4.png);
            /* background-repeat: no-repeat; */
            background-size: contain;
        }

        .container {
            /* margin-top: 50px; */
            background: white;
            padding: 20px;
            /* Reduced padding */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            /* Set a max width for the card */
            margin-left: auto;
            /* Center the card */
            margin-right: auto;
            /* Center the card */
        }

        h1 {
            margin-bottom: 15px;
            /* Reduced margin */
        }

        .form-group {
            margin-bottom: 30px;
            /* Reduced margin */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .text-center {
            text-align: center;
        }

        .tlogo {
            display: block;
            margin: 0 auto;
            max-width: 50%;
            height: auto;
            padding: 0;
            margin-top: -90px;
            margin-bottom: -90px;
        }

        .compact-text {
            padding: 0 80px;
        }
    </style>
</head>

<body>
    <div class="container1 container-fluid p-0 d-flex">
        <div class="row g-0">
            <div class="col-12">
                <img src="images/booknow1.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>
    <img src="images/taglogo.png" alt="ezyvet Logo" class="tlogo img-fluid">

    <div class="container">
        <h1 class="text-center">Book an Appointment</h1>
        <p class="text-center">Fill out our appointment request form below and hit 'submit.' Please schedule your appointment at least 24 hours in advance. In case of an emergency, call us at (+63) 955-617-9958 / 968-595-8621.</p>

        <form method="POST">
            <div class="form-group">
                <label for="client_name">Name:</label>
                <input type="text" name="client_name" id="client_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="pet_details">Pet Details:</label>
                <textarea name="pet_details" id="pet_details" class="form-control" rows="2"></textarea> <!-- Reduced rows -->
            </div>

            <div class="form-group">
                <label for="service">Service:</label>
                <select name="service" id="service" class="form-control" required>
                    <option value="" disabled selected>Select a Service</option>
                    <option value="Grooming">Grooming</option>
                    <option value="Vaccination">Vaccination</option>
                    <option value="Checkup">Checkup</option>
                </select>
            </div>


            <div class="form-group">
                <label for="appointment_date">Date:</label>
                <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>

            <script>
                $(document).ready(function() {
                    // Set the minimum date to today
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                    var yyyy = today.getFullYear();
                    today = yyyy + '-' + mm + '-' + dd;
                    $('#appointment_date').attr('min', today);

                    // Check for Sunday selection
                    $('#appointment_date').on('change', function() {
                        var selectedDate = new Date($(this).val());
                        var day = selectedDate.getDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

                        if (day === 0) { // If the selected day is Sunday
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid Date',
                                text: 'You cannot select a Sunday. Please choose another date.',
                            });
                            $(this).val(''); // Clear the input
                        }
                    });
                });
            </script>



            <div class="g-recaptcha" data-sitekey="6Le383YqAAAAAHuQRm7J0a-mh84GH7B6fvGzDX71"></div> <!-- Replace with your site key -->

            <!-- Card for Queue Number and Submit Button -->
            <div class="card mt-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Queue Information</h5>
                    <p>Your Queue Number for Selected Date: <span id="current_queue" style="color: red;">0</span></p>
                    <button type="submit" class="btn btn-primary btn-sm">Book Appointment</button> <!-- Reduced button size -->
                </div>
            </div>
        </form>
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

    <br>

    <footer class="footer">
        <div class="footer-logo">
            <img src="images/taglogo.png" alt="EcoPaws Logo">
        </div>
        <div class="footer-container">
            <div class="footer-map">
                <h4>Visit Us</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sph!4v1713428538080!5m2!1sen!2sph!6m8!1m7!1s1UPyzrm-fB9QmunjaXDomg!2m2!1d15.49962680830744!2d120.9768442687773!3f244.72785217855838!4f1.4193708654089647!5f0.7820865974627469"
                    width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
            <div class="footer-contact">
                <h4>Contact Information</h4>
                <p><i class="fas fa-envelope"></i> ezyvet.neust@gmail.com </p>
                <p><i class="fas fa-phone"></i> (+63) 955-617-9958 / 968-595-8621</p>
                <p><i class="fas fa-map-marker-alt"></i> Mulawin St. Brgy. Bitas,<br> Cabanatuan city 3100</p>
                <!-- zipcode -->
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <a href="https://www.facebook.com/profile.php?id=61568325466992&mibextid=ZbWKwL" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/ezyvet.neust/profilecard/?igsh=MWJkM3VyMGJqMGZzbA==" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://www.viber.com/en/" class="social-icon"><i class="fab fa-viber"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 EzyvetNeust. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>