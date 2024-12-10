<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="css/grooming.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- this is the icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .btn {
            font-family: "Montserrat" !important;
            text-align: center;
            font-size: 10px;
            letter-spacing: 2px;
            /* margin-top: 20px;  */
            background-color: #8b61c2;
            color: #fff;
            padding: 10px;
            padding-left: 14px;
            padding-right: 14px;
            /* Adjust padding as needed */
            border-radius: 20px;
            text-decoration: none;
            /* Remove underline from link */
            display: inline-block;
            /* Make the link behave like a button */
        }

        .btn:hover {
            background-color: #5ce1e6;
            /* Set the hover color */
            color: #fff;
            /* Keep the text color white on hover */
        }

        body {
            /* background-image: url(images/bgbgbg.png); */
            /* background-image: url(images/loginbg.jpg); */
            background-image: url(images/bg4.png);
            /* background-repeat: no-repeat; */
            background-size: contain;
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

        .button-container {
            text-align: center;
            /* Center the text and inline elements */
        }
    </style>
</head>

<body>





    <div class=" container1 container-fluid p-0 d-flex">
        <div class="row g-0">
            <div class="col-12">
                <img src="images/DogGrooming.jpg" alt="dog image" class="img-fluid w-100 h-100" />
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

    <div class="container py-5">
        <h2 class="text-center mb-4">How Pet Grooming</h2>
        <h3 class="text-center mb-5">Keep Your Pet Clean, Comfortable, And Healthy</h3>
        <p class="mb-5 text-center">
            At Dr. Ron Veterinary Clinic, we strive to create a Fear Free environment in every aspect of our practice, including grooming. Our expert groomer is highly experienced and committed to providing a stress-free grooming experience for each furry guest. We prioritize the health and safety of every pet, tailoring grooming sessions to their individual needs. Our hope is that every dog enjoys a fun and pleasant grooming experience with us. Additionally, our clinic is skilled in providing grooming services for cats, ensuring that all our animal friends receive the care and attention they deserve.
        </p>
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-4">With Years Of Experience In Pet Grooming, Our Clinic Offers A Range Of Services, Including:</h4>
                <ul class="list-unstyled" style="line-height: 30px;">
                    <li>• Bathing</li>
                    <li>• Brushing</li>
                    <li>• Haircut Or Trimming</li>
                    <li>• Nail Trimming</li>
                    <li>• Ear Cleaning</li>
                    <li>• Dental Care</li>
                </ul>
                <p style="text-align:justify;">
                    Furthermore, our groomer closely observes your pet’s skin, ears, eyes, and coat for any abnormalities. She promptly notifies one of our vets for additional testing if she finds any lumps, bumps, symptoms of parasites, or diseases.
                </p>

            </div>

            <div class="col-md-6 text-center">
                <img src="images/groom2.jpg" class="img-fluid rounded" alt="Groomed Pet" id="groom3">
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

    <div class="container py-5">
        <h2 class="text-center mb-4">Paths to Pet Comfort</h2>
        <p class="text-center mb-5">
            Grooming can be scary for pets new to it. That's why we take time to ease their stress. We start by checking how scared they are when they arrive and adjust accordingly. Ways to reduce their stress include:
        </p>
        <ul class="list-unstyled">
            <li>• Keep noise levels low and provide a familiar, quiet space for grooming.</li>
            <li>• Handle pets with care and avoid sudden movements to minimize stress.</li>
            <li>• Offer treats or praise during grooming to create a positive experience.</li>
            <li>• Allow pets to rest and relax during grooming sessions to prevent overwhelm.</li>
            <li>• Pay attention to your pet's body language and signals, and adjust grooming accordingly.</li>
            <li>• Choose soft brushes, mild shampoos, and comfortable grooming tools to enhance the experience.</li>
            <li>• Maintain a calm and relaxed demeanor to help pets feel at ease during grooming.</li>
        </ul>
        <p class="text-center mt-5">
            If you have any questions or concerns about pet grooming, options for handling uncooperative or anxious pets, or anything else, please don’t hesitate to contact us at (+63) 955-617-9958.<br>
            <br>
        </p>
        <div class="button-container">
            <a href="appointment.php" class="btn b2">REQUEST AN APPOINTMENT</a>
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


    <!-- this is the footer  -->

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