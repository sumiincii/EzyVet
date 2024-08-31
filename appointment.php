<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="appointment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="container1 container-fluid text-center">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b>, your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <a href="testpage.php"><img class="logo img-fluid float-start" src="images/ezyvetnewlogo.png" alt="logo"></a>

    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav>
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="">SERVICES</a>
                        <ul>
                            <li class="hober"><a href="checkup.php">Checkups</a></li>
                            <li class="hober"><a href="vaccinations.php">Vaccinations</a></li>
                            <li class="hober"><a href="grooming.php">Grooming</a></li>
                            <li class="hober"><a href="followup.php">Follow Up</a></li>
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

    <div class="container1 container-fluid p-0" style="overflow:visible;">
        <div class="row g-0">
            <div class="col-12 image-top">
                <img src="images/booknow1.jpg" alt="dog image" class="img-fluid w-100 h-100" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center">Make your Appointment Request Online</h2>
        <div class="row">
            <p>Planning a visit? Fill out our appointment request form below and hit 'submit.' Please schedule your appointment at least 24 hours in advance so we can confirm it with you. In case of an emergency, don't use this form—call us at (860) 757-3346 or visit our clinic.</p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="" method="post">
                    <p>Fields marked with an * are required</p>
                    <div class="mb-3">
                        <label class="form-label">Are You A New Client *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="newClient" id="newClientYes" value="yes" required />
                            <label class="form-check-label" for="newClientYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="newClient" id="newClientNo" value="no" required />
                            <label class="form-check-label" for="newClientNo">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Preferred Veterinarian *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferredVet" id="sumi" value="sumi" required />
                            <label class="form-check-label" for="sumi">Dr. Sumi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferredVet" id="mano" value="mano" required />
                            <label class="form-check-label" for="mano">Dr. Mano</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferredVet" id="vince" value="vince" required />
                            <label class="form-check-label" for="vince">Dr. Vince</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="firstName" class="form-label">First Name *</label>
                            <input type="text" class="form-control" id="firstName" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="lastName" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" id="lastName" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" required />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Preferred Day for Appointment *</label>
                        <input type="date" class="form-control" id="appointmentDate" required />
                    </div>
                    <div class="mb-3">
                        <label for="appointmentTime" class="form-label">Preferred Time for Appointment *</label>
                        <input type="time" class="form-control" id="appointmentTime" min="08:00" max="17:00" required />
                    </div>
                    <button type="submit" class="btn btn-success button1">SUBMIT</button>
                </form>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <img src="https://placehold.co/300x300" alt="Pet" class="img-fluid rounded-circle" />
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



    <!-- this is the footer  -->
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