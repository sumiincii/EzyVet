<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="appointment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .tlogo {
            display: block;
            /* Make the image a block element */
            margin: 0 auto;
            /* Center the image horizontally */
            max-width: 50%;
            /* Limit the max width to 40% of its container */
            height: auto;
            /* Maintain aspect ratio */
            padding: 0;
            margin-top: -110px;
            margin-bottom: -60px;
        }

        .compact-text {
            /* font-size: 14px; */
            /* Adjust font size */
            /* margin: 5px 0; */
            /* Reduce margin */
            padding: 0 80px;
            /* Reduce padding */
        }

        #formsto2 {
            /* background-color: #b07df4; */
            /* background-color: #96dcde; */
            /* border: solid 1px black; */
            padding: 30px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* background-color: #f9f9f9; */
            margin-bottom: 70px;
            background-color: transparent;
        }

        #formsto1 {
            background-image: url(images/formb.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: center;
            /* margin-bottom: 100px; */
        }
    </style>
</head>

<body>
    <?php
    include 'connection.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // reCAPTCHA verification
        $recaptcha_secret = '6Le383YqAAAAAHyNmno3WI0t-PYiH_uZzoZ5A5rm'; // Replace with your secret key
        $recaptcha_response = $_POST['g-recaptcha-response'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
        $responseKeys = json_decode($response, true);

        if (intval($responseKeys["success"]) !== 1) {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'reCAPTCHA verification failed',
                text: 'Please complete the reCAPTCHA.'
            });
            </script>";
        } else {
            $owner_sql = "INSERT INTO owners (fullname, email, phone) VALUES ('$fullname', '$email', '$phone')";
            if ($conn->query($owner_sql) === TRUE) {
                $owner_id = $conn->insert_id;
                $pet_sql = "INSERT INTO pets (owner_id, name, breed, species, color, sex, age) VALUES ('$owner_id', '$pet_name', '$breed', '$species', '$color', '$sex', '$age')";
                if ($conn->query($pet_sql) === TRUE) {
                    $pet_id = $conn->insert_id;
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
                    }
                }
            }
        }
        $conn->close();
    }
    ?>
    <div class="container1 container-fluid text-center" id="container1">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b>, your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <a href="landing.php"><img class="logo img-fluid float-start" src="images/mainlogo.png" alt="logo"></a>
    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav id="main-nav">
                <ul>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="">SERVICES</a>
                        <ul>
                            <li class="hober"><a href="checkup.php">Checkups</a></li>
                            <li class="hober"><a href="vaccinations.php">Vaccinations</a></li>
                            <li class="hober"><a href="grooming.php">Grooming</a></li>
                        </ul>
                    </li>
                    <li><a href="appointment.php">BOOK NOW</a></li>
                    <li><a href="contactus.php">CONTACT US</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <script>
        // Get the navbar and container1 elements
        let navbar = document.getElementById("main-nav");
        let container1 = document.getElementById("container1");

        // Get the offset positions of the navbar and container1
        let stickyNavbar = navbar.offsetTop;
        let stickyContainer1 = container1.offsetTop;

        // Add the scroll event listener
        window.addEventListener("scroll", function() {
            // Handle container1 sticky
            if (window.pageYOffset > stickyContainer1) {
                container1.classList.add("sticky"); // Add sticky class to container1
            } else {
                container1.classList.remove("sticky"); // Remove sticky class from container1
            }

            // Handle navbar sticky
            if (window.pageYOffset > stickyNavbar) {
                navbar.classList.add("sticky"); // Add sticky class to navbar
            } else {
                navbar.classList.remove("sticky"); // Remove sticky class from navbar
            }
        });
    </script>


    <div class="container1 container-fluid p-0 d-flex">
        <div class="row g-0">
            <div class="col-12">
                <img src="images/booknow1.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <img src="images/taglogo.png" alt="ezyvet Logo" class="tlogo img-fluid">
        <h2 class="text-center">Make your Appointment Request Online</h2>
        <br>
        <div class="compact-text row ">
            <p>Planning a visit? Fill out our appointment request form below and hit 'submit.' Please schedule your appointment at least 24 hours in advance so we can confirm it with you. In case of an emergency, don't use this form—call us at (+63) 955-617-9958 / 968-595-8621 or visit our clinic.</p>
        </div>
        <br>
        <div class="row" id="formsto1">
            <div class="col-md-8 mx-auto" id="formsto2">
                <form action="" method="post">
                    <p>Fields marked with an <span class="text-danger">*</span> are required</p>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="fullName" name="fullname" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="appointmentFor" class="form-label">What is the Appointment For <span class="text-danger">*</span></label>
                            <select class="form-control" id="appointmentFor" name="appointmentFor" required>
                                <option value="">Select</option>
                                <option value="Check-up">Check-up</option>
                                <option value="Vaccination">Vaccination</option>
                                <option value="Grooming">Grooming</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="petName" class="form-label">Pet Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="petName" name="petName" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="breed" class="form-label">Breed <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="breed" name="breed" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="species" class="form-label">Species <span class="text-danger">*</span></label>
                            <select class="form-control" id="species" name="species" required>
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
                            <input type="text" class="form-control" id="color" name="color" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="sex" class="form-label">Sex <span class="text-danger">*</span></label>
                            <select class="form-control" id="sex" name="sex" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="age" class="form-label">Age in months <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="age" name="age" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="appointmentDate" class="form-label">Appointment Date <span class="text-danger">*</span></label>
                            <input required type="date" class="form-control" id="appointmentDate" name="appointmentDate" min="<?php echo date('Y-m-d', strtotime('+0 day')); ?>" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="appointmentTime" class="form-label">Appointment Time <span class="text-danger">*</span></label>
                            <select class="form-control" id="appointmentTime" name="appointmentTime" required>
                                <option value="">Select</option>
                                <!-- Time slots will be populated by JavaScript -->
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+63" required />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="comments" class="form-label">Special Instructions</label>
                            <textarea class="form-control" id="comments" name="comments"></textarea>
                        </div>
                    </div>
                    <!-- reCAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6Le383YqAAAAAHuQRm7J0a-mh84GH7B6fvGzDX71"></div> <!-- Replace with your site key -->
                    <br>
                    <button type="submit" class="submit-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-logo">
            <img src="images/taglogo.png" alt="EcoPaws Logo">
        </div>
        <div class="footer-container">
            <div class="footer-map">
                <h4>Visit Us</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sph!4v1713428538080!5m2!1sen!2sph!6m8!1m7!1s1UPyzrm-fB9QmunjaXDomg!2m2!1d15.49962680830744!2d120.9768442687773!3f244.72785217855838!4f1.4193708654089647!5f0.7820865974627469"
                    width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
            <div class="footer-contact">
                <h4>Contact Information</h4>
                <p><i class="fas fa-envelope"></i> ezyvet.neust@gmail.com </p>
                <p><i class="fas fa-phone"></i> (+63) 955-617-9958 / 968-595-8621</p>
                <p><i class="fas fa-map-marker-alt"></i> Mulawin St. Brgy. Bitas,<br> Cabanatuan city 3100</p>
                <!-- zipcode -->
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <a href="https://www.facebook.com/profile.php?id=61568325466992&mibextid=ZbWKwL" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/ezyvet.neust/profilecard/?igsh=MWJkM3VyMGJqMGZzbA==" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="https://www.viber.com/en/" class="social-icon"><i class="fab fa-viber"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 EzyvetNeust. All rights reserved.</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentFor = document.getElementById('appointmentFor');
            const appointmentDate = document.getElementById('appointmentDate');
            const appointmentTime = document.getElementById('appointmentTime');
            const form = document.querySelector('form');

            const intervalMapping = {
                'Grooming': 60,
                'Check-up': 60,
                'Vaccination': 30
            };

            function fetchAvailableTimes(date, interval) {
                fetch(`get_available_times.php?date=${date}&interval=${interval}`)
                    .then(response => response.json())
                    .then(slots => {
                        appointmentTime.innerHTML = '<option value="">Select</option>';
                        slots.forEach(slot => {
                            const option = document.createElement('option');
                            option.value = slot.time; // 24-hour format stored as value
                            option.textContent = slot.display_time; // 12-hour format shown to user
                            if (!slot.available) {
                                option.disabled = true;
                                option.textContent += ' (Booked)';
                                option.style.color = 'red';
                            }
                            appointmentTime.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }

            appointmentFor.addEventListener('change', function() {
                if (appointmentDate.value) {
                    const interval = intervalMapping[this.value];
                    fetchAvailableTimes(appointmentDate.value, interval);
                }
            });

            appointmentDate.addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                const dayOfWeek = selectedDate.getUTCDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

                if (dayOfWeek === 0) { // Check if it's Sunday
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Date',
                        text: 'Clinic is closed during Sundays. Please select a different date.'
                    });
                    this.value = ''; // Reset the date input
                } else if (appointmentFor.value) {
                    const interval = intervalMapping[appointmentFor.value];
                    fetchAvailableTimes(this.value, interval);
                }
            });

            // Form validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Check reCAPTCHA first
                const recaptchaResponse = grecaptcha.getResponse();
                if (!recaptchaResponse) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Please complete the reCAPTCHA',
                        text: 'You must verify that you are not a robot.'
                    });
                    return; // Exit the function if reCAPTCHA is not completed
                }

                // Basic form validation
                const required = ['fullname', 'email', 'phone', 'petName', 'breed',
                    'species', 'color', 'sex', 'age', 'appointmentFor',
                    'appointmentDate', 'appointmentTime'
                ];

                let isValid = true;
                required.forEach(fieldName => {
                    const field = document.getElementsByName(fieldName)[0];
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = 'red';
                    } else {
                        field.style.borderColor = '';
                    }
                });

                if (isValid) {
                    this.submit();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Please fill in all required fields',
                        text: 'Fields marked with * are required'
                    });
                }
            });
        });
    </script>
</body>

</html>