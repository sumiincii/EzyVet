<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="contactus.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        .dashboard-header img {
            border-radius: 50%;
        }

        .table-wrapper {
            margin-top: 20px;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="dashboard-header">
            <div class="d-flex align-items-center">
                <img src="your-image-url" alt="Dr. Ron" width="50" height="50">
                <h2 class="ml-3">Dr. Ron</h2>
            </div>
            <div>
                <a href="admin.php" class="btn btn-light">Dashboard</a>
                <a href="#" class="btn btn-light">Archives</a>
                <a href="#" class="btn btn-light">Log Out</a>
            </div>
        </div>

        <div class="text-center mt-4">
            <h3>Paws and Appointments:</h3>
            <h4>Veterinary Clinic Records</h4>
        </div>

        <div class="table-wrapper">
            <div class="table-header">
                <h4>Archives</h4>
                <input class="form-control w-25" id="search" type="text" placeholder="Search...">
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pet Owner</th>
                        <th>Type of Pet</th>
                        <th>Date (mm/dd/yyyy)</th>
                        <th>Time-AM/PM</th>
                        <th>Status</th>
                        <th>Preferred Veterinarian</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>David Lucero</td>
                        <td>Cat</td>
                        <td>01/10/2024</td>
                        <td>8:00 AM - 11:00 AM</td>
                        <td>Completed</td>
                        <td>Dr. Ron</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Derick Del Pilar</td>
                        <td>Dog</td>
                        <td>01/22/2024</td>
                        <td>8:00 AM - 11:00 AM</td>
                        <td>Completed</td>
                        <td>Dr. Ron</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Angelo Marquez</td>
                        <td>Cat</td>
                        <td>02/08/2024</td>
                        <td>1:00 PM - 6:00 PM</td>
                        <td>Completed</td>
                        <td>Dr. Morales</td>
                    </tr>
                </tbody>
            </table>

            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</body>

</html>