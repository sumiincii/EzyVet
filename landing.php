<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="landing.css">
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
    #wc {
      /* background-color: #c1cad3; */
      background-color: #8b61c2;
      padding: 7px;
      /* color: #3e444b; */
      color: white;
      margin: 0 -3px;
    }

    .hober a:hover {
      /* background: rgb(150, 150, 150); */
      background: #8b61c2;
      color: white;

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

    .container4 button {
      font-family: "Montserrat" !important;
      text-align: center;
      font-size: 12px;
      letter-spacing: 3px;
      /* margin-left: 140px; */
      /* margin-top: 50px; */
      background-color: #5ce1e6;
      color: #fff;
      padding: 10px, 25px;
      border-radius: 20px;
    }

    button:hover {
      background-color: #5ce1e6;
      /* Set the hover color to #5ce1e6 */
      color: #fff;
      /* Keep the text color white on hover */
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
  </style>
</head>

<body>
  <div class="container1 container-fluid text-center">
    <div class="row">
      <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
    </div>
  </div>
  <a href="landing.php"><img class="logo img-fluid float-start" src="images/mainlogo.png" alt="logo"></a>

  <div class="container-fluid text-center">
    <div class="dropdown">
      <nav>
        <ul>
          <li><a href="#">ABOUT</a></li>
          <li><a href="#">SERVICES</a>
            <ul>
              <li class="hober"><a href="checkup.php">Checkups</a></li>
              <li class="hober"><a href="vaccinations.php">Vaccinations</a></li>
              <li class="hober"><a href="grooming.php">Grooming</a></li>
            </ul>
          </li>
          <li><a href="appointment.php">BOOK NOW</a>
            <!-- <ul>
              <li class="hober1"><a href="appointment.php">REQUESTANAPPOINTMENT </a></li>
              <li class="hober"><a href="#">asd</a>
              </li>
            </ul> -->
          </li>
          <li><a href="contactus.php">CONTACT US</a></li>
        </ul>
      </nav>
    </div>
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
  <br>
  <br>
  <div class="containeruna">
    <div class="row">
      <div class="col-6 sentence">
        <p id="vetcare">YOUR PET'S SANCTUARY <br>FOR COMPASSIONATE<br>
        <p style="font-family:Allura !important;font-size: 80px;line-height:49px; font-weight:350;"><b>Veterinary Care</b></p>
        </p>
        <button type="button" class="">REQUEST AN APPOINTMENT</button>
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

  <div class="animate__animated animate__fadeInLeft">
    <div class="container3 text-center">
      <div class="row row-number2">
        <div class="col align-self-center wala">
          <!-- wala -->
        </div>
        <div class="col-8 align-self-center gitna">
          <img src="images/Paws.png" class="rounded mx-auto d-block paws-logo" alt="PawsLogo">
          <p id="p1">DR. RON VETERINARY CLINIC</p>
          <p id="p2">Discover Expert Care And Compassionate Service</p>
          <hr style="margin-top:5px; margin-bottom:5px;">
          <p id="p3">Being a pet owner, you are aware of the importance of regular veterinary checkups for your animal's health. But sometimes you might wonder whether the stress of visiting the veterinarian is really worth your pet's fear and anxiety. You don't have to choose between your pet's mental health and veterinary care at Dr. Ron Veterinary Clinic because we are committed to providing high-quality, holistic veterinarian care with an intense focus on a fear-free approach.</p>
        </div>
        <div class="col align-self-center wala">
          <!-- wala pa -->
        </div>
      </div>
    </div>
  </div>

  <div class="container4 container-fluid text-center">
    <div class="border">
      <img src="images/Paws.png" class="rounded mx-auto d-block paws-logo" alt="PawsLogo">
      <p>Visit Us.</p>
      <button type="button" class="">REQUEST AN APPOINTMENT</button>
    </div>
  </div>

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



  <script src="_assets/bootstrap.min.js"></script>
  <script src="_assets/jquery.min.js"></script>
</body>





</body>


</html>