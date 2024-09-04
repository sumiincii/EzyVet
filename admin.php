<?php
include 'connection.php';

// Fetch appointments data
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

// Fetch owners data
$sql_owners = "SELECT * FROM owners";
$result_owners = $conn->query($sql_owners);

// Fetch pets data
$sql_pets = "SELECT * FROM pets";
$result_pets = $conn->query($sql_pets);
?>
<?php
$result->data_seek(0); // reset the pointer to the beginning of the result set
while ($row = $result->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <?php
        // Fetch owner name
        $owner_id = $row['owner_id'];
        $sql_owner_name = "SELECT fullname FROM owners WHERE id = '$owner_id'";
        $result_owner_name = $conn->query($sql_owner_name);
        $owner_name = $result_owner_name->fetch_assoc();
        ?>
        <td><?php echo $owner_name['fullname']; ?></td>
        <?php
        // Fetch pet species
        $pet_id = $row['pet_id'];
        $sql_pet_species = "SELECT species FROM pets WHERE id = '$pet_id'";
        $result_pet_species = $conn->query($sql_pet_species);
        $pet_species = $result_pet_species->fetch_assoc();
        ?>
        <td><?php echo $pet_species['species']; ?></td>
        <td><?php echo date('m/d/Y', strtotime($row['appointment_date'])); ?></td>
        <td><?php echo $row['appointment_time']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['preferred_veterinarian']; ?></td>
        <td><button class="btn btn-dark btn-sm">Archive</button></td>
    </tr>
<?php } ?>
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

        .stats-card {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            margin-top: 20px;
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
                <a href="#" class="btn btn-light">Dashboard</a>
                <a href="archives.php" class="btn btn-light">Archives</a>
                <a href="#" class="btn btn-light">Log Out</a>
            </div>
        </div>

        <div class="stats-card">
            <div>
                <h5>Total Appointments Today:</h5>
                <p>5</p>
            </div>
            <div>
                <h5>Appointments Status</h5>
                <p>Pending: 3</p>
                <p>Confirmed: 2</p>
            </div>
        </div>

        <div class="table-wrapper">
            <h4>Scheduled Appointment</h4>
            <input class="form-control mb-3" id="search" type="text" placeholder="Search...">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pet Owner</th>
                        <th>Species</th>
                        <th>Date (mm/dd/yyyy)</th>
                        <th>Time-AM/PM</th>
                        <th>Status</th>
                        <th>Preferred Veterinarian</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark Angelo Dela Cruz</td>
                        <td>Dog</td>
                        <td>02/20/2024</td>
                        <td>8:00 AM - 11:00 AM</td>
                        <td>Confirmed</td>
                        <td>Dr. Ron</td>
                        <td><button class="btn btn-dark btn-sm">Archive</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lebron Santos</td>
                        <td>Dog</td>
                        <td>03/15/2024</td>
                        <td>8:00 AM - 11:00 AM</td>
                        <td>Confirmed</td>
                        <td>Dr. Morales</td>
                        <td><button class="btn btn-dark btn-sm">Archive</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Layla Juico</td>
                        <td>Cat</td>
                        <td>04/03/2024</td>
                        <td>1:00 PM - 6:00 PM</td>
                        <td>Pending</td>
                        <td>Dr. Morales</td>
                        <td><button class="btn btn-dark btn-sm">Archive</button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Denzel Ligon</td>
                        <td>Dog</td>
                        <td>04/17/2024</td>
                        <td>1:00 PM - 6:00 PM</td>
                        <td>Pending</td>
                        <td>Dr. Ron</td>
                        <td><button class="btn btn-dark btn-sm">Archive</button></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Anthony Soriano</td>
                        <td>Cat</td>
                        <td>04/24/2024</td>
                        <td>8:00 AM - 11:00 AM</td>
                        <td>Pending</td>
                        <td>Dr. Ron</td>
                        <td><button class="btn btn-dark btn-sm">Archive</button></td>
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