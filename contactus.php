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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.
    min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <div class="contact-card">
                    <h4>Send Us a Message</h4>
                    <form method="POST" action="submit_feedback.php">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" id="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-card">
                    <h4>DR. RON VETERINARY CLINIC</h4>
                    <p>Mulawin St. Brgy.Bitas,<br>Cabanatuan City, Nueva Ecija</p>
                    <p>Phone: (+63) 955-617-9958</p>
                    <p>Email: Ezyvet.neust@gmail.com</p>
                    <h5>Clinic Hours:</h5>
                    <p>
                        Monday - Saturday: 8:00 am - 5:00 pm<br>
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


    <?php
    include 'connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>Swal.fire('Success!', 'Feedback submitted successfully!', 'success');</script>";
        } else {
            echo "<script>Swal.fire('Error!', 'Error: " . $conn->error . "', 'error');</script>";
        }

        $conn->close();
    }
    ?>

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