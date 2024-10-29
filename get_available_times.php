<?php
include 'connection.php';

if (isset($_GET['date']) && isset($_GET['interval'])) {
    $date = $_GET['date'];
    $interval = $_GET['interval'];

    // Define clinic hours
    $clinic_hours = [
        'Monday' => ['08:00:00', '17:00:00'],
        'Tuesday' => ['08:00:00', '17:00:00'],
        'Wednesday' => ['08:00:00', '17:00:00'],
        'Thursday' => ['08:00:00', '17:00:00'],
        'Friday' => ['08:00:00', '17:00:00'],
        'Saturday' => ['08:00:00', '17:00:00'],
        'Sunday' => null
    ];

    $day_of_week = date('l', strtotime($date));
    $slots = [];

    if (isset($clinic_hours[$day_of_week]) && $clinic_hours[$day_of_week] !== null) {
        $start_time = new DateTime($clinic_hours[$day_of_week][0]);
        $end_time = new DateTime($clinic_hours[$day_of_week][1]);
        $interval_object = new DateInterval('PT' . $interval . 'M');

        while ($start_time < $end_time) {
            $formatted_time = $start_time->format('H:i:s');

            // Skip lunch break
            if ($formatted_time == '12:00:00' || $formatted_time == '12:30:00') {
                $start_time->add($interval_object);
                continue;
            }

            // Check if the time slot is already booked
            $sql = "SELECT COUNT(*) FROM appointments WHERE appointment_date = '$date' AND appointment_time = '$formatted_time'";
            $result = $conn->query($sql);
            $count = $result->fetch_row()[0];

            if ($count == 0) {
                // If the slot is not booked, add it as available
                $slots[] = ['time' => $start_time->format('h:i A'), 'available' => true];
            } else {
                // If the slot is booked, add it as unavailable
                $slots[] = ['time' => $start_time->format('h:i A'), 'available' => false];
            }

            $start_time->add($interval_object);
        }
    }

    echo json_encode($slots);
}
