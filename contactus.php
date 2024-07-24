<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="contactus.css">
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
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <a href="testpage.php"><img class="logo img-fluid float-start" src="images/ezyvetnewlogo.png" alt="logo"></a>

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

    <div class=" container1 container-fluid p-0" style="overflow:visible;">
        <div class="row g-0">
            <div class="col-12 image-top">
                <img src="images/RC-Landscape.jpg" alt="dog image" class="img-fluid w-100 h-100" />
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>NEED HELP?</h2>
                <h3>Contact Us</h3>
                <p>Whether you're looking for a new veterinarian or are a current client with questions, we'd love to hear from you. You can contact us by calling, visiting us, or filling out our contact form.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message: <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4>DR. RON VETERINARY CLINIC</h4>
                <p>Mulawin St. Brgy.Bitas,<br>Cabanatuan City, Nueva Ecija</p>
                <p>Phone: (+63) 955-617-9958</p>
                <p>Email: dronclinic@gmail.com</p>
                <h5>Clinic Hours:</h5>
                <p>
                    Monday: 8:00 am - 6:00 pm<br>
                    Tuesday: 8:00 am - 6:00 pm<br>
                    Wednesday: 8:00 am - 6:00 pm<br>
                    Thursday: 8:00 am - 6:00 pm<br>
                    Friday: 8:00 am - 6:00 pm<br>
                    Saturday: 8:00 am - 6:00 pm<br>
                    Sunday: Closed
                </p>
                <h5>Payment Options:</h5>
                <p>
                    G-cash<br>
                    All major credit cards<br>
                    Cash
                </p>
            </div>
        </div>
    </div>



</body>

</html>