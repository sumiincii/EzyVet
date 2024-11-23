<?php
$conn = new mysqli("localhost", "root", "", "ezyvet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_date = $_POST['appointment_date'];
    $service = $_POST['service'];

    // Get the current queue number for the selected service and date
    $query = "SELECT MAX(queue_number) AS last_queue FROM appointments1 WHERE service = '$service' AND appointment_date = '$appointment_date'";
    $result = $conn->query($query);
    $last_queue = $result->fetch_assoc()['last_queue'] ?? 0;

    echo $last_queue + 1; // Display the next queue number
}

$conn->close();
