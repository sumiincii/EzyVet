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

    function getAvailableTimes($date, $conn)
    {
        $clinic_hours = [
            'Monday' => ['08:00:00', '18:00:00'],
            'Tuesday' => ['08:00:00', '18:00:00'],
            'Wednesday' => ['08:00:00', '18:00:00'],
            'Thursday' => ['08:00:00', '18:00:00'],
            'Friday' => ['08:00:00', '18:00:00'],
            'Saturday' => ['08:00:00', '18:00:00'],
            'Sunday' => null
        ];

        $day_of_week = date('l', strtotime($date));
        $available_times = [];

        if (isset($clinic_hours[$day_of_week]) && $clinic_hours[$day_of_week] !== null) {
            $start_time = $clinic_hours[$day_of_week][0];
            $end_time = $clinic_hours[$day_of_week][1];
            $interval = new DateInterval('PT30M'); // 30 minutes interval
            $period = new DatePeriod(
                new DateTime($start_time),
                $interval,
                new DateTime($end_time)
            );

            foreach ($period as $time) {
                $formatted_time = $time->format('H:i:s');
                $sql = "SELECT COUNT(*) FROM appointments WHERE appointment_date = '$date' AND appointment_time = '$formatted_time'";
                $result = $conn->query($sql);
                $count = $result->fetch_row()[0];

                if ($count == 0) {
                    $available_times[] = $formatted_time;
                }
            }
        }

        return $available_times;
    }

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
                            <input type="text" class="form-control" id="fullName" name="fullname" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="appointmentFor" class="form-label">What is the Appointment For <span class="text-danger">*</span></label>
                            <select class="form-control" id="appointmentFor" name="appointmentFor">
                                <option value="">Select</option>
                                <option value="Check-up">Check-up</option>
                                <option value="Vaccination">Vaccination</option>
                                <option value="Grooming">Grooming</option>
                                <option value="Follow-up">Follow-up</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="petName" class="form-label">Pet Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="petName" name="petName" />
                        </div>
                    </div>
                    <!-- Appointment date and time -->
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="appointmentDate" class="form-label">Appointment Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" min="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="appointmentTime" class="form-label">Appointment Time <span class="text-danger">*</span></label>
                            <select class="form-control" id="appointmentTime" name="appointmentTime">
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <!-- Pet details -->
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="breed" class="form-label">Breed <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="breed" name="breed" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="species" class="form-label">Species <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="species" name="species" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="color" name="color" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="sex" class="form-label">Sex <span class="text-danger">*</span></label>
                            <select class="form-control" id="sex" name="sex">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="age" name="age" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea class="form-control" id="comments" name="comments" placeholder="Additional Instructions or Special Requests"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add the JS to handle min date and time filtering -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentDateInput = document.getElementById('appointmentDate');
            const appointmentTimeSelect = document.getElementById('appointmentTime');

            // Set the minimum date to today
            const today = new Date().toISOString().split('T')[0];
            appointmentDateInput.setAttribute('min', today);

            appointmentDateInput.addEventListener('change', function() {
                const selectedDate = this.value;
                const currentTime = new Date();

                // Clear the time dropdown
                appointmentTimeSelect.innerHTML = '<option value="">Select</option>';

                if (!selectedDate) return;

                fetch('get_available_times.php?date=' + encodeURIComponent(selectedDate))
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(time => {
                            const option = document.createElement('option');
                            const timeParts = time.split(':');
                            const timeDate = new Date();
                            timeDate.setHours(timeParts[0], timeParts[1], timeParts[2]);

                            // If the selected date is today, filter out past times
                            if (selectedDate === today) {
                                if (timeDate > currentTime) {
                                    option.value = time;
                                    option.textContent = time;
                                    appointmentTimeSelect.appendChild(option);
                                }
                            } else {
                                option.value = time;
                                option.textContent = time;
                                appointmentTimeSelect.appendChild(option);
                            }
                        });
                    });
            });
        });
    </script>
</body>

</html>