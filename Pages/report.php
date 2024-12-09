<?php
// Start the session
session_start();

// Database connection
include 'connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize filter variables
$date_filter = isset($_POST['date_filter']) ? $_POST['date_filter'] : '';
$service_filter = isset($_POST['service_filter']) ? $_POST['service_filter'] : '';
$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : '';

// Fetch appointments with filters
$appointments_query = "SELECT * FROM appointments1";
if ($date_filter || $service_filter || $search_query) {
    $appointments_query .= " WHERE 1=1";
    if ($date_filter) {
        $appointments_query .= " AND appointment_date = '$date_filter'";
    }
    if ($service_filter) {
        $appointments_query .= " AND service = '$service_filter'";
    }
    if ($search_query) {
        $appointments_query .= " AND (client_name LIKE '%$search_query%' OR pet_details LIKE '%$search_query%')";
    }
}
$appointments_query .= " ORDER BY appointment_date DESC";
$appointments_result = $conn->query($appointments_query);

// Query to count appointments by service
$service_counts_query = "SELECT service, COUNT(*) as count FROM appointments1 GROUP BY service";
$service_counts_result = $conn->query($service_counts_query);

$service_counts = [];
while ($row = $service_counts_result->fetch_assoc()) {
    $service = $row['service'];
    $count = $row['count'];
    $service_counts[$service] = $count;
}

// Count completed and canceled appointments for stats
$completed_count_query = "SELECT COUNT(*) as count FROM appointments1 WHERE status = 'Completed'";
$canceled_count_query = "SELECT COUNT(*) as count FROM appointments1 WHERE status = 'Canceled'";
$walkin_count_query = "SELECT COUNT(*) as count FROM appointments1 WHERE status = 'Walk-in'";
$completed_count = $conn->query($completed_count_query)->fetch_assoc()['count'] ?? 0;
$canceled_count = $conn->query($canceled_count_query)->fetch_assoc()['count'] ?? 0;
$walkin_count = $conn->query($walkin_count_query)->fetch_assoc()['count'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom Navbar Styles */
        .custom-navbar {
            background-color: #000;
            /* Change to black */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-navbar .navbar-brand {
            color: #ffffff;
            /* Brand text color */
            font-weight: bold;
            /* Make brand text bold */
        }

        .custom-navbar .navbar-nav .nav-link {
            color: #ffffff;
            /* Default link color */
            transition: color 0.3s ease, text-shadow 0.3s ease;
            /* Smooth transition for color and text shadow */
            padding: 10px 15px;
            /* Add padding for better click area */
        }

        .custom-navbar .navbar-nav .nav-link:hover {
            color: #ffd700;
            /* Change text color on hover */
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            /* Subtle glow effect */
            background-color: transparent;
            /* No background color on hover */
        }

        .custom-navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
            /* Toggler border color */
        }

        .logo {
            height: 60px;
            /* Adjust logo height */
            margin-right: 10px;
            /* Space between logo and brand name */
            border-radius: 5px;
        }

        .stats-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <img src="images/mainlogo.png" alt="Logo" class="logo"> <!-- Add logo here -->
            <a class="navbar-brand" href="#">Appointments Report</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- <h2>Appointments Report</h2> -->

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-card">
                    <h5>Completed Appointments</h5>
                    <p><?php echo $completed_count; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <h5>Canceled Appointments</h5>
                    <p><?php echo $canceled_count; ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card">
                    <h5>Walk-in Appointments</h5>
                    <p><?php echo $walkin_count; ?></p>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="mb-4">
            <h5>Appointments by Service</h5>
            <div style="max-width: 250px; margin: auto;">
                <canvas id="servicePieChart"></canvas>
            </div>
        </div>

        <!-- Filters -->
        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="date_filter" class="form-label">Filter by Date</label>
                    <input type="date" name="date_filter" class="form-control" value="<?php echo $date_filter; ?>">
                </div>
                <div class="col-md-3">
                    <label for="service_filter" class="form-label">Filter by Service</label>
                    <select name="service_filter" class="form-control">
                        <option value="">All Services</option>
                        <option value="Grooming" <?php echo $service_filter == 'Grooming' ? 'selected' : ''; ?>>Grooming</option>
                        <option value="Checkup" <?php echo $service_filter == 'Checkup' ? 'selected' : ''; ?>>Checkup</option>
                        <option value="Vaccination" <?php echo $service_filter == 'Vaccination' ? 'selected' : ''; ?>>Vaccination</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="search_query" class="form-label">Search</label>
                    <input type="text" name="search_query" class="form-control" placeholder="Search..." value="<?php echo $search_query; ?>">
                </div>
                <div class="col-md-2">
                    <label for="generate_report" class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <!-- Appointments Table -->
        <table class="table table-bordered" id="appointmentsTable">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Pet Details</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($appointments_result->num_rows > 0): ?>
                    <?php while ($row = $appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['client_name'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['pet_details'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['service'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['appointment_date'] ?? 'N/A'; ?></td>
                            <td><?php echo $row['status'] ?? 'N/A'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="no-data">No appointments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Generate Report Button -->
        <div class="text-center mb-4">
            <button id="generateReport" class="btn btn-success">Generate Report (Print)</button>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const serviceCounts = <?php echo json_encode($service_counts); ?>;
        const labels = Object.keys(serviceCounts);
        const data = labels.map(service => serviceCounts[service]);

        const ctx = document.getElementById('servicePieChart').getContext('2d');
        const servicePieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                }
            }
        });

        // Search Functionality (client_name and pet_details)
        document.querySelector('input[name="search_query"]').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const clientName = row.cells[0].textContent.toLowerCase();
                const petDetails = row.cells[1].textContent.toLowerCase();
                if (clientName.includes(searchValue) || petDetails.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Print Functionality
        document.getElementById('generateReport').addEventListener('click', function() {
            const table = document.getElementById('appointmentsTable').outerHTML;
            const printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.write('<html><head><title>Appointment Report</title>');
            printWindow.document.write('<style>body{font-family: Arial, sans-serif;} table{width: 100%;border-collapse: collapse;} th, td{border: 1px solid #ddd;padding: 8px;text-align: left;} th{background-color: #f4f4f4;}</style></head><body>');
            printWindow.document.write('<h2>Appointment Report</h2>');
            printWindow.document.write(table);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</body>

</html>

<?php $conn->close(); ?>