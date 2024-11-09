<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic Styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            font-weight: bold;
            color: #111;
        }

        .section-title {
            font-size: 2.5rem;
            text-transform: uppercase;
        }

        .text-muted {
            color: #666;
        }

        .blockquote {
            font-size: 1.25rem;
            font-style: italic;
            margin: 30px 0;
        }

        /* Layout */
        .content-section {
            padding: 60px 15px;
        }

        .intro-text,
        .team-text {
            max-width: 700px;
            margin: auto;
            text-align: left;
        }

        .image-row img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Team Section */
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-stats {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .social-links {
            text-align: right;
            padding: 20px 0;
            font-size: 0.9rem;
        }

        .social-links a {
            color: #333;
            margin-right: 10px;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- About Us Section -->
    <section class="content-section">
        <h1 class="section-title text-center">About Us.</h1>
        <div class="intro-text mt-4">
            <p>Studio Marani, a communication agency based in Milan, was established in 2011 by Maurizio Marani after his long-term experience with McCann Erickson. His vision brings new opportunities for clients, with projects for L'Espresso Group, Radio Deejay, and more.</p>
            <p>Following his collaboration with copywriter Anna Scardovelli, Studio Marani expanded with key clients such as Barilla, Volkswagen, and Philips. Today, the team is complete with project manager Valentina De Franco.</p>
        </div>
    </section>

    <!-- Team Image Section -->
    <section class="content-section image-row">
        <div class="row">
            <div class="col-md-12">
                <img src="https://placehold.co/1200x400" alt="Team working at the office">
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="content-section text-center">
        <blockquote class="blockquote">
            "Our work does make sense only if it is a faithful witness of its time." <br>
            <small>— Jean-Philippe Nuel, Director</small>
        </blockquote>
        <div class="row">
            <div class="col-md-6">
                <img src="https://placehold.co/500x300" alt="Studio work" class="img-fluid">
            </div>
            <div class="col-md-6">
                <img src="https://placehold.co/500x300" alt="Studio work" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="content-section">
        <h2 class="section-title text-center">The Team.</h2>
        <div class="team-text mt-4">
            <p>Each team member brings unique skills to the table, providing creative, innovative solutions tailored to meet our clients' needs. We emphasize collaboration and creativity, and we’re proud to be a part of every project we work on.</p>
        </div>

        <div class="row text-center mt-4">
            <div class="col-md-4 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>John Doe</strong><br>Designer</p>
            </div>
            <div class="col-md-4 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Jane Smith</strong><br>Project Manager</p>
            </div>
            <div class="col-md-4 team-member">
                <img src="https://placehold.co/200x200" alt="Team member photo" class="rounded-circle mb-2">
                <p><strong>Michael Brown</strong><br>Developer</p>
            </div>
        </div>

        <div class="team-stats text-center mt-5">
            <div class="row">
                <div class="col-md-3">600<br><small>million sq ft of sustainable work</small></div>
                <div class="col-md-3">700<br><small>billion gallons of water saved annually</small></div>
                <div class="col-md-3">1.2<br><small>million sq ft of LEED certified projects</small></div>
                <div class="col-md-3">110<br><small>USGBC certified projects</small></div>
            </div>
        </div>
    </section>

    <!-- Footer Social Links -->
    <footer class="social-links text-center">
        <a href="#">Instagram</a> |
        <a href="#">Facebook</a> |
        <a href="#">Twitter</a>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>