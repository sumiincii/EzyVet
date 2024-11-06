<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/appointment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google reCAPTCHA -->
    <!-- <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script> -->
    <!-- sweet alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #wc {
            /* background-color: #c1cad3; */
            background-color: #8b61c2;
            padding: 7px;
            /* color: #3e444b; */
            color: white;
            margin-left: -2px;
        }

        nav a::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 0;
            width: 0;
            height: 2.5px;
            /* background: #c1cad3; */
            background: #8b61c2;
            transition: 0.3s;
        }

        .hober a:hover {
            /* background: rgb(150, 150, 150); */
            background: #8b61c2;
            color: white;

        }

        .submit-btn {
            background-color: #8b61c2;
            /* Violet background color */
            color: white;
            /* Text color */
            border: none;
            /* No border */
            padding: 10px 20px;
            /* Padding */
            border-radius: 5px;
            /* Rounded corners */
            font-size: 16px;
            /* Font size */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s;
            /* Smooth transition */
        }

        .submit-btn:hover {
            background-color: #5ce1e6;
            /* Teal background color on hover */
        }

        /* footer */
        .footer {
            background-color: #222;
            color: #ccc;
            padding: 3rem 0;
            font-family: Montserrat, sans-serif;
            text-align: center;
            padding: 3rem 0;
            padding: 3rem 0;
            /* Adjust padding as necessary */
            /* Adjust padding as necessary */
        }

        .footer-logo {
            height: 100px;
            /* Adjust this value based on your desired logo height */
            display: flex;
            /* Use flexbox to center the logo */
            justify-content: center;
            /* Center the logo horizontally */
            align-items: center;
            /* Center the logo vertically */
        }

        .footer-logo img {
            max-width: 350px;
            /* Adjust this value to make the logo bigger */
            height: auto;
            /* Maintain aspect ratio */
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* Adjusted for better spacing */
            max-width: 1200px;
            margin: auto;
            padding: 0 1rem;
        }

        .footer-map {
            flex: 2 2 200px;
            margin: 1rem;
            margin-bottom: 2rem;
            /* Added bottom margin */
            /* margin-left: 50px; */
        }

        .footer-map h4 {
            color: #ffbf00;
            margin-bottom: 0.5rem;
        }

        .footer-map iframe {
            margin-top: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .footer-contact,
        .footer-social {
            flex: 1 1 200px;
            margin: 1rem;
            margin-bottom: 2rem;
            /* Added bottom margin */
        }

        .footer h4 {
            color: #5ce1e6;
            margin-bottom: 0.5rem;
        }

        .footer-contact p,
        .footer-social a {
            margin: 0.5rem 0;
            color: #ccc;
        }

        .footer-contact i,
        .footer-social i {
            margin-right: 0.5rem;
            color: white;
            /* small */
        }

        .footer-contact {
            flex: 1 1 200px;
            margin: 1rem;
            display: flex;
            /* Enable flexbox */
            flex-direction: column;
            /* Stack items vertically */
            align-items: flex-start;
            /* Align items to the start */
            margin-left: 100px;
        }

        .footer-contact p {
            margin: 0.5rem 0;
            color: #ccc;
            display: flex;
            /* Enable flexbox for individual items */
            align-items: center;
            /* Center items vertically */
        }

        .social-icon {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            text-decoration: none;
            color: #ccc;
            transition: color 0.3s;
        }

        .social-icon:hover {
            color: #ffbf00;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            border-top: 1px solid #444;
            padding-top: 1rem;
            font-size: 0.9rem;
        }

        .footer-bottom a {
            color: #ffbf00;
            text-decoration: none;
            /* margin: 0 0.5rem; */
            transition: color 0.3s;
        }

        .footer-bottom a:hover {
            color: #ccc;
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-map,
            .footer-contact,
            .footer-social {
                margin: 1rem 0;
            }
        }

        a img {
            margin-top: -25px;
            /* margin-left: -50px; */
        }

        #container1 {
            background-color: #8b61c2;
            /* Background color for container1 */
            color: white;
            /* Text color */
            padding: 0;
            /* Padding for container1 */
            transition: top 0.3s;
            /* Smooth transition for sticky effect */
        }

        #container1.sticky {
            position: fixed;
            /* Change to fixed when sticky */
            top: 0;
            /* Stick to the top */
            left: 0;
            /* Align to the left */
            right: 0;
            /* Align to the right */
            z-index: 999;
            /* Ensure it stays above other content */
        }

        #main-nav {
            background-color: transparent;
            /* Set the background color to transparent */
            text-align: center;
            position: relative;
            /* Initial position */
            box-sizing: border-box;
            height: 60px;
            /* Height of the navbar */
            transition: background-color 0.3s ease, top 0.3s ease;
            width: 100%;
            /* Smooth transitions for background color and top */
        }

        #main-nav.sticky {
            position: fixed;
            /* Change to fixed when sticky */
            background-color: white;
            /* Change background color when sticky */
            top: 28px;
            /* Stick below container1 */
            z-index: 2000;
            /* Ensure it stays above other content */
            padding: 0 25px;
            text-align: center;
            width: 100%;

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
        $conn->close();
    }
    ?>
    <br>
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
                    <li><a href="#">ABOUT</a></li>
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
                    <!-- <div class="g-recaptcha" data-sitekey="6Le_gnMqAAAAANkjj9vf5dwN7suQ6AoRHh6w_I26"></div> -->
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
                <p><i class="fas fa-envelope"></i style="font-size:10px;">ezvet.neust@gmail.com</p>
                <p><i class="fas fa-phone"></i> (+63) 955-617-9963</p>
                <p><i class="fas fa-map-marker-alt"></i> Mulao St. Brgy. Batas,<br> Cabanatuan city 3114</p>
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 EcoPaws. All rights reserved.</p>
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