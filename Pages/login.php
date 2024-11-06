<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: admin.php"); // Redirect to dashboard or home page
            exit();
        } else {
            $error = "Invalid email or password";
        }
    } else {
        $error = "Invalid email or password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="contactus.css"> -->
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
        body {
            background-image: url(images/loginbg.jpg);
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
            /* Cover the entire area */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* No repeat */
            height: 100vh;
            /* Full viewport height */
            width: 100vw;
            /* Full viewport width */
            margin: 0;
            /* Remove default margin */
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .login-container img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .login-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-container .form-control {
            margin-bottom: 10px;
        }

        .login-container .btn {
            width: 100%;
        }

        .login-container .forgot-password {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .login-container .not-admin {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg" style="max-width: 800px;">
            <div class="row g-0">
                <!-- Image Section -->
                <div class="col-md-6 d-none d-md-block">
                    <img src="https://placehold.co/400x400" alt="Dog Image" class="img-fluid" style="height: 100%; object-fit: cover;">
                </div>
                <!-- Form Section -->
                <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                    <h1 class="text-primary fw-bold text-center">Ezyvet</h1>
                    <form method="post" action="login.php">
                        <div class="mb-3">
                            <label for="email" class="form-label visually-hidden">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Log In</button>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <!-- Uncomment for forgot password link -->
                            <!-- <a href="forgot-password.php" class="text-muted">Forgot Password?</a> -->
                            <a href="landing.php" class="text-muted">Not an admin?</a>
                        </div>
                        <?php if (isset($error)) { ?>
                            <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>