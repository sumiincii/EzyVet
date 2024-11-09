<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Colors */
        :root {
            --primary-color: #6f47ff;
            /* Purple */
            --secondary-color: #f4f4fb;
            /* Light Purple Background */
            --text-color: #333;
            --heading-color: #111;
        }

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            color: var(--text-color);
        }

        h1,
        h2 {
            color: var(--heading-color);
        }

        .section-title {
            font-size: 1.2rem;
            color: var(--primary-color);
            font-weight: bold;
        }

        .cta-button {
            background-color: var(--primary-color);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .cta-button:hover {
            background-color: #5c39d1;
            color: #fff;
        }

        /* Header */
        .header-section {
            background-color: var(--secondary-color);
            padding: 50px 0;
            text-align: center;
        }

        /* Sections */
        .about-section,
        .values-section,
        .mission-section {
            padding: 50px 0;
        }

        /* Card Styles */
        .card {
            border: none;
            background-color: var(--secondary-color);
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin: 10px 0;
        }

        .card h5 {
            color: var(--primary-color);
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header class="header-section">
        <h1>About Us</h1>
        <p>Home / About Us</p>
    </header>

    <!-- About Business Coaching Section -->
    <section class="about-section container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <span class="section-title">About Business Coaching</span>
                <h2>Hear what people are saying about career Management.</h2>
                <p>
                    As a Business Coach, Mark not only understands the nuances necessary to navigate the hiring cycle but can help discover the right path to a rewarding career or assistance in "moving up" the ladder. His program is customized to meet the needs of each of his Career Coaching clients.
                </p>
                <a href="#" class="cta-button">View Our Service</a>
            </div>
            <div class="col-md-6">
                <img src="https://placehold.co/500x300" alt="Testimonial Image" class="img-fluid rounded">
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="values-section container text-center">
        <span class="section-title">Our Values</span>
        <h2>Hear what people are saying about career Management.</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <h5>Business Progress</h5>
                    <p>Your business is our business. We believe in making your dreams and goals a reality.</p>
                    <a href="#" class="cta-button">Read More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Business Administration</h5>
                    <p>Your business is our business. We believe in managing your dreams and goals a reality.</p>
                    <a href="#" class="cta-button">Read More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Secret Success Teamwork</h5>
                    <p>Your business is our business. We believe in making your dreams and goals a reality.</p>
                    <a href="#" class="cta-button">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="https://placehold.co/500x300" alt="Mission Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <span class="section-title">Our Mission</span>
                <h2>Hear what people are saying about career Management.</h2>
                <p>
                    As a Business Coach, Mark not only understands the nuances necessary to navigate the hiring cycle but can help discover the right path to a rewarding career. His program is customized to meet the needs of each of his Career Coaching clients.
                </p>
                <p><strong>How can we improve your Business with our Coaching?</strong></p>
                <ul>
                    <li>We want to understand you.</li>
                    <li>Positive Thoughts.</li>
                    <li>Business Administration (BSC).</li>
                </ul>
                <p>- Warren Stokes Sr., Founder, Vanibek</p>
                <a href="#" class="cta-button">Join Our Coaching</a>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="text-center py-4" style="background-color: var(--secondary-color);">
        <p>&copy; 2023 Your Company Name. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>