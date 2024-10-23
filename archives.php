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
            display: flex;
        }

        .sidebar {
            width: 250px;
            /* background-color: #5ce1e6; */
            background-color: #8b61c2;
            /* Changed to a deeper blue */
            color: #fff;
            height: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            /* Added shadow for depth */
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            /* Increased font size */
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s, padding 0.3s;
            /* border-radius: 2px; */
            /* Rounded corners */
        }

        .sidebar a:hover {
            background-color: #5ce1e6;
            /* Darker shade on hover */
            padding-left: 25px;
            /* Slight padding change on hover */
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
        }


        .container {
            margin-top: 30px;
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
            border: 1px solid #ddd;
            /* Light border for the table wrapper */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Added shadow */
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

        .table-wrapper {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            /* Light border for the table wrapper */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* Added shadow */
        }

        .sidebar .logo {
            display: block;
            margin: 0 auto 20px;
            /* Center the logo and add margin below */
            width: 80%;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
        }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <img src="path/to/your/logo.png" alt="EzyVet Logo" class="logo">
        <h3>EzyVet Dashboard</h3>
        <a href="adminr.php">Dashboard</a>
        <a href="archives.php">Archives</a>
        <a href="feedback.php">Feedback</a>
        <a href="login.php">Log Out</a>
    </div>
    <div class="container">

        <!-- Search Form -->
        <div class="search-form">
            <input type="text" id="search-input" placeholder="Search archived appointments">
        </div>

        <!-- Appointments Table -->
        <div class="table-wrapper">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Owner's Name</th>
                        <th>Pet's Species</th>
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