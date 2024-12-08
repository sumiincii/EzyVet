<?php
// Start the session and include the header
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "ezyvet");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize filter variables
$date_filter = isset($_POST['date_filter']) ? $_POST['date_filter'] : '';
$service_filter = isset($_POST['service_filter']) ? $_POST['service_filter'] : '';
$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : '';

// Fetch completed appointments with filters
$completed_appointments_query = "SELECT * FROM appointments1 WHERE status = 'Completed'";

if ($date_filter) {
    $completed_appointments_query .= " AND appointment_date = '$date_filter'";
}

if ($service_filter) {
    $completed_appointments_query .= " AND service = '$service_filter'"; // Assuming 'service_type' is the column name
}

if ($search_query) {
    $completed_appointments_query .= " AND (client_name LIKE '%$search_query%' OR pet_details LIKE '%$search_query%')";
}

$completed_appointments_query .= " ORDER BY appointment_date DESC";
$completed_appointments_result = $conn->query($completed_appointments_query);
// Query to count completed appointments by service
$service_counts_query = "SELECT service, COUNT(*) as count FROM appointments1 WHERE status = 'Completed' GROUP BY service";
$service_counts_result = $conn->query($service_counts_query);

$service_counts = [];
while ($row = $service_counts_result->fetch_assoc()) {
    $service_counts[$row['service']] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Appointments Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Custom Navbar Styles */
        .custom-navbar {
            background-color: #000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .custom-navbar .navbar-brand {
            color: #ffffff;
            font-weight: bold;
        }

        .custom-navbar .navbar-nav .nav-link {
            color: #ffffff;
            transition: color 0.3s ease, text-shadow 0.3s ease;
            padding: 10px 15px;
        }

        .custom-navbar .navbar-nav .nav-link:hover {
            color: #ffd700;
            text-shadow: 0 0 5px rgba(255, 215, 0, 0.5);
            background-color: transparent;
        }

        .custom-navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .logo {
            height: 60px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .taglogo {
            height: 200px;
            width: auto;
            margin: auto;
            display: block;
        }

        /* Custom Styles for the Report Page */
        .container {
            margin-top: 30px;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .table {
            margin-top: 20px;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table-dark {
            background-color: #343a40;
            color: white;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #888;
        }

        .stats-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .stats-card h5 {
            margin: 0;
            font-weight: bold;
        }

        .stats-card p {
            margin: 5px 0 0;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <img src="images/mainlogo.png" alt="Logo" class="logo">
            <a class="navbar-brand" href="#">EzyVet Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feedback">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        function printReport() {
            // Create a new window
            var printWindow = window.open('', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Print Report</title>');
            printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">');
            printWindow.document.write('</head><body>');
            printWindow.document.write('<h2>Completed Appointments Report</h2>');
            printWindow.document.write(document.querySelector('.table').outerHTML); // Get the table HTML
            printWindow.document.write('</body></html>');
            printWindow.document.close(); // Close the document
            printWindow.print(); // Trigger the print dialog
        }
    </script>
    <div class="container">
        <h2>Completed Appointments Report</h2>

        <!-- Statistics Card for Overall Completed Appointments -->
        <div class="row">
            <div class="col-md-12">
                <div class="stats-card">
                    <h5>Overall Completed Appointments</h5>
                    <p><?php
                        // Query to count overall completed appointments
                        $overall_query = "SELECT COUNT(*) as count FROM appointments1 WHERE status = 'Completed' AND DATE(appointment_date) = CURDATE()";
                        $overall_result = $conn->query($overall_query);
                        $overall_count = $overall_result->fetch_assoc()['count'];
                        echo $overall_count;
                        ?></p>
                </div>
            </div>
        </div>

        <!-- Add this in the HTML body where you want the pie chart -->
        <div class="row">
            <div class="col-md-12">
                <h5>Completed Appointments by Service</h5>
                <div style="width: 300px; height: 300px; margin: auto;">
                    <canvas id="servicePieChart" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

        <script>
            const serviceCounts = <?php echo json_encode($service_counts); ?>;
            const labels = Object.keys(serviceCounts);
            const data = Object.values(serviceCounts);

            const ctx = document.getElementById('servicePieChart').getContext('2d');
            const servicePieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Completed Appointments by Service',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Completed Appointments by Service'
                        },
                        datalabels: {
                            formatter: (value, context) => {
                                const total = data.reduce((acc, val) => acc + val, 0);
                                const percentage = ((value / total) * 100).toFixed(2) + '%';
                                return percentage; // Display percentage
                            },
                            color: '#000000',
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });
        </script>

        <!-- Filter Form -->
        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="date_filter" class="form-label">Filter by Date</label>
                    <input type="date" name="date_filter" id="date_filter" class="form-control" value="<?php echo $date_filter; ?>">
                </div>
                <div class="col-md-4">
                    <label for="service_filter" class="form-label">Filter by Service</label>
                    <select name="service_filter" id="service_filter" class="form-control">
                        <option value="">Select Service</option>
                        <option value="Grooming" <?php echo ($service_filter == 'Grooming') ? 'selected' : ''; ?>>Grooming</option>
                        <option value="Checkup" <?php echo ($service_filter == 'Checkup') ? 'selected' : ''; ?>>Checkup</option>
                        <option value=" Vaccination" <?php echo ($service_filter == 'Vaccination') ? 'selected' : ''; ?>>Vaccination</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="search_query" class="form-label">Search</label>
                    <input type="text" name="search_query" id="search_query" class="form-control" placeholder="Search..." value="<?php echo $search_query; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form>

        <!-- Generate Report Button -->
        <button onclick="printReport()" class="btn btn-secondary">Generate Report</button>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Client Name</th>
                    <th>Pet Details</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($completed_appointments_result->num_rows > 0): ?>
                    <?php while ($row = $completed_appointments_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo isset($row['client_name']) ? $row['client_name'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['pet_details']) ? $row['pet_details'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['service']) ? $row['service'] : 'N/A'; ?></td>
                            <td><?php echo isset($row['appointment_date']) ? date('Y-m-d', strtotime($row['appointment_date'])) : 'N/A'; ?></td>
                            <td><?php echo isset($row['status']) ? $row['status'] : 'N/A'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No appointments found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        const serviceCounts = <?php echo json_encode($service_counts); ?>;
        const labels = Object.keys(serviceCounts);
        const data = labels.map(service => serviceCounts[service]);

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
    </script>
</body>

</html>

<?php $conn->close(); ?>