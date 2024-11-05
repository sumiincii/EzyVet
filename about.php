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

        .header {
            background-color: #8b61c2;
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .header h1 {
            font-size: 2.5rem;
            margin: 0;
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

    <div class="header">
        <h1>About Dr. Ron Veterinary Clinic</h1>
        <p>Your trusted partner in providing top-notch veterinary care for your beloved pets.</p>
    </div>

    <div class="container mission">
        <h2>Our Mission</h2>
        <p>At Dr. Ron Veterinary Clinic, we are dedicated to providing compassionate and comprehensive veterinary care. Our goal is to ensure the health and well-being of your pets through personalized care and expert medical services.</p>
    </div>

    <div class="container team">
        <h2>Meet Our Team</h2>
        <div class="row">
            <div class="col-md-4 team-member">
                <img src="images/team_member_1.jpg" alt="Dr. Ron" class="img-fluid">
                <h3>Dr. Ron</h3>
                <p>Veterinarian</p>
                <p>Dr. Ron has over 10 years of experience in veterinary medicine and is passionate about animal welfare.</p>
            </div>
            <div class="col-md-4 team-member">
                <img src="images/team_member_2.jpg" alt="Dr. Jane" class="img-fluid">
                <h3>Dr. Jane</h3>
                <p>Veterinarian</p>
                <p>Dr. Jane specializes in surgical procedures and is committed to providing the best care for your pets.</p>
            </div>
            <div class="col-md-4 team-member">
                <img src="images/team_member_3.jpg" alt="Dr. Smith" class="img-fluid">
                <h3>Dr. Smith</h3>
                <p>Veterinary Technician</p>
                <p>Dr. Smith is dedicated to assisting our veterinarians and ensuring a positive experience for pets and their owners.</p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Dr. Ron Veterinary Clinic. All rights reserved.</p>
        <p><i class="fas fa-envelope"></i> ezvet.neust@gmail.com | <i class="fas fa-phone"></i> (+63) 955-617-9963</p>
    </footer>

    <script src="_assets/bootstrap.min.js"></script>
    <script src="_assets/jquery.min.js"></script>
</body>

</html>