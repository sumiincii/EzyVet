<?php

// Set secure session parameters before starting the session
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '', // Set your domain
    'secure' => true, // Only send cookie over HTTPS
    'httponly' => true, // Prevent JavaScript access to session cookie
    'samesite' => 'Strict' // Prevent CSRF
]);
// Start the session
session_start();

include 'connection.php';

// Generate CSRF token if not already set
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    // Validate email format
    if (!preg_match('/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,7}$/', $email)) {
        $error = "Invalid email format.";
    }

    // Validate password strength
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $error = "Password must be at least 8 characters long and include at least one letter, one number, and one special character.";
    }

    // Proceed with database query if validations pass
    if (!isset($error)) {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_regenerate_id(true); // Regenerate session ID for security
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
            background-color: #fbe4e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        body {
            background-image: url(images/loginbg.jpg);
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
            margin: 0;
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
            color: #007bff;
            text-decoration: none;
        }

        .login-container .forgot-password:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        /* From Uiverse.io by mahbowal */
        .container {
            max-width: 350px;
            background: #f8f9fd;
            background: linear-gradient(0deg,
                    rgb(255, 255, 255) 0%,
                    rgb(244, 247, 251) 100%);
            border-radius: 40px;
            padding: 25px 35px;
            border: 5px solid rgb(255, 255, 255);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 30px 30px -20px;
            margin: 20px;
        }

        .heading {
            text-align: center;
            font-weight: 900;
            font-size: 30px;
            color: rgb(16, 137, 211);
        }

        .form {
            margin-top: 20px;
        }

        .form .input {
            width: 100%;
            background: white;
            border: none;
            padding: 15px 20px;
            border-radius: 20px;
            margin-top: 15px;
            box-shadow: #cff0ff 0px 10px 10px -5px;
            border-inline: 2px solid transparent;
        }

        .form .input::-moz-placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input::placeholder {
            color: rgb(170, 170, 170);
        }

        .form .input:focus {
            outline: none;
            border-inline: 2px solid #12b1d1;
        }

        .form .forgot-password {
            display: block;
            margin-top: 10px;
            margin-left: 10px;
        }

        .form .forgot-password a {
            font-size: 11px;
            color: #0099ff;
            text-decoration: none;
        }

        .form .login-button {
            display: block;
            width: 100%;
            font-weight: bold;
            background: linear-gradient(45deg,
                    rgb(16, 137, 211) 0%,
                    rgb(18, 177, 209) 100%);
            color: white;
            padding-block: 15px;
            margin: 20px auto;
            border-radius: 20px;
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .form .login-button:hover {
            transform: scale(1.03);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 23px 10px -20px;
        }

        .form .login-button:active {
            transform: scale(0.95);
            box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 15px 10px -10px;
        }

        /* From Uiverse.io by kirzin */
        button {
            text-decoration: none;
            position: relative;
            border: none;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            color: #fff;
            width: 9em;
            height: 3em;
            line-height: 2em;
            text-align: center;
            background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
            background-size: 300%;
            border-radius: 30px;
            z-index: 1;
        }

        button:hover {
            animation: ani 8s linear infinite;
            border: none;
        }

        @keyframes ani {
            0% {
                background-position: 0%;
            }

            100% {
                background-position: 400%;
            }
        }

        button:before {
            content: "";
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            z-index: -1;
            background: linear-gradient(90deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
            background-size: 400%;
            border-radius: 35px;
            transition: 1s;
        }

        button:hover::before {
            filter: blur(20px);
        }

        button:active {
            background: linear-gradient(32deg, #03a9f4, #f441a5, #ffeb3b, #03a9f4);
        }
    </style>
</head>

<body>
    <div class="container container-fluid">

        <div class="heading">Ezyvet</div>
        <form class="form" action="login.php" method="post">
            <label for="email" class="form-label visually-hidden">E-mail</label>
            <input type="email" id="email" name="email" class="input" placeholder="Email" required>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <label for="password" class="form-label visually-hidden">Password</label>
            <input type="password" id="password" name="password" class="input" placeholder="Password" required>
            <span class="forgot-password"><a href="landing.php">Not an admin?</a></span>
            <!-- <input value="Log In" type="submit" class="login-button" /> -->
            <button class="w-100" type="submit" style="margin-top:25px;">Log In</button>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
            <?php } ?>
        </form>
    </div>



</body>

</html>