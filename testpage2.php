<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Ron Veterinary Clinic</title>
    <link rel="stylesheet" href="landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <header>
        <div class="container1 container-fluid text-center">
            <div class="row">
                <div class="col" id="wc">Welcome to <b>Dr. Ron Veterinary Clinic</b>, your trusted partner in providing top-notch veterinary care for your beloved pets.</div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="landing.php">
                    <img src="images/ezyvetnewlogo.png" alt="Dr. Ron Veterinary Clinic" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">SERVICES</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="checkup.php">Checkups</a></li>
                                <li><a class="dropdown-item" href="vaccinations.php">Vaccinations</a></li>
                                <li><a class="dropdown-item" href="grooming.php">Grooming</a></li>
                                <li><a class="dropdown-item" href="followup.php">Follow Up</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="appointment.php">BOOK NOW</a></li>
                        <li class="nav-item"><a class="nav-link" href="contactus.php">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main> <!-- Add the sections from testpage2.php here -->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="animate__animated animate__fadeInLeft">Welcome to Dr. Ron Veterinary Clinic</h1>
                        <p class="animate__animated animate__fadeInLeft">Your trusted partner in providing top-notch veterinary care for your beloved pets.</p>
                        <button class="btn btn-primary animate__animated animate__fadeInLeft">Book Now</button>
                    </div>
                    <div class="col-md-6">
                        <img src="images/vet.jpg" alt="Veterinary Care" class="animate__animated animate__fadeInRight">
                    </div>
                </div>
            </div>
        </section>

        <section class="services">
            <div class="container">
                <h2 class="text-center">Our Services</h2>
                <div class="row">
                    <div class="col-md-4">
                        <i class="fas fa-stethoscope"></i>
                        <h3>Checkups</h3>
                        <p>Regular checkups are essential to ensure your pet stays healthy.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-syringe"></i>
                        <h3>Vaccinations</h3>
                        <p>Protect your pet from diseases with our vaccination services.</p>
                    </div>
                    <div class="col-md-4">
                        <i class="fas fa-scissors"></i>
                        <h3>Grooming</h3>
                        <p>Keep your pet clean and well-groomed with our expert grooming services.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Add more sections from testpage2.php here -->

        <section class="map">
            <div class="container">
                <h2 class="text-center">Find Us</h2>
                <iframe src="https://www.google.com/maps/embed?..." width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </section>

        <section class="contact">
            <div class="container">
                <h2 class="text-center">Get in Touch</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Address:</h3>
                        <p>123 Pet Lane, Petville, USA</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Contact Info:</h3>
                        <p>Phone: 555-555-5555</p>
                        <p>Email: [info@drvronvet.com](mailto:info@drvronvet.com)</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container text-center">
            <p>&copy; 2023 Dr. Ron Veterinary Clinic. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>