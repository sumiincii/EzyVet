<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="appointment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pet_name = $_POST['petName'];
        $breed = $_POST['breed'];
        $species = $_POST['species'];
        $color = $_POST['color'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $appointment_date = $_POST['appointmentDate'];
        $appointment_time = $_POST['appointmentTime'];

        // Insert into owners table
        $owner_sql = "INSERT INTO owners (fullname, email, phone) VALUES ('$fullname', '$email', '$phone')";
        if ($conn->query($owner_sql) === TRUE) {
            $owner_id = $conn->insert_id; // Get the last inserted owner ID

            // Insert into pets table
            $pet_sql = "INSERT INTO pets (owner_id, name, breed, species, color, sex, age) VALUES ('$owner_id', '$pet_name', '$breed', '$species', '$color', '$sex', '$age')";
            if ($conn->query($pet_sql) === TRUE) {
                $pet_id = $conn->insert_id; // Get the last inserted pet ID

                // Insert into appointments table
                $appointment_sql = "INSERT INTO appointments (owner_id, pet_id, appointment_date, appointment_time, status) VALUES ('$owner_id', '$pet_id', '$appointment_date', '$appointment_time', 'Pending')";
                if ($conn->query($appointment_sql) === TRUE) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Appointment request submitted successfully!',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        });
                    </script>";
                } else {
                    echo "Error: " . $appointment_sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $pet_sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $owner_sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <div class="container1 container-fluid text-center">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b>, your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <a href="testpage.php"><img class="logo img-fluid float-start" src="images/ezyvetnewlogo.png" alt="logo"></a>

    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav>
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="">SERVICES</a>
                        <ul>
                            <li class="hober"><a href="checkup.php">Checkups</a></li>
                            <li class="hober"><a href="vaccinations.php">Vaccinations</a></li>
                            <li class="hober"><a href="grooming.php">Grooming</a></li>
                            <li class="hober"><a href="followup.php">Follow Up</a></li>
                        </ul>
                    </li>
                    <li><a href="appointment.php">BOOK NOW</a></li>
                    <li><a href="contactus.php">CONTACT US</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>

    <div class="container1 container-fluid p-0" style="overflow:visible;">
        <div class="row g-0">
            <div class="col-12 image-top">
                <img src="images/booknow1.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>


    <div class="container my-5">
        <h2 class="text-center">Make your Appointment Request Online</h2>
        <div class="row">
            <p>Planning a visit? Fill out our appointment request form below and hit 'submit.' Please schedule your appointment at least 24 hours in advance so we can confirm it with you. In case of an emergency, don't use this form—call us at (860) 757-3346 or visit our clinic.</p>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    <p>Fields marked with an <span class=" text-danger">*</span> are required</p>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullName" name="fullname" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="number" placeholder="+63" class="form-control" id="phone" name="phone" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="petName" class="form-label">Pet's Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="petName" name="petName" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="breed" class="form-label">Breed <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="breed" name="breed" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="species" class="form-label">Species <span class="text-danger">*</span></label>
                            <select class="form-control" id="species" name="species" required>
                                <option value="">Select</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="color" name="color" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="sex" class="form-label">Sex <span class="text-danger">*</span></label>
                            <select class="form-control" id="sex" name="sex" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="age" name="age" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="appointmentDate" class="form-label">Preferred Day for Appointment <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" min="" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="appointmentTime" class="form-label">Preferred Time for Appointment <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Appointment Request</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>