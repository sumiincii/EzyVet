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
            font-weight: 300;
            /* Add this line for light font */
            background-color: #f7f9fc;
            color: #333;
            display: flex;
        }

        .sidebar {
            width: 230px;
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

        .sidebar a {
            display: flex;
            /* Use flexbox for alignment */
            align-items: center;
            /* Center items vertically */
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s, padding 0.3s;
        }

        .main-content {
            flex-grow: 1;
            padding: 10px;
            text-align: center;
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
            max-width: 70px;
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
            width: 45%;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 100px;
        }

        .welcome-logo {
            margin: -65px 15px;
            /* Adjust margin as needed */
            width: 600px;
            /* Adjust width as needed */
            height: auto;
            /* Maintain aspect ratio */
            /* margin-right: 15px; */
            /* Space between logo and text */
            vertical-align: middle;
            /* Aligns the logo with text */
        }


        .sidebar a img.sidebar-icon {
            width: 20px;
            /* Adjust icon size as needed */
            height: auto;
            /* Maintain aspect ratio */
            margin-right: 10px;
            /* Space between icon and text */
        }

        .table {
            width: 100%;
            /* Ensure the table takes the full width */
            font-size: 14px;
            /* Lower font size for the table */
        }

        .table th,
        .table td {
            padding: 8px;
            /* Reduce padding for a more compact layout */
        }

        .table thead th {
            font-size: 12px;
            /* Lower font size for table headers */
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
            /* Slightly darker hover color */
        }

        /* Adjust column widths to fit the page better */
        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 15%;
        }

        /* Owner's Name */

        .table th:nth-child(2),
        .table td:nth-child(2) {
            width: 15%;
        }

        /* Pet's Name */

        .table th:nth-child(3),
        .table td:nth-child(3) {
            width: 20%;
        }

        /* Email */

        .table th:nth-child(4),
        .table td:nth-child(4) {
            width: 15%;
        }

        /* Phone */

        .table th:nth-child(5),
        .table td:nth-child(5) {
            width: 10%;
        }

        /* Species */

        .table th:nth-child(6),
        .table td:nth-child(6) {
            width: 10%;
        }

        /* Breed */

        .table th:nth-child(7),
        .table td:nth-child(7) {
            width: 10%;
        }

        /* Color */

        .table th:nth-child(8),
        .table td:nth-child(8) {
            width: 15%;
        }

        /* Purpose */

        .table th:nth-child(9),
        .table td:nth-child(9) {
            width: 15%;
        }

        /* Appointment Date */

        .table th:nth-child(10),
        .table td:nth-child(10) {
            width: 15%;
        }

        /* Appointment Time */

        .table th:nth-child(11),
        .table td:nth-child(11) {
            width: 10%;
        }

        /* Status */

        .table th:nth-child(12),
        .table td:nth-child(12) {
            width: 20%;
        }

        /* Comments */
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <!-- sidebar -->
    <div class="sidebar">
        <img src="images/main-logo.png" alt="EzyVet Logo" class="logo">
        <h3><strong>EzyVet Dashboard</strong></h3>
        <a href="admin.php"><img src="icons/dash.png" alt="Dashboard" class="sidebar-icon"> <strong>Dashboard</strong></a>
        <a href="archives.php"><img src="icons/archive.png" alt="Archives" class="sidebar-icon"> <strong>Archives</strong></a>
        <a href="feedback.php"><img src="icons/feedback.png" alt="Feedback" class="sidebar-icon"> <strong>Feedbacks</strong></a>
        <a href="login.php"><img src="icons/logout.png" alt="Log Out" class="sidebar-icon"> <strong>Log Out</strong></a>
    </div>

    <div class="main-content">
        <img src="images/taglogo.png" alt="EzyVet Logo" class="welcome-logo">
        <div class="container">
            <div class="search-form">
                <form method="POST" action="">
                    <input type="text" id="search-input" name="search_query" placeholder="Search archived appointments" value="<?php echo isset($_POST['search_query']) ? htmlspecialchars($_POST['search_query']) : ''; ?>">

                </form>
            </div>
            <!-- Appointments Table -->
            <div class="table-wrapper">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Owner's Name</th>
                            <th>Pet's Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Species</th>
                            <th>Breed</th>
                            <th>Color</th>
                            <th>Purpose</th>
                            <th>Appointment Date</th>
                            <th>Appointment Time</th>
                            <th>Status</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
            </div>
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