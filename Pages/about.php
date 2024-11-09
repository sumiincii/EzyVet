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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        a img {
            margin-top: -25px;
            /* margin-left: -50px; */
        }

        body {
            font-family: 'Montserrat', sans-serif;
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

        .footer {
            background-color: #8b61c2;
            color: white;
            padding: 20px 0;
            text-align: center;
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

        #abt {}
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

    <!-- Team Image Section -->
    <section class="content-section image-row ">
        <div class="row ">
            <div class="col-md-12">
                <img src="images/abt2.jpg" alt="Team working at the office" class="img-fluid " id="abt">
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="content-section">
        <h1 class="section-title text-center">About Us.</h1>
        <div class="intro-text mt-4">
            <p>binebeysikbeysik nauycgruwearcasercesrcwaerxae</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti explicabo obcaecati eveniet in, sit dolore, sequi, debitis at aliquid veniam eos doloribus cumque tenetur dolorum ipsum facere. Nostrum eius eum modi sint veniam fuga? Mollitia quae soluta et sunt doloribus aspernatur dicta optio, esse dolores ducimus dolor, ipsa voluptates dolorem.</p>
        </div>
    </section>



    <!-- Quote Section -->
    <section class="content-section text-center">
        <blockquote class="blockquote">
            "Our work does make sense only if it is a faithful witness of its time." <br>
            <small>— Jean-Philippe Nuel, Director</small>
        </blockquote>
        <div class="row">
            <div class="col-md-6">
                <img src="https://placehold.co/500x300" alt="Studio work" class="img-fluid">
            </div>
            <div class="col-md-6">
                <img src="https://placehold.co/500x300" alt="Studio work" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="content-section">
        <h2 class="section-title text-center">The Team.</h2>
        <div class="team-text mt-4">
            <p>Each team member brings unique skills to the table, providing creative, innovative solutions tailored to meet our clients' needs. We emphasize collaboration and creativity, and we’re proud to be a part of every project we work on.</p>
        </div>
        <br>
        <div class="row text-center mt-4">
            <div class="col-md-3 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Princess Lorraine Navarro</strong><br>Designer</p>
            </div>
            <div class="col-md-3 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Eric Hans Carillo</strong><br>Project Manager</p>
            </div>
            <div class="col-md-3 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Vincent Santos</strong><br>System Developer</p>
            </div>
            <div class="col-md-3 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Vince Arvee Valdez</strong><br>System Developer</p>
            </div>
        </div>

        <div class="team-stats text-center mt-5">
            <div class="row">
                <div class="col-md-3">600<br><small>million sq ft of sustainable work</small></div>
                <div class="col-md-3">700<br><small>billion gallons of water saved annually</small></div>
                <div class="col-md-3">1.2<br><small>million sq ft of LEED certified projects</small></div>
                <div class="col-md-3">110<br><small>USGBC certified projects</small></div>
            </div>
        </div>
    </section>





    <div class="container mission">
        <h2>Our Mission</h2>
        <p>At Dr. Ron Veterinary Clinic, we are dedicated to providing compassionate and comprehensive veterinary care. Our goal is to ensure the health and well-being of your pets through personalized care and expert medical services.</p>
    </div>












    <footer class="footer">
        <p>&copy; 2024 Dr. Ron Veterinary Clinic. All rights reserved.</p>
        <p><i class="fas fa-envelope"></i> ezyvet.neust@gmail.com | <i class="fas fa-phone"></i> (+63) 955-617-9963</p>
    </footer>

    <script src="_assets/bootstrap.min.js"></script>
    <script src="_assets/jquery.min.js"></script>
</body>

</html>