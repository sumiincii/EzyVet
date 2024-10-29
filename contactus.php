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
    <!-- faqs -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        <button type="submit" class="submit-btn">Submit</button>
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

    <!-- this is faq  -->

    <!-- Add this FAQ section below the existing content, before the footer -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Frequently Asked Questions</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="contact-card">
                    <h4>What services do you offer?</h4>
                    <p>We offer a variety of veterinary services including checkups, vaccinations, grooming, and follow-up care.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card">
                    <h4>What are your clinic hours?</h4>
                    <p>Our clinic is open Monday to Saturday from 8:00 am to 5:00 pm and closed on Sundays.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card">
                    <h4>How can I book an appointment?</h4>
                    <p>You can book an appointment by visiting our 'Book Now' page or by contacting us directly via phone or email.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card">
                    <h4>What payment options do you accept?</h4>
                    <p>We accept G-cash, all major credit cards, and cash payments.</p>
                </div>
            </div>
        </div>
    </div>


    <!-- Add this Emergency FAQ section below the existing content, before the footer -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Emergency Services FAQ</h2>
            </div>
        </div>
        <div class="accordion" id="emergencyFaqAccordion">
            <div class="card">
                <div class="card-header" id="emergencyFaqOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#emergencyCollapseOne" aria-expanded="true" aria-controls="emergencyCollapseOne">
                            What should I do in case of a pet emergency?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseOne" class="collapse show" aria-labelledby="emergencyFaqOne" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        If you encounter a pet emergency, please call us immediately or visit our clinic. Ensure your pet is calm and secure during transport.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="emergencyFaqTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseTwo" aria-expanded="false" aria-controls="emergencyCollapseTwo">
                            Do you offer emergency services after hours?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseTwo" class="collapse" aria-labelledby="emergencyFaqTwo" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        Our clinic operates during regular hours from Monday to Saturday. For emergencies outside these hours, we recommend contacting the nearest 24-hour veterinary clinic.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="emergencyFaqThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseThree" aria-expanded="false" aria-controls="emergencyCollapseThree">
                            How can I prepare for a pet emergency?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseThree" class="collapse" aria-labelledby="emergencyFaqThree" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        Keep a pet first aid kit at home, know the location of the nearest emergency vet, and have our contact information readily available.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="emergencyFaqFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseFour" aria-expanded="false" aria-controls="emergencyCollapseFour">
                            What are common signs of a pet emergency?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseFour" class="collapse" aria-labelledby="emergencyFaqFour" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        Common signs include difficulty breathing, excessive bleeding, seizures, or sudden changes in behavior. If you notice any of these, seek help immediately.
                    </div>
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