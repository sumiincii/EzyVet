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
        $appointment_for = $_POST['appointmentFor'];
        $appointment_date = $_POST['appointmentDate'];
        $appointment_time = $_POST['appointmentTime'];
        $comments = $_POST['comments'];

        // Insert into owners table
        $owner_sql = "INSERT INTO owners (fullname, email, phone) VALUES ('$fullname', '$email', '$phone')";
        if ($conn->query($owner_sql) === TRUE) {
            $owner_id = $conn->insert_id;

            // Insert into pets table
            $pet_sql = "INSERT INTO pets (owner_id, name, breed, species, color, sex, age) VALUES ('$owner_id', '$pet_name', '$breed', '$species', '$color', '$sex', '$age')";
            if ($conn->query($pet_sql) === TRUE) {
                $pet_id = $conn->insert_id;

                // Insert into appointments table
                $appointment_sql = "INSERT INTO appointments (owner_id, pet_id, appointment_date, appointment_time, status, appointment_for, comments) VALUES ('$owner_id', '$pet_id', '$appointment_date', '$appointment_time', 'Pending', '$appointment_for', '$comments')";
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
    <a href="landing.php"><img class="logo img-fluid float-start" src="images/ezyvetnewlogo.png" alt="logo"></a>

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
            <div class="col-md-8 mx-auto">
                <form action="" method="post">
                    <p>Fields marked with an <span class="text-danger">*</span> are </p>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullName" name="fullname" />
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="appointmentFor" class="form-label">What is the Appointment For <span class="text-danger">*</span></label>
                            <select class="form-control" id="appointmentFor" name="appointmentFor">
                                <option value="">Select</option>
                                <option value="Check-up">Check-up</option>
                                <option value="Vaccination">Vaccination</option>
                                <option value="Grooming">Grooming</option>
                                <option value="Follow-up">Follow-up</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="petName" class="form-label">Pet Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="petName" name="petName" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="breed" class="form-label">Breed <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="breed" name="breed" />
                        </div>
                        <div class="col-sm-6">
                            <label for="species" class="form-label">Species <span class="text-danger">*</span></label>
                            <select class="form-control" id="species" name="species">
                                <option value="">Select</option>
                                <option value="Cat">Cat</option>
                                <option value="Dog">Dog</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="color" name="color" />
                        </div>
                        <div class="col-sm-6">
                            <label for="sex" class="form-label">Sex <span class="text-danger">*</span></label>
                            <select class="form-control" id="sex" name="sex">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Age in months <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="age" name="age" />
                        </div>
                        <div class="col-sm-6">
                            <label for="appointmentDate" class="form-label">Appointment Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" min="<?php echo date('Y-m-d', strtotime('+0 day')); ?>" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="appointmentTime" class="form-label">Appointment Time <span class="text-danger">*</span></label>
                            <select class="form-control" id="appointmentTime" name="appointmentTime">
                                <option value="">Select</option>
                                <!-- Time slots will be populated by JavaScript -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+63" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="comments" class="form-label">special instructions</label>
                            <textarea class="form-control" id="comments" name="comments"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentDateInput = document.getElementById('appointmentDate');
            const appointmentTimeSelect = document.getElementById('appointmentTime');

            appointmentDateInput.addEventListener('change', function() {
                const selectedDate = this.value;
                if (!selectedDate) return;

                fetch('get_available_times.php?date=' + encodeURIComponent(selectedDate))
                    .then(response => response.json())
                    .then(data => {
                        appointmentTimeSelect.innerHTML = '<option value="">Select</option>';
                        data.forEach(time => {
                            const option = document.createElement('option');
                            option.value = time;
                            option.textContent = time;
                            appointmentTimeSelect.appendChild(option);
                        });
                    });
            });
        });
    </script>
</body>

</html>