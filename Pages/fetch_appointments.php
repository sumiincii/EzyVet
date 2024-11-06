<?php
// Database connection
include 'connection.php';

// Initialize search query
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Fetch appointments data with search functionality
$sql = "SELECT a.id, o.fullname, p.species, a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE o.fullname LIKE '%$search%' 
        OR p.species LIKE '%$search%'
        OR a.appointment_date LIKE '%$search%'
        OR a.appointment_time LIKE '%$search%'
        OR a.appointment_for LIKE '%$search%'
        OR a.status LIKE '%$search%'
        OR a.comments LIKE '%$search%'
        ORDER BY a.appointment_date ASC";

$result = $conn->query($sql);

// Generate table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['fullname']) . '</td>';
        echo '<td>' . htmlspecialchars($row['species']) . '</td>';
        echo '<td>' . htmlspecialchars($row['appointment_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['appointment_time']) . '</td>';
        echo '<td>' . htmlspecialchars($row['appointment_for']) . '</td>';
        echo '<td><span class="badge ' . ($row['status'] == 'Pending' ? 'status-pending' : ($row['status'] == 'Declined' ? 'status-declined' : 'status-accepted')) . '">' . htmlspecialchars($row['status']) . '</span></td>';
        echo '<td>' . htmlspecialchars($row['comments']) . '</td>';
        echo '<td class="action-buttons">';
        echo '<form action="" method="POST" style="display: inline;">';
        echo '<input type="hidden" name="appointment_id" value="' . htmlspecialchars($row['id']) . '">';
        echo '<button type="submit" name="action" value="accept" class="btn btn-success btn-sm">Accept</button>';
        echo '<button type="submit" name="action" value="decline" class="btn btn-danger btn-sm">Decline</button>';
        echo '<button type="submit" name="action" value="archive" class="btn btn-dark btn-sm">Archive</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="8" class="text-center">No appointments found.</td></tr>';
}
