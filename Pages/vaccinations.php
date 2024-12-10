<?php
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="css/vaccinations.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
    </style>
</head>

<body>



    <div class=" container1 container-fluid p-0 d-flex">
        <div class="row g-0">
            <div class="col-12">
                <img src="images/dog.jpg" alt="dog image" class="img-fluid w-100 h-100" />
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


    <div class="container my-5 ">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 animate__animated hidden" id="vac1-section">
                <h2>How Pet Vaccinations</h2>
                <h3>Benefit Your Furry Family</h3>
                <p>Pet vaccinations are critical for the health and well-being of your furry family members. Vaccinations are critical in preventing illness and reducing the spread of contagious diseases among pets because they protect against a variety of potentially life-threatening diseases such as distemper, parvovirus, rabies, and respiratory infections. This not only protects your pets' individual health, but also improves the overall health of your household. Pet owners can rest assured that their companions are protected against preventable diseases for the rest of their lives by means of vaccinations that provide long-term immunity. Furthermore, vaccination is a cost-effective preventive measure as it avoids the high costs associated with treating illnesses after they occur. Vaccinating your pets also promotes community health by reducing the spread of infectious diseases. In conclusion, pet vaccinations are essential for the health, happiness, and endurance of your beloved furry family members.</p>

                <a href="appointment.php" class="btn">REQUEST AN APPOINTMENT</a>

            </div>
            <div class="col-lg-6 text-center">
                <img src="images/vac2.jpg" alt="Vet vaccinating a dog" class="img-fluid rounded animate__animated hidden" id="vac2-section">
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

    <div class="container text-center my-5">
        <h2>Vaccines We Offer</h2>
        <p>When it comes to vaccinating your pet, we follow the highest industry standards, which include using the safest vaccines available, including 3-year vaccines where applicable. Furthermore, we modify vaccines to your pet's lifestyle so that they only receive what they require. Core vaccines, on the other hand, are strongly advised for all pets, regardless of whether they are indoor or outdoor animals.</p>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 mb-4 ">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="images/d.jpg" alt="Dog icon" class="mb-3 rounded" style="width: 15%; height: auto;">
                        </div>
                        <h3 class="card-title text-center">Dogs</h3>
                        <ul>
                            <li><strong>Rabies</strong> - Protects dogs from rabies, a lethal viral disease that can be transmitted to humans.</li>
                            <li><strong>DHPP</strong> (canine distemper, hepatitis, parvovirus, and parainfluenza) - highly recommended for all dogs, with boosters every three years.</li>
                            <li><strong>Lyme disease vaccine</strong> - deer ticks are common in our area and spread this disease, annual booster shots are highly recommended for all dogs.</li>
                            <li><strong>Leptospirosis</strong> - yearly boosters are highly recommended for all dogs, as leptospirosis-causing bacteria are widespread in our area.</li>
                            <li><strong>Bordetella</strong> (kennel cough) vaccinations - are either yearly or every six months and are frequently necessary for professional grooming, boarding, and training sessions.</li>
                            <li><strong>Canine influenza</strong> - the same as Bordetella requires annual booster shots.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="images/c.jpg" alt="Cat icon" class="mb-3 rounded" style="width: 15%; height: auto;">
                        </div>
                        <h3 class="card-title text-center">Cats</h3>
                        <ul>
                            <li><strong>Rabies</strong> - Protects cats from rabies, a virus that can be spread by bites or scratches from infected animals and is deadly to both humans and cats.</li>
                            <li><strong>Feline viral rhinotracheitis, calicivirus, and panleukopenia, or FVRCP</strong> - is strongly advised for all cats, with booster shots every three years.</li>
                            <li><strong>Feline leukemia</strong> - yearly boosters are recommended for cats living outdoors.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="container text-center my-5">
        <h3>Is Your Pet Due For Boosters?</h3>
        <a href="appointment.php" class="btn">REQUEST AN APPOINTMENT</a>

    </div>


    <!-- image na malaki-->
    <div class=" container1 container-fluid p-0 anmimate_animated hidden" id="vac3-section" style="overflow:visible;">
        <div class="row g-0">
            <div class="col-12 image-top">
                <img src="images/vaccination.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>
    <div class="container py-5">
        <h2 class="text-center mb-4">A Vaccination Schedule for Puppies and Kittens</h2>
        <p class="text-center mb-5">
            The vaccinations are given to your pet at various points during the first year of their life. Although there’s no cure for many of these common diseases, vaccination can prevent your puppy from contracting them. Booster shots for recommended vaccines are designed to strengthen their immunity after the initial vaccine series.
        </p>
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-4">Puppies</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Rabies
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Distemper
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Parvovirus
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Adenovirus
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Leptospirosis
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Bordetella
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Canine Influenza
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4 class="mb-4">Kittens</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Rabies
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Feline Leukemia
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Feline Distemper
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="text-center mt-3">
            <p>Contact Us Today to Help You Plan Your Pet’s Vaccine Series</p>
            <a href="appointment.php" class="btn">REQUEST AN APPOINTMENT</a>

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


    <script>
        // Function to check if an element is in the viewport
        const isElementInViewport = (el) => {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        };

        const handleScroll = () => {
            const sections = document.querySelectorAll('.animate__animated.hidden');
            sections.forEach(section => {
                if (isElementInViewport(section)) {

                    if (section.id === 'vac1-section') {
                        section.classList.add('animate__slideInLeft');
                    } else if (section.id === 'vac2-section') {
                        section.classList.add('animate__slideInRight');
                    } else if (section.id === 'vac3-section') {
                        section.classList.add('animate__slideInRight'); // Add fadeInUp for vac3-section
                    }

                    section.classList.remove('hidden');
                    // Check which section it is and apply the appropriate animation
                }
            });
        };

        // Add scroll event listener
        window.addEventListener('scroll', handleScroll);
        // Initial check in case the element is already in view
        handleScroll();
    </script>

</body>

</html>