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
  <style>
    #wc {
      /* background-color: #c1cad3; */
      background-color: #8b61c2;
      padding: 7px;
      /* color: #3e444b; */
      color: white;
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
              <li class="hober"><a href="followup.php">Follow Up</a></li>
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
        <button type="button" class="btn btn-success button1">REQUEST AN APPOINTMENT</button>
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
          <p id="p1">DR. RON VETERINARY ANIMAL CLUB</p>
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
      <button type="button" class="btn btn-success button2">REQUEST AN APPOINTMENT</button>
    </div>
  </div>

  <script src="_assets/bootstrap.min.js"></script>
  <script src="_assets/jquery.min.js"></script>
</body>

<div class="container my-5">
  <div class="row align-items-center">
    <div class="col-lg-6 text-center text-lg-left mb-4 mb-lg-0">

      <iframe src="https://www.google.com/maps/embed?pb=!3m2!1sen!2sph!4v1713428538080!5m2!1sen!2sph!6m8!1m7!1s1UPyzrm-fB9QmunjaXDomg!2m2!1d15.49962680830744!2d120.9768442687773!3f244.72785217855838!4f1.4193708654089647!5f0.7820865974627469" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <div class="col-lg-6 text-center text-lg-left">
      <h3>EZVET</h3>
      <p>Dr. Ron Veterinary Clinic</p>
      <p>Mulao St. Brgy. Batas,<br> Cabantuan City, Nueva Ecija</p>
      <p>Phone: (+63) 955-617-9963</p>
      <p>Email: dronclinic@gmail.com</p>
      <p>Opening Hours: 8:00 AM - 6:00 PM</p>
    </div>
  </div>
</div>




</body>


</html>