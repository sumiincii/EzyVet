<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="_assets/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fbe4e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
        }

        .reset-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
    </style>
</head>

<body>
    <div class="reset-container">
        <h1>Forgot Password</h1>
        <form method="post" action="send-reset-link.php">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="E-mail" required name="email">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
        </form>
    </div>
</body>

</html>