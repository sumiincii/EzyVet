<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="contactus.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.
    min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- this is icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .btn-submit {
            background-color: #007bff;
            /* Bootstrap primary color */
            color: white;
            /* Text color */
            padding: 10px 20px;
            /* Padding for button */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            font-size: 16px;
            /* Font size */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s ease, transform 0.2s;
            /* Smooth transition */
        }

        .btn-submit:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }

        .contact-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Add shadow for depth */
            padding: 20px;
            /* Padding inside the card */
            border-radius: 10px;
            /* Rounded corners for the card */
            background-color: #f8f9fa;
            /* Light background color */
            margin-bottom: 20px;
            /* Space below each card */
        }

        .footer {
            background-color: #222;
            color: #ccc;
            padding: 3rem 0;
            font-family: Montserrat, sans-serif;
            text-align: center;
        }

        .footer-logo img {
            max-width: 150px;
            margin-bottom: 1.5rem;
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
    </style>
</head>

<body>
    <div class="container1 container-fluid text-center">
        <div class="row">
            <div class="col" id="wc">
                Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.
            </div>
        </div>
    </div>
    <a href="landing.php"><img class="logo img-fluid float-start" src="images/mainlogo.png" alt="logo"></a>

    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav>
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a>
                        <ul>
                            <li class="hober"><a href="checkup.php">Checkups</a></li>
                            <li class="hober"><a href="vaccinations.php">Vaccinations</a></li>
                            <li class="hober"><a href="grooming.php">Grooming</a></li>
                            <li class="hober"><a href="followup.php">Follow Up</a></li>
                        </ul>
                    </li>
                    <li><a href="appointment.php">BOOK NOW</a>
                        <!-- <ul>
              <li class="hober1"><a href="appointment.php">REQUESTANAPPOINTMENT </a></li>
              <li class="hober"><a href="#">asd</a>
              </li>
            </ul> -->
                    </li>
                    <li><a href="contactus.php">CONTACT US</a></li>
                </ul>
            </nav>
        </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class=" container1 container-fluid p-0" style="overflow:visible;">
        <div class="row g-0">
            <div class="col-12 image-top">
                <img src="images/RC-Landscape.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- <br>
    <br> -->
    <!-- eto yung head -->

    <!-- this is the divider -->
    <div class="container text-center">
        <div class="row">
            <div class="col  d-flex align-items-center">
                <hr class="w-100 mx-auto" style="height: 2px; background-color: black; border: none;">
            </div>
            <div class="col-2 text-center ">
                <img src="images/Paws.png" alt="PawsLogo" class="img-fluid" style="max-width: 75px; margin-top: 0;">
            </div>
            <div class="col  d-flex align-items-center">
                <hr class="w-100 mx-auto" style="height: 2px; background-color: black; border: none;">
            </div>
        </div>
    </div>
    <!-- end of divider -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>NEED HELP?</h2>
                <h3>Contact Us</h3>
                <p>Whether you're looking for a new veterinarian or are a current client with questions, we'd love to hear from you. You can contact us by calling, visiting us, or filling out our contact form.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-card">
                    <h4>Send Us a Message</h4>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" id="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-card">
                    <h4>DR. RON VETERINARY CLINIC</h4>
                    <p>Mulawin St. Brgy.Bitas,<br>Cabanatuan City, Nueva Ecija</p>
                    <p>Phone: (+63) 955-617-9958</p>
                    <p>Email: Ezyvet.neust@gmail.com</p>
                    <h5>Clinic Hours:</h5>
                    <p>
                        Monday - Saturday: 8:00 am - 5:00 pm<br>
                        Sunday: Closed
                    </p>
                    <h5>Payment Options:</h5>
                    <p>
                        G-cash<br>
                        All major credit cards<br>
                        Cash
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- this is the divider -->
    <div class="container text-center">
        <div class="row">
            <div class="col  d-flex align-items-center">
                <hr class="w-100 mx-auto" style="height: 2px; background-color: black; border: none;">
            </div>
            <div class="col-2 text-center ">
                <img src="images/Paws.png" alt="PawsLogo" class="img-fluid" style="max-width: 75px; margin-top: 0;">
            </div>
            <div class="col  d-flex align-items-center">
                <hr class="w-100 mx-auto" style="height: 2px; background-color: black; border: none;">
            </div>
        </div>
    </div>
    <!-- end of divider -->


    <?php
    include 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>Swal.fire('Success!', 'Feedback submitted successfully!', 'success');</script>";
        } else {
            echo "<script>Swal.fire('Error!', 'Error: " . $conn->error . "', 'error');</script>";
        }

        $conn->close();
    }
    ?>

    <footer class="footer">
        <div class="footer-logo">
            <img src="path/to/your-logo.png" alt="EcoPaws Logo">
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









</body>

</html>