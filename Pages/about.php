<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/about.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="node_modules/animate.css/animate.min.css">
    <!-- this is icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        a img {
            margin-top: -25px;
            /* margin-left: -50px; */
        }

        body {
            font-family: 'Montserrat', sans-serif !important;
        }



        .mission {
            padding: 50px 0;
            text-align: center;
        }

        .mission h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .team {
            padding: 50px 0;
            background-color: #f7f7f7;
        }

        .team h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
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

        /* new about us  */
        h1,
        h2 {
            font-weight: bold;
            color: #111;
        }

        .section-title {
            font-size: 2.5rem;
            text-transform: uppercase;
        }

        .text-muted {
            color: #666;
        }

        .blockquote {
            font-size: 1.25rem;
            font-style: italic;
            margin: 30px 0;
        }

        /* Layout */
        .content-section {
            padding: 60px 15px;
        }

        .intro-text,
        .team-text {
            max-width: 700px;
            margin: auto;
            text-align: left;
        }

        .image-row img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Team Section */
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-stats {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .social-links {
            text-align: right;
            padding: 20px 0;
            font-size: 0.9rem;
        }

        .social-links a {
            color: #333;
            margin-right: 10px;
            text-decoration: none;
        }

        .gallery-image img {
            width: 60%;
            height: auto;
            border-radius: 2px;

        }

        .align-items-center {
            padding-bottom: 100px;
        }

        .description p {
            text-align: justify;
        }

        .gallery {
            padding: 0;
        }

        .mission-section h2 {
            padding-left: 100px;
            padding-right: 100px;
        }

        .q1 {
            padding: 20px;
        }

        .q1 img {
            width: 80%;
            /* Adjust the size here */
            height: auto;
            /* Maintain aspect ratio */
        }

        .gal {
            width: 90%;
            /* Increase the width to make it bigger */
            height: auto;
            /* Maintain aspect ratio */
            border: 5px solid #8b61c2;
            /* Add a border with a color that matches the theme */
            border-radius: 10px;
            /* Round the corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            /* Add a shadow for depth */
            transition: transform 0.3s;
            /* Add transition for a hover effect */
        }

        .gal:hover {
            transform: scale(1.05);
            /* Slightly enlarge the image on hover */
        }

        .container-gal {
            /* width: 80%; */
            /* or any other width you prefer */
            margin-left: 50px;

            /* This will center the div */
        }

        body {
            /* background-image: url(images/bgbgbg.png); */
            /* background-image: url(images/loginbg.jpg); */
            background-image: url(images/bg4.png);
            /* background-repeat: no-repeat; */
            background-size: contain;
        }
    </style>
</head>

<body>

    <br>
    <br>
    <!-- Team Image Section -->
    <section class="content-section image-row">
        <div class="row ">
            <div class="col-md-12">
                <img src="images/abt2.jpg" alt="Team working at the office" class="img-fluid " id="abt">
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="content-section about-us animate__animated" id="about-section">
        <h1 class="section-title text-center">About Us.</h1>
        <div class="intro-text mt-4">
            <p style="text-align:center;">Driven by a deep compassion for animals and a commitment to their well-being, we embarked on this journey to advance veterinary science. Our purpose is simple: to transform care through research, so every animal lives healthier, happier lives. We strive to set new standards in veterinary medicine, combining innovation and compassion to ensure the best possible outcomes for all our patients. Our team is dedicated to continuous learning and staying at the forefront of veterinary advancements. By integrating cutting-edge technology with heartfelt care, we ensure that your pets receive the best medical attention available.</p>
        </div>
    </section>


    <!-- Quote Section -->
    <section class="content-section quote-section text-center animate__animated" id="quote-section">
        <blockquote class="blockquote">
            "There is always one more bug to fix." <br>
            <small>— Sumi, Developer</small>
        </blockquote>
        <div class="row">
            <div class="col-md-6 q1">
                <img src="gallery/front1.JPEG" alt="Studio work" class="img-fluid">
            </div>
            <div class="col-md-6 q1">
                <img src="gallery/q1.JPG" alt="Studio work" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="content-section team-section animate__animated" id="team-section">
        <h2 class="section-title text-center">The Team.</h2>
        <div class="team-text mt-4">
            <p>Each team member brings unique skills to the table, providing creative, innovative solutions tailored to meet our clients' needs. We emphasize collaboration and creativity, and we’re proud to be a part of this project we work on.</p>
        </div>
        <br>
        <div class="row text-center mt-4 animate__animated" id="team-section">
            <div class="col-md-3 team-member">
                <img src="team/Incess.jpg" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Princess Lorraine Navarro</strong><br>Designer</p>
            </div>
            <div class="col-md-3 team-member">
                <img src="team/Erichans.png" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Eric Hans Carillo</strong><br>Project Manager</p>
            </div>
            <div class="col-md-3 team-member">
                <img src="team/Vincent.jpg" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Vincent Santos</strong><br>System Developer</p>
            </div>
            <div class="col-md-3 team-member">
                <img src="team/Vince.jpg" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Vince Arvee Valdez</strong><br>Producer</p>
            </div>
        </div>
    </section>


    <div class="container mission mission-section animate__animated" id="mission-section" style="margin-top:50px; margin-bottom:50px;">
        <h2 style="letter-spacing:8px;font-size:45px;">OUR MISSION</h2>
        <p style="padding-left:200px; padding-right:200px;">To create innovative and sustainable solutions that enhance the quality of life for our clients and communities. We strive to lead by example, fostering a culture of collaboration, creativity, and integrity in every project we undertake.</p>
        <!-- <img src="images/formb3.jpg" alt="" style="height: auto; width:50%;"> -->
    </div>
    <br>
    <br>

    <!-- image section -->
    <div class="container">
        <h2 class="text-center mb-4" style="letter-spacing:8px;font-size:45px;">CERTIFICATIONS</h2>
        <br>
        <br>
        <div class="gallery" style="margin-left:90px;">
            <!-- 13 images with alternating layout and animations -->
            <div class="row mb-4 align-items-center" id="row1">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/1.jpg" alt="Image 1">
                </div>

                <div class="col-md-6 description animate__animated">
                    <h3>Fire Safety Compliance</h3>
                    <p>At Dr. Ron's Veterinary Clinic, we prioritize the safety and well-being of our clients, staff, and beloved animal patients. Our commitment to safety is validated by our Fire Safety Inspection Certificate issued by the Bureau of Fire Protection, Regional Office III. This certificate confirms our adherence to the fire safety standards mandated by the Fire Code of the Philippines, ensuring a secure environment for everyone.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row2">
                <div class="col-md-6 order-md-2 gallery-image animate__animated">
                    <img src="gallery/2.jpg" alt="Image 2">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Business Name Registration</h3>
                    <p>Dr. Ron's Veterinary Clinic is officially registered with the Department of Trade and Industry (DTI) in the Philippines, ensuring that we operate under legal and recognized business standards. This certification is a testament to our commitment to providing excellent veterinary care in Cabanatuan City.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row3">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/3.jpg" alt="Image 3">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Certificate of Registration</h3>
                    <p>We ensure full compliance with all necessary regulations, as evidenced by our Certificate of Registration issued by the Bureau of Internal Revenue (BIR) in the Philippines. This certificate confirms our legal and tax registration status, which underscores our commitment to operating under the highest standards of business integrity.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row4">
                <div class="col-md-6 order-md-2 gallery-image animate__animated">
                    <img src="gallery/4.jpg" alt="Image 4">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Certificate of Accreditation</h3>
                    <p>We adhere to environmental safety standards, demonstrated by our Certificate of Accreditation from the Department of Environment and Natural Resources, Environmental Management Bureau III. This certificate accredits Aladin M. Gabin as a Pollution Control Officer, ensuring that our clinic operates with environmental responsibility and compliance.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row5">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/10.jpg" alt="Image 5">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Business Permit</h3>
                    <p>Dr. Ron's Veterinary Clinic is proudly licensed to operate as a retailer, as per our business permit issued by the City Business Licensing and Investment Promotion Office of Cabanatuan. This permit ensures that we comply with all local regulations and standards, affirming our commitment to legal and quality operations.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row6">
                <div class="col-md-6 order-md-2 gallery-image animate__animated">
                    <img src="gallery/11.jpg" alt="Image 6">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Receipt Issuance Requirement</h3>
                    <p>We are committed to transparency and compliance with the regulations set by the Bureau of Internal Revenue (BIR) of the Philippines. Our Receipt Issuance Notice ensures that we provide receipts or invoices for each service rendered or sale of goods, in accordance with the law.</p>
                </div>
            </div>

            <!-- <div class="row mb-4 align-items-center" id="row7">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 7">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 7</h3>
                    <p>This is the description for the seventh image.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row8">
                <div class="col-md-6 order-md-2 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 8">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 8</h3>
                    <p>This is the description for the eighth image.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row9">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 9">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 9</h3>
                    <p>This is the description for the ninth image.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row10">
                <div class="col-md-6 order-md-2 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 10">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 10</h3>
                    <p>This is the description for the tenth image.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row11">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 11">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 11</h3>
                    <p>This is the description for the eleventh image.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row12">
                <div class="col-md-6 order-md-2 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 12">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 12</h3>
                    <p>This is the description for the twelfth image.</p>
                </div>
            </div>

            <div class="row mb-4 align-items-center" id="row13">
                <div class="col-md-6 gallery-image animate__animated">
                    <img src="gallery/.jpg" alt="Image 13">
                </div>
                <div class="col-md-6 description animate__animated">
                    <h3>Description for Image 13</h3>
                    <p>This is the description for the thirteenth image.</p>
                </div>
            </div> -->
        </div>
    </div>




    <div class="container container-gal">
        <h2 class="text-center mb-4" style="letter-spacing:8px;font-size:50px;">GALLERY</h2>
        <BR></BR>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery.jpeg" alt="Image 1" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery2.jpeg" alt="Image 2" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery3.jpeg" alt="Image 3" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery4.jpeg" alt="Image 4" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery5.jpeg" alt="Image 5" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery6.jpeg" alt="Image 6" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/gallery7.jpeg" alt="Image 7" class="img-fluid gal">
                </div>
            </div>
        </div>
    </div>


    <br><br><br><br><br><br><br><ruby>

    </ruby>

    <!-- product gallery -->
    <div class="container container-gal">
        <h1 class="text-center mb-4" style="letter-spacing:8px;font-size:45px;">PRODUCT'S GALLERY</h1>
        <br><br>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product1.jpeg" alt="Product 1" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product2.jpeg" alt="Product 2" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product3.jpeg" alt="Product 3" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product13.jpeg" alt="Product 4" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product5.jpeg" alt="Product 5" class="img-fluid gal">
                </div>
            </div>
            <div class=" col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product6.jpeg" alt="Product 6" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product7.jpeg" alt="Product 7" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product8.jpeg" alt="Product 8" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product9.jpeg" alt="Product 9" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product10.jpeg" alt="Product 10" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product11.jpeg" alt="Product 11" class="img-fluid gal">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="">
                    <img src="gallery/product12.jpeg" alt="Product 12" class="img-fluid gal">
                </div>
            </div>
        </div>
    </div>























    <!-- jQuery for on-scroll animation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            function animateOnScroll() {
                // Animate gallery images and descriptions
                $('.gallery-image, .description').each(function(index) {
                    let element = $(this);
                    if (element.offset().top < $(window).scrollTop() + $(window).height()) {
                        if (index % 2 === 0) {
                            element.addClass('animate__fadeInLeft');
                        } else {
                            element.addClass('animate__fadeInRight');
                        }
                    }
                });


                $('#about-section, #quote-section, #team-section, #mission-section').each(function() {
                    let section = $(this);
                    if (section.offset().top < $(window).scrollTop() + $(window).height()) {
                        section.addClass('animate__fadeIn');
                    }
                });
            }

            // Trigger the animation on scroll
            $(window).on('scroll', animateOnScroll);
            // Trigger the animation on page load in case items are already in view
            animateOnScroll();
        });
    </script>




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
                <p><i class="fas fa-phone"></i> (+63) 955-617-9958 / 968-595-8621</p>
                <p><i class="fas fa-map-marker-alt"></i> Mulawin St. Brgy. Bitas,<br> Cabanatuan city 3100</p>
            </div>
            <div class="footer-social">
                <h4>Follow Us</h4>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-viber"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 EzyvetNeust. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>