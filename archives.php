<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet Archives</title>

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
        }

        .container {
            margin-top: 30px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
        }

        .dashboard-header h2 {
            font-weight: 600;
        }

        .dashboard-header img {
            border-radius: 50%;
        }

        .dashboard-header a {
            color: #fff;
            margin-left: 15px;
            padding: 8px 15px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dashboard-header a:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .search-form {
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            margin-left: 20px;
            /* Add some space to the left */
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

        .table td {
            word-wrap: break-word;
            max-width: 150px;
            white-space: normal;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Media Queries for Mobile */
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-form {
                flex-direction: column;
                gap: 10px;
            }

            .search-form input[type="text"] {
                width: 100%;
            }
        }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="d-flex align-items-center">
                <img src="your-image-url" alt="Dr. Ron" width="50" height="50">
                <h2>Dr. Ron</h2>
            </div>
            <div>
                <a href="feedback.php">Feedback</a>
                <a href="admin.php">Dashboard</a>
                <a href="#">Archives</a>
                <a href="login.php">Log Out</a>
            </div>
        </div>

        <!-- Search Form -->
        <div class="search-form">
            <input type="text" id="search-input" placeholder="Search archived appointments">
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
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Data will be injected here by AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Function to fetch search results via AJAX
        function fetchResults(query = '') {
            $.ajax({
                url: 'search_archives.php', // The PHP script that handles the search query
                method: 'POST',
                data: {
                    search_query: query
                },
                success: function(data) {
                    $('#table-body').html(data); // Insert the returned HTML into the table body
                }
            });
        }

        // Call fetchResults whenever the user types in the search box
        $('#search-input').on('input', function() {
            const query = $(this).val();
            fetchResults(query); // Fetch the search results dynamically
        });

        // Fetch all results on page load
        $(document).ready(function() {
            fetchResults(); // Fetch all results when the page loads
        });
    </script>
</body>

</html>