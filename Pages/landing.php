<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/landing.css">
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

    .btn {
      font-family: "Montserrat" !important;
      text-align: center;
      font-size: 12px;
      letter-spacing: 3px;
      margin-top: 20px;
      background-color: #8b61c2;
      color: #fff;
      padding: 10px;
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
      margin: 0;
      font-family: "Montserrat", sans-serif, "Allura", "Playfair Display" !important;
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

  <div class="containeruna">
    <div class="row">
      <div class="col-6 sentence">
        <p id="vetcare">YOUR PET'S SANCTUARY <br>FOR COMPASSIONATE<br>
        <p style="font-family:Allura !important;font-size: 80px;line-height:49px; font-weight:350;"><b>Veterinary Care</b></p>
        </p>

        <a href="appointment.php" class="btn" style="margin-left: 80px;">REQUEST AN APPOINTMENT</a>
      </div>
      <div class="col-6 align-self-right">
        <img src="images/asologo.png" alt="asologo" class="asologo float-start img-fluid">
      </div>
    </div>

  </div>
  <!-- eto last ng header -->
  <br>
  <br>
  <br>
  <br>
  <br>

  <!-- <div class="animate__animated animate__fadeInLeft">
    <div class="container3 text-center">
      <div class="row row-number2">
        <div class="col align-self-center wala">
         
        </div>
        <div class="col-8 align-self-center gitna">
          <img src="images/Paws.png" class="rounded mx-auto d-block paws-logo" alt="PawsLogo">
          <p id="p1">DR. RON VETERINARY CLINIC</p>
          <p id="p2">Disco   .    ver Expert Care And Compassionate Service</p>
          <hr style="margin-top:5px; margin-bottom:5px;">
          <p id="p3">Being a pet owner, you are aware of the importance of regular veterinary checkups for your animal's health. But sometimes you might wonder whether the stress of visiting the veterinarian is really worth your pet's fear and anxiety. You don't have to choose between your pet's mental health and veterinary care at Dr. Ron Veterinary Clinic because we are committed to providing high-quality, holistic veterinarian care with an intense focus on a fear-free approach.</p>
        </div>
        <div class="col align-self-center wala">
      
        </div>
      </div>
    </div>
  </div>-->

  <!-- <div class="container4 container-fluid text-center">
    <div class="">
      <img src="images/Paws.png" class="rounded mx-auto d-block paws-logo" alt="PawsLogo">
      <p>Visit Us.</p>
      <a href="appointment.php" class="btn">REQUEST AN APPOINTMENT</a>
    </div>
  </div> -->

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
        <a href="#" class="social-icon"><i class="fab fa-viber"></i></a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 EzyvetNeust. All rights reserved.</p>
    </div>
  </footer>



  <script src="_assets/bootstrap.min.js"></script>
  <script src="_assets/jquery.min.js"></script>
</body>

</html>