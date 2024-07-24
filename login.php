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
    </style>
</head>

<body>
    <div class="login-container">
        <img src="path/to/your/dog-image.jpg" alt="Dog Image">
        <h1>EZyVet</h1>
        <form method="post" action="testpage.php">
            <input type="email" class="form-control" placeholder="E-mail" required>
            <input type="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">Log In</button>
            <a href="#" class="forgot-password">Forgot Password?</a>
            <a href="#" class="not-admin">Not an admin?</a>
        </form>
    </div>
</body>

</html>