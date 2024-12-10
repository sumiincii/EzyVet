<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="css/contactus.css"> -->
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

        .contact-card {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-card h4 {
            margin-top: 0;
            color: #8b61c2;
        }

        .accordion .card {
            margin-bottom: 10px;
        }

        .accordion .card-header {
            /* background-color: #f7f7f7; */
            background-color: #e7def2;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .accordion .card-header button {
            width: 100%;
            text-align: left;
            padding: 10px;
            font-size: 16px;
            font-weight: 550;
            /* color: #337ab7; */
            color: #212529;
            border: none;
            border-radius: 0;
            background-color: transparent;
        }

        .accordion .card-header button:hover {
            color: #23527c;
        }

        .accordion .card-body {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 10px 10px;
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
            /* meaning gumagana to csss peek */
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
    </style>
</head>

<body>




    <div class=" container1 container-fluid p-0 d-flex">
        <div class="row g-0">
            <div class="col-12">
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
                    <p><i class="fas fa-map-marker-alt"></i> Mulawin St. Brgy.Bitas,<br>Cabanatuan City, Nueva Ecija</p>
                    <p><i class="fas fa-phone"></i> Phone: (+63) 955-617-9958</p>
                    <p><i class="fas fa-envelope"></i> Email: Ezyvet.neust@gmail.com</p>
                    <h5>Clinic Hours:</h5>
                    <p>
                        <i class="fas fa-clock"></i> Monday - Saturday: 8:00 am - 5:00 pm<br>
                        <i class="fas fa-clock"></i> Sunday: Closed
                    </p>
                    <h5>Payment Options:</h5>
                    <p>
                        <i class="fas fa-money-bill-wave"></i> G-cash<br>
                        <i class="fas fa-credit-card"></i> All major credit cards<br>
                        <i class="fas fa-cash-register"></i> Cash
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- this is faq  -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="display-4">Frequently Asked Questions</h2>
                <p class="lead">Get answers to common questions about our veterinary services.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="contact-card shadow-sm p-4 rounded">
                    <h4>What services do you offer?</h4>
                    <p>We offer a variety of veterinary services including checkups, vaccinations, grooming, and follow-up care.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card shadow-sm p-4 rounded">
                    <h4>What are your clinic hours?</h4>
                    <p>Our clinic is open Monday to Saturday from 8:00 am to 5:00 pm and closed on Sundays.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card shadow-sm p-4 rounded">
                    <h4>How can I book an appointment?</h4>
                    <p>You can book an appointment by visiting our 'Book Now' page or by contacting us directly via phone or email.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card shadow-sm p-4 rounded">
                    <h4>What payment options do you accept?</h4>
                    <p>We accept G-cash, all major credit cards, and cash payments.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card shadow-sm p-4 rounded">
                    <h4>What vaccinations do you recommend for my pet?</h4>
                    <p>We recommend core vaccinations such as rabies, distemper, parvovirus, and hepatitis. Additional vaccinations may be suggested based on your pet's lifestyle.</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="contact-card shadow-sm p-4 rounded">
                    <h4>How often should my pet have checkups?</h4>
                    <p>We recommend annual checkups for healthy pets. Senior pets or those with health issues may require more frequent visits.</p>
                </div>
            </div>
        </div>
    </div>



    <!-- Add this Emergency FAQ section below the existing content, before the footer -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="display-4">Emergency Services FAQ</h2>
                <p class="lead">Be prepared for any pet emergencies with these guidelines.</p>
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
                        Keep a pet emergency kit handy, including supplies like bandages, antiseptic wipes, and a muzzle. Also, ensure you have our clinic's contact information readily available.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="emergencyFaqFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseFour" aria-expanded="false" aria-controls="emergencyCollapseFour">
                            What should I do if my pet is experiencing difficulty breathing?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseFour" class="collapse" aria-labelledby="emergencyFaqFour" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        If your pet is experiencing difficulty breathing, please contact us immediately or visit our clinic. Keep your pet calm and secure during transport.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="emergencyFaqFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseFive" aria-expanded="false" aria-controls="emergencyCollapseFive">
                            Can I give my pet medication without consulting a veterinarian?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseFive" class="collapse" aria-labelledby="emergencyFaqFive" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        No, never give your pet medication without consulting a veterinarian first. This can lead to serious health complications or even death.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class=" card-header" id="emergencyFaqSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseSix" aria-expanded="false" aria-controls="emergencyCollapseSix">
                            What should I do if my pet is vomiting?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseSix" class="collapse" aria-labelledby="emergencyFaqSix" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        If your pet is vomiting, monitor them closely. Withhold food for 12 hours and provide fresh water. If vomiting persists or is accompanied by other symptoms like lethargy or diarrhea, contact us immediately.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="emergencyFaqSeven">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#emergencyCollapseSeven" aria-expanded="false" aria-controls="emergencyCollapseSeven">
                            What should I do if my pet cannot urinate or defecate?
                        </button>
                    </h5>
                </div>
                <div id="emergencyCollapseSeven" class="collapse" aria-labelledby="emergencyFaqSeven" data-parent="#emergencyFaqAccordion">
                    <div class="card-body">
                        If your pet is unable to urinate or defecate, this is a medical emergency. Please bring your pet to our clinic immediately, as this can lead to serious health issues.
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
                <p><i class="fas fa-envelope"></i style="font-size:10px;">ezyvet.neust@gmail.com</p>
                <p><i class="fas fa-phone"></i> (+63) 955-617-9963 / 968-595-8621</p>
                <p><i class="fas fa-map-marker-alt"></i> Mulawin St. Brgy. Bitas,<br> Cabanatuan city 3100</p>
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









</body>

</html>