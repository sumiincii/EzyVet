<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet Admin Dashboard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_assets/bootstrap.min.css">

    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f7f9fc;
            color: #333;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px;
            height: 100vh;
            position: fixed;
        }

        .sidebar h2 {
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px 0;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .main-content {
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .dashboard-header h2 {
            font-weight: 600;
        }

        .search-form {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }

        .search-form input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .search-form button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <h2>Ezyvet</h2>
        <a href="admin.php">Dashboard</a>
        <a href="archive.php">Archives</a>
        <a href="feedback.php">Feedback</a>
        <a href="login.php">Log Out</a>
    </div>

    <div class="main-content">
        <div class="dashboard-header">
            <h2>Admin Dashboard</h2>
        </div>

        <!-- Search Form -->
        <div class="search-form">
            <input type="text" id="search-input" placeholder="Search appointments">
            <button id="search-button">Search</button>
        </div>

        <!-- Appointments Table -->
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Owner Name</th>
                        <th>Pet Species</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th>Purpose</th>
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Data will be injected here by AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Function to fetch appointments and handle search
        function fetchAppointments(query = '') {
            $.ajax({
                url: 'fetch_appointments.php', // The PHP script that fetches appointments
                method: 'POST',
                data: {
                    search_query: query
                },
                success: function(data) {
                    $('#table-body').html(data); // Insert the returned HTML into the table body
                }
            });
        }

        // Fetch all appointments on page load
        $(document).ready(function() {
            fetchAppointments(); // Fetch all results when the page loads

            // Search functionality
            $('#search-button').on('click', function() {
                const query = $('#search-input').val();
                fetchAppointments(query); // Fetch the search results
            });
        });
    </script>
</body>

</html>