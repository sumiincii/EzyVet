<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/grooming.css">
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

        #groom3 {
            margin-top: 40px;
            max-width: 80%;
            /* Limit the max width to 50% of its container */
            height: auto;
            /* Maintain aspect ratio */

        }

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
    </style>
</head>

<body>
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
                    <li><a href="#">SERVICES</a>
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
            If you have any questions or concerns about pet grooming, options for handling uncooperative or anxious pets, or anything else, please don’t hesitate to contact us at (+63) 955-617-9958.<br><br><a href="appointment.php" class="btn" style="">REQUEST AN APPOINTMENT</a>
        </p>

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
                <p><i class="fas fa-envelope"></i style="font-size:10px;">ezvet.neust@gmail.com</p>
                <p><i class="fas fa-phone"></i> (+63) 955-617-9963</p>
                <p><i class="fas fa-map-marker-alt"></i> Mulawin St. Brgy. Bitas,<br> Cabanatuan city 3100</p>
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
            <p>&copy; 2024 EzyvetNeust. All rights reserved.</p>
        </div>
    </footer>







</body>

</html>