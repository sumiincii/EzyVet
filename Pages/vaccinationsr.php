<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/vaccinations.css">
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