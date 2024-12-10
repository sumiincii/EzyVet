<?php
include 'connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Fetch the current settings
$sql = "SELECT navbar_color, header_color, logo_url FROM settings WHERE id=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$navbar_color = $row['navbar_color'];
$header_color = $row['header_color'];
$logo_url = $row['logo_url'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="header.css"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <style>
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

        body {
            background-color: #ffffff;
            font-family: "Montserrat", sans-serif, "Allura", "Playfair Display" !important;
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

        #wc {
            /* background-color: #c1cad3; */
            /* background-color: #8b61c2; */
            background-color: <?php echo htmlspecialchars($header_color); ?>;
            padding: 7px;
            padding: 7px;
            color: white;
        }

        nav a:hover::before {
            width: 100%;
        }

        nav {
            margin-top: 10px;
            background: #fff;
        }

        .logo {
            margin-left: 125px;
            width: 200px;
            height: auto;
        }

        nav ul {
            padding: 0;
            margin: 0;
            float: right;
            margin-right: 102px;
        }

        nav ul li {
            background: #fff;
            position: relative;
            list-style: none;
            display: inline-block;
        }

        nav ul li a {
            display: block;
            padding: 0 25px;
            color: #3e444b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            line-height: 60px;
            letter-spacing: 2px;
        }

        .hober a:hover {
            /* background: rgb(150, 150, 150); */
            background: #8b61c2;
            color: white;

        }

        nav ul ul {
            position: absolute;
            top: 65px;
            display: none;
        }

        nav ul li:hover>ul {
            display: block;
            box-shadow: 0 7px 14px rgba(0, 0, 0, 1);
            border: 1px solid #3e444b;
        }

        nav ul ul li {
            width: 159px;
            float: none;
            display: list-item;
            position: relative;
        }

        a img {
            margin-top: -25px;
            /* margin-left: -50px; */
        }

        .hamburger {
            display: none;
            /* Hide by default */
            flex-direction: column;
            cursor: pointer;
            margin-right: 20px;
            /* Space from the right */
        }

        .hamburger .line {
            height: 3px;
            width: 25px;
            background-color: #3e444b;
            /* Color of the lines */
            margin: 3px 0;
            /* Space between lines */
        }

        @media (max-width: 768px) {
            #nav-links {
                display: none;
                /* Hide navigation links by default */
                flex-direction: column;
                /* Stack links vertically */
                position: absolute;
                /* Positioning */
                top: 60px;
                /* Position below the navbar */
                left: 0;
                background-color: white;
                /* Background color */
                width: 100%;
                /* Full width */
                z-index: 1000;
                /* Ensure it appears above other content */
            }

            #nav-links.active {
                display: flex;
                /* Show when active */
            }

            .hamburger {
                display: flex;
                /* Show hamburger icon on mobile */
            }
        }
    </style>
</head>

<body>
    <script>
        function toggleMenu() {
            const navLinks = document.getElementById("nav-links");
            navLinks.classList.toggle("active"); // Toggle the 'active' class
        }
    </script>
    <div class="container1 container-fluid text-center" id="container1">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <!-- <a href="landing.php"><img class="logo img-fluid float-start" src="images/mainlogo.png" alt="logo"></a> -->
    <a href="landing.php"><img class="logo img-fluid float-start" src="<?php echo htmlspecialchars($logo_url); ?>" alt="logo"></a>

    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav id="main-nav">
                <div class="hamburger" onclick="toggleMenu()">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <ul id="nav-links">
                    <li><a href="#">ABOUT</a></li>
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
    <br><br><br>
    <script>
        // Get the navbar and container1 elements
        let navbar = document.getElementById("main-nav");
        let container1 = document.getElementById("container1");

        // Get the offset positions of the navbar and container1
        let stickyNavbar = navbar.offsetTop;
        let stickyContainer1 = container1.offsetTop;

        // Add the scroll event listener
        window.addEventListener("scroll", function() {
            // Check if the viewport width is greater than or equal to 768px
            if (window.innerWidth >= 768) {
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
            } else {
                // Remove sticky class from both elements on mobile
                container1.classList.remove("sticky");
                navbar.classList.remove("sticky");
            }
        });
    </script>

</body>

</html>