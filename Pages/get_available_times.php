<?php
include 'connection.php';

header('Content-Type: application/json');

$date = $_GET['date'] ?? date('Y-m-d');
$interval = $_GET['interval'] ?? 30;

// Clinic hours
$start_time = '08:00:00';
$end_time = '17:00:00';

// Get booked appointments for the selected date
$sql = "SELECT appointment_time FROM appointments WHERE appointment_date = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();

$booked_times = [];
while ($row = $result->fetch_assoc()) {
    $booked_times[] = date('H:i', strtotime($row['appointment_time']));
}

// Generate all possible time slots
$current_time = strtotime($start_time);
$end_timestamp = strtotime($end_time);
$slots = [];

while ($current_time < $end_timestamp) {
    $time_string = date('H:i', $current_time);
    $display_time = date('h:i A', $current_time); // 12-hour format for display
    $is_available = !in_array($time_string, $booked_times);

    // Skip lunch break (12:00 - 13:00)
    if ($time_string !== '12:00') {
        $slots[] = [
            'time' => $time_string, // 24-hour format for value
            'display_time' => $display_time, // 12-hour format for display
            'available' => $is_available
        ];
    }

    $current_time = strtotime("+{$interval} minutes", $current_time);
}

echo json_encode($slots);
$conn->close();
