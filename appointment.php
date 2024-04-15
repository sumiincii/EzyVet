<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/appointment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Appointment</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
</head>
</head>

<body>
    <div class="container1 container-fluid text-center">
        <div class="row">
            <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b> , your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
        </div>
    </div>
    <img class="logo img-fluid float-start" src="images/ezyvet.png" alt="logo">
    <div class="container-fluid text-center">
        <div class="dropdown">
            <nav>
                <ul>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICES</a>
                        <ul>
                            <li class="hober"><a href="#">asd</a></li>
                            <li class="hober"><a href="#">asd</a></li>
                        </ul>
                    </li>
                    <li><a href="#">BOOK NOW</a>
                        <ul>
                            <li class="hober"><a href="#">asd</a></li>
                            <li class="hober"><a href="#">asd</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">CONTACT US</a></li>
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


    <div class=" container1 container-fluid p-0">
        <div class="row g-0 image-top">
            <div class="col-12 position-relative">
                <img src="images/pusa6.jpg" alt="Dogs running" class="img-fluid w-100 h-50" />
            </div>
        </div>
    </div>



    <div class="container my-5">
        <h2 class="text-center ">Make your Appointment Request Online</h2>
        <div class="row">
            <p>Planning a visit? Fill out our appointment request form below and hit 'submit.' Please schedule your appointment at least 24 hours in advance so we can confirm it with you. In case of an emergency, don't use this form—call us at (860) 757-3346 or visit our hospital.</p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form>
                    <p>Fields marked with an * are required</p>
                    <div class="mb-3">
                        <label class="form-label">Are You A New Client *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="newClient" id="newClientYes" value="yes" />
                            <label class="form-check-label" for="newClientYes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="newClient" id="newClientNo" value="no" />
                            <label class="form-check-label" for="newClientNo">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Preferred Veterinarian *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferredVet" id="vetMonica" value="monica" />
                            <label class="form-check-label" for="vetMonica">Dr. Monica</label>
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

                    <div class="mb-3">
                        <label for="appointmentDate" class="form-label">Preferred Day for Appointment *</label>
                        <input type="date" class="form-control" id="appointmentDate" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preferred Time for Appointment *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferredTime" id="timeAM" value="am" />
                            <label class="form-check-label" for="timeAM">AM</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferredTime" id="timePM" value="pm" />
                            <label class="form-check-label" for="timePM">PM</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <img src="https://placehold.co/300x300" alt="Pet" class="img-fluid rounded-circle" />
            </div>
        </div>




        <!-- <div class="col-lg-4 d-none d-lg-block">
        <img src="https://placehold.co/300x300" alt="Pet" class="img-fluid rounded-circle" />
    </div> -->
    </div>
    </div>








</body>

</html>