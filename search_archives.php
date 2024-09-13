<?php
// Database connection
include 'connection.php';

// Initialize the search variable
$search_query = isset($_POST['search_query']) ? $conn->real_escape_string($_POST['search_query']) : '';

// Fetch archived appointments data with search filter
$sql = "SELECT a.id, o.fullname, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM archived_appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE o.fullname LIKE '%$search_query%'
           OR p.species LIKE '%$search_query%'
           OR a.appointment_date LIKE '%$search_query%'
           OR a.status LIKE '%$search_query%'
           OR a.appointment_for LIKE '%$search_query%'
           OR a.comments LIKE '%$search_query%'
        ORDER BY a.appointment_date ASC";

$result = $conn->query($sql);

// Generate the table rows based on the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['fullname']}</td>";
        echo "<td>{$row['species']}</td>";
        echo "<td>{$row['appointment_date']}</td>";
        echo "<td>{$row['appointment_time']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>{$row['appointment_for']}</td>";
        echo "<td>{$row['comments']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No archived appointments found.</td></tr>";
}
