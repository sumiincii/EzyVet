<?php
include 'connection.php';

// Fetch the latest appointments
$sql = "SELECT a.id, o.fullname, o.email, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        ORDER BY a.appointment_date ASC";

$result = $conn->query($sql);

$appointments = array();
while ($row = $result->fetch_assoc()) {
    $appointments[] = $row;
}

echo json_encode($appointments);
