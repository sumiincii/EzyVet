<?php
include 'connection.php';

function getAvailableTimes($date, $conn)
{
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
    $available_times = [];

    if (isset($clinic_hours[$day_of_week]) && $clinic_hours[$day_of_week] !== null) {
        $start_time = $clinic_hours[$day_of_week][0];
        $end_time = $clinic_hours[$day_of_week][1];
        $interval = new DateInterval('PT30M'); // 30 minutes interval
        $period = new DatePeriod(
            new DateTime($start_time),
            $interval,
            new DateTime($end_time)
        );

        foreach ($period as $time) {
            $formatted_time = $time->format('H:i:s');

            // Exclude 12:00 and 12:30 from available times
            if ($formatted_time == '12:00:00' || $formatted_time == '12:30:00') {
                continue;
            }

            $sql = "SELECT COUNT(*) FROM appointments WHERE appointment_date = '$date' AND appointment_time = '$formatted_time'";
            $result = $conn->query($sql);
            $count = $result->fetch_row()[0];

            if ($count == 0) {
                $available_times[] = $formatted_time;
            }
        }
    }

    return $available_times;
}

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $available_times = getAvailableTimes($date, $conn);
    echo json_encode($available_times);
}

$conn->close();
