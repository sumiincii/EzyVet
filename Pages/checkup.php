<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/checkups.css">
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
        .hidden {
            opacity: 0;
            /* Makes the element invisible */
            transition: opacity 0.5s ease;
            /* Smooth transition for opacity */
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



    <div class=" container1 container-fluid p-0 d-flex ">
        <div class="row g-0">
            <div class="col-12">
                <img src="images/checkup.png" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- <br>
    <br> -->


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


    <div class="container my-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 text-center text-lg-left">
                <p><i class="fas fa-phone"></i> (+63) 955-617-9558</p>
            </div>
            <div class="col-lg-5 text-center text-lg-right">
                <button class="btn btn-outline-secondary">Request an Appointment</button>
            </div>
        </div>
    </div>


    <div class="container my-5 animate__animated hidden" id="checkup-section">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 style="letter-spacing:5px; font-size:30px;">How Pet Checkup</h2>
                <h3 style="letter-spacing:5px; font-size:35px;">Ensure Thorough Care For Your Pet?</h3>
                <br>
                <p style="line-height:21px; font-size:15px;">For the sake of our furry friends’ well-being, routine pet exams are essential. Veterinarians can perform a comprehensive health assessment during these visits, looking for early indicators of disease or underlying problems. Early detection allows for quick treatment, which frequently averts later, more serious health issues. Additionally, pet owners can get advice on behavior, diet, and preventive care during checkups. We make sure that our pets receive the care and attention they require to live long, healthy lives by making routine checkups a priority. We advise having a yearly examination for all pets, as they age considerably more quickly than we do. Visiting a veterinarian for your pet once a year is equivalent to seeing a doctor for a checkup just once every six to eight years. As they age, more frequent checkups might be required.</p>
                <button class="btn btn-outline-secondary">Request an Appointment</button>
            </div>
            <div class="col-lg-6 text-center">
                <img src="images/checkup2.jpg" alt="Vet holding a cat" class="img-fluid">
            </div>
        </div>
    </div>

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

        // Function to handle scroll event
        const handleScroll = () => {
            const checkupSection = document.getElementById('checkup-section');
            if (isElementInViewport(checkupSection)) {
                checkupSection.classList.add('animate__animated', 'animate__slideInLeft'); // Add your desired animation class
                checkupSection.classList.remove('hidden'); // Remove the hidden class
            }
        };

        // Add scroll event listener
        window.addEventListener('scroll', handleScroll);
        // Initial check in case the element is already in view
        handleScroll();
    </script>

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