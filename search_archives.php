<?php
// Database connection
include 'connection.php';

// Initialize the search variable
$search_query = isset($_POST['search_query']) ? $conn->real_escape_string($_POST['search_query']) : '';

// Fetch archived appointments data with search filter
$sql = "SELECT a.id, o.fullname, o.email, o.phone, 
               p.name AS pet_name, p.species, p.breed, p.color, 
               a.appointment_date, a.appointment_time, a.status, a.appointment_for, a.comments 
        FROM archived_appointments a
        JOIN owners o ON a.owner_id = o.id
        JOIN pets p ON a.pet_id = p.id
        WHERE o.fullname LIKE '%$search_query%'
           OR p.name LIKE '%$search_query%'
           OR p.species LIKE '%$search_query%'
           OR p.breed LIKE '%$search_query%'
           OR p.color LIKE '%$search_query%'
           OR o.phone LIKE '%$search_query%'
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
        echo "<td>{$row['pet_name']}</td>"; // Added pet name
        echo "<td>{$row['email']}</td>"; // Added email
        echo "<td>{$row['phone']}</td>";
        echo "<td>{$row['species']}</td>";
        echo "<td>{$row['breed']}</td>"; // Added breed
        echo "<td>{$row['color']}</td>"; // Added color
        echo "<td>{$row['appointment_for']}</td>";
        echo "<td>{$row['appointment_date']}</td>";
        echo "<td>" . date('h:i A', strtotime($row['appointment_time'])) . "</td>"; // Corrected to echo the time

        // Updated status output with CSS class
        echo "<td class=\"" .
            ($row['status'] == 'Pending' ? 'status-pending' : ($row['status'] == 'Accepted' ? 'status-accepted' : ($row['status'] == 'Archived' ? 'status-archived' :
                'status-declined'))) . "\">";
        echo "{$row['status']}</td>";

        echo "<td>{$row['comments']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No archived appointments found.</td></tr>"; // Updated colspan to 11
}
