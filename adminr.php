<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Function to send email
function sendEmail($to, $subject, $body)
{
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
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Handle form submissions
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

        if ($action == 'accept') {
            $update_sql = "UPDATE appointments SET status='Accepted' WHERE id=$appointment_id";
            $conn->query($update_sql);

            // Send email notification
            $subject = 'Appointment Accepted';
            $body = "Dear {$owner['fullname']},<br>Your appointment on {$owner['appointment_date']} at {$owner['appointment_time']} for {$owner['appointment_for']} has been accepted.<br>Thank you!";
            sendEmail($owner['email'], $subject, $body);
        } elseif ($action == 'decline') {
            $update_sql = "UPDATE appointments SET status='Declined' WHERE id=$appointment_id";
            $conn->query($update_sql);

            // Send email notification
            $subject = 'Appointment Declined';
            $body = "Dear {$owner['fullname']},<br>Your appointment on {$owner['appointment_date']} at {$owner['appointment_time']} for {$owner['appointment_for']} has been declined.<br>Thank you!";
            sendEmail($owner['email'], $subject, $body);
        } elseif ($action == 'archive') {
            // Move appointment to archived_appointments table
            $fetch_sql = "SELECT * FROM appointments WHERE id=$appointment_id";
            $fetch_result = $conn->query($fetch_sql);
            $appointment = $fetch_result->fetch_assoc();

            $insert_sql = "INSERT INTO archived_appointments (id, owner_id, appointment_date, appointment_time, appointment_for, status) 
                           VALUES ({$appointment['id']}, {$appointment['owner_id']}, '{$appointment['appointment_date']}', '{$appointment['appointment_time']}', '{$appointment['appointment_for']}', '{$appointment['status']}')";
            $conn->query($insert_sql);

            $delete_sql = "DELETE FROM appointments WHERE id=$appointment_id";
            $conn->query($delete_sql);
        }
    }
}

// HTML content
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzyVet Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
        }

        .sidebar {
            background-color: #2c3e50;
            color: #ecf0f1;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 10px 20px;
            margin: 5px 0;
            transition: all 0.3s;
            cursor: pointer;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #34495e;
            border-left: 4px solid #3498db;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #3498db;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .btn-custom {
            background-color: #3498db;
            color: white;
        }

        .btn-custom:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" data-target="appointments">
                                <i class="fas fa-calendar-alt me-2"></i> Appointments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="archives">
                                <i class="fas fa-archive me-2"></i> Archives
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="feedback">
                                <i class="fas fa-comments me-2"></i> Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title" id="content-title">Appointments</h5>
                                <form class="d-flex" id="search-form">
                                    <input type="search" class="form-control me-2" id="search-input" placeholder="Search...">
                                    <button class="btn btn-custom" id="search-btn">Search</button>
                                </form>
                            </div>
                            <div class="card-body" id="content-body">
                                <!-- Initial content here -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        const sidebarLinks = document.querySelectorAll('.nav-link');
        const contentTitle = document.getElementById('content-title');
        const contentBody = document.getElementById('content-body');
        const searchForm = document.getElementById('search-form');
        const searchInput = document.getElementById('search-input');
        const searchBtn = document.getElementById('search-btn');

        sidebarLinks.forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const target = link.getAttribute('data-target');
                loadContent(target);
            });
        });

        searchForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const searchTerm = searchInput.value.trim();
            if (searchTerm) {
                loadSearchResults(searchTerm);
            }
        });

        function loadContent(target) {
            // Load content dynamically based on the target
            switch (target) {
                case 'appointments':
                    loadAdminContent();
                    break;
                case 'archives':
                    loadArchivesContent();
                    break;
                case 'feedback':
                    loadFeedbackContent();
                    break;
                default:
                    console.error(`Unknown target: ${target}`);
            }
        }

        function loadAdminContent() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'admin.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    contentTitle.textContent = 'Appointments';
                    contentBody.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function loadArchivesContent() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'archives.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    contentTitle.textContent = 'Archives';
                    contentBody.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function loadFeedbackContent() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'feedback.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    contentTitle.textContent = 'Feedback';
                    contentBody.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function loadSearchResults(searchTerm) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `search.php?term=${searchTerm}`, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    contentTitle.textContent = `Search Results for "${searchTerm}"`;
                    contentBody.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>